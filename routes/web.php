<?php

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

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();

Auth::routes(['verify'=> true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth','verified']);
Route::get('/about-us', 'HomeController@aboutUsIndex')->name('aboutUs');
Route::get('/our-service', 'HomeController@ourServiceIndex')->name('ourService');

Route::get('/notification', 'NotificationController@notificationIndex')->name('notification')->middleware(['auth','verified']);

Route::prefix('check-transaction')->group(function(){
	Route::get('/', 'CheckTransactionController@index')->name('checkTransaction')->middleware(['auth','verified']);
	Route::post('/checkTransaction', 'CheckTransactionController@checkTransaction')->name('checkTransactionPost')->middleware(['auth','verified']);
});

Route::prefix('product')->group(function(){
	Route::get('/', 'ProductController@index')->name('product');
	Route::get('/detail/{id}', 'ProductController@productDetailView')->name('productDetail');
	Route::post('/filter', 'ProductController@productFilter')->name('productFilter');
	Route::get('delete/{id}', 'ProductController@softDelete')->name('productSoftDelete');
	Route::post('/ask', 'ProductController@productAsk')->name('productAsk');
	Route::post('/ask/reply', 'ProductController@productAskComment')->name('productAskReply');
});

//Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
	//admin destination url list
Route::prefix('account')->group(function(){
	Route::get('/', 'UserController@accountIndex')->name('account')->middleware(['auth','verified']);
	Route::get('/edit', 'UserController@editAccountForm')->name('editAccount')->middleware(['auth','verified']);
	Route::post('/edit', 'UserController@update')->name('updateAccount')->middleware(['auth','verified']);
	Route::get('/myproduct', 'ProductController@myProductIndex')->name('myProduct')->middleware(['auth','verified']);
	Route::get('/myproduct/detail/{id}', 'ProductController@myProductDetailIndex')->name('myProductDetail')->middleware(['auth','verified']);
	Route::get('/myproduct/add', 'ProductController@myProductAddIndex')->name('myProductAdd')->middleware(['auth','verified']);
	Route::get('/myproduct/edit/{id}', 'ProductController@myProductEditIndex')->name('myProductEdit')->middleware(['auth','verified']);
	Route::post('/myproduct/add', 'ProductController@create')->name('productAdd')->middleware(['auth','verified']);
	Route::post('/myproduct/edit', 'ProductController@update')->name('productEdit')->middleware(['auth','verified']);
	Route::get('/my-order', 'CheckoutController@myOrderIndex')->name('myOrder')->middleware(['auth','verified']);
	Route::get('/my-order/{id}', 'CheckoutController@myOrderDetailIndex')->name('myOrderDetail')->middleware(['auth','verified']);
	Route::get('/my-order/pdf/{id}', 'CheckoutController@generateInvoice')->name('invoicePdf')->middleware(['auth','verified']);
});

Route::prefix('cart')->group(function(){
	Route::get('/', 'CartController@index')->name('cart');
	Route::post('/add', 'CartController@addToCart')->name('addToCart');
	Route::get('/remove/{rowId}', 'CartController@removeCart')->name('removeCart');
	Route::get('/destroy/', 'CartController@removeAllCart')->name('removeAllCart');
	Route::post('/update/', 'CartController@updateCart')->name('updateCart');
});

Route::prefix('checkout')->group(function(){
	Route::get('/', 'CheckoutController@index')->name('checkout')->middleware(['auth','verified']);
	Route::post('/', 'CheckoutController@postCheckout')->name('checkoutPost')->middleware(['auth','verified']);
	Route::get('/complete', 'CheckoutController@checkoutComplete')->name('checkoutComplete')->middleware(['auth','verified']);
	Route::post('/update-status', 'CheckoutController@updateCheckoutStatus')->name('checkoutStatusUpdate')->middleware(['auth','verified']);
});

Route::prefix('review')->group(function(){
	Route::get('/{id}', 'ReviewController@index')->name('review')->middleware(['auth','verified']);
	Route::post('/create', 'ReviewController@create')->name('reviewPost')->middleware(['auth','verified']);

});

Route::prefix('confirm-payment')->group(function(){
	Route::get('/', 'ConfirmPaymentController@confirmPaymentForm')->name('confirmPayment')->middleware(['auth','verified']);
	Route::post('/create', 'ConfirmPaymentController@create')->name('confirmPaymentCreate')->middleware(['auth','verified']);
});

//admin url group list
Route::prefix('admin')->group(function(){
	Route::get('/', 'AdminController@index')->name('admin')->middleware(['auth','verified']);
	Route::get('/user', 'UserController@adminIndex')->name('adminUser')->middleware(['auth','verified']);

	//admin user url list
	Route::prefix('user')->group(function(){
		Route::get('/', 'UserController@adminIndex')->name('adminUser')->middleware(['auth','verified']);
		Route::get('/edit/{id}', 'UserController@adminEditIndex')->name('adminEditUser')->middleware(['auth','verified']);
		Route::post('/edit/', 'UserController@update')->name('adminEditUserPost')->middleware(['auth','verified']);
	});

	//admin category url list
	Route::prefix('category')->group(function(){
		Route::get('/', 'CategoryController@admin_categoryIndex')->name('adminCategory')->middleware(['auth','verified']);
		Route::get('/form/{id?}', 'CategoryController@admin_categoryformIndex')->name('adminCategoryForm')->middleware(['auth','verified']);
		Route::post('/create', 'CategoryController@admin_categoryformCreate')->name('adminCategoryCreate')->middleware(['auth','verified']);
		Route::post('/edit/', 'CategoryController@admin_categoryformEdit')->name('adminCategoryEdit')->middleware(['auth','verified']);
		Route::get('/delete/{id}', 'CategoryController@admin_categoryDelete')->name('adminCategoryDelete')->middleware(['auth','verified']);
	});
	Route::prefix('product')->group(function(){
		Route::get('/', 'ProductController@adminIndex')->name('adminProduct')->middleware(['auth','verified']);
		Route::get('/delete/{id}', 'ProductController@softDelete')->name('adminDeleteProduct')->middleware(['auth','verified']);
	});
	//admin destination url list
	Route::prefix('destination')->group(function(){
		Route::get('/', 'DestinationController@admin_destinationIndex')->name('adminDestination')->middleware(['auth','verified']);
		Route::get('/form/{id?}', 'DestinationController@admin_destinationformIndex')->name('adminDestinationForm')->middleware(['auth','verified']);
		Route::post('/create', 'DestinationController@admin_destinationformCreate')->name('adminDestinationCreate')->middleware(['auth','verified']);
		Route::post('/edit/', 'DestinationController@admin_destinationformEdit')->name('adminDestinationEdit')->middleware(['auth','verified']);
		Route::get('/delete/{id}', 'DestinationController@admin_destinationDelete')->name('adminDestinationDelete')->middleware(['auth','verified']);
	});

	//admin checkout url list
	Route::prefix('checkout')->group(function(){
		Route::get('/', 'CheckoutController@admin_checkoutIndex')->name('adminCheckout')->middleware(['auth','verified']);
		Route::get('/detail/{id}', 'CheckoutController@admin_checkoutDetailIndex')->name('adminCheckoutDetail')->middleware(['auth','verified']);
	});

	//admin confirm payment list
	Route::prefix('confirm-payment')->group(function(){
		Route::get('/', 'ConfirmPaymentController@admin_confirmPaymentIndex')->name('adminConfirmPayment')->middleware(['auth','verified']);
		Route::post('/approve', 'ConfirmPaymentController@admin_approve_payment')->name('adminApprovePayment')->middleware(['auth','verified']);
	});

	//admin review list
	Route::prefix('review')->group(function(){
		Route::get('/', 'ReviewController@admin_reviewIndex')->name('adminReview')->middleware(['auth','verified']);
		Route::get('/delete/{id}', 'ReviewController@admin_reviewDelete')->name('adminReviewDelete')->middleware(['auth','verified']);
	});

});
