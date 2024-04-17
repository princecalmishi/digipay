<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// })->name('/');

Route::get('/', [App\Http\Controllers\HomeController::class, 'welcome'])->name('/');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/services', [App\Http\Controllers\HomeController::class, 'services'])->name('services');
Route::get('/features', [App\Http\Controllers\HomeController::class, 'features'])->name('features');
Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::post('/contactform', [App\Http\Controllers\HomeController::class, 'contactform'])->name('contactform');

Route::get('/cron', [App\Http\Controllers\HomeController::class, 'cron'])->name('cron');

Auth::routes(['verify' => true]);

Route::group(['middleware' => 'verified'], function () {

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/deposit', [App\Http\Controllers\HomeController::class, 'deposit'])->name('deposit');
Route::get('/digipay', [App\Http\Controllers\HomeController::class, 'digipay'])->name('digipay');
Route::get('/mobile', [App\Http\Controllers\HomeController::class, 'mobile'])->name('mobile');
Route::get('/banking', [App\Http\Controllers\HomeController::class, 'banking'])->name('banking');
Route::get('/paybill', [App\Http\Controllers\HomeController::class, 'paybill'])->name('paybill');
Route::get('/buygoods', [App\Http\Controllers\HomeController::class, 'buygoods'])->name('buygoods');
Route::get('/investment', [App\Http\Controllers\HomeController::class, 'investment'])->name('investment');
Route::get('/investmenthistory', [App\Http\Controllers\HomeController::class, 'investmenthistory'])->name('investmenthistory');
Route::get('/savings', [App\Http\Controllers\HomeController::class, 'savingspage'])->name('savings');
Route::get('/transferlogs', [App\Http\Controllers\HomeController::class, 'transferlogs'])->name('transferlogs');
Route::get('/transactionlogs', [App\Http\Controllers\HomeController::class, 'transactionlogs'])->name('transactionlogs');
Route::get('/widthrawlogs', [App\Http\Controllers\HomeController::class, 'mobilelogs'])->name('widthrawlogs');

//security
Route::get('/refer', [App\Http\Controllers\HomeController::class, 'refer'])->name('refer');
Route::get('/terms', [App\Http\Controllers\HomeController::class, 'terms'])->name('terms');
Route::get('/privacy', [App\Http\Controllers\HomeController::class, 'privacy'])->name('privacy');
Route::get('/budget0', [App\Http\Controllers\HomeController::class, 'budget0'])->name('budget0');
Route::get('/budget1', [App\Http\Controllers\HomeController::class, 'budget1'])->name('budget1');
Route::get('/budget2', [App\Http\Controllers\HomeController::class, 'budget2'])->name('budget2');
Route::get('/aboutinvestmentplans', [App\Http\Controllers\HomeController::class, 'aboutinvestmentplans'])->name('aboutinvestmentplans');
Route::get('/buyinvest/{id}', [App\Http\Controllers\HomeController::class, 'buyinvest'])->name('buyinvest');
Route::get('/dissolve/{id}', [App\Http\Controllers\HomeController::class, 'dissolve'])->name('dissolve');

Route::get('/profile-security', [App\Http\Controllers\HomeController::class, 'profsecurity'])->name('profile-security');
Route::post('/changepass', [App\Http\Controllers\HomeController::class, 'changepass'])->name('changepass');
Route::post('/changepin', [App\Http\Controllers\HomeController::class, 'changepin'])->name('changepin');
Route::post('/addbudget', [App\Http\Controllers\HomeController::class, 'addbudget'])->name('addbudget');
Route::post('/mpesadeposit', [App\Http\Controllers\HomeController::class, 'mdeposit'])->name('mpesadeposit');
Route::get('/checkpayment', [App\Http\Controllers\HomeController::class, 'checkpayment'])->name('checkpayment');

Route::post('/createsavegoal', [App\Http\Controllers\HomeController::class, 'createsavegoal'])->name('createsavegoal');
Route::post('/createfixedsave', [App\Http\Controllers\HomeController::class, 'createfixedsave'])->name('createfixedsave');
Route::post('/sendtodigipay', [App\Http\Controllers\HomeController::class, 'sendtodigipay'])->name('sendtodigipay');
Route::post('/sendtomobile', [App\Http\Controllers\HomeController::class, 'sendtomobile'])->name('sendtomobile');
Route::post('/paybillrequest', [App\Http\Controllers\HomeController::class, 'paybillrequest'])->name('paybillrequest');
Route::post('/buygoodsrequest', [App\Http\Controllers\HomeController::class, 'buygoodsrequest'])->name('buygoodsrequest');
Route::post('/bankingrequest', [App\Http\Controllers\HomeController::class, 'bankingrequest'])->name('bankingrequest');


Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');


Route::group(['middleware' => 'admin'], function () {
// admin routes 
Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin/dashboard');
Route::get('/admin/admins', [App\Http\Controllers\AdminController::class, 'admins'])->name('admin/admins');
Route::get('/admin/createadmin', [App\Http\Controllers\AdminController::class, 'createadmin'])->name('admin/createadmin');
Route::get('/admin/plans', [App\Http\Controllers\AdminController::class, 'plans'])->name('admin/plans');
Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'allusers'])->name('admin/users');
Route::get('/admin/kyc', [App\Http\Controllers\AdminController::class, 'kyc'])->name('admin/kyc');
Route::get('/admin/kycrequest', [App\Http\Controllers\AdminController::class, 'kycrequest'])->name('admin/kycrequest');
Route::get('/admin/alltickets', [App\Http\Controllers\AdminController::class, 'alltickets'])->name('admin/alltickets');
Route::get('/admin/pendingtickets', [App\Http\Controllers\AdminController::class, 'pendingtickets'])->name('admin/pendingtickets');
Route::get('/admin/plancategories', [App\Http\Controllers\AdminController::class, 'plancategories'])->name('admin/plancategories');
Route::get('/editadmin/{id}', [App\Http\Controllers\AdminController::class, 'editadmin'])->name('editadmin');
Route::post('/editadminpost', [App\Http\Controllers\AdminController::class, 'editadminpost'])->name('editadminpost');
Route::get('/admin/createplan', [App\Http\Controllers\AdminController::class, 'createplan'])->name('admin/createplan');
Route::post('/createnewplanpost', [App\Http\Controllers\AdminController::class, 'createnewplanpost'])->name('createnewplanpost');
Route::get('/approveticket/{id}', [App\Http\Controllers\AdminController::class, 'approveticket'])->name('approveticket');


Route::get('/admin/planupdate/{id}', [App\Http\Controllers\AdminController::class, 'planupdate'])->name('admin/planupdate');
Route::post('admin/updateplanpost', [App\Http\Controllers\AdminController::class, 'updateplanpost'])->name('admin/updateplanpost');

Route::post('admin/createnewcategorypost', [App\Http\Controllers\AdminController::class, 'createnewcategorypost'])->name('admin/createnewcategorypost');
Route::get('/trashcategory/{id}', [App\Http\Controllers\AdminController::class, 'trashcategory'])->name('trashcategory');
Route::get('/trashplan/{id}', [App\Http\Controllers\AdminController::class, 'trashplan'])->name('trashplan');
Route::get('/userdetails/{id}', [App\Http\Controllers\AdminController::class, 'userdetails'])->name('userdetails');
Route::get('/loginas/{id}', [App\Http\Controllers\AdminController::class, 'loginas'])->name('loginas');
Route::post('admin/updateuserycdata', [App\Http\Controllers\AdminController::class, 'updateuserycdata'])->name('admin/updateuserycdata');
Route::get('/userinterestlog/{id}', [App\Http\Controllers\AdminController::class, 'userinterestlog'])->name('userinterestlog');
Route::get('/userdepositlog/{id}', [App\Http\Controllers\AdminController::class, 'userdepositlog'])->name('userdepositlog');
Route::get('/userwithrawlog/{id}', [App\Http\Controllers\AdminController::class, 'userwithrawlog'])->name('userwithrawlog');
Route::get('/usertranslog/{id}', [App\Http\Controllers\AdminController::class, 'usertranslog'])->name('usertranslog');
Route::get('/approveusertrans/{id}', [App\Http\Controllers\AdminController::class, 'approveusertrans'])->name('approveusertrans');
Route::post('admin/useraddbal', [App\Http\Controllers\AdminController::class, 'addbalance'])->name('admin/useraddbal');
Route::post('admin/usersubbal', [App\Http\Controllers\AdminController::class, 'subtractbalance'])->name('admin/usersubbal');
Route::get('/admin/pendingwith', [App\Http\Controllers\AdminController::class, 'pendingwith'])->name('admin/pendingwith');
Route::get('/admin/approvedwith', [App\Http\Controllers\AdminController::class, 'approvedwith'])->name('admin/approvedwith');
Route::get('/admin/rejectedwith', [App\Http\Controllers\AdminController::class, 'rejectedwith'])->name('admin/rejectedwith');

Route::get('/approvewidth/{id}', [App\Http\Controllers\AdminController::class, 'approvewidth'])->name('approvewidth');
Route::get('/rejectwith/{id}', [App\Http\Controllers\AdminController::class, 'rejectwith'])->name('rejectwith');
Route::get('/admin/managedeposits', [App\Http\Controllers\AdminController::class, 'managedeposits'])->name('admin/managedeposits');
Route::get('/admin/fixedsavings', [App\Http\Controllers\AdminController::class, 'userfixedsavings'])->name('admin/fixedsavings');
Route::get('/admin/usergoals', [App\Http\Controllers\AdminController::class, 'usergoals'])->name('admin/usergoals');
Route::get('cacheclear', [App\Http\Controllers\AdminController::class, 'cacheClear'])->name('cacheclear');
Route::get('admin/generalsettings', [App\Http\Controllers\AdminController::class, 'generalsettings'])->name('admin/generalsettings');
Route::post('admin/gensettpost', [App\Http\Controllers\AdminController::class, 'gensettpost'])->name('admin/gensettpost');
});});