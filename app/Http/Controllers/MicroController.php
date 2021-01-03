<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

// use Illuminate\Support\Facades\Http;

class MicroController extends Controller
{
    //
    public function microServe(Request $res){

        $client = new client();
       
         $res = $client->get('http://localhost:3000/home/api');

    
        
        $product = json_decode($res->getBody(),true); 
         return view('micro')->with('product',$product);

        
      

}
}