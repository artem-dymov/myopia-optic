<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class InfoPageController extends Controller
{
    public function index() : View {
        return view('info-page');
    }
}
