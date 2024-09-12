<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRoleRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function __construct()
    {
        Gate::authorize('adm', User::class);
    }

    public function index()
    {
        $users = User::paginate();

        return view('roles.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('roles.edit', compact('user'));
    }

    public function update(UpdateRoleRequest $request, $id)
    {
        $validation = $request->validated();
        User::where('id', $id)
            ->update([
                'role' => $validation['role']
            ]);
        return to_route('roles.index');
    }
}
