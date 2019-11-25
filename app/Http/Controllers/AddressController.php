<?php

namespace App\Http\Controllers;

use App\Address;
use View;
use Validator;
use Input;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // get address
        $Adresses = Address::all();

        // show the view and pass the nerd to it
        return View::make('address.addressList')
            ->with('Adresses', $Adresses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('address.create-new-address');
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
            
            'address'      => 'required',
            
        );
        $validator = Validator::make(Input::all(), $rules);

       
        if ($validator->fails()) 
            {
            return Redirect::to('address/create')
                ->withErrors($validator);
                
            } 
            else
             {
            // store
            $address = new Address;
           
            $address->address      = Input::get('address');
            $address->save();

            // redirect
            Session::flash('message', 'Successfully created !');
            return Redirect::to('address');
             }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $address = Address::find($id);

        // show the view and pass the nerd to it
        return View::make('address.edit-address')
            ->with('address', $address);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
          
        $rules = array(
            
            'address'      => 'required',
            
        );
        $validator = Validator::make(Input::all(), $rules);

       
        if ($validator->fails()) 
            {
            return Redirect::to('address/create')
                ->withErrors($validator);
                
            } 
            else
             {
            // store
            $address =  Address::find($id);
           
            $address->address      = Input::get('address');
            $address->save();

            // redirect
            Session::flash('message', 'Successfully created !');
            return Redirect::to('address');
             }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        //
        $address = Address::find($id);
        $address->delete();

         Session::flash('message', 'Successfully Deleted!');
            return Redirect::to('address');
    }
}
