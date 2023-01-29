<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
    //
    public function index()
    {
        return view('admin.post.post');
    }

    public function getPost(Request $request)
    {
        $data = Post::query()->orderBy('id','desc');

        return DataTables::of($data)
            ->addColumn('title', function ($data) {
                return $data->title??'';
            })
            ->addColumn('image', function ($data) {
//                $url = asset('assets/images/posts/' . $data->images);


                return '<img src="' . $data->Images() . '" border="0" width="100" height="100" class="img-rounded" align="center" />';

            })
            ->addColumn('url', function ($data) {
                return $data->url??'';

            })
            ->addColumn('action', function ($data) {


                $button = '<a   id="' . $data->id . '" url="'.$data->url.'"title_ar="' . $data->getTranslation('title', 'ar') . '" title_he="' . $data->getTranslation('title', 'he') . '"  image="'.$data->Images().'"  class="edit_post"><span><i style="color: #66afe9" class="fas fa-edit"></i></span></a>';
                $button .= '&nbsp;&nbsp;&nbsp;&nbsp;';
                $button .= '<a  id="' . $data->id . '" title="' . $data->title . '" class="delete "><span><i  style="color: red" class="fas fa-trash-alt"></i></span></button>';
                $button .= '&nbsp;&nbsp;&nbsp;&nbsp;';

                return $button;

            })->rawColumns(['action','image'])
            ->make(true);
    }

    public function store(Request $request){
        try {
            if (isset($request->post_id)){
                $post =  Post::find($request->post_id);
                if (!is_null($request->file('avatar'))){
                    $image = uploadImage('posts', $request->file('avatar'));
                }else{
                    $image=$post->images;
                }
                $post->title = ['ar' => $request->title_ar, 'he' => $request->title_he];
                $post->url=$request->url;
                $post->images=$image;
                $post->save();
            }else{
                $image = uploadImage('posts', $request->file('avatar'));

                $post = new Post();
                $post->title = ['ar' => $request->title_ar, 'he' => $request->title_he];
                $post->url=$request->url;
                $post->images=$image;
                $post->save();
            }


            return response()->json(["status" => 201, 'message' => 'تم تنفيد   بنجاح', 'redirect_url' => route('admin.posts.index')]);

        } catch (\Exception $ex) {
            return response()->json(["status" => 422, 'message' => 'لم يتم عملية التنفيد   بنجاح']);
        }


    }




    public function delete(Request $request){
        try {
            $post =  Post::find($request->id)->delete();
            return response()->json(["status" => 201, 'message' => 'تم الحذف   بنجاح', 'redirect_url' => route('admin.posts.index')]);

        } catch (\Exception $ex) {

            return response()->json(["status" => 422, 'message' => 'هناك مشكلة ما يرجى المحاولة لاحقا']);
        }


    }

}
