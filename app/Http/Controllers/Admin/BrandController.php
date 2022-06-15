<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\DeleteModelTrait;
class BrandController extends Controller
{
    //
    use DeleteModelTrait;
    private $brand;
    public function __construct(brand $brand) {
   
        $this->brand = $brand;
    }
    public function index() {
        $brands = $this->brand->paginate(5);
        return view('admin.brand.index', compact('brands'));
    }
    public function create() {

        return view('admin.brand.add');
    }

   
    public function store(Request $request) {
        $this->brand->create([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.brand.index');
    }
    public function edit($id) {
        $brand = $this -> brand->find($id);
        return view('admin.brand.edit', compact('brand'));
    }
    public function update(Request $request, $id) {
        $dataUpdate = [
            'name' => $request->name,
        ];
        $this->brand->find($id)->update($dataUpdate);
        return redirect()->route('admin.brand.index');
    }
    public function delete($id) {
        return $this->deleteModelTrait($id, $this->brand);
    }
}
