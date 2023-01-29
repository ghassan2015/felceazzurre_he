<?php


namespace App\Repository\roles;


use App\Models\Role;
use App\Repository\GeneralInterface;
use Illuminate\Http\Request;

use Yajra\DataTables\DataTables;

class RoleRepository implements GeneralInterface
{

    public function Index()
    {

        return view('admin.roles.index');

    }

    public function getAllModel($request)
    {
        // TODO: Implement getAllModel() method.
        $data = Role::query()->where('id','<>',1)->orderby('created_at', 'desc');


        return DataTables::of($data)
            ->addColumn('name', function ($data) {
                return $data->name;
            })
            ->addColumn('permissions', function ($data) {
                $va=[];
                foreach ($data->permissions as $value) {
                     $va[]=$value;

                }
                return $va;
            })->addColumn('status', function ($data) {

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


                $button = '<a  href="' . route('admin.roles.edit', $data->id) . '"   class="edit_user"><span><i style="color: #66afe9" class="fas fa-edit"></i></span></a>';

                $button .= '&nbsp;&nbsp;&nbsp;&nbsp;';
//                $button .= '<a href=""   id="' . $data->id . '" user_name="' . $data->name . '"  class="delete "><span><i  style="color: red" class="fas fa-trash-alt"></i></span></button>';
//                $button .= '&nbsp;&nbsp;&nbsp;&nbsp;';
                return $button;
            })->rawColumns(['action', 'status'])
            ->make(true);
    }


    public function Create()
    {

        // TODO: Implement Create() method.

        return view('admin.roles.create');

    }

    public function Store($request)
    {
        // TODO: Implement Store() method.
        try {

            $role = $this->process(new Role, $request);

//            toastr()->success('تم الاضافة بنجاح', 'نجاح العملية');
//            return redirect()->route('admin.roles.index');
            return response()->json(["status" => 201, 'message' => 'تم اضافة الصلاحية  بنجاح','redirect_url'=>route('admin.roles.index')]);

        } catch (\Exception $ex) {

            // return message for unhandled exception

              return response()->json(["status" => 422, 'message' => 'لم يتم اضافة الصلاحية  بنجاح']);
}
    }

    public function Edit($id)
    {
        // TODO: Implement Edit() method.
        $data['role'] = Role::findorfail($id);
        return view('admin.users.edit', $data);

    }

    public function Update($request)
    {
        try {
            $role = Role::findOrFail($request->role_id);
            $role = $this->process($role, $request);
            toastr()->success('تم تعديل بنجاح', 'نجاح العملية');
            return redirect()->route('admin.roles.index');
        }catch (\Exception $ex) {
            // return message for unhandled exception
            toastr()->error('لم يتم تنفيذ العملية بنجاح', 'فشل العملية');

            return redirect()->route('admin.roles.index');
        }

    }

    public function Delete($request)
    {

        // TODO: Implement Delete() method.


        try {
            $role=\App\Models\Role::where('id',$request->id)->first();
            $admin=$role->admins;
            if ($admin->count() == 0) {

                $role->delete();

                return response()->json(["status" => 201, 'message' => 'تم حذف الصلاحية']);
            } else {
                return response()->json(["status" => 404, 'message' => 'هذا الصلاحية  مستخدمة ']);

            }
        } catch (\Exception $exception) {
//            return $exception;
            return response()->json(["status" => 422, 'message' => 'هناك خطا ما يرجى المحاولة لاحقا']);
        }

    }

    public function UpadteState($request)
    {
        try {

            $role = Role::where('id', $request->id)->first();
            if ($role->count() > 0) {

                if ($role->admins->count()>0){
                    return response()->json(["status" => 422, 'message' => 'لا يمكن تغير حالة الصلاحية بسسب استخدامها من قبل مديري النظام']);

                }else{
                    $role->update([
                        'status' => intval($request->status),
                    ]);
                }



                return response()->json(["status" => 201, 'message' => 'تم تغير الحالة  بنجاح']);
            } else {
                return response()->json(["status" => 422, 'message' => 'هذا الصلاحية غير موجود']);

            }
        } catch (\Exception $exception) {
            return response()->json(["status" => 500, 'message' => 'هناك خطا ما يرجى المحاولة لاحقا']);
        }
    }

    protected function process(Role $role, Request $r)
    {
        $role->name = $r->name;
        $role->permissions = ($r->permissions);
        $role->save();
        return $role;
    }
}
