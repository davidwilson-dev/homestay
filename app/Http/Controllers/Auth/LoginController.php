<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('auth')->only('logout');
    }

    /*protected function validateLogin(Request $request)
    {
        $request->validate([
            'account'    => 'required|string|min:3|max:50',
            'password' => 'required|string|min:8|max:50',
        ]);
    }

    protected function credentials(Request $request)
    {
        // Check user input email or username
        $account = $request->input('account');
        $field = filter_var($account, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        return [
            $field    => $account,
            'password'=> $request->input('password'),
            'status' => 'active'
        ];
    }*/

    public function login(Request $request)
    {
        $request->validate([
            'account'    => 'required|string|min:3|max:50',
            'password' => 'required|string|min:8|max:50',
        ]);

        // Check user input email or username
        $account = $request->input('account');
        $field = filter_var($account, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        // Throttle
        if (method_exists($this, 'hasTooManyLoginAttempts') && $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        // Get user by email/username
        $user = User::where($field, $account)->first();

        // If user not existed
        if (! $user) {
            if (method_exists($this, 'incrementLoginAttempts')) {
                $this->incrementLoginAttempts($request);
            }
            return back()->withErrors(['account' => 'Tài khoản không tồn tại'])->withInput();
        }

        // Password incorrect
        if (! Hash::check($request->password, $user->password)) {
            if (method_exists($this, 'incrementLoginAttempts')) {
                $this->incrementLoginAttempts($request);
            }
            return back()->withErrors(['password' => 'Sai mật khẩu'])->withInput();
        }

        // if user inactive
        if ($user->status !== 'active') {
            return back()->withErrors(['user_inactive' => 'Tài khoản đang bị khóa'])->withInput();
        }

        // Login successfully
        Auth::login($user, $request->filled('remember')); 
        $request->session()->regenerate();

        if (method_exists($this, 'clearLoginAttempts'))
        {
            $this->clearLoginAttempts($request);
        }

        return redirect()->intended($this->redirectPath());

    }


    protected function loggedOut(Request $request)
    {
        return redirect('/login');
    }
}
