<?php

namespace App\Http\Controllers\Admin\Story;

use App\Http\Controllers\Controller;
use App\Models\Constant;
use App\Models\Story;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class StroryController extends Controller
{
    public function index()
    {
        return view('admin.story.index');
    }

    public function getStory(Request $request)
    {
        $data = Story::query()->orderBy('id','desc');


        return DataTables::of($data)
            ->addColumn('title', function ($data) {
                return $data->title ?? '';
            })
            ->addColumn('name_category', function ($data) {
                return $data->story_constant_cd->name??'';


            })
            ->addColumn('images', function ($data) {

                $url = asset('assets/images/stories/' . $data->image);


                return '<img src="' . $url . '" border="0" width="100" height="100" class="img-rounded" align="center" />';

            })
            ->addColumn('action', function ($data) {

                $button = '<a name="edit" href="' . route('admin.story.edit', $data->id) . '" . id="' . $data->id . '"><span><i style="color: #66afe9" class="fas fa-edit"></i></span></a>';
                $button .= '&nbsp;&nbsp;&nbsp;&nbsp;';

                return $button;
            })->rawColumns(['action', 'images', 'short_description'])
            ->make(true);
    }


    public function create()
    {
        $data['stories_cd'] = Constant::where('s_key', 'story_cd')->where('parent_id', '<>', 0)->get();

        return view('admin.story.add', $data);
    }

    public function store(Request $request)
    {
        $story_image = uploadImage('stories', $request->file('image'));
        try {
            $story = new Story();
            $story->title = ['ar' => $request->title_ar, 'he' => $request->title_he];
            $story->description = ['ar' => $request->description_ar, 'he' => $request->description_he];
            $story->story_cd = $request->story_cd;
            $story->image = $story_image;
            $story->save();
            return response()->json(["status" => 201, "message" => 'تم اضافة القصة بنجاح']);
        } catch (\Exception $exception) {

            return response()->json([
                'success' => 'false',
                'errors' => $exception->getMessage(),
            ], 400);


        }

    }

    public function edit($id)
    {
        $data['story'] = Story::find($id);
        $data['stories_cd'] = Constant::where('s_key', 'story_cd')->where('parent_id', '<>', 0)->get();

        return view('admin.story.edit', $data);

    }

    public function update(Request $request)
    {
        $story = Story::find($request->story_id);

        if ($request->file('image')) {
            $story_image = uploadImage('stories', $request->file('image'));


        } else {
            $story_image = $story->image;
        }

        try {
            $story->title = ['ar' => $request->title_ar, 'he' => $request->title_he];
            $story->description = ['ar' => $request->description_ar, 'he' => $request->description_he];
            $story->story_cd = $request->story_cd;
            $story->image = $story_image;
            $story->save();
            toastr()->success('تم تحديث القصة بنجاح','عملية ناجحة');
            return redirect()->route('admin.story.index');

        } catch (\Exception $exception) {
            toastr()->error('لم يتم تحديث القصة بنجاح','فشل العملية ');
            return redirect()->route('admin.story.index');
        }

    }
}
