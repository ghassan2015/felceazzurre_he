<?php


namespace App\Repository\admins;


use App\Models\Address;
use App\Models\Admin;
use App\Models\Attachment;
use App\Models\Country;
use App\Models\Role;
use App\Models\Setting;
use App\Models\User;
use App\Notifications\SendActiveUserNotification;
use App\Repository\GeneralInterface;
use App\Traits\GeneralTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use App\Traits\Image\ImageTrait;
use Illuminate\Support\Facades\Notification;

class AdminRepository implements GeneralInterface
{
    public function Index()
    {

        return view('admin.admin.index');
    }

    public function getAllModel($request)
    {


        $data = Admin::query()->where('is_supper', '<>', 1)->orderby('created_at', 'desc');

        if ($request->input('email')) {
            $data = $data->where("email", 'LIKE', '%' . $request->input('email') . '%');
        }
        if ($request->input('name')) {
            $data = $data->where('name', 'LIKE', '%' . $request->input('name') . '%');
        }
        if ($request->input('mobile')) {
            $data = $data->where('phone', 'LIKE', '%' . $request->input('mobile') . '%');
        }
        if ($request->input('status')) {
            if ($request->input('status') == 1) {
                $data = $data->where('status', '=', 1);

            } else {

                $data = $data->where('status', '=', 0);

            }
        }

        if ($request->input('start_date')) {
            $start_at = Carbon::parse($request->input('start_date'));
            $data = $data->where('created_at', '>=', $start_at);
        }
        if ($request->input('end_date')) {
            $end_date = Carbon::parse($request->input('end_date'));
            $data = $data->where('created_at', '<=', $end_date);
        }
        return DataTables::of($data)
            ->addColumn('name', function ($data) {
                return $data->name;
            })
            ->addColumn('phone', function ($data) {
                return $data->phone;
            })->addColumn('image', function ($data) {
                $image = ' <img src="' . $data->getAdminImage() . '"  width="50px"  class="align-self-end"  alt=""  style="  border-radius: 12px; "/>';

                return $image;

            })
            ->addColumn('email', function ($data) {
                return $data->email ?? null;
            })
            ->addColumn('role', function ($data) {
                return $data->role->name ?? null;
            })
            ->addColumn('status', function ($data) {

                if ($data->status) {
                    $button = '<span class="switch switch-icon">
																<label>
																	<input type="checkbox" checked="checked" name="status" data-id="' . $data->id . '" data-status="' . $data->status . '" class="check_status"  />
																	<span></span>
																</label>
															</span>';
                } else {
                    $button = '<span class="switch switch-icon">
																<label>
																	<input type="checkbox" name="status" data-id="' . $data->id . '" data-status="' . $data->status . '" class="check_status" />
																	<span></span>
																</label>
															</span>';
                }


                return $button;

            })
            ->addColumn('action', function ($data) {


                $button = '<a  href="' . route('admin.admins.edit', $data->id) . '"   class="edit_admin"><span><i style="color: #66afe9" class="fas fa-edit"></i></span></a>';

                $button .= '&nbsp;&nbsp;&nbsp;&nbsp;';
                $button .= '<a   id="' . $data->id . '" user_name="' . $data->name . '"  class="delete "><span><i  style="color: red" class="fas fa-trash-alt"></i></span></button>';
                $button .= '&nbsp;&nbsp;&nbsp;&nbsp;';
                return $button;
            })->rawColumns(['action', 'image', 'status'])
            ->make(true);
    }


    public function Create()
    {
        $data['roles'] = Role::query()->active()->get();
        return view('admin.admin.add', $data);

    }

    public function Store($request)
    {
        try {
            $admin = Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->phone,
                'role_id' => $request->role_id,
                'status' => $request->status ?? 0,
                'password' => Hash::make($request->password),

            ]);

            if ($request->hasFile('image')) {

                $destinationPath = storage_path('app/public/admin/profile/');
                $file = $request->file('image'); // will get all files
                $file_name = $file->getClientOriginalName(); //Get file original name
                $file->move($destinationPath, $file_name); // move files to destination folder
                $admin->update([
                    'image' => $file_name
                ]);
            }

            return response()->json(["status" => 201, 'message' => 'تم اضافة   بنجاح', 'redirect_url' => route('admin.admins.index')]);

        } catch (\Exception $ex) {

            return response()->json(["status" => 422, 'message' => 'لم يتم اضافة   بنجاح']);
        }
    }

    public function Edit($id)
    {
        $data['admin'] = Admin::find($id);
        $data['roles'] = Role::get();
        if (!$data['admin']) {
            return response()->json(["status" => 422, 'message' => 'مدير النظام غير موجود مسبقا']);

        }

        return view('admin.admin.edit', $data);

    }

    public function Update($request)
    {
        try {
            $admin = Admin::find($request->id);

            if (!$admin) {
                return response()->json(["status" => 422, 'message' => 'مدير النظام غير موجود مسبقا']);

            }
            $admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->phone,
                'role_id' => $request->role_id,
                'status' => $request->status ?? 0,

            ]);

            if (isset($request->password)) {
                $admin->update([
                    'password' => Hash::make($request->password),
                ]);
            }
            if ($request->hasFile('image')) {
                $destinationPath = storage_path('app/public/admin/profile/');
                $file = $request->file('image'); // will get all files

                $file_name = $file->getClientOriginalName(); //Get file original name
                $file->move($destinationPath, $file_name); // move files to destination folder
                $admin->update([
                    'image' => $file_name
                ]);
            }
            if (isset($request->stauts)) {
                $admin->update([
                    'status' => 1,
                ]);
            }

            return response()->json(["status" => 201, 'message' => 'تم تعديل   بنجاح', 'redirect_url' => route('admin.admins.index')]);


        } catch (\Exception $ex) {
            return response()->json(["status" => 422, 'message' => 'لم يتم تعديل   بنجاح']);
        }

    }

    public function UpadteState($request)
    {
        try {
            $admin = Admin::where('id', $request->id)->first();
            if ($admin->count() > 0) {


                $admin->update([
                    'status' => intval($request->status),
                ]);

                return response()->json(["status" => 201, 'message' => 'تم تغير الحالة  بنجاح']);
            } else {
                return response()->json(["status" => 404, 'message' => 'هذا الشخص غير موجود']);

            }
        } catch (\Exception $exception) {
            return response()->json(["status" => 500, 'message' => 'هناك خطا ما يرجى المحاولة لاحقا']);
        }
    }

    public function Delete($request)
    {

        try {
            $admin = \App\Models\Admin::where('id', $request->id)->first();
            if (isset($admin)) {
                $admin->delete();

                return response()->json(["status" => 201, 'message' => 'تم حذف مدير النظام']);
            } else {
                return response()->json(["status" => 404, 'message' => 'مدير النظام غير موجود ']);

            }
        } catch (\Exception $exception) {
            return response()->json(["status" => 422, 'message' => 'هناك خطا ما يرجى المحاولة لاحقا']);
        }
    }
}
