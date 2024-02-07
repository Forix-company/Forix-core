<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/a', function () {

    $firstModule = collect(Module::allEnabled())->first();
    if ($firstModule) {
        switch ($firstModule->getName()) {
            case 'Base':
                return redirect('login');
                break;
            case 'IPTVStreaming':
                return redirect('iptv');
                break;
        }
    } else {
        return view('default.index');
    }

});

App::setLocale('es');

Auth::routes(['verify' => true]);

Route::post('/login-two-factor/{user}', [LoginController::class, 'login2FA'])->name('login.2fa');

Route::get('logout', [LoginController::class, 'logout'])->name('logout.user');
