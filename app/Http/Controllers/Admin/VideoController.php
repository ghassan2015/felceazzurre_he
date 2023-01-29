<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function edit(){
        $data['video']=Video::first();
        return view('admin.video.edit',$data);
    }
    public function update(Request $request){


        $video=Video::find(1);
        if ($request->file('image')){

            $image = uploadImage('videos', $request->file('image'));
        }else{
            $image=$video->image;
        }

        if ($request->file('video')){
            $video_url = uploadImage('videos', $request->file('video'));

        }else{
            $video_url=$video->video;
        }

        $video->title=['ar'=>$request->name_ar,'he'=>$request->name_he];
        $video->image=$image;
        $video->video=$video_url;
        $video->save();
        toastr()->success(' تم تنفيذ العملية بنجاح', 'نجاح العملية');
        return redirect()->back();
    }
}
