<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        // Отримуємо всі підбори користувача, останні зверху
        $recommendations = Auth::user()->recommendations()->latest()->get();

        return view('history', compact('recommendations'));
    }
}
