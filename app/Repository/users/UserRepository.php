<?php


namespace App\Repository\users;


use App\Models\Address;
use App\Models\Attachment;
use App\Models\Country;
use App\Models\Setting;
use App\Models\User;
use App\Notifications\SendActiveUserNotification;
use App\Repository\GeneralInterface;
use App\Traits\GeneralTrait;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;
use App\Traits\Image\ImageTrait;
use Illuminate\Support\Facades\Notification;

class UserRepository implements GeneralInterface
{
    use  GeneralTrait,ImageTrait;

    public function Index()
    {
        // TODO: Implement Index() method.
        $data['accountTypes']=Setting::where('key','account_type')->where('parent_id','<>',0)->get();

        return view('admin.users.index',$data);

    }
    public function getAllModel($request)
    {
        // TODO: Implement getAllModel() method.
        $data = User::query()->orderby('created_at', 'desc');

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

        if ($request->input('account_type')) {
            $data = $data->where('account_type_id', $request->input('account_type'));
        }

        if ($request->input('start_date')) {
            $start_at = Carbon::parse($request->input('start_date'));
            $data = $data->where('created_at', '>=', $start_at);
        }
        if ($request->input('end_date')) {
            $end_date = Carbon::parse($request->input('end_date'));
            $data = $data->where('created_at', '<=', $end_date);
        }

        if ($request->input('end_at')){
            $end_at=Carbon::parse($request->input('end_at'));

            $data=$data->where('created_at','<=',$end_at);
        }

        return DataTables::of($data)
            ->addColumn('name', function ($data) {
                return $data->name;
            })
            ->addColumn('phone', function ($data) {
                return $data->phone;
            })->addColumn('image_user', function ($data) {
                $image = ' <img src="' . $data->images() . '" width="50px" class=" align-self-end"  alt=""  style="  border-radius: 12px; "/>';

                return $image;

            })
            ->addColumn('email', function ($data) {
                return $data->email ?? null;
            })

            ->addColumn('status', function ($data) {

                if ($data->status) {
                    $button = '<span class="switch switch-icon">
																<label>
																	<input type="checkbox" checked="checked" name="status" data-id="' . $data->id . '" data-status="' . $data->status . '" class="ChangeNext"  />
																	<span></span>
																</label>
															</span>';
                } else {
                    $button = '<span class="switch switch-icon">
																<label>
																	<input type="checkbox" name="status" data-id="' . $data->id . '" data-status="' . $data->status . '" class="ChangeNext" />
																	<span></span>
																</label>
															</span>';
                }


                return $button;

            })
            ->addColumn('action', function ($data) {


                $button = '<a  href="' . route('admin.users.edit', $data->id) . '"   class="edit_user"><span><i style="color: #66afe9" class="fas fa-edit"></i></span></a>';

                $button .= '&nbsp;&nbsp;&nbsp;&nbsp;';
                $button .= '<a   id="' . $data->id . '" user_name="' . $data->name . '"  class="delete "><span><i  style="color: red" class="fas fa-trash-alt"></i></span></button>';
                $button .= '&nbsp;&nbsp;&nbsp;&nbsp;';
                return $button;
            })->rawColumns(['action', 'image_user', 'status', 'review'])
            ->make(true);
    }



    public function Create()
    {
        $data['accountTypes']=Setting::where('key','account_type')->where('parent_id','<>',0)->get();
        $data['document_types']=Setting::where('key','document_type')->where('parent_id','<>',0)->get();

        $data['countries']=Country::select('id','name_ar')->get();
        return view('admin.users.add',$data);
        // TODO: Implement Create() method.
    }

    public function Store($request)
    {
        // TODO: Implement Store() method.
        try {


        $id_image='';
        $commercial_record_image='';
        $person_image='';
        DB::beginTransaction();
        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'pin_code'=>$request->pin,
            'password'=>Hash::make($request->password),
            'phone'=>$request->phone,
            'account_type_id'=>$request->account_type_id,
            'id_number'=>$request->id_number,
            'balance'=>$request->balance,
            'document_type_id'=>$request->document_type_id,
            'status'=>$request->status?1:0
        ]);

        Address::create([
            'user_id'=>$user->id,
            'line1'=>$request->line1,
            'line_2'=>$request->line2,
            'country_id'=>$request->country_id,
            'city_id'=>$request->city_id,
            'post_code'=>$request->post_code,
        ]);
        if( $file = $request->file('person_image') ) {
            $path = 'users/'.$user->id.'/';
            $url = $this->file($file,$path,300,400);

         $person_image=   Attachment::create([
                'attachment'=>$url,
                'attachment_type'=>'users'
            ]);
            $user->update([
                'image'=>$person_image->id,
            ]);
        }

        if( $file = $request->file('id_image') ) {
            $path = 'users/'.$user->id.'/';
            $url = $this->file($file,$path,300,400);

          $id_image=  Attachment::create([
                'attachment'=>$url,
                'attachment_type'=>'users'
            ]);
            $user->update([
                'id_image'=>$id_image->id,
            ]);


        }


        if( $file = $request->file('commercial_record_image') ) {
            $path = 'users/'.$user->id.'/';
            $url = $this->file($file,$path,300,400);

            if ($user->account_type_id==1){
                $commercial_record_image=     Attachment::create([
                    'attachment'=>$url,
                    'attachment_type'=>'users'
                ]);
                $user->update([
                    'commercial_record_image'=>$commercial_record_image->id,
                ]);
            }



        }

        toastr()->success('تم اضافة المستخدم بنجاح!');
        DB::commit();
        return redirect()->route('admin.users.index');
        }catch (\Exception $exception){
            DB::rollBack();
            toastr()->error('لم يتم اضافة المستخدم بنجاح!');
            return redirect()->route('admin.users.index');

        }
    }

    public function Edit($id)
    {
        // TODO: Implement Edit() method.
        $data['document_types']=Setting::where('key','document_type')->where('parent_id','<>',0)->get();
        $data['accountTypes']=Setting::where('key','account_type')->get();
        $data['countries']=Country::select('id','name_ar')->get();
        $data['user']=User::findorfail($id);
        return view('admin.users.edit',$data);

    }

    public function Update($request)
    {

        // TODO: Implement Update() method.
        try {



        $id_image='';
        $commercial_record_image='';
        $person_image='';
        DB::beginTransaction();
        $user=User::findOrFail($request->user_id);
        $user->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'pin_code'=>$request->pin,
            'password'=>Hash::make($request->password),
            'phone'=>$request->phone,
            'account_type_id'=>$request->account_type_id,
            'id_number'=>$request->id_number,
            'balance'=>$request->balance,
            'status'=>$request->status?1:0
        ]);
        $address=Address::where('user_id',$user->id)->first();
        $address->update([
            'user_id'=>$user->id,
            'line1'=>$request->line1,
            'line_2'=>$request->line2,
            'country_id'=>$request->country_id,
            'city_id'=>$request->city_id,
            'post_code'=>$request->post_code,
        ]);
        if( $file = $request->file('person_image') ) {
            $path = 'users/'.$user->id.'/';
            $url = $this->file($file,$path,300,400);

            $person_image=   Attachment::create([
                'attachment'=>$url,
                'attachment_type'=>'users'
            ]);
            $user->update([
                'image'=>$person_image->id,
            ]);
        }

        if( $file = $request->file('id_image') ) {
            $path = 'users/'.$user->id.'/';
            $url = $this->file($file,$path,300,400);

            $id_image=  Attachment::create([
                'attachment'=>$url,
                'attachment_type'=>'users'
            ]);
            $user->update([
                'id_image'=>$id_image->id,
            ]);


        }


        if( $file = $request->file('commercial_record_image') ) {
            $path = 'users/'.$user->id.'/';
            $url = $this->file($file,$path,300,400);

            if ($user->account_type_id==1){
                $commercial_record_image=     Attachment::create([
                    'attachment'=>$url,
                    'attachment_type'=>'users'
                ]);
                $user->update([
                    'commercial_record_image'=>$commercial_record_image->id,
                ]);
            }



        }

        toastr()->success('تم اضافة المستخدم بنجاح!');
        DB::commit();
        return redirect()->route('admin.users.index');
    }catch (\Exception $exception){
        DB::rollBack();
toastr()->error('لم يتم اضافة المستخدم بنجاح!');
return redirect()->route('admin.users.index');

}
    }

    public function Delete($request)
    {

        // TODO: Implement Delete() method.


        try {
            $user = User::where('id', $request->id)->first();
            if ($user->count() > 0) {

                $user->delete();

                return response()->json(["status" => 201, 'message' => 'تم حذف المستخدم']);
            } else {
                return response()->json(["status" => 404, 'message' => 'هذا المستخدم غير موجود']);

            }
        } catch (\Exception $exception) {
            return response()->json(["status" => 500, 'message' => 'هناك خطا ما يرجى المحاولة لاحقا']);
        }

    }

    public function UpadteState($request)
    {
        // TODO: Implement UpadteState() method.
        try {
            $user = User::where('id', $request->id)->first();
            if ($user->count() > 0) {


                $user->update([
                    'status' => $request->status,
                ]);
                Notification::send($user, new SendActiveUserNotification($user, $user->messageStatus()));

                return response()->json(["status" => 201, 'message' => 'تم تغير الحالة  بنجاح']);
            } else {
                return response()->json(["status" => 404, 'message' => 'هذا التصنيف غير موجود']);

            }
        } catch (\Exception $exception) {
            return $exception;
            return response()->json(["status" => 500, 'message' => 'هناك خطا ما يرجى المحاولة لاحقا']);
        }
    }
}
