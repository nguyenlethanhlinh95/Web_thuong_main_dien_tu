<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function shop()
    {
        $products = Product::all();
        return view('front/shop', compact('products'));
    }

    public function product_details($id)
    {
        $product = DB::table('products')->where('id',$id)->get();
        //var_dump($product);
        return view( 'front/product-details', ['product'=>$product]);
    }

    public function contact()
    {
        return view('front.contact-us');
    }


}
