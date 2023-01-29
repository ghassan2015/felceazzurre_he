<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class SettingController extends Controller
{

    public function index()
    {
        $settings = Setting::firstOrCreate();
        return view('admin.settings.index',compact('settings'));
    }

    public function update(Request $request)
    {
        \App\Models\Setting::query()->update([
            'website_name'=>['ar'=>$request->website_name_ar,'he'=>$request->website_name_he],
            'address'=>['ar'=>$request->address_ar,'he'=>$request->address_he],
            'website_bio'=>['ar'=>$request->website_bio_ar,'he'=>$request->website_bio_he],
            'contact_email'=>$request->contact_email,
            'main_color'=>$request->main_color,
            'hover_color'=>$request->hover_color,
            'phone'=>$request->phone,
            'phone2'=>$request->phone2,
            'whatsapp_phone'=>$request->whatsapp_phone,
            'facebook_link'=>$request->facebook_link,
            'twitter_link'=>$request->twitter_link,
            'instagram_link'=>$request->instagram_link,
            'youtube_link'=>$request->youtube_link,
            'telegram_link'=>$request->telegram_link,
            'whatsapp_link'=>$request->whatsapp_link,
            'tiktok_link'=>$request->tiktok_link,
            'nafezly_link'=>$request->nafezly_link,
            'linkedin_link'=>$request->linkedin_link,
            'github_link'=>$request->github_link,
            'another_link1'=>$request->another_link1,
            'another_link2'=>$request->another_link2,
            'another_link3'=>$request->another_link3,
            'privacy_page'=>$request->privacy_page,
            'terms_page'=>$request->terms_page,
            'about_page'=>$request->about_page,
            'contact_page'=>$request->contact_page,
            'header_code'=>$request->header_code,
            'footer_code'=>$request->footer_code,
            'robots_txt'=>$request->robots_txt,
        ]);

        if($request->hasFile('website_logo')){
            $file=uploadImage('settings',$request->file('website_logo'));
            \App\Models\Setting::query()->update(['website_logo'=>$file]);
        }
        if($request->hasFile('website_wide_logo')){
            $file =uploadImage('settings',$request->file('website_wide_logo'));
            \App\Models\Setting::query()->update(['website_wide_logo'=>$file]);
        }
        if($request->hasFile('website_icon')){
            $file =uploadImage('settings',$request->file('website_icon'));
            \App\Models\Setting::query()->update(['website_icon'=>$file]);
        }


        if($request->hasFile('website_cover')){
            $file =uploadImage('settings',$request->file('website_cover'));
            \App\Models\Setting::query()->update(['website_cover'=>$file]);
        }
        toastr()->success('تم تنفيذ العملية بنجاح', 'نجاح العملية');
        return redirect()->back();

    }

}
