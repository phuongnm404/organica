<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\DeleteModelTrait;
use App\Models\Menu;

class MenuController extends Controller
{
    //
    use DeleteModelTrait;
  
    private $menu;
    public function __construct( Menu $menu) {
        
        $this->menu = $menu;
    }

    public function index() {
        $menus = $this-> menu->paginate(3);
        return view('admin.menu.index', compact('menus'));
    }
    public function create() {
     
        return view('admin.menu.add');
    }


    public function store(Request $request) {

        $this->menu->create([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.menu.index');
       
    }
    public function edit($id, Request $request)
    {
        $menuFollowIdEdit = $this->menu->find($id);
       
        return view('admin.menu.edit', compact( 'menuFollowIdEdit'));

    }


    public function update($id, Request $request)
    {
        $this->menu->find($id)->update([
            'name' => $request->name,
        ]);
        return redirect()->route('admin.menu.index');
    }


    public function delete($id) {
        
        return $this->deleteModelTrait($id, $this->menu);
    }
}
