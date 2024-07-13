<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterPerusahaan;
use App\Models\DataUpload;

class HomeController extends Controller
{
    public function index()
    {
        $perusahaans = MasterPerusahaan::all();
        $uploads = DataUpload::all();
        return view('home', compact('perusahaans', 'uploads'));
    }
}
