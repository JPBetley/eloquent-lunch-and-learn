<?php

namespace App\Http\Controllers;


use App\Models\Company;
use App\Models\Login;
use App\Models\User;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::query()
            ->orderBy(Company::select('name')
                ->whereColumn('companies.id', 'users.company_id')
                ->orderBy('name')
                ->take(1)
            )
            ->with('company')
            ->paginate();

        return view('users', ['users' => $users]);
    }
}
