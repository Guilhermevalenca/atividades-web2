<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index()
    {
        Gate::authorize('adm', User::class);

        $users = User::paginate();

        return view('roles.index', compact('users'));
    }

    public function edit()
    {

    }
}
