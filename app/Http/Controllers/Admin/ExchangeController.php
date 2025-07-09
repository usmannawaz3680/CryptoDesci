<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exchange;

class ExchangeController extends Controller
{
    public function index()
    {
        $exchanges = Exchange::latest()->paginate(20);
        return view('admin.pages.exchanges.index', compact('exchanges'));
    }
}
