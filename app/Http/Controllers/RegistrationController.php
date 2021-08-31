<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator; // this part show errors of input. i mean when have empty input Validator work to show that to User
use App\Models\Contact;
use Carbon\Carbon; // i add it part to calculate automatic age; this part work from Laravel App

class RegistrationController extends Controller
{
    // show the blade of register Form 
    public function createForm(Request $request) {

        return view('register');
    }

    // Store Contact Form data
    public function RegisterForm(Request $request) {
        // this is validator before store to start.. datas check  and if email already to use give error
       $messages = Contact::where('email' , $request->post('email'))->first();
       // if email didnt to use store datas
        if(!$messages){ 
         $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'dob' => 'required',
            'qualification' => 'required',
            'address' => 'required',
        ]);
       if ($validator->fails()) {
            return redirect('register')
                     ->withErrors($validator)
                     ->withInput();
          }
        // this part convert year to age
        $dateOfBirth = $request->post('dob');
        $years = Carbon::parse($dateOfBirth)->age;
       
                $student = new Contact([
                    'name' => $request->post('name'),
                    'email'=> $request->post('email'),
                    'dob' => $request->post('dob'),
                    'age'=> $years,  // if Converted the Year come here to store 
                    'qualification' => $request->post('qualification'),
                ]);
                $student->save();
        
        //
        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }// if email alredy to use error
    else{
        return back()->with('error', 'email already to use');
    }
}
    
}
