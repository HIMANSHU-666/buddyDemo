<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use PDF;


class PDFController extends Controller
{

    public function generatePDF()
    {
        $users = User::where('id', session('user_id'))->first();

        $data = [
            'title' => "welcome to Bring your buddy",
            'date' => date('m/d/y'),
            'users' => $users,
        ];

        $pdf = 'PDF'::loadView('new_pdf',$data)->setOptions(['defaultFont' => 'sans-serif']);

        return $pdf->stream('StudentDocument.pdf');
    }

}