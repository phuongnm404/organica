<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Traits\DeleteModelTrait;

class TagController extends Controller
{
    //
   
    use DeleteModelTrait;
    private $tag;
    public function __construct(Tag $tag) {
   
        $this->tag = $tag;
    }
    public function index() {
        $tags = $this->tag->paginate(5);
        return view('admin.tag.index', compact('tags'));
    }
    public function create() {

        return view('admin.tag.add');
    }

 
    public function store(Request $request) {
        $this->tag->create([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.tag.index');
    }
    public function edit($id) {
        $tag = $this -> tag->find($id);
        return view('admin.tag.edit', compact('tag'));
    }
    public function update(Request $request, $id) {
        $dataUpdate = [
            'name' => $request->name,
        ];
        $this->tag->find($id)->update($dataUpdate);
        return redirect()->route('admin.tag.index');
    }
    public function delete($id) {
        return $this->deleteModelTrait($id, $this->tag);
    }
}
