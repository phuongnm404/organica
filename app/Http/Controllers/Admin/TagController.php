<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tag;

class TagController extends Controller
{
    //
    private $tag;
    public function __construct(Tag $tag) {
   
        $this->tag = $tag;
    }
    public function index() {

        $tags = Tag::all();
        return view('admin.tag', compact('tags'));
    }

    public function getTag($id) {
        $tags = $this->tag->all();
        return $tags;
    }
    public function store() {
        dd('ok');
    }

}
