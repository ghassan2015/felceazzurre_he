<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');

    }

    public function UpdateProfile(Request $request)
    {

        $request->validate([
            'email' => ['required', 'email:rfc,dns', Rule::unique('admins')->ignore(auth()->id()),],
            'name' => ['required', 'string', 'max:255',],
            'mobile' => ['required', Rule::unique('admins')->ignore(auth()->id()),]

        ]);
        try {
            $user = auth()->user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->save();
            toastr()->success('تم تعديل البيانات بنجاح');
            return redirect()->back();
        } catch (\Exception $exception) {
            toastr()->error('هناك خطا لم يتم حفظ البيانات بنجاح');
            return redirect()->back();

        }
    }

    public function changePassword()
    {
        return view('admin.profile.change-password');

    }

    public function changePasswordProfile(ChangePasswordRequest $request)
    {
        try {


            $request->validate([

            ]);
            $user = auth()->user();

            if (Hash::check($request->old_password, $user->password)) {
                $user->update([
                    'password' => Hash::make($request->new_password)
                ]);
                toastr()->success('تم تعديل البيانات بنجاح');

                return redirect()->back();
            }
        } catch (\Exception $exception) {
            return $exception;
            toastr()->error('هناك خطا لم يتم حفظ البيانات بنجاح');
            return redirect()->back();

        }
    }
}
