<?php

namespace App\Http\Controllers;

use App\User;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/account/index');
    }

    public function profile()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('admin/account/profile', compact('user'));
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $id = Auth::id();
        $user = User::find($id);

        $user->name = $request->name;
        $user->save();

        Session::flash('success', 'Your changes has been saved');
        return redirect('/admin/account/profile');
    }

    public function changePassword()
    {
        $id = Auth::id();
        $user = User::find($id);
        return view('admin/account/change-password', compact('user'));
    }

    public function changePasswordUpdate(Request $request)
    {
        $this->validate($request, [
            'currentPassword' => 'required',
            'newPassword' => 'required|min:3|confirmed'
        ]);

        $id = Auth::id();
        $user = User::find($id);

        if (Hash::check($request->currentPassword, $user->password)) {
            $user->password = Hash::make($request->newPassword_confirmation);
            $user->save();

            Session::flash('success', 'Your changes has been saved');
            return redirect('/admin/account/change-password');
        } else {
            Session::flash('fail', 'Current Password is wrong!');
            return redirect('/admin/account/change-password');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
