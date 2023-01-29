<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use App\Repository\users\PaymentTypeRepository;
use App\Repository\users\UserRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public $user;
    public function __construct(UserRepository $user)
    {
        $this->user=$user;
    }

    public function index(){
        return $this->user->Index();
    }
    public function getUser(Request $request)
    {
        return $this->user->getAllModel($request);

    }
    public function create(){
        return $this->user->Create();
    }
    public function store(UserRequest $request){
        return $this->user->Store($request);
    }
    public function edit($id){
        return $this->user->Edit($id);
    }
    public function update(UserRequest $request){
        return $this->user->Update($request);
    }
    public function updateStatus(Request $request)
    {
        return $this->user->UpadteState($request);
    }
    public function delete(Request $request){
        return $this->user->Delete($request);
    }
    public function excel(Request $request){

        return \Maatwebsite\Excel\Facades\Excel::download(new UsersExport($request), 'users.xlsx');


    }

    public function pdf(Request $request){
        $data = User::query()->orderby('created_at', 'desc');
//        dd($this->request);

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

        $users=$data->get();


        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf->autoScriptToLang = true;
        $mpdf->autoLangToFont = true;
//        $mpdf->SetWatermarkImage('assets/media/logos/logo.png');
        $mpdf->showWatermarkImage = true;

        $mpdf->WriteHTML(view('admin.users.pdf', ['users'=>$users])->render());
        $mpdf->Output('المستخدمين'.' '.Carbon::now()->format('Y-M-D').'.pdf', 'D');

    }

}
