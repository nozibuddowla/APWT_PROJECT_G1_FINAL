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
    {   $allProducts=Products::all();
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
            'name' => 'required',
            'jobtitle' => 'required',
            'jlocation' => 'required',
            'salary' => 'required',
        ]);

        $product = new Products();
        $product->name         = $req->name;
        $product->jobtitle     = $req->jobtitle;
        $product->jlocation     = $req->jlocation; 
        $product->salary     = $req->salary;
        $product->save();
       
        $req->session()->flash('msg','Job added successfully.');
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
            'name' => 'required',
            'jobtitle' => 'required',
            'jlocation' => 'jlocation',
            'salary' => 'required'
        ]);

        $product = Products::find($id);
        $product->name         = $req->name;
        $product->jobtitle     = $req->jobtitle;
        $product->jlocation    = $req->jlocation;
        $product->salary       = $req->salary;
        $product->save();

        $req->session()->flash('msg','Job updated successfully.');
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
        $req->session()->flash('msg','Job deleted successfully.');
        $req->session()->flash('type','success');            
        return redirect()->route('products.employee.home');
    }
}
