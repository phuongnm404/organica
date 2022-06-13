<?php

namespace App\Http\Controllers\Site;
use App\Models\SLider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    //
    public function index() {

        $sliders = Slider::take(3)->get();

        return view('site.home.home', compact('sliders'));
    }

}
