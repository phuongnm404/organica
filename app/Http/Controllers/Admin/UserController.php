<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    //
    // use deleteModelTrait;
    // private $user;
    // private $role;
    // public function __construct(User $user, Role $role)
    // {
    //     $this->user = $user;
    //     $this->role = $role;
    // }

    // public function index()
    // {
    //     $users = $this->user->paginate(10);
    //     return view('admin.user.index', compact('users'));

        
    // }
    // public function create() {
    //     $roles = $this->role->all();
    //     return view('admin.user.add', compact('roles'));
    // }


    // public function store(Request $request) {


    // try {
    //        \ DB::beginTransaction();

    //     $user = $this->user->create([
    //         'name' =>$request->name,
    //         'email' =>$request->email,
    //         'password' =>Hash::make($request->password)
    //     ]);
    //     \DB::commit();
    //     $user->roles()->attach($request->role_id);
    //     return redirect()->route('admin.user.index');
    // } catch (\Exception $exception) {
    //     \DB::rollBack();
    //     Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());

    // }


    // }

    // public function edit($id) {
    //     $roles = $this->role->all();
    //     $users = $this->user->find($id);
    //     $roleOfUser = $users->roles;
    //     return view ('admin.user.edit', compact('roles', 'users', 'roleOfUser'));

    // }
    // public function update(Request $request, $id) {
    //     try {
    //         \DB::beginTransaction();

    //     $user = $this->user->find($id)->update([
    //         'name' =>$request->name,
    //         'email' =>$request->email,
    //         'password' =>Hash::make($request->password)
    //     ]);
    //     $user = $this->user->find($id);
    //     $user->roles()->sync($request->role_id);
    //     \DB::commit();
        
    //     return redirect()->route('admin.user.index');
    //     } catch (\Exception $exception) {
    //         \DB::rollBack();
    //         Log::error('Message :' . $exception->getMessage() . '--- Line: ' . $exception->getLine());
            
    //     }

    // }
    // public function delete($id) {
    //     return $this->deleteModelTrait($id, $this->user);
    // }
}
