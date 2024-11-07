<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;


class AdminController extends Controller
{
    public function AdminDashboard()
    {
       return view('admin.index');
    } //End Method


public function AdminLogout(Request $request)
{
    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('admin.login');
} // End method

public function AdminLogin()
{
    return view('Admin.admin_login');
} //End method

public function AdminProfile()
{
    $id = Auth::user()->id;
    $profileData = User::find($id);
    return view('Admin.admin_profile', compact('profileData'));
}

public function AdminProfileStore(Request $request)
{
    $id = Auth::user()->id;
   // dd($id);
    $data = user::find($id);
    $data->username = $request->username;
    $data->name = $request->name;
    $data->email = $request->email;
    $data->phone = $request->phone;
    $data->address = $request->address;

    if ($request->file('photo')){
      $file= $request->file('photo');
      @unlink(public_path('upload/admin_images/'.$data->photo));
      $filename=date('YmdHi').$file->getClientOriginalName();
      $file->move(public_path('upload/admin_images'),$filename);
      $data['photo'] = $filename;
    }
      $data->save();

      $notification = array(
        'message' => 'Admin Profile updated successfully',
        'alert type' => 'success'  );
        return redirect()->back()->with($notification);

} // end Method

public function AdminChangePassword()
{
    $id = Auth::user()->id;
    $profileData =user::find($id);
   //
  return view('Admin.admin_change_password', compact('profileData'));
} //End Method

public function AdminUpdatePassword(Request $request)
{
 //Validation
 $request->validate(
 [
  'Current_password' => 'required',
  'new_password' => 'required|confirmed',
 ]
);
  // Match the Current password
  if(!Hash::check($request->current_password, auth::user()->password))
  {
    $notification = array(
        'message' => 'current password Does not Match!',
        'alert-type' => 'error'
    );
    return back()->with($notification);
  }
  // Update New Password
   User::WhereId(auth()->user()->id)->update(
    [
      'password' => Hash::make($request->new_password)
    ]);
    $notification = array(
      'message' => 'Password Change Successfully',
      'alert-type' => 'Success'
  );
    return back()->with($notification);
}

}
