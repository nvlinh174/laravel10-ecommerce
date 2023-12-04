<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\UpdatePasswordRequest;
use App\Http\Requests\Admin\Auth\UpdateProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $viewPrefix = 'admin.pages.auth.';

    public function login(Request $request)
    {
        if ($request->method() === 'POST') {
            $credential = ['email' => $request->email, 'password' => $request->password];
            $checkLogin = Auth::guard('admin')->attempt($credential);

            if ($checkLogin) {
                return redirect('/admin/dashboard');
            } else {
                return redirect()->back()->with('error_message', 'Thông tin đăng nhập không đúng, vui lòng thử lại');
            }
        }

        if (Auth::guard('admin')->check()) return redirect('/admin/dashboard');

        return view('admin.login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin/login');
    }

    public function updatePassword()
    {
        return view("{$this->viewPrefix}change-password");
    }

    public function postUpdatePassword(UpdatePasswordRequest $request)
    {
        $data = $request->validated();

        Admin::where('id', Auth::guard('admin')->user()->id)->update(['password' => bcrypt($data['new_password'])]);
        return back()->with('success_message', 'Cập nhật mật khẩu thành công!');
    }

    public function profile()
    {
        $user = Auth::guard('admin')->user();
        return view("{$this->viewPrefix}profile", compact('user'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $data = $request->validated();
        Admin::where('id', Auth::guard('admin')->user()->id)->update($data);
        return back()->with('success_message', 'Cập nhật thông tin thành công!');
    }
}
