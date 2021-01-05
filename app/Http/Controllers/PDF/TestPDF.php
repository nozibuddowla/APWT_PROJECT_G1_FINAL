<?php

namespace App\Http\Controllers\PDF;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Products; 

class TestPDF extends Controller
{
    //
    public function generate(){
        $ptag = session('profile.login');
        $footer = session('profile.name');
        $data=Products::where('tag',$ptag)->get();
        $fileName = 'report.pdf';
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 15,
            'margin_bottom' => 20,
            'margin_header' => 10,
            'margin_footer' => 10,
        ]);

        $html = \View::make('pdf.demo')->with('data',$data);
        $html = $html->render();
        $mpdf -> SetHeader ('Invoice');
        $mpdf -> SetFooter ($footer);

         // $stylesheet = file_get_contents(url('/css/mpdf.css'));
        //  $mpdf - WriteHTML($stylesheet,1);

        $mpdf -> WriteHTML($html);
        $mpdf ->Output($fileName,'I');
        // return view('pdf.demo',compact('data'));
    }
}
