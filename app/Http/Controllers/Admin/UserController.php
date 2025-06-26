<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('wallets')->get();

        return view('admin.pages.users.index', [
            'users' => $users,
        ]);
    }
}
