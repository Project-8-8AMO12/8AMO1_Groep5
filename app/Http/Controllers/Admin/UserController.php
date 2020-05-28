<?php
namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
        return view('admin.users.index')->with('users', User::paginate(10));
    }

    public function create()
    {
        return view('admin.users.create')->with(['roles' => Role::all()]);
    }

    public function store(Request $request) {
        request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
        ]);

        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.index')->with('success', 'De user is toegevoegd!');
    }

    public function edit($id)
    {
        if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to edit yourself');
        }

        return view('admin.users.edit')->with(['user' => User::find($id), 'roles' => Role::all()]);
    }

    public function update(Request $request, $id)
    {
        if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to edit yourself');
        }

        User::where('id', $id)->update([
           'name' => request('name'),
           'email' => request('email')
        ]);

        $user = User::find($id);
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.index')->with('success', 'User has been updated');
    }

    public function destroy($id)
    {
        if (Auth::user()->id == $id) {
            return redirect()->route('admin.users.index')->with('warning', 'You are not allowed to delete yourself');
        }

        $user = User::find($id);
        if ($user) {
            $user->roles()->detach();
            $user->delete();
            return redirect()->route('admin.users.index')->with('success', 'User has been deleted.');
        }
        return redirect()->route('admin.users.index')->with('warning', 'This users has not been deleted');
    }
}
