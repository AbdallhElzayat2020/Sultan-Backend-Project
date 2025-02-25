<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class DashboardHomeController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.index');
    }
}
