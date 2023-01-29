<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Category;
use App\Models\Constant;
use App\Models\Content;
use App\Models\Labrosan;
use App\Models\Post;
use App\Models\Product;
use App\Models\Saponello;
use App\Models\Slider;
use App\Models\Story;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Contact;


class FrontController extends Controller
{

    public function contact_post(Request $request)
    {
        $request->validate([
            'name'=>"required|min:3|max:190",
            'email'=>"nullable|email",
            "phone"=>"required|numeric",
            "message"=>"required|min:3|max:10000",
        ]);
        Contact::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'message'=>"قادم من : ".urldecode(url()->previous())."\n\nالرسالة : ".$request->message
        ]);
        notify()->success('تم استلام رسالتك بنجاح وسنتواصل معك في أقرب وقت');
        //\Session::flash('message', __("Your Message Has Been Send Successfully And We Will Contact You Soon !"));
        return redirect()->back();
    }



    public function storyPerfume(){
        $data['stories_cd'] = Constant::where('s_key','story_cd')->where('parent_id','<>',0)->get();
        $data['stories']=Story::get();
        return view('front.storyPrefume.index',$data);
    }

    public function index(){
        $data['sliders'] = Slider::get();
        $data['video']=Video::find(1);
        $data['content']=Content::find(1);

        $data['parent_category']=Category::whereNull('parent_id')->get();
        $data['posts']=Post::orderby('id', 'desc')->take(9)->get();
        return view('front.home',$data);
    }

    public function profumalatuavita(){
        $data['posts']=Post::get();
        return view('front.profumalatuavita.profumalatuavita',$data);

    }

    public function agent(){
        $data['agents']=Agent::get();
        return view('front.agent',$data);

    }

    public function category($slug){
        $data['category']=Category::where('slug','like','%'.$slug.'%')->first();

        if (!isset($data['category'])){
            return view('front.404');
        }
        $data['categories']=Category::where('parent_id',$data['category']->id)->get();

        return view('front.category.category',$data);
    }

    public function productByCategory($slug,$member){
        $data['category']=Category::where('slug','like','%'.$member.'%')->first();
        $data['categories']=Category::where('parent_id',$data['category']->id)->get();

          $data['child_category']=Category::where('parent_id',$data['category']->id)->get();
        foreach ($data['child_category'] as $child_category){

            $data['products'] = Product::where('category_id', $child_category->id)->get();
        }
        return  view('front.product.productbyCategory',$data);
    }

    public function show ($parent_category,$category,$slug){

        $data['product']=Product::where('slug', 'LIKE', '%'.$slug.'%')->with('category')->first();
        $data['product_next']=Product::where('id',$data['product']->id+1)->first()??null;
        $data['last_product']=Product::where('id',$data['product']->id-1)->first()??null;

        return  view('front.product.show',$data);

    }

    public function labrosan(){

        $data['labrosan']=Labrosan::first();
        return view('front.labrosan.labrosan',$data);
    }

    public function saponello(){
        $data['saponello']=Saponello::first();
        return view('front.saponello.saponello',$data);

    }

}

