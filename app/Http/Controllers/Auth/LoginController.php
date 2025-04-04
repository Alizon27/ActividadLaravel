<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | Este controlador maneja la autenticación de los usuarios y su redirección.
    | Usamos el trait "AuthenticatesUsers" para simplificar el inicio de sesión.
    |
    */

    use AuthenticatesUsers;

    /**
     * Dónde redirigir a los usuarios después de iniciar sesión.
     *
     * @var string
     */
    protected $redirectTo = '/superheroes'; // Aquí puedes poner la URL de redirección deseada.

    /**
     * Crea una nueva instancia de controlador de inicio de sesión.
     *
     * @return void
     */
    public function __construct()
    {
        // Se requiere que el usuario no esté autenticado para acceder al login.
        $this->middleware('guest')->except('logout');
    }

    /**
     * Mostrar el formulario de inicio de sesión.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Asegúrate de tener una vista login.blade.php en resources/views/auth/
    }

    /**
     * Manejar una solicitud de inicio de sesión.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    protected function authenticated(Request $request, $user)
    {
        // Esta es la redirección personalizada después de un login exitoso.
        return redirect()->intended($this->redirectTo);
    }

    /**
     * Valida las credenciales del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateLogin(Request $request)
    {
        return Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);
    }

    /**
     * Manejador de inicio de sesión en el caso de fallo.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        return redirect()->back()->withErrors([
            'email' => trans('auth.failed'),
        ]);
    }

    /**
     * Log out del usuario.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
