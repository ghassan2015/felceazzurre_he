<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Role;
use App\Repository\roles\RoleRepository;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public $role;
    public function __construct(RoleRepository $role)
    {
        $this->role=$role;
    }
    public function index()
    {
        return $this->role->Index();
    }
    public function gerRole(Request $request){
        return $this->role->getAllModel($request);
    }


    public function create()
    {
        return $this->role->Create();

    }

    public function saveRole(RoleRequest $request)
    {

       return $this->role->Store($request);

    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('admin.roles.edit',compact('role'));
    }
    public function update(RoleRequest $request)
    {
      return  $this->role->Update($request);


    }

    public function updateStatus(Request $request){
        return $this->role->UpadteState($request);
    }
    public function delete(Request $request){

        return $this->role->Delete($request);
    }

}
