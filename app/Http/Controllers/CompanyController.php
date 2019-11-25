<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use View;
use Validator;
use Input;
use Session;
use Illuminate\Support\Facades\Redirect;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // get company
        $companies = Company::all();

        // show the view and pass the nerd to it
        return View::make('company.companyList')
            ->with('companies', $companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return View::make('company.create-company');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // validate
        
        $rules = array(
            'company_name'       => 'required',
            'company_address'      => 'required',
            
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) 
            {
            return Redirect::to('company/create')
                ->withErrors($validator);
                
            } 
            else
             {
            // store
            $company = new Company;
            $company->company_name       = Input::get('company_name');
            $company->company_address      = Input::get('company_address');
            $company->save();

            // redirect
            Session::flash('message', 'Successfully created company!');
            return Redirect::to('company');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $companies = Company::find($id);

        // show the view and pass the nerd to it
        return View::make('company.edit-company')
            ->with('companies', $companies);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
       
        // validate
        
        $rules = array(
            'company_name'       => 'required',
            'company_address'      => 'required',
            
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) 
            {
            return Redirect::to('company/'.$company->id.'/edit')
                ->withErrors($validator);
                
            } 
            else
             {
            // store
            $company =  Company::find($id);
            $company->company_name       = Input::get('company_name');
            $company->company_address      = Input::get('company_address');
            $company->save();
            Session::flash('message', 'Successfully updated nerd!');
            return Redirect::to('company');
             }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $company = Company::find($id);
        $company->delete();

         Session::flash('message', 'Successfully Deleted!');
            return Redirect::to('company');
    }
}
