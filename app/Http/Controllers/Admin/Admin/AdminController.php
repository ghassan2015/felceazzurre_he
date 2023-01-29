<?php

namespace App\Http\Controllers\Admin\Admin;

//use App\Exports\AdminsExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\Role;
use App\Repository\admins\AdminRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\DataTables;

class AdminController extends Controller
{
    private $admin;
    public function __construct(AdminRepository $admin){

        $this->admin=$admin;
    }
    public function index(){

        return $this->admin->Index();
    }
    public function getAdmin(Request $request)
    {
        return $this->admin->getAllModel($request);

    }


    public function create(){

        return $this->admin->Create();
    }

    public function store(AdminRequest $request){
        return$this->admin->Store($request);

    }
    public function edit($id){
        return $this->admin->Edit($id);
    }

    public function update(AdminRequest $request){
        return $this->admin->Update($request);

    }

    public function updateStatus(Request $request){
        return $this->admin->UpadteState($request);
    }
    public function delete(Request $request){
        return $this->admin->Delete($request);
    }

}
