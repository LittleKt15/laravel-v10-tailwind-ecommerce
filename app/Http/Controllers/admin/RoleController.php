<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function index()
    {
        $user = Auth::user();
        $users = User::paginate(5);
        return view('admin.role.index', compact('user', 'users'));
    }

    public function edit($id)
    {
        $user = Auth::user();
        $users = User::find($id);
        return view('admin.role.edit', compact('user', 'users'));
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
        $user = Auth::user();
        $searchData = "%" . $request->search_data . "%";
        $users = User::where('name', 'like', $searchData)->orWhere('email', 'like', $searchData)->orWhere('role', 'like', $searchData)->paginate(5);

        return view('admin.role.index', compact('user', 'users'));
    }

    public function destory($id)
    {
        User::find($id)->delete();

        return back()->with('del', 'Role Deleted!');
    }
}
