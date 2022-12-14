<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArtistsController;
use App\Http\Controllers\SongsController;
use App\Http\Controllers\LikesController;
use App\Http\Controllers\PackageServiceController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RolePermissionController;
use Illuminate\Support\Facades\Artisan;
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

Route::get('optimize',function(){
    \Artisan::call('optimize:clear'); 
});

    // New landing pages route
    Route::get('/newpage1',[FrontController::class,'newpage1']);
    // New landing pages route end
    
Route::get('/', [FrontController::class, 'index']);
Route::post('/contact-us', [ContactController::class, 'store']);

Route::get('/set-password/{email}', [UserController::class, 'create_password']);
Route::post('/create-password', [UserController::class, 'set_password']);


Route::get('/verify-email', [FrontController::class, 'verifyEmail']);
Route::post('/start-over', [FrontController::class, 'startOver']);
Route::get('/continue', [FrontController::class, 'continue']);

Route::get('/verify_email/{id}', [App\Http\Controllers\EinServicesController::class, 'update']);

Route::get('/opt', function () {
    Artisan::call('optimize');
    Artisan::call('optimize:clear');
});

Route::group(['middleware' => 'auth'], function () {

    Route::view('/test-notif', 'notif');
    Route::post('/test-nnn', [RolePermissionController::class, 'testNotif']);
    Route::post('/save-device-user-token', [RolePermissionController::class, 'saveUseTokken']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

   

    //artists Controller
    Route::get('/artists', [artistsController::class, 'index']);
    Route::get('/add-artists', [artistsController::class, 'create']);
    Route::get('/edit-artists/{id}', [artistsController::class, 'edit']);
    Route::get('/delete-artists/{id}', [artistsController::class, 'destroy']);
    Route::post('/save-artists', [artistsController::class, 'store']);
    Route::post('/update-artists', [artistsController::class, 'update']);
    Route::get('/view-artists/{id}', [artistsController::class, 'show']);
    

     //songs Controller
     Route::get('/songs', [songsController::class, 'index']);
     Route::get('/edit-songs/{id}', [songsController::class, 'edit']);
     Route::get('/delete-songs/{id}', [songsController::class, 'destroy']);
     Route::post('/save-songs', [songsController::class, 'store']);
     Route::post('/update-songs', [songsController::class, 'update']);
     Route::get('/view-songs/{id}', [songsController::class, 'show']);


    //likes Controller
    Route::get('/likes', [likesController::class, 'index']);
    Route::get('/edit-likes/{id}', [likesController::class, 'edit']);
    Route::get('/delete-likes/{id}', [likesController::class, 'destroy']);
    Route::post('/save-likes', [likesController::class, 'store']);
    Route::post('/update-likes', [likesController::class, 'update']);
    Route::get('/view-likes/{id}', [likesController::class, 'show']);
    
     
 


    // Visitors
    Route::get('/visitors', [VisitorController::class, 'index']);
    Route::get('/delete-visitor', [VisitorController::class, 'destroy']);

    //Settings
    Route::get('/site-services', [ServiceController::class, 'index']);
    Route::get('/edit-site-service/{id}', [ServiceController::class, 'edit']);
    Route::get('/delete-site-service', [ServiceController::class, 'destroy']);
    Route::get('/create-site-service', [ServiceController::class, 'create']);
    Route::post('/save-site-service', [ServiceController::class, 'store']);
    Route::post('/update-site-service', [ServiceController::class, 'update']);


    //Notification
    Route::get('/mark-all-as-read', [NotificationController::class, 'readAll']);

    Route::resource('faq',App\Http\Controllers\FaqController::class);
    Route::resource('pkg_addon',App\Http\Controllers\AddOnsServicesController::class);
    Route::resource('up_document',App\Http\Controllers\DocumentController::class);
    Route::resource('user_update_services',App\Http\Controllers\UserCompleteServicesController::class);
    Route::post('/order_filter_byStatus', [OrderController::class, 'order_filter_byStatus']);
    Route::post('/searbar_filter_dashboard', [DashboardController::class, 'searbar_filter_dashboard']);
    Route::post('/order_filter_bystate', [OrderController::class, 'order_filter_bystate']);
    Route::post('/faqs_filter_byStatus', [App\Http\Controllers\FaqController::class, 'faqs_filter_byStatus']);
    Route::post('/update_cus_services', [App\Http\Controllers\UserCompleteServicesController::class, 'update']);
  

 
    // Excel export route start
    Route::get('export', 'App\Http\Controllers\MyController@export')->name('export');
    Route::get('importExportView', 'App\Http\Controllers\MyController@importExportView');
    Route::post('import', 'App\Http\Controllers\MyController@import')->name('import');
    // Excel export route end


    //Roles
    Route::get('/roles', [RoleController::class, 'index']);
    Route::get('/create-role', [RoleController::class, 'create']);
    Route::get('/edit-role/{id}', [RoleController::class, 'edit']);
    Route::get('/delete-role/{id}', [RoleController::class, 'destroy']);
    Route::post('/save-role', [RoleController::class, 'store']);
    Route::post('/update-role', [RoleController::class, 'update']);


    //Permissions
    Route::get('/permissions', [PermissionController::class, 'index']);
    Route::get('/create-permission', [PermissionController::class, 'create']);
    Route::get('/edit-permission/{id}', [PermissionController::class, 'edit']);
    Route::get('/delete-permission/{id}', [PermissionController::class, 'destroy']);
    Route::post('/save-permission', [PermissionController::class, 'store']);

    //Role & Permissions
    Route::get('/manage-role-permissions', [RolePermissionController::class, 'index']);
    Route::get('/assign-permission', [RolePermissionController::class, 'create']);
    Route::post('/save-role-permissions', [RolePermissionController::class, 'store']);
    Route::get('/edit-role-permission/{id}', [RolePermissionController::class, 'edit']);
    Route::post('/update-role-permission', [RolePermissionController::class, 'update']);
    Route::get('/delete-role-permission/{id}', [RolePermissionController::class, 'destroy']);
    Route::get('/view-permissions', [RolePermissionController::class, 'show']);


    //Site Setting
    Route::get('/web-pkgs',[FrontController::class,'sitePkgs']);
    Route::get('/set-pkg-plan',[FrontController::class,'setPkgPlan']);
    Route::post('/update-pkg-plans',[FrontController::class,'updateSidePkgPlans']);
    Route::get('/edit-site-pkg/{id}',[FrontController::class,'editSitePkgPlan']);
    Route::get('/delete-site-pkg/{id}',[FrontController::class,'deleteSitePkgPlan']);


});


Route::get('/test-wa', function () {
    $sid = "ACa26a8f5411aeb60a3323cbec7e47fec6"; // Your Account SID from www.twilio.com/console
    $token = "0b64042ec3f42c18af0b2f20ada43f7b"; // Your Auth Token from www.twilio.com/console

    $client = new Twilio\Rest\Client($sid, $token);
    $message = $client->messages->create(
        'whatsapp:+1512 846-7921', // Text this number
        [
            'from' => 'whatsapp:+14155238886', // From a valid Twilio number
            'body' => 'Hello from Twilio!'
        ]
    );

    dd($message);
});

require __DIR__ . '/auth.php';
