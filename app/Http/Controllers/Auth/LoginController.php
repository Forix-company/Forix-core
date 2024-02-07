<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;
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

    use AuthenticatesUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function login(Request $request)
    {
        $this->validateLogin($request);

        $user = User::where('email', $request->email)->first();

        if ($user && $user->blocked_permanently) {
            return redirect()->back()->with('error', 'Usuario bloqueado permanentemente. Por favor, contacta al administrador para obtener ayuda.');
        }

        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            if ($this->limiter()->tooManyAttempts($this->throttleKey($request), $this->maxAttempts())) {
                // Bloquear permanentemente al usuario
                if ($user) {
                    $user->blocked_permanently = true;
                    $user->save();
                }

                return $this->sendLockoutResponse($request, true);
            }

            $this->incrementLoginAttempts($request);
            return $this->sendLockoutResponse($request, false);
        }

        if (!$user || !password_verify($request->password, $user->password)) {
            $this->incrementLoginAttempts($request);

            if ($this->hasTooManyLoginAttempts($request)) {
                // Bloquear temporalmente al usuario
                if ($user) {
                    $user->blocked_temporarily = true;
                    $user->save();
                }

                return $this->sendLockoutResponse($request, false);
            }

            return redirect()->back()->with('error', 'Error en los datos de acceso');
        }

        if ($user->login_2fa_statu == 2) {
            return view("auth.2fa", compact('user'));
        }

        $this->clearLoginAttempts($request);
        Auth::login($user, request()->filled('remember'));

        return redirect()->intended($this->redirectPath())->with('success', 'Bienvenido ' . Auth::user()->name);
    }

    protected function login2FA(Request $request, User $user)
    {
        $request->validate([
            'code_verification' => 'required',
            'correo' => 'required|email'
        ]);

        if ((new Google2FA())->verifyKey($user->token_login, $request->code_verification)) {

            if ($request->correo === $user->email) {
                $request->session()->regenerate();
                Auth::login($user);
                return redirect()->intended($this->redirectPath())->with('success', 'Bienvenido ' . Auth::user()->name);
            } else {
                return redirect()->back()->with('error', 'El correo electrónico no coincide!');
            }
        }

        return redirect()->back()->with('error', 'Código de verificación incorrecto!');
    }

    protected function sendLockoutResponse(Request $request, $permanent = false)
    {
        if ($permanent) {
            return redirect()->back()->with('error', 'Usuario bloqueado permanentemente. Por favor, contacta al administrador para obtener ayuda.');
        }

        $seconds = $this->limiter()->availableIn($this->throttleKey($request));

        return redirect()->back()->with('error', 'Usuario bloqueado. Por favor, espere ' . $seconds . ' segundos antes de intentarlo nuevamente.');
    }

    function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login')->with('error', 'Ha sido desconectado del sistema !!');
    }
}
