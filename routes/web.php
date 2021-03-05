<?php
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

/**
 * Review Routing
 */
Route::post('review', 'HomeController@Review')->name('Review');

/**
 * Search route
 */
Route::get('product-search', 'FrontendController@search')->name('Search');

/**
 * User & Auth Routing
 */
Route::get('/users', 'HomeController@users')->name('users');
Auth::routes(['verify' => true]);


/**
 * FrontEnd Routing
 */
Route::get('/', 'FrontendController@front');
Route::get('product/get/size/{color}/{product}', 'FrontendController@GetSize')->name('GetSize');
Route::get('shop', 'FrontendController@shop')->name('Shop');

/**
 * Blog Comments Routing
 */
Route::post('comments', 'HomeController@Comments')->name('Comments');

/**
 * Role Manager Routing
 */
Route::get('role-manager', 'RoleController@Role')->name('RoleManager');
Route::post('role-add-to-permission', 'RoleController@RoleAddToPermission')->name('RoleAddToPermission');
Route::post('role-add-to-user', 'RoleController@RoleAddToUser')->name('RoleAddToUser');
Route::get('Permission-Change/{user_id}', 'RoleController@PermissionChange')->name('PermissionChange');
Route::post('Permission-Change-To-User', 'RoleController@PermissionChangeToUser')->name('PermissionChangeToUser');


/**
 * Checkout Routing
 */
Route::get('checkout', 'CheckoutController@checkout')->name('Checkout');
Route::get('api/get-state-list/{id}', 'CheckoutController@GetState')->name('GetState');
Route::get('api/get-city-list/{state_id}', 'CheckoutController@GetCity')->name('GetCity');

/**
 * Payment Routing
 */
Route::post('payment', 'PaymentController@payment')->name('Payment');
Route::get('getPaymentStatus', 'PaymentController@getPaymentStatus')->name('PaygetPaymentStatusment');


/**
 * Cart Routing
 */
Route::post('add-to-cart', 'CartController@AddToCart')->name('AddToCart');
Route::get('cart', 'CartController@Cart')->name('Cart');
Route::post('cart-update', 'CartController@CartUpdate')->name('CartUpdate');
Route::get('cart-delete/{id}', 'CartController@CartDelete')->name('CartDelete');
Route::post('/quantity/update', 'CartController@QuantityUpdate')->name('QuantityUpdate');
// Route::get('cart/{code}', 'CartController@Cart')->name('CouponValue');


/**
 * Single Product Routing
 */
Route::get('/product/{slug}', 'FrontendController@SingleProduct')->name('SingleProduct');

/**
 * Home Routing
 */
Route::get('/home', 'HomeController@index')->name('home');


 /**
 *Order Routing
 */
Route::get('orders', 'HomeController@orders')->name('Orders');
Route::get('orders/excel/download', 'HomeController@OrdersExcelDownload')->name('OrdersExcelDownload');
Route::post('orders/excel/import', 'HomeController@CategoryExcelImport')->name('CategoryExcelImport');
Route::post('orders/excel/selecteddate', 'HomeController@SelectedDateExcelDownload')->name('SelectedDateExcelDownload');
Route::get('orders/pdf/download', 'HomeController@OrdersPDFDownload')->name('OrdersPDFDownload');


/**
 * Category Routing
 */
Route::get('/category-list', 'CategoryController@CategoryList')->name('CategoryList');
Route::post('/category-post', 'CategoryController@CategoryPost')->name('CategoryPost');
Route::get('/category/delete/{id}', 'CategoryController@CategoryDelete')->name('CategoryDelete');
Route::get('/category-edit/{id}', 'CategoryController@CategoryEdit')->name('CategoryEdit');
Route::post('/category-update', 'CategoryController@CategoryUpdate')->name('CategoryUpdate');
Route::get('/category-add', 'CategoryController@CategoryAdd')->name('CategoryAdd');
Route::post('/category-selected-delete', 'CategoryController@SelectedCategoryDelete')->name('CategorySelectedDelete');

/**
 * Sub-Category Routing
 */
Route::get('/subcategory-view', 'SubCategoryController@SubCategoryView')->name('SubCategoryView');
Route::get('/subcategory-add', 'SubCategoryController@SubCategoryAdd')->name('SubCategoryAdd');
Route::post('/subcategory-post', 'SubCategoryController@SubCategoryPost')->name('SubCategoryPost');
Route::get('/subcategory-delete/{id}', 'SubCategoryController@SubCategoryDelete')->name('SubCategoryDelete');
Route::get('/subcategory-edit/{id}', 'SubCategoryController@SubCategoryEdit')->name('SubCategoryEdit');
Route::post('/subcategory-update', 'SubCategoryController@SubCategoryUpdate')->name('SubCategoryUpdate');

/**
 * Products Routing
 */
Route::get('/products', 'ProductController@products')->name('products');
Route::get('/product-add', 'ProductController@ProductAdd')->name('product-add');
Route::get('/product-edit/{id}', 'ProductController@ProductEdit')->name('product-edit');
Route::post('/product-update', 'ProductController@ProductUpdate')->name('product-update');
Route::post('/product-post', 'ProductController@ProductPost')->name('product-post');
Route::get('/product-delete/{id}', 'ProductController@ProductDelete')->name('product-delete');


/**
 * Attributes Routing
 */
Route::get('/attributes', 'AttributesController@ViewList')->name('attributes');

/**
 * Brand Routing
 */
Route::get('/brand-add', 'AttributesController@BrandAdd')->name('brand-add');
Route::post('/brand-post', 'AttributesController@BrandPost')->name('brand-post');
Route::get('/brand-delete/{id}', 'AttributesController@BrandDelete')->name('brand-delete');
Route::get('/brand-edit/{name}/{id}', 'AttributesController@BrandEdit')->name('brand-edit');
Route::post('brand-update', 'AttributesController@BrandUpdate')->name('brand-update');

/**
 * Color Routing
 */
Route::get('color-add', 'AttributesController@ColorAdd')->name('color-add');
Route::post('color-post', 'AttributesController@ColorPost')->name('color-post');
Route::get('color-delete/{id}', 'AttributesController@ColorDelete')->name('color-delete');
Route::get('color-edit/{name}/{id}', 'AttributesController@ColorEdit')->name('color-edit');
Route::post('color-update', 'AttributesController@ColorUpdate')->name('color-update');

/**
 * Size Routing
 */
Route::get('size-add', 'AttributesController@SizeAdd')->name('size-add');
Route::post('size-post', 'AttributesController@SizePost')->name('size-post');
Route::get('size-delete/{id}', 'AttributesController@SizeDelete')->name('size-delete');
Route::get('size-edit/{name}/{id}', 'AttributesController@SizeEdit')->name('size-edit');
Route::post('size-update', 'AttributesController@SizeUpdate')->name('size-update');

/**
 * Ajax Routing
 */
Route::get('/product-update/ajax/{id}', 'ProductController@ProductUpdateAjax')->name('ProductUpdateAjax');

/**
 * Gallery Update Routing
 */
Route::get('product-gallery-edit/{id}', 'ProductController@GalleryEdit')->name('product-gallery-edit');
Route::get('gallery-image-delete/{id}', 'ProductController@GalleryImageDelete')->name('gallery-image-delete');
Route::post('multiple-image-update', 'ProductController@MultiImageUpdate')->name('multiple-image-update');



/**
 * Social Login Routing
*/
Route::get('login-with-github', 'SocialController@loginwithGithub')->name('loginwithGithub');
Route::get('callback-url', 'SocialController@GithubCallBack')->name('GithubCallBack');

Route::get('login-with-google', 'SocialController@loginwithGoogle')->name('loginwithGoogle');
Route::get('google-callback-url', 'SocialController@GoogleCallBack')->name('GoogleCallBack');

Route::get('login-with-facebook', 'SocialController@loginwithFacebook')->name('loginwithFacebook');
Route::get('facebook-callback-url', 'SocialController@FacebookCallBack')->name('FacebookCallBack');


/**
 * Blog Routing
*/
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::resource('blog', 'BlogController');
    Route::get('role-manager', 'RoleController@Role')->name('RoleManager');
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
Route::get('blog', 'FrontendController@showallblogs')->name('Blog');
Route::get('/blog/{slug}', 'FrontendController@SingleBlog')->name('SingleBlog');


Route::get('/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'es'])) {
        abort(400);
    }

    App::setLocale($locale);

    return back();
})->name("language");

