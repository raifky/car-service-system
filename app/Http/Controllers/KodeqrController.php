<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\aset;
use App\Models\service;
class KodeqrController extends Controller
{
    public function qrcode(){
        return view('layouts.insertqrcode');
    }
}
