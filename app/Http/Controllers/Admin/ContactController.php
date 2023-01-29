<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index(Request $request)
    {
        $contacts =  Contact::where(function($q)use($request){
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->q!=null)
                $q->where('name','LIKE','%'.$request->q.'%')->orWhere('phone','LIKE','%'.$request->q.'%')->orWhere('email','LIKE','%'.$request->q.'%')->orWhere('message','LIKE','%'.$request->q.'%');
        })->orderBy('id','DESC')->paginate();

        return view('admin.contacts.index',compact('contacts'));
    }

    public function store(Request $request)
    {
        //
    }


    public function show(Contact $contact)
    {
        return view('admin.contacts.show',compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        notify()->success('تم حذف طلب التواصل بنجاح','عملية ناجحة');
        return redirect()->route('admin.contacts.index');
    }
}
