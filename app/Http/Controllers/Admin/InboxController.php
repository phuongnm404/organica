<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Inbox;
use App\Http\Controllers\Controller;

class InboxController extends Controller
{
    //
    private $inbox;
    public function __contruct(Inbox $inbox) {
        $this->inbox = $inbox;
        
    }
    public function index() {

        $inbox = Inbox::all();
        return view('admin.inbox.index', compact('inbox'));
    }

    public function store(Request $request) {
        dd($request->all());
        $inbox = new Inbox();
        $inbox->user_id = $request->user_id;
        $inbox->cart_id= $request->cart_id;
        $inbox->message= "hủy đơn";
        $inbox->save();
        return redirect()->route('admin.inbox.index');

    
    }
}
