<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\JobCategory;
use App\Models\Skill;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class AccountController extends Controller {
    
    
    
    public function userStore(Request $request) {

        $userValidate = $request->validate([
            'user_name' => ['required'],
            'user_email' => ['required', 'email', 'unique:users,email'],
            'user_password' => ['required', 'confirmed', Password::min(8)],
            'prosesi' => ['required']   
        ]);

        
        $userData = [
            'name' => $userValidate['user_name'],
            'email' => $userValidate['user_email'],
            'password' => $userValidate['user_password'],
            'password' => bcrypt($userValidate['user_password']),
            'prosesi' => $userValidate['prosesi'],
        ];

        // Create the user with validated data
        $user = User::create($userData);

        $user->profile()->create([]);
        
        // Log the user in
        Auth::login($user);
        $request->session()->regenerate();
        
        // Redirect to home
        return redirect()->route('home')->with('success', 'Account created successfully.');   

    }
    public function companyStore(Request $request) {
        session(['active_tab' => 'company']);
        $userValidate = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)],
            'prosesi' => ['required']
        ]);

        $company = $request->validate([
            'logo' => ['required'],
            'company_name' => ['required'],
        ]);
  
        
        $userValidate['password'] = bcrypt($userValidate['password']);
        // Create the user with validated data
        $user = User::create($userValidate);
        

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('image/company/logo', 'public');
        } else {
            // Tangani kasus ketika file tidak ada
            return redirect()->back()->with(['error' => 'File logo tidak ditemukan.']);
        }


        $user->company()->create([
            'name' => $company['company_name'],
            'logo' => $logoPath
        ]);
        // Log the user in
        Auth::login($user);
        $request->session()->regenerate();
        
        // Redirect to home
        session()->forget('active_tab');
        return redirect()->route('home')->with('success', 'Account created successfully.');   
    }
    

    public function login(Request $request){
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
            
        ]);

        if(! Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Your Credential do Not Match'
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('home')->with('success', 'Login successfully.');   
    }



    public function logout(){
        Auth::logout();
        return redirect()->route('home')->with('success', 'Logout successfully.');   
    }





  
  
}
