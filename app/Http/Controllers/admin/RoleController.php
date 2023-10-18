<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $users = User::paginate(5);
        return view('admin.role.index', compact('users'));
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.role.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required',
        ]);

        User::find($id)->update([
            'role' => $request->role,
        ]);

        return redirect('/roles')->with('add', 'Role Updated!');
    }

    public function search(Request $request)
    {
        $searchData = "%" . $request->search_data . "%";
        $users = User::where('name', 'like', $searchData)->orWhere('email', 'like', $searchData)->orWhere('role', 'like', $searchData)->paginate(5);

        return view('admin.role.index', compact('users'));
    }

    public function destroy($id)
    {
        User::find($id)->delete();

        return back()->with('del', 'Role Deleted!');
    }
}
