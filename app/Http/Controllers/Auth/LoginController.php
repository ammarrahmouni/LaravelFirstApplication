<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;


    /**
     * Where to redirect users after login.
     *
     * @var string
     */



    protected $redirectTo = "";

    protected function changeRedirectTo($local){
        if($local == 'ar'){
           $this->redirectTo = 'ar/home';
        }
        else if($local == 'en'){
           $this->redirectTo = 'en/home';
        }
        else if($local == 'tr'){
            $this->redirectTo = 'tr/home';
         }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->changeRedirectTo(app()->getLocale());
    }

    public function showLoginForm()
    {
        return view('login.new_login');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect('/' . app()->getLocale() . '/login');
    }

    protected function authenticated(Request $request, $user)
    {
        if($request->has('remember')){
            Cookie::queue('user', $request->email, 1440);
            Cookie::queue('password', $request->password, 1440);
           
        }

        return redirect()->intended($this->redirectPath())->with('success_login', __('home.success_login'));


    }


}
