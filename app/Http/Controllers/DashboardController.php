<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'app_title' => "Dashboard"
        ];
        return view('dashboard.index', $data);
    }
}
