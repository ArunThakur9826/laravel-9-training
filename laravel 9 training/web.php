<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
use App\Http\controllers\BasicController;

// use App\http\controllers\SingleActionController;

use App\Http\Controllers\SimpleFormController;
use App\Http\Controllers\LinkedinController;
use App\Rules\ReCaptcha;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostsController;

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

/*------------ 1st laravel Route --------------*/
    Route::get('/', function () {
        return view('welcome');
    });






/*------------ basic laravel Route --------------*/

    Route::get('/basic/{name?}', function ($name = null) {

        $html = "<h3>this is html</h3>";
          $data = compact('name', 'html');
        return view('basic')->with($data);
    });




/*------------ basic laravel @yeild, @include, @section, @extends @stack, @push statement  Route --------------*/

    /*Route::get('/main', function(){
       return view('myhome');
    });


    Route::get('/about', function(){
        return view ('myabout');
    }); */

        Route::get ('/myhome',[BasicController::class, 'myhome']);
        Route::get ('/myabout', [BasicController::class, 'myabout']);

       //singleactioncontroller
        // Route::get ('/shome', SingleActionController::class);





      // form validation  and crud operation routes 

        Route::get('/simpleform', [SimpleFormController::class, 'index']);
        Route::post('/simpleform', [SimpleFormController::class, 'register']);
        Route::delete('/simpleform/{student_id}', [SimpleFormController::class, 'destroy']);
        Route::get('/simpleform/{student_id}', [SimpleFormController::class, 'edit'])->name('simpleform');
        Route::post('/simpleform/{student_id}', [SimpleFormController::class, 'update'])->name('simpleform');




          







/*------------ 2nd signup login routes --------------*/
        Auth::routes();
        Route::get('/home', [HomeController::class, 'index'])->name('home');




/*------------ 3rd Google URL Route --------------*/

    Route::prefix('google')->name('google.')->group( function(){
        Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
        Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
    });




/*------------ 3rd linkedin URL Route --------------*/

Route::get('auth/linkedin', [LinkedinController::class, 'linkedinRedirect']);
Route::get('auth/linkedin/callback', [LinkedinController::class, 'linkedinCallback']);





/*------------ 2fa middleware URL Route --------------*/

// 2fa middleware
Auth::routes();
// 2fa middleware
Route::middleware(['2fa'])->group(function () {

    // HomeController
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::post('/2fa', function () {
        return redirect(route('home'));
    })->name('2fa');

});

Route::get('/complete-registration', [RegisterController::class, 'completeRegistration'])->name('complete.registration');


/*------------ 2fa middleware URL Route --------------*/


Route::get('/postlisting', [PostsController::class, 'index'])->name('post');

Route::get('/postlisting/az', [PostsController::class, 'ajaxindex'])->name('post');