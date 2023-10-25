<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $search = "%" . request('search') . "%";
        $users = User::when($search, function ($query) use ($search) {
            $query->where('name', 'like', $search)->orWhere('email', 'like', $search)->orWhere('role', 'like', $search);
        })->orderBy('id', 'desc')->paginate(5);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create-edit', [
            'user' => new User(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'password' => 'required|confirmed|min:8',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect('/admin/users')->with('add', 'User Created!');
    }

    public function edit(User $user)
    {
        return view('admin.user.create-edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required',
            'password' => 'nullable|min:8',
        ]);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect('/admin/users')->with('add', 'User Updated!');
    }

    public function destroy(User $user)
    {
        $authenticatedUser = auth()->user();
        if ($authenticatedUser && $authenticatedUser->id === $user->id) {
            return back()->with('del', 'You cannot delete your own user data.');
        }

        $user->delete();

        return back()->with('del', 'User Deleted!');
    }
}
