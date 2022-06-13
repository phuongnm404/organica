<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use App\Traits\DeleteModelTrait;
use Illuminate\Support\Facades\Log;

class SettingController extends Controller
{
    //
     //
     use DeleteModelTrait;
     private $setting;
     public function __construct(Setting $setting)
     {
         $this->setting = $setting;
     }
 
     public function index() {
 
         $settings = $this->setting->paginate(3);
         return view('admin.setting.index', compact('settings'));
     }
     public function create() {
         
         return view('admin.setting.add');
     }
     public function store(SettingRequest $request) {
         $this->setting->create([
             'config_key' => $request->config_key,
             'config_value' => $request->config_value,
             'type' => $request->type
 
         ]);
         return redirect()->route('admin.setting.index');
     }
     public function edit($id) {
         $setting = $this->setting->find($id);
         return view('admin.setting.edit', compact('setting'));
     }
     public function update(Request $request, $id) {
         $this->setting->find($id)->update([
             'config_key' => $request->config_key,
             'config_value' => $request->config_value,
         ]);
         return  redirect()->route('admin.setting.index');
     }
     public function delete($id) {
         return $this->deleteModelTrait($id, $this->setting);
 
     }
}
