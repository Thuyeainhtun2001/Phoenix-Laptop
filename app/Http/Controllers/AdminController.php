<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //for layout
    public function content()
    {
        return view('admin.content');
    }
    // for user account list
    public function userList()
    {
        $data = User::where('role', 'user')->paginate(10);
        return view('admin.userAccountList', compact('data'));
    }
    // for admin account list
    public function adminList()
    {
        $data = User::where('role', 'admin')->paginate(5);
        return view('admin.adminAccountList', compact('data'));
    }
    // for user detail
    public function userDetail($id)
    {
        $data = User::where('id', $id)->first();
        return view('admin.userAccountListDetail', compact('data'));
    }
    // promote to admin
    public function promoteToAdmin($id)
    {
        User::where('id', $id)->update(['role' => 'admin']);
        return redirect()->route('admin.userList')->with(['success' => 'change to admin is success....']);
    }
    //for user account delete
    public function userDelete($id)
    {
        $dbImage = User::where('id', $id)->value('image');
        if ($dbImage != null) {
            Storage::delete('/public/profile/' . $dbImage);
        }
        User::where('id', $id)->delete();
        return redirect()->route('admin.userList')->with(['success' => 'delete user data is success....']);
    }
    // for admin detail
    public function adminDetail($id)
    {
        $data = User::where('id', $id)->first();
        return view('admin.adminAccountListDetail', compact('data'));
    }
    // change to user
    public function changeToUser($id)
    {
        User::where('id', $id)->update(['role' => 'user']);
        return redirect()->route('admin.adminList')->with(['success' => 'change to user is success...']);
    }
    // for admindelete
    public function adminDelete($id)
    {
        $dbImage = User::where('id', $id)->value('image');
        if ($dbImage != null) {
            Storage::delete('/public/profile/' . $dbImage);
        }
        User::where('id', $id)->delete();
        return redirect()->route('admin.adminList')->with(['success' => 'delete admin data is success...']);
    }
}
