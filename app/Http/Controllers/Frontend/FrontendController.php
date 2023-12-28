<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Hero;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index(): View
    {
        $data['latestHero'] = Hero::latestActive();

        return view('frontend.home.index', $data);
    }
}
