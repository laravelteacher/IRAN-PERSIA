<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\Contact;

class RegistrationController extends Controller
{
    //
    public function createForm(Request $request) {
        return view('register');
    }

    // Store Contact Form data
    public function RegisterForm(Request $request) {

        // Form validation
        

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'age' => 'required',
            'qualification' => 'required',
            'address' => 'required',
        ]);
       

        
        if ($validator->fails()) {
            return redirect('register')
                     ->withErrors($validator)
                     ->withInput();
          }
        

        $user = Contact::create(array_merge(
                    $validator->validated()
                ));
        
        //
        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }
}
