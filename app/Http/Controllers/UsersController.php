<?php

namespace App\Http\Controllers;


use App\Models\Login;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->with('company')
            ->select('users.*')
            ->join('companies', 'users.company_id', '=', 'companies.id')
            ->orderBy('companies.name')
            ->paginate();

        return view('users', ['users' => $users]);
    }
}
