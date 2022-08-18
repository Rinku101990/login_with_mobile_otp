<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Categories;
use App\Models\Products;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }
}
