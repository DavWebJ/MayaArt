<?php

use App\Models\ImageProduct;
use App\Http\Livewire\CartComponent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\CategoryComponent;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Livewire\ShopFilterComponents;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ShippingController;
use App\Http\Controllers\PromotionController;
use App\Http\Livewire\SingleProductComponent;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\ImageProductController;
use App\Http\Controllers\NotificationController;
use App\Http\Livewire\Customer\CheckoutComponent;
use App\Http\Livewire\DashboardComponent;
use App\Http\Livewire\UserOrder;
use App\Http\Livewire\UserOrderDetailComponent;
use App\Http\Livewire\WishlistPageComponent;

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

// simple page
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/qui-suis-je',[HomeController::class,'about'])->name('about');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/portfolio',[HomeController::class,'portfolio'])->name('portfolio');


// shop routes
Route::get('/la boutique de mayart',ShopFilterComponents::class)->name('shop');
Route::get('/boutique/{slug}',SingleProductComponent::class)->name('shop.show');
Route::get('/boutique/categories/{category_slug}',CategoryComponent::class)->name('shop.category');


// mentions and polices  routes
Route::get('/cgv',[HomeController::class,'policies'])->name('cgv');
Route::get('/mentions légales',[HomeController::class,'mentions'])->name('mentions');

// send messages
Route::post('/message',[MessageController::class,'send'])->name('message');

//subscribe newsletter
Route::post('/subscribe',[NewsLetterController::class,'subscribe'])->name('subscribe');


// customer payement && cart shop needs authentication
Route::group(['middleware' => ['auth:sanctum','verified']], function () {

    Route::post('/paiement',[CheckoutController::class,'PaiementAction'])->name('customer.paiement');
    Route::get('/paiement',[CheckoutController::class,'checkout'])->name('customer.checkout');
    Route::get('/merci',[CheckoutController::class,'payementSuccess'])->name('checkout.payementSuccess');
    Route::get('/echec',[CheckoutController::class,'payementError'])->name('checkout.payementError');
    Route::get('/commande',[CustomerController::class,'order'])->name('customer.order');
    Route::get('/dashboard/commandes/{transaction_id}',UserOrder::class)->name('dashboard.order');
    Route::get('/dashboard',DashboardComponent::class)->name('dashboard');
     Route::post('/change/status',[AdminController::class,'changestatus']);
     Route::get('/panier',CartComponent::class)->name('customer.cart');
    Route::get('/liste-de-souhait',WishlistPageComponent::class)->name('product.wishlist');
    Route::resources([
        'shipping'=>ShippingController::class,
        'billing'=>BillingController::class,
        'notification'=>NotificationController::class
    ]);
});


// admin routes
Route::group(['prefix' => 'admin', 'middleware' => ['admin','optimizeImages']], function(){
    Route::get('list',[AdminController::class,'index'])->name('admin.list');
    Route::get('/add-super',[AdminController::class,'create'])->name('admin.create');
    Route::post('/create-super',[AdminController::class,'store'])->name('admin.store');
    Route::get('/export',[NewsLetterController::class,'index'])->name('newsletter.index');
    Route::get('/user',[UserController::class,'index'])->name('user.index');
    Route::get('getimages',[ImageProduct::class,'getImages']);
    Route::post('delete',[ImageProduct::class,'destroy']); 
    Route::resources([
        'header'=>HeaderController::class,
        'promotion' => PromotionController::class,
        'product'=>ProductController::class,
        'category'=>CategoryController::class,
        'order'=>OrderController::class,
        'coupon'=>CouponController::class,
        'rating'=>RatingController::class,
        'option'=>OptionController::class,
        'imageproduct'=>ImageProductController::class,
        'counter'=>CounterController::class
    ]);
});

// admin dashboard
Route::middleware(['auth:sanctum','verified','admin'])->get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');




