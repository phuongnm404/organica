<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;

class PermissionsController extends Controller
{
    //
    public function createPermissions() {
        return view('admin.permission.add');
     }
     public function store(Request $request) {
 
         $permission=Permission::create([
             'name' => $request->module_parent,
             'display_name' => $request->module_parent,
             'parent_id' => 0
         ]);
         foreach ($request->module_chilren as $value) {
             Permission::create([
                 'name' => $value,
                 'display_name' => $value,
                 'parent_id' => $permission->id,
                 'key_code' => $request->module_parent . '_' . $value
             ]);
         }
         return dd("thêm quyền thành công");
  
     }
}
