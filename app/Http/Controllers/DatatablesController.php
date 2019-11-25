<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Datatables;
use App\Company;
use DB;
class DatatablesController extends Controller
{
    public function index()
    {
      
        return view('company.companyListUsingDataTable');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyCompanyData()
    {
        

      
      $company = DB::table('companies')
                ->join('contact_person', 'contact_person.company_id', '=', 'companies.id')
                ->join('addresses', 'addresses.address_id', '=', 'contact_person.address_id')
                ->select('company_name', 'company_address', 'first_name', 'address')
                ->get();

        return Datatables::of($company)->make(true);
    }
}
