<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Utility;
use App\Models\Plan;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */

    public function __construct()
    {
        if(!file_exists(storage_path() . "/installed"))
        {
            header('location:install');
            die;
        }
    }

    /*protected function authenticated(Request $request, $user)
    {
        if($user->delete_status == 1)
        {
            auth()->logout();
        }

        return redirect('/check');
    }*/

    public function store(LoginRequest $request)
    {  
        if(env('RECAPTCHA_MODULE') == 'yes')
        {
            $validation['g-recaptcha-response'] = 'required|captcha';
        }else{
            $validation = [];
        }
        $this->validate($request, $validation);
        
        $request->authenticate();

        $user =\Auth::user();
        // if($user->type == 'company')
        // {
        //     $plan = plan::find($user->plan);
        //     if($plan)
        //     {
        //         if($plan->duration != 'unlimited')
        //         {
        //             $datetime1 = new \DateTime($user->plan_expire_date);
        //             $datetime2 = new \DateTime(date('Y-m-d'));
        //             $interval = $datetime2->diff($datetime1);
        //             $days =$interval->format('%r%a');
        //             // dd($days, $user->assignplan(1));

        //             if(!empty($datetime1) && $datetime1 < $datetime2)
        //             {
        //                 $user->assignplan(1);
                        
        //                 return redirect()->intended(RouteServiceProvider::HOME)->with('error',__('Yore plan is expired'));
        //             }

                    
        //             // if($days < 0)
        //             // {
        //             //     $user->assignplan(1);
                        
        //             //     return redirect()->intended(RouteServiceProvider::HOME)->with('error',__('Yore plan is expired'));
        //             // }
        //         }
        //     }
        // }

        $request->session()->regenerate();
        $user = Auth::user();
        if($user->is_delete == 1)
        {
            Auth::logout();
            return redirect('/login')->with('error', __('You are account is deactivate. please contact admin.'));            
        }
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function showLoginForm($lang = '')
    {
        if ($lang == '') {
            $settings = Utility::settings();
            $lang = $settings['default_language'];
        }

        \App::setLocale($lang);

        return view('auth.login', compact('lang'));
    }

    public function showLinkRequestForm($lang = '')
    {
        if ($lang == '') {
            $settings = Utility::settings();
            $lang = $settings['default_user_language'];
        }
        
        \App::setLocale($lang);
        
        return view('auth.passwords.forgot-password', compact('lang'));
        // return view('auth.forgot-password', compact('`lang'));
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {   
       
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
