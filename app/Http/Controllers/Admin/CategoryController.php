<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Components\Recusive;
use App\Traits\DeleteModelTrait;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    use DeleteModelTrait;
    private $category;
    public function __construct(Category $category) {
   
      $this->category = $category;

    }
    public function index() {
        $category = $this->category->latest()->paginate(5);
        return view('admin.category.index', compact('category'));

    }
    public function getCategory($parent_id) {
        $data=$this->category->all();
        $recusive = new Recusive($data);
        $htmlOption=$recusive->CategoryRecusive($parent_id);
        return $htmlOption;
    }
    public function create() {
        $htmlOption=$this->getCategory($parent_id='');
        return view('admin.category.add', compact('htmlOption'));
    }
    public function store(Request $request) {
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name)
        ]);
        return redirect()->route('admin.category.index');
    }
    public function edit($id) {
        $category = $this->category->find($id);
        $htmlOption=$this->getCategory($category->parent_id);
        return view('admin.category.edit', compact('category','htmlOption'));
    }
    public function update(Request $request) {
        $this -> category-> find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
        ]);
        return view('admin.category.index', compact('category'));
    }

    public function delete($id) {
        return $this->deleteModelTrait($id, $this->category);
    }

}
