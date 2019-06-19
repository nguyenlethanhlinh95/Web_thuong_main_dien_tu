<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all product
        $products = DB::table('products')
            ->orderby('created_at', 'desc')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // process request
        $formInput=$request->except('image');
        // validation
        $this->validate($request,[
            'pro_name'=>'required',
            'pro_code'=>'required',
            'pro_price'=>'required',
            'pro_info'=>'required',
            'spl_price'=>'required',
            'image'=>'image|mimes:png,jpg,jpeg|max:10000'
        ]);

        //get image
        $image=$request->image;
        if($image){
            // lay ten file
            $name = $image->getClientOriginalName(); // lay ten file
            $Hinh = str_random(4). "_" . $name;
            while(file_exists('uploads/images/products' . $Hinh)){
                $Hinh = str_random(4). "_" . $name;
            }
            // luu hinh
            $image->move('uploads/images/products',$Hinh);
            // luu ten database
            $formInput['image']=$Hinh;
        }


        //required input
        DB::beginTransaction();
        try{
            Product::create($formInput);
            DB::commit();
            return back()->with('succ', 'Thêm mới product thành công !');
        }catch (\Exception $exception){
            DB::rollback();
            \Log::error('Loi: ' . $exception->getMessage() .$exception->getLine() );
        }

        // return redirect()->route('admin.index');
        return redirect()->back();
        //var_dump($formInput);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // display product
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
