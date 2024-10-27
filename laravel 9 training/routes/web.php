<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleController;
// use App\Http\controllers\BasicController;

// use App\http\controllers\SingleActionController;

use App\Http\Controllers\SimpleFormController;
use App\Http\Controllers\LinkedinController;
use App\Rules\ReCaptcha;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\RawController;
use App\Http\Controllers\RelationController;

use App\Http\Controllers\DeploymentController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserViewController;
use App\Http\Controllers\ProcedureController;


use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\CookieController;
use App\Http\Controllers\MailChimpController;




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
    Route::get('/check', function () {
        return view('welcome');
    });





/*------------ basic laravel Route --------------*/

    Route::get('/basic/{name?}', function ($name = null) {

        $html = "<h3>this is html</h3>";
          $data = compact('name', 'html');
        return view('basic')->with($data);
    });




/*------------ basic laravel @yeild, @include, @section, @extends @stack, @push statement  Route --------------*/

    Route::view('/myhome', 'myhome');
  


    Route::view('/myabout', 'myabout'); 

        // Route::get ('/myhome',[BasicController::class, 'myhome']);
        // Route::get ('/myabout', [BasicController::class, 'myabout']);

       //singleactioncontroller
        // Route::get ('/shome', SingleActionController::class);



        // Auth::routes();
        // Route::get('/home', [HomeController::class, 'index'])->name('home');


      // form validation  and crud operation routes 

        Route::get('/simpleform', [SimpleFormController::class, 'index'])->name('simple-form');
        Route::post('/simpleform', [SimpleFormController::class, 'register']);
        Route::delete('/simpleform/{student_id}', [SimpleFormController::class, 'destroy']);
        Route::get('/simpleform/{student_id}', [SimpleFormController::class, 'edit'])->where('student_id', '[0-9]')->name('simpleform');
        Route::get('/simpleform/{student_id}', [SimpleFormController::class, 'edit'])->name('simpleform');
        Route::post('/simpleform/{student_id}', [SimpleFormController::class, 'update'])->name('simpleform');

     



        

/*------------ 2nd signup login routes --------------*/



/*------------ 2nd Admin Panel  --------------*/
  

        Route::group(['middleware' => ['auth']], function() {
            Route::resource('roles', RoleController::class);
            Route::resource('users', UserController::class);
         
            Route::resource('products', ProductController::class);
        });

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
// Auth::routes();
// 2fa middleware
// Route::middleware(['2fa'])->group(function () {

    // Route::post('/2fa', function () {
    //     return redirect(route('home'));
    // })->name('2fa');

// });

// Route::get('/complete-registration', [RegisterController::class, 'completeRegistration'])->name('complete.registration');


/*------------ sorting  URL Route --------------*/


Route::get('/postlisting', [PostsController::class, 'index'])->name('post');
Route::get('/postlisting/az', [PostsController::class, 'ajaxindex']);








/*------------  raw operation route  --------------*/

    Route::get('raw/', [RawController::class, 'show'])->name('raw');
    Route::get('rawid/{student_id}', [RawController::class, 'particuler'])->name('rawid');
    Route::get('rawdsc', [RawController::class, 'des'])->name('rawdsc');
    Route::get('rawlimit', [RawController::class, 'limit'])->name('rawlimit');


    /*------------ eloquent  Relationships route  --------------*/

    Route::get('relation', [RelationController::class, 'index'])->name('relation');
    Route::get('relationdata', [RelationController::class, 'group'])->name('relationdata');



    Route::get('addproject', [DeploymentController::class, 'index'])->name('add_language');
    Route::get('addlanguage/{id}', [LanguageController::class, 'index'])->name('add_language');
    Route::get('showdeployement', [DeploymentController::class, 'index'])->name('showdeployement');


    Route::get('sqlview', [UserViewController::class, 'index'])->name('sqlview');



    Route::get('procedure',[ProcedureController::class, 'index'])->name('proceder');





        Route::get('api-data', function(){
            return view('api.index');
        });





   Route::match(['get', 'post'],'/match', [SimpleFormController::class, 'index']);
   Route::match(['post'],'/match', [SimpleFormController::class, 'register']);


// basic route //

   Route::redirect('/match', '/');
   Route::permanentRedirect('/match', '/', 301);
   Route::view('/wel', 'welcome', ['name' => 'Taylor']);

    Route::get('/filter/{id}/{name}', function ($id, $name) {
       echo "id is only numaric = ". $id ." <br>name is only alpha = ".$name;
    })->whereNumber('id')->whereAlpha('name');


    Route::controller(SimpleFormController::class)->group(function () {
        Route::get('/cntrlgroup', 'index');
        Route::post('/cntrlgroup', 'register');
    });


    Route::prefix('prifix')->group(function () {
        Route::get('/test', function () {
            echo "just example for prifix";
        });
    });

 
    use App\Models\User;
    Route::get('binding/{key}', function (User $key){        
       return $key;
    });


    use App\Models\Member;
    Route::get('/trash/{user}', function (Member $user) {
        return $user;
    })->withTrashed();
      
      Route::get('/slugb/{post:email}', function (Member $post) {
        return $post;
    });


    Route::get('/users/{user}/posts/{post:slug}', function (User $user, Post $post) {
        return $post;
    });
 
     Route::fallback(function () {
        echo "<center><h2>No Url Found 404</h2></center>";
     });


     //limit route 

     Route::get('/limit', function(){
       return "<center><h2>Only Request Limit 5 time</h2></center>";
     })->middleware('throttle:custom-limit');

 

    Route::middleware('throttle:custom_limit')->group(function(){
      //all route in this code 
    });


    Route::get('/asset-raoute',[App\Http\Controllers\TestController::class, 'getUserData']);

    Route::view('twig', 'twig.welcome');




      // admin panel custom
    



    // Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    //     Route::get('/dashboard', function(){
    //         return view('admin.welcome');
    //     })->name('admin.welcome');

    //     Route::get('/users', [DashboardController::class, 'index'])->name('admin.users');
    // });
   
    Auth::routes();
        Route::get('/home', [HomeController::class, 'index'])->name('home');
        Route::post('/user/logout', [App\Http\Controllers\Auth\LoginController::class, 'userLogout'])->name('user.logout');


    Route::group(['prefix' => 'admin'], function(){
        Route::group(['middleware' => 'admin.guest'], function(){
          Route::view('/login', 'admin.login')->name('admin.login');
          Route::post('/login', [AdminController::class, 'authenticate'])->name('admin.auth');
        });

        Route::group(['middleware' => 'admin.auth'], function(){

            Route::view('/dashboard', 'admin.welcome')->name('admin.welcome');
            Route::get('/users', [DashboardController::class, 'dashboard'])->name('admin.users');
            Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
            Route::get('/search', [DashboardController::class, 'search'])->name('admin.search');
            Route::get('/edit/{student_id}', [DashboardController::class, 'edit'])->name('admin.edit');
            Route::post('/update/{student_id}', [DashboardController::class, 'update'])->name('admin.update');
            Route::delete('/delete/{student_id}', [DashboardController::class, 'destroy'])->name('admin.destroy');
            Route::post('/store', [DashboardController::class, 'store'])->name('admin.store');
            Route::get('/ajaxlisting', [DashboardController::class, 'ajaxlisting'])->name('admin.ajaxlisting');

            Route::get('/students', [DashboardController::class, 'StudentIndex'])->name('admin.StudentIndex');
            Route::any('/getOption', [DashboardController::class, 'getOption'])->name('admin.getOption');
            Route::any('getOptiondata', [DashboardController::class, 'getOptiondata'])->name('admin.getOptiondata');
       });
    });



    //  news latter

    Route::get('newsletter', [NewsletterController::class, 'newslettr'])->name('newslettr');
    Route::post('newsletter/response', [NewsletterController::class, 'response'])->name('response');


 //  contact us send mail
     Route::get('emailview', [MailController::class, 'emailview'])->name('email');
    Route::post('send-mail', [MailController::class, 'index'])->name('emailresponse');



 //  using basic sesion
     Route::view('get-session','session.set-session');

      Route::get('set-session',function(Request $request){
         $email = $request->email;
         $password = $request->password;

         session()->put('email', $email);  
         session()->put('password', $password);  

         return view('session.view-session');
      });

      Route::get('destroy',function(){
         session()->flush(); 
         return redirect('get-session');
      })->name('destroy');


       //  using basic sesion
     Route::view('set-cookie','cookie.set-ccokie');
     Route::post('set-cookie', [CookieController::class, 'setcookie'])->name('setcookie');
     Route::get('get-cookie', [CookieController::class, 'getCookie'])->name('getcookie');







      //  using mailchimp sesion
    Route::get('/mailchimp',function(){
    return view('mailchimp.mailchimp');
    })->name('mail-chimp');
    Route::post('/mailchimp/az', [MailChimpController::class, 'index'])->name('mailchimp');



    Route::get('mlogin', function(){
      session()->put('user_id',1);
       print_r(session()->all());
      // return view('route-middleware.login');

    });

    Route::get('mlogout', function(){
      session()->forget('user_id');
      print_r(session()->all());
    });  

    Route::get('mhome', function(){
      return view('route-middleware.home');
    })->middleware('testing');
