<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Components\MenuRecusive;
use App\Traits\DeleteModelTrait;
use App\Models\Menu;

class MenuController extends Controller
{
    //
    use DeleteModelTrait;
    private $menuRecusive;
    private $menu;
    public function __construct(MenuRecusive $menuRecusive, Menu $menu) {
        $this->menuRecusive = $menuRecusive;
        $this->menu = $menu;
    }
    public function index() {
        $menus = $this-> menu->paginate(3);
        return view('admin.menu.index', compact('menus'));
    }
    public function create() {
        $optionSelect =  $this->menuRecusive-> menuRecusiveAdd();

        return view('admin.menu.add', compact('optionSelect'));
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
        $optionSelect = $this->menuRecusive->menuRecusiveEdit($menuFollowIdEdit->parent_id);
        return view('admin.menu.edit', compact('optionSelect', 'menuFollowIdEdit'));

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
