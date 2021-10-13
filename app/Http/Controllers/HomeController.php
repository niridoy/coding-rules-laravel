<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function download()
    {
//         $utf8text = (string)view('download');
//         $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
//         $fontname = TCPDF_FONTS::addTTFfont('/tcpdf/fonts/Kalpurush.ttf', 'Kalpurush', '', 96);

// // use the font

//         PDF::SetFont($fontname, '', 14, '', false);
//         PDF::SetTitle('Hello World');
//         PDF::AddPage();
//         PDF::writeHTML($utf8text, true, 0, true, true);
//         PDF::Output('hello_world.pdf');


        $pdf = PDF::loadView('download', $data = []);
        $pdf->setFont('Kalpurush');
        // // return view('download');P
        return $pdf->download('invoice.pdf');
    }
}
