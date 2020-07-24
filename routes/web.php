<?php

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

use App\Announce;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
//axios


Route::get('/', function () {
    $announces = Announce::where('check','!=',null)->get()->reverse();
    $feedbacks = \App\Feedback::all()->reverse();
    return view('design.welcome', [
        'announces' => $announces,
    ]);
});

Route::get('/new-design/catalog', 'ProductionController@new_index')->name('new-design/catalog');
Route::get('productions/new_filter', 'ProductionController@new_filter')->name('productions.new_filter');
Route::get('/new-design/announces/list', 'AnnounceController@list')->name('announces.list');

Route::get('/announce/filter', 'AnnounceController@new_filter')->name('announce/filter');
Route::post('/like_announce', 'AnnounceController@like')->name('like_announce');
Route::post('/phone_check', 'UserController@phone_check')->name('phone_check');
Route::post('/profile_switch', 'UserController@switch')->name('profile_switch');
Route::get('/newprofile', 'UserController@newprofile')->name('newprofile');
Route::post('/delete_announce', 'AnnounceController@destroy')->name('delete_announce');
Route::get('/news.index', 'NewsSiteController@index')->name('news.index');
Route::get('/news.create', 'NewsSiteController@create')->name('news.create');
Route::post('/news.store', 'NewsSiteController@store')->name('news.store');
Route::post('/news.delete', 'NewsSiteController@delete')->name('news.delete');
Route::get('/news.edit/{id}', 'NewsSiteController@edit')->name('news.edit');
Route::post('/news.update', 'NewsSiteController@update')->name('news.update');
Route::get('/news.list', 'NewsSiteController@list')->name('news.list');
Route::get('/news.show/{id}', 'NewsSiteController@show')->name('news.show');


//Route::get('/', 'MainController@index')->name('homepage');
Route::get('/image', function () {
    return view('image-resizer');
});
Route::post('/user/register/phone', 'Auth\RegisterController@registerPhone')->name('register.phone');
Route::post('/user/register/phonecode', 'Auth\RegisterController@codeVerification')->name('register.code');
Route::post('/user/reregister/phonecode', 'Auth\RegisterController@reRegisterCode')->name('reregister.code');
Route::post('/image/resize', 'MainController@imageResize')->name('image.resize');

Route::get('/admin', 'AdminController@admin')->name('admin.admin');

//Route::prefix('admin')->name('admin.')->middleware('admin')->group(function () {
//    /**
//     * Production routes
//     */
//    Route::get('/user/datatable', 'Admin\UserController@datatable')->name('user.datatable');
//    Route::get('/production/datatable', 'Admin\ProductionController@datatable')->name('production.datatable');
//    Route::get('/announce/datatable', 'Admin\AnnounceController@datatable')->name('announce.datatable');
//    Route::resource('production', 'Admin\ProductionController');
//
//    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
//
//    Route::get('/message', 'HomeController@message')->name('message');
//
//    Route::get('/favorite', 'FavoriteController@index')->name('favorite');
//
//    Route::get('/blog/datatable', 'BlogController@datatableData')->name('blog.datatable.data');
//    Route::resource('blog', 'BlogController');
//    Route::resource('announce', 'Admin\AnnounceController');
//    Route::resource('user', 'Admin\UserController');
//});

Route::prefix('/admin')->name('admin.')->middleware('admin')->group(function (){
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('/getusers/{check}', 'AdminController@getUsers')->name('getusers');
    Route::get('/search_user/{value}', 'AdminController@searchUsers')->name('search_user');
    Route::post('/update_user', 'AdminController@updateUser')->name('update_user');

    Route::get('/getproducts/{id}', 'AdminController@getProducts')->name('getproducts');
    Route::get('/search_product/{value}/{id}', 'AdminController@searchProducts')->name('search_product');
    Route::post('/update_product/{id}', 'AdminController@updateProduct')->name('update_product');

    Route::get('/getannounces', 'AdminController@getAnnounces')->name('getannounces');
    Route::get('/search_announce/{value}', 'AdminController@searchAnnounces')->name('search_announce');
    Route::post('/update_announce', 'AdminController@updateAnnounce')->name('update_announce');

    Route::get('/getnews', 'AdminController@getNews')->name('getnews');
    Route::get('/get_new_edit/{id}', 'AdminController@getNewEdit')->name('get_new_edit');
    Route::get('/search_news/{value}', 'AdminController@searchNews')->name('search_news');
    Route::post('/store_new', 'AdminController@storeNews')->name('store_new');

    Route::get('/get_for_check', 'AdminController@getForCheck')->name('get_for_check');
    Route::post('/publish_product', 'AdminController@PublishProduct')->name('publish_product');
    Route::post('/publish_announce', 'AdminController@PublishAnnounce')->name('publish_announce');
});
    Route::get('delete_announces/{id}','AdminController@deleteAnnounces')->name('delete_announces');
    Route::get('/getstatistic', 'AdminController@getStatistic')->name('getstatistic');
    Route::get('/delete_news/{id}', 'AdminController@deleteNews')->name('delete_news');
    Route::get('/delete_products/{id}/{type}', 'AdminController@deleteProducts')->name('delete_products');


Route::get('/profile', 'UserController@index')->name('profile');

Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
    Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');
    Route::get('/settings', 'UserController@settings')->name('settings');

    Route::get('/user/favorites', 'UserController@favorites')->name('user.favorites');
    Route::resource('production', 'ProductionController');
    Route::resource('announce', 'AnnounceController');

});
Route::get('announce/ajax', 'AnnounceController@ajax')->name('announce.ajax');

Route::resource('announce', 'AnnounceController');
Route::put('/user/edit/{user}', 'UserController@edit')->name('user.edit');
Route::get('/user/announce', 'UserController@productions')->name('user.announce');
//Route::resource('blog', 'BlogController');
Route::get('/user/production/create', 'UserController@productionCreate')->name('user.production.create');
Route::get('/user/service/create', 'UserController@serviceCreate')->name('user.service.create');
Route::get('/user/product/create', 'UserController@productCreate')->name('user.product.create');
Route::put('/user/password/edit/{user}', 'UserController@editPassword')->name('user.password.edit');
Route::get('/get-categories', 'UserController@getCategories')->name('get.categories');

Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider')->name('google.redirect');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('google.callback');

Route::get('/rolling_users', 'AdminController@rolling_users');



Route::get('/search', 'MainController@search')->name('search');

Auth::routes();

Route::get('productions', 'ProductionController@index')->name('productions.index');
Route::get('productions/filter', 'ProductionController@filter')->name('productions.filter');
Route::get('productions/create', 'ProductionController@create')->name('productions.create');
Route::post('productions', 'ProductionController@store')->name('productions.store');
Route::post('productions/feedback/{production}', 'ProductionController@feedback')->name('productions.feedback');
Route::get('productions/rate', 'ProductionController@rate')->name('productions.rate');
Route::get('productions/{slug}', 'ProductionController@show')->name('productions.show');
Route::get('productions/{production}/edit', 'ProductionController@edit')->name('productions.edit');
Route::put('productions/{production}', 'ProductionController@update')->name('productions.update');
Route::delete('productions/{production}', 'ProductionController@destroy')->name('productions.destroy');
Route::post('bid', 'MainController@storeBid')->name('bid.store');

Route::get('/feedback',function (){
    return view('feadback');
})->name('feedback');

Route::get('/traffic',function (){
    return view('traffic');
})->name('traffic');

Route::get('/news',function (){
   return view('user_page');
})->name('user_page');

Route::get('announcement',function(){
    return view('announcement.announcement');
})->name('announcement');

Route::get('/about',function(){
    return view('about');
})->name('about');

Route::get('/product',function(){
    return view('products');
})->name('products');

Route::get('/workshop',function(){
    return view('workshops');
})->name('workshops');

Route::get('/about_us',function(){
    return view('about_us');
})->name('about_us');

Route::get('/consulting',function(){
    return view('consulting');
})->name('consulting');

Route::get('/product',function(){
    return view('product_description');
})->name('product_description');

Route::get('/user',function (){
    return view('user-login');
})->name('user-login');



Route::get('/logistic',function(){
    return redirect()->route('logistics');
})->name('logistic');

Route::get('/quality',function(){
    return view('quality');
})->name('quality');

Route::get('/contacts',function(){
    return view('contacts');
})->name('contacts');

Route::get('/privacy',function(){
    return view('privacy');
})->name('privacy');

Route::get('/conditions',function(){
    return view('conditions');
})->name('conditions');

Route::get('/delivery',function(){
    return view('delivery');
})->name('delivery');

Route::get('/blog_index', 'BlogController@index2')->name('blog_index');

Route::get('/logistics',function(){
    return view('logistics');
})->name('logistics');

Route::get('/production', 'ProductionController@index2')->name('production');

Route::get('/gds',function(){
    return view('gds');
})->name('gds');

Route::get('/blog/{blog}', 'BlogController@show')->name('blog_show');

Route::post('/image-upload', 'BlogController@upload');

Route::get('/service',function(){
    return view('service');
})->name('service');

Route::get('/customer_list',function(){
    return view('customer_list');
})->name('customer_list');

Auth::routes();


