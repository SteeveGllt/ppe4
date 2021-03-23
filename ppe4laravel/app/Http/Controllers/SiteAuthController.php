<?php
  
namespace App\Http\Controllers;
   
use Illuminate\Http\Request;
  
class SiteAuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function siteRegister()
    {
        return view('siteRegister');
    }
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function siteRegisterPost(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|same:password_confirmation',
            'password_confirmation' => 'required',
            'g-recaptcha-response' => 'required|captcha',
        ]);
   
        print('done');
    }
}