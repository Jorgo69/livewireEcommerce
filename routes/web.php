<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\User\UserDashboardComponent;
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
// });

Route::get('/', HomeComponent::class)->name('home.index');

Route::get('/shop', ShopComponent::class)->name('shop');

// Route::get('shop',[ShopController::class, 'voir'] )->name('shop');

Route::get('/shop-cart', CartComponent::class)->name('shop.cart');

Route::get('/checkout', CheckoutComponent::class)->name('checkout');


Route::get('details,{slug}', DetailsComponent::class)->name('details.products');

Route::get('product_by_categories,{slug}', CategoryComponent::class)->name('product.category');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function(){
    Route::get('/user/dashbord', UserDashboardComponent::class)->name('user.dashboard');
});

Route::middleware(['auth', 'authadmin'])->group(function(){
    Route::get('/admin/dashbord', AdminDashboardComponent::class)->name('admin.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
