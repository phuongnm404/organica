<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Components\Recusive;
use Storage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Models\ProductImage;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use DB;
use App\Traits\StorageImageTrait;
use App\Http\Requests\ProductAddRequest;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    //
    
    use StorageImageTrait, DeleteModelTrait;
    private $category;
    private $product;
    private $tag;
    private $productTag;
    private $brand;

    public function __construct(Category $category, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag, Brand $brand) {
   
      $this->category = $category;
      $this->product = $product;
      $this->productImage = $productImage;
      $this->tag = $tag;
      $this->productTag = $productTag;
      $this->brand = $brand;
    }
    public function index() {
        $products = $this->product->paginate(5);

        return view('admin.product.index', compact('products'));
    }
    public function create() {
        $htmlOption=$this->getCategory($parent_id='');
        $list_tag = $this->tag::all();
        $list_brand = $this->brand::all();
        return view('admin.product.add', compact('htmlOption', 'list_tag', 'list_brand'));
    }

    public function getCategory($parent_id) {
        $data=$this->category->all();
        $recusive = new Recusive($data);
        $htmlOption=$recusive->CategoryRecusive($parent_id);
        
        return $htmlOption;
    }
  
    public function store(ProductAddRequest $request) { 
        // try {
        //     DB::beginTransaction();
           
            $list_tags = $request->tags;

            $dataProductCreate = [
                'name' =>$request->name,
                'price' =>$request->price,
                'brand_id' => $request->brand_id,
                'weight' => $request -> weight,
                'description' =>$request->contents,
                'user_id'=> auth()->id(),
                'category_id'=> $request->category_id,
                'slug' => str_slug($request->name),
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
                if (!empty($dataUploadFeatureImage)) {
                    $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                    $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
                }
                $product = $this->product->create($dataProductCreate);

                $product->tags()->sync($list_tags);
             
               
          //Insert datta to product_image 
             if ($request->hasFile('image_path')) {
                 
            foreach ($request->image_path as $fileItem) {
                $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                $product->images()->create([
                    'image_path' => $dataProductImageDetail['file_path'],
                    'image_name' => $dataProductImageDetail['file_name']
                ]);
                }
            }
            

           // dd($request->all());
        //     DB::commit();
             return redirect()->route('admin.product.index');
    
        //  } catch(\Exception $exception) {
        //      DB::rollBack();
        //      Log::error ('Message: '. $exception->getMessage(). 'Line: '. $exception->getLine());
        //  }
      
      
    }
    
    public function edit($id) {

        $product = $this->product->find($id);
        $brand = $this->brand->all();
        $htmlOption=$this->getCategory($product->category_id);

      // dd($brand);

       return view('admin.product.edit', compact('htmlOption', 'product', 'brand'));

    }   
    public function update(Request $request, $id) {
        try {
            DB::beginTransaction();
            $dataProductUpdate = [
                'name' =>$request->name,
                'price' =>$request->price,
                'brand_id' => $request->brand_id,
                'weight' => $request -> weight,
                'description' =>$request->contents,
                'user_id'=> auth()->id(),
                'category_id'=> $request->category_id,
            ];
            $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
            if (!empty($dataUploadFeatureImage)) {
                $dataProductUpdate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
                $dataProductUpdate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
            }
             $this->product->find($id)->update($dataProductUpdate);
            $product = $this->product->find($id);

            // Insert data to product_images
            if ($request->hasFile('image_path')) {
                $this->productImage->where('product_id', $id)->delete();
                foreach ($request->image_path as $fileItem) {
                    $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                    $product->images()->create([
                        'image_path' => $dataProductImageDetail['file_path'],
                        'image_name' => $dataProductImageDetail['file_name']

                    ]);
                }
            }

            // Insert tags for product
            $tagIds = [];
            if (!empty($request->tags)) {
                foreach ($request->tags as $tagItem) {
                    // Insert to tags
                    $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
                    $tagIds[] = $tagInstance->id;
                }
            }
            dd($tagIds);
            $product->tags()->sync($tagIds);

        
            DB::commit();
            return redirect()->route('admin.product.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
        }

    }
    public function delete($id) {
        return $this->deleteModelTrait($id, $this->product);

    }
}
