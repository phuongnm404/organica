<?php

namespace App\Http\Controllers\Admin;
use App\Models\StaticFeature;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaticController extends Controller
{
    //
     
    use DeleteModelTrait;
    private $static;
    public function __construct(StaticFeature $static) {
   
        $this->static = $static;
    }
    public function index() {
        $statics = $this->static->paginate(5);
        return view('admin.static.index', compact('statics'));
    }
    public function create() {

        return view('admin.static.add');
    }

 
    public function store(Request $request) {
        $this->static->create([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.static.index');
    }
    public function edit($id) {
        $static = $this -> static->find($id);
        return view('admin.static.edit', compact('static'));
    }
    public function update(Request $request, $id) {
        $dataUpdate = [
            'name' => $request->name,
        ];
        $this->static->find($id)->update($dataUpdate);
        return redirect()->route('admin.static.index');
    }
    public function delete($id) {
        return $this->deleteModelTrait($id, $this->static);
    }
}
