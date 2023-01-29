<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function index()
    {

        return view('admin.slider.index');
    }

    public function getSlider(Request $request)
    {
        $data = Slider::get();

        return DataTables::of($data)
            ->addColumn('title', function ($data) {
                return $data->title??'';
            })->addColumn('subtitle', function ($data) {
                return $data->sub_title??'';

            })->addColumn('image', function ($data) {
                $url = asset('assets/images/sliders/' . $data->image);


                return '<img src="' . $url . '" border="0" width="100" height="100" class="img-rounded" align="center" />';

            })
            ->addColumn('action', function ($data) {


                $button = '<a name="edit"  href="' . route('admin.slider.edit', $data->id) . '" class="edit_category"><span><i style="color: #66afe9" class="fas fa-edit"></i></span></a>';

                $button .= '&nbsp;&nbsp;&nbsp;&nbsp;';
                $button .= '<a name="delete" id="' . $data->id . '" title="' . $data->title . '" class="delete "><span><i  style="color: red" class="fas fa-trash-alt"></i></span></button>';
                $button .= '&nbsp;&nbsp;&nbsp;&nbsp;';

                return $button;

            })->rawColumns(['action', 'image', 'status'])
            ->make(true);
    }


    public function add()
    {
        return view('admin.slider.add');
    }

    public function store(Request $request)
    {




        try {

            $url =uploadImage('sliders',$request->file('image'));
            $slider=new Slider();
            $slider->title =['ar'=>$request->title_ar,'he'=>$request->title_he] ;
            $slider->sub_title = ['ar'=>$request->sub_title_ar,'he'=>$request->sub_title_he];
            $slider->image = $url;
            $slider->save();
            return response()->json(["status" => 201, "message" => 'تم اضافة السلايدر  بنجاح']);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => 'false',
                'errors' => $exception->getMessage(),
            ], 400);
        }
    }



    public function edit($id)
    {
        $slider = Slider::findorfail($id);
        return view('admin.slider.edit', ['slider' => $slider]);
    }

    public function update(Request $request)
    {
        try {

            $slider = Slider::find($request->id);

            if ($request->hasFile('image')) {

                $url =uploadImage('sliders',$request->file('image'));

            } else {
                $url = $slider->image;
            }
            $slider->title =['ar'=>$request->title_ar,'he'=>$request->title_he] ;
            $slider->sub_title = ['ar'=>$request->sub_title_ar,'he'=>$request->sub_title_he];
            $slider->image = $url;
            $slider->save();
            return response()->json(["status" => 201, "message" => 'تم تعديل  السلايدر  بنجاح']);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => 'false',
                'errors' => $exception->getMessage(),
            ], 400);
        }
    }


    public function delete(Request $request){
        try {
            Slider::find($request->slider_id)->delete();
            return response()->json(["status" => 201, "message" => 'تم حذف  السلايدر  بنجاح']);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => 'false',
                'errors' => $exception->getMessage(),
            ], 400);
        }
    }
}
