<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function employeeHome()
    {   $ptag = session('profile.username');
        $allProducts=Products::where('tag',$ptag)->get();
        return view('products.employeeHome')->with('allProducts',$allProducts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.productsCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'postTitle' => 'required',
            'roomName' => 'required',
            'roomPrice' => 'required',
            'roomType' => 'required',
        ]);

        $product = new Products();
        $product->postTitle         = $req->postTitle;
        $product->roomName     = $req->roomName;
        $product->roomPrice    = $req->roomPrice;
        $product->roomType       = $req->roomType;
        $product->description       = $req->description;
        $product->tag       = $req->tag;
        $product->save();
       
        $req->session()->flash('msg','Post added successfully.');
        $req->session()->flash('type','success');            
        return redirect()->route('products.employee.home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);
        return view('products.productsEdit', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $req->validate([
            'postTitle' => 'required',
            'roomName' => 'required',
            'roomPrice' => 'required',
            'roomType' => 'required',
        ]);

        $product = Products::find($id);
        $product->postTitle         = $req->postTitle;
        $product->roomName     = $req->roomName;
        $product->roomPrice    = $req->roomPrice;
        $product->roomType       = $req->roomType;
        $product->description       = $req->description;
        $product->save();

        $req->session()->flash('msg','Post updated successfully.');
        $req->session()->flash('type','success');            
        return redirect()->route('products.employee.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $req)
    {
        Products::find($id)->delete();
        $req->session()->flash('msg','Post deleted successfully.');
        $req->session()->flash('type','success');            
        return redirect()->route('products.employee.home');
    }

       /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products  $users
     * @return \Illuminate\Http\Response
     */
    public function search(Request $req)
    {   $ptag = session('profile.username');
        $key = $req->get('key');
        if($req->ajax()){
            $allProducts=Products::where('postTitle','like', '%'.$key.'%')->where('tag', $ptag)->get();

            echo json_encode($allProducts);    
        }
    }
}
