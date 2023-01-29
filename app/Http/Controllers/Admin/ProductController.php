<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class ProductController extends Controller
{
    public function index()
    {
//        $products=Product::get();
        $categories =Category::where('parent_id','<>',null)->get();
        return view('admin.products.index')->with(['categories'=>$categories]);
    }

    public function getProduct(Request $request)
    {
        $data = Product::query()->orderBy('id','desc');

        if ($request->input('category_id')) {
            $data = $data->whereHas("category",function ($q)use ($request){

                $q->whereHas('parent',function ($qq)use($request){
                    $qq->where('id',$request->input('category_id'));
                });
            });
        }
        if ($request->input('name')) {
            $data = $data->where('name', 'LIKE', '%' . $request->input('name') . '%');
        }

        return DataTables::of($data)
            ->addColumn('name', function ($data) {
                return $data->name??'';
            })->addColumn('smell_product', function ($data) {
                return $data->smell_product??'';


            })
            ->addColumn('name_category', function ($data) {
                return $data->category->parent->title;


            })

            ->addColumn('images', function ($data) {

                $url = asset('assets/images/products/' . $data->product_image);


                return '<img src="' . $url . '" border="0" width="100" height="100" class="img-rounded" align="center" />';

            })
            ->addColumn('action', function ($data) {

                $button = '<a name="edit" href="' . route('admin.product.edit', $data->id) . '" . id="' . $data->id . '"><span><i style="color: #66afe9" class="fas fa-edit"></i></span></a>';
                $button .= '&nbsp;&nbsp;&nbsp;&nbsp;';
                $button .= '<a name="delete" id="' . $data->id . '" title="' . $data->name . '" class="delete "><span><i  style="color: red" class="fas fa-trash-alt"></i></span></button>';
                $button .= '&nbsp;&nbsp;&nbsp;&nbsp;';
                ;
                return $button;

            })->rawColumns(['action', 'images','short_description'])
            ->make(true);
    }

    public function create()
    {
        $data['categories'] =Category::where('parent_id',null)->get();
        return view('admin.products.add', $data);
    }


    public function getCategory(Request $request){
        $categories=Category::where('parent_id',$request->id)->get();
        return $categories;
    }
    public function show($slug){
        $data['product']=Product::where('slug', 'LIKE', '%'.$slug.'%')->with('category')->first();
        $data['product_next']=Product::where('id',$data['product']->id+1)->first()??null;
        $data['last_product']=Product::where('id',$data['product']->id-1)->first()??null;

        return  view('front.product.show',$data);

    }

    public function store(Request $request)
    {



        $product_image = uploadImage('products', $request->file('image'));
        $formula_image = uploadImage('products', $request->file('formula_image'));
        $fragrance_image = uploadImage('products', $request->file('fragrance_image'));
        try{
            $product=new Product();
            $product->name=['ar'=>$request->title_ar,'he'=>$request->title_he];
            $product->slug=['ar'=>$this->slug($request->title_ar),'he'=>$this->slug($request->title_he)];

            $product->smell_product=['ar'=>$request->smell_product_ar,'he'=>$request->smell_product_he];
            $product->fragrance=['ar'=>$request->description_ar,'he'=>$request->description_he];
            $product->formula=['ar'=>$request->formula_ar,'he'=>$request->formula_he];
            $product->size=['ar'=>$request->size_ar,'he'=>$request->size_he];
            $product->category_id=$request->child_category_id??$request->category_id;
            $product->status_cd=2;
            $product->product_image=$product_image;
            $product->formula_image=$formula_image;
            $product->fragrance_image=$fragrance_image;
            $product->meta_description=['ar'=>$request->meta_description_ar,'he'=>$request->meta_description_he];
            $product->save();

            return response()->json(["status" => 201, "message" => 'تم اضافة المنتج بنجاح']);

        } catch (\Exception $exception) {
            return response()->json([
                'success' => 'false',
                'errors' => $exception->getMessage(),
            ], 400);
        }


    }

    public function edit($id)
    {
        $data['product'] = Product::findorfail($id);
        $data['categories'] =Category::where('parent_id',null)->get();
        return view('admin.products.edit', $data);

    }

    public function update(Request $request)
    {

        try{
            $product=Product::find($request->product_id);
            if ($request->file('image')){

                $product_image = uploadImage('products', $request->file('image'));
            }else{
                $product_image=$product->product_image;
            }

            if ($request->file('formula_image')){
                $formula_image = uploadImage('products', $request->file('formula_image'));

            }else{
                $formula_image=$product->formula_image;
            }
            if ($request->file('fragrance_image')){
                $fragrance_image = uploadImage('products', $request->file('fragrance_image'));
            }else{
                $fragrance_image=$product->fragrance_image;
            }

            $product->name=['ar'=>$request->title_ar,'he'=>$request->title_he];
            $product->slug=['ar'=>$this->slug($request->title_ar),'he'=>$this->slug($request->title_he)];

            $product->smell_product=['ar'=>$request->smell_product_ar,'he'=>$request->smell_product_he];
            $product->fragrance=['ar'=>$request->description_ar,'he'=>$request->description_he];
            $product->formula=['ar'=>$request->formula_ar,'he'=>$request->formula_he];
            $product->size=['ar'=>$request->size_ar,'he'=>$request->size_he];
            $product->category_id=$request->child_category_id??$request->category_id;
            $product->status_cd=2;
            $product->product_image=$product_image;
            $product->formula_image=$formula_image;
            $product->fragrance_image=$fragrance_image;
            $product->meta_description=['ar'=>$request->meta_description_ar,'he'=>$request->meta_description_he];
            $product->save();

            return response()->json(["status" => 201, "message" => 'تم تعديل المنتج بنجاح']);
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


            $product=Product::where('id','=',$request->product_id)->first();
            $product->delete();
            return response()->json(["status" => 201, "message" => 'تم حذف المنتج  بنجاح']);
        } catch (\Exception $exception) {
            return response()->json([
                'success' => 'false',
                'errors' => $exception->getMessage(),
            ], 400);
        }
    }


    public function upload(Request $request)
    {
        $fileName = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads', $fileName, 'public');
        return response()->json(['location' => "/storage/$path"]);


    }
    public function slug($string, $separator = '-')
    {
        if (is_null($string)) {
            return "";
        }

        $string = trim($string);

        $string = mb_strtolower($string, "UTF-8");;

        $string = preg_replace("/[^a-z0-9_\sءاأإآؤئبتثجحخدذرزسشصضطظعغفقكلمنهويةى]#u/", "", $string);

        $string = preg_replace("/[\s-]+/", " ", $string);

        $string = preg_replace("/[\s_]/", $separator, $string);

        return $string;
    }

}
