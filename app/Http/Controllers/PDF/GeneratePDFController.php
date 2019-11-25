<?php

namespace App\Http\Controllers\PDF;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use PDF;
use App\Company;
use App\ContactPerson;
class GeneratePDFController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function companyPDFview(Request $request)
    {
     

        if($request->has('download')){
        	$companies = Company::all();

        	// pass view file
            $pdf = PDF::loadView('Report.CompanyPDFReport',compact('companies'));
            // download pdf
            return $pdf->download('companyList.pdf');
        }
        return view('Report.PDFReport');
    }
       public function personsPDFview(Request $request)
    {
     

        if($request->has('download')){
        	$contactPersons= ContactPerson::all();

            $pdf = PDF::loadView('Report.personPDFReport',compact('contactPersons'));
            // download pdf
            return $pdf->download('ontactPersons.pdf');
        }
        return view('Report.PDFReport');
    }
}