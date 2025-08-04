<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CopyTraderController extends Controller
{
    public function create()
    {
        return view('admin.pages.copy_traders.create');
    }
}
