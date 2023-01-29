<?php

namespace App\Http\Controllers\Admin\Agent;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class AgentController extends Controller
{
    public function index()
    {
        return view('admin.agent.agent');
    }

    public function getAgent(Request $request)
    {
        $data = Agent::query()->orderBy('id','desc');

        return DataTables::of($data)
            ->addColumn('name', function ($data) {
                return $data->name ?? '';
            })->addColumn('location', function ($data) {
                return $data->location ?? '';
            })->addColumn('mobile', function ($data) {
                return $data->mobile ?? '';
            })
            ->addColumn('action', function ($data) {


                $button = '<a   id="' . $data->id . '" name_ar="' . $data->getTranslation('name', 'ar') . '" name_he="' . $data->getTranslation('name', 'he') . '"  location_ar="' . $data->getTranslation('location', 'ar') . '"   location_he="' . $data->getTranslation('location', 'he') . '" mobile="' . $data->mobile . '" class="edit_agent"><span><i style="color: #66afe9" class="fas fa-edit"></i></span></a>';
                $button .= '&nbsp;&nbsp;&nbsp;&nbsp;';
                $button .= '<a  id="' . $data->id . '" title="'. $data->name . '"  class="delete "><span><i  style="color: red" class="fas fa-trash-alt"></i></span></button>';
                $button .= '&nbsp;&nbsp;&nbsp;&nbsp;';

                return $button;

            })->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {


        try {


            $agent = new Agent();
            $agent->name = ['ar' => $request->name_ar, 'he' => $request->name_he];
            $agent->location = ['ar' => $request->location_ar, 'he' => $request->location_he];
            $agent->mobile = $request->mobile;
            $agent->save();
            return response()->json(["status" => 201, "message" => 'تم اضافة وكيل جديد الوكيل بنجاح']);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => 'false',
                'errors' => $exception->getMessage(),
            ], 400);
        }
    }

    public function update(Request $request)
    {
        try {

            $agent = Agent::find($request->agent_id);
            $agent->name = ['ar' => $request->name_ar, 'he' => $request->name_he];
            $agent->location = ['ar' => $request->location_ar, 'he' => $request->location_he];
            $agent->mobile = $request->mobile;
            $agent->save();
            return response()->json(["status" => 201, "message" => 'تم تعديل الوكيل بنجاح']);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => 'false',
                'errors' => $exception->getMessage(),
            ], 400);
        }

    }

    public function delete(Request $request)
    {

        try {
            Agent::find($request->agent_id)->delete();
            return response()->json(["status" => 201, "message" => 'تم حذف الوكيل  بنجاح']);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => 'false',
                'errors' => $exception->getMessage(),
            ], 400);
        }
    }
}
