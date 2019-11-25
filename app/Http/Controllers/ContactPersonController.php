<?php

namespace App\Http\Controllers;

use App\ContactPerson;
use App\Company;
use App\Address;
use Illuminate\Http\Request;
use View;
use Validator;
use Input;
use Session;
use Illuminate\Support\Facades\Redirect;
class ContactPersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get company
        $contactPersons = ContactPerson::all();
       
        // show the view and pass the nerd to it
        return View::make('Contacts.ContactPersonsList')
            ->with('contactPersons', $contactPersons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies=  Company::all();
        $addresses=  Address::all();
       
       return View::make('Contacts.create-person')->with('companies', $companies)->with('addresses',$addresses);
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
            'first_name'       => 'required',
            'last_name'        => 'required',
            'company_id'        => 'required',
            'address_id'        => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) 
            {
            
            return Redirect::to('person/create')
                ->withErrors($validator);
                
            } 
            else
             {
            // store
            $companyId=Input::get('company_id');
            
            
            foreach ($companyId as &$value) {
            $person = new ContactPerson;
            $person->first_name           = Input::get('first_name');
            $person->last_name            = Input::get('last_name');
            $person->company_id            = $value;
            $person->address_id            = Input::get('address_id');
           
            $person->save();
            }
            // redirect
            Session::flash('message', 'Saved !');
            return Redirect::to('person');
             }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ContactPerson  $contactPerson
     * @return \Illuminate\Http\Response
     */
    public function show(ContactPerson $contactPerson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ContactPerson  $contactPerson
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $person = ContactPerson::find($id);
         $companies=  Company::all();
        $addresses=  Address::all();
        // show the view and pass the nerd to it
        return View::make('Contacts.edit-person')
            ->with('person', $person)->with('companies', $companies)->with('addresses',$addresses);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ContactPerson  $contactPerson
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
       // validate
      
        $rules = array(
            'first_name'       => 'required',
            'last_name'        => 'required',
            'company_id'        => 'required',
            'address_id'        => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) 
            {
            
            return Redirect::to('person/create')
                ->withErrors($validator);
                
            } 
            else
             {
            // store
            $person =  ContactPerson::find($id);
            $person->first_name           = Input::get('first_name');
            $person->last_name            = Input::get('last_name');
            $person->company_id            = Input::get('company_id');
            $person->address_id            = Input::get('address_id');
           
            $person->save();

            // redirect
            Session::flash('message', 'Saved !');
            return Redirect::to('person');
             }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ContactPerson  $contactPerson
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //
        $company = ContactPerson::find($id);
        $company->delete();

         Session::flash('message', 'Successfully Deleted!');
            return Redirect::to('person');
    }
}
