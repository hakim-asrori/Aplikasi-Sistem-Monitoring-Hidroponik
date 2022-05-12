<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GrafikController extends Controller
{
    public function index()
    {
        $data = [
            'app_title' => 'Grafik Sensor'
        ];
        return view('grafik.index', $data);
    }
}
