<?php

use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\LogoutController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ErrorController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\LoginMiddleware;
use Illuminate\Support\Facades\Mail;

//**Routes ADMIN here */

Route::get('/admin/login', [LoginController::class, 'index'])->name('loginAdmin');
Route::post('/admin/login', [LoginController::class, 'authenticate'])->name('postAdmin');
Route::get('/admin/logout', [LogoutController::class, 'logout'])->name('logoutAdmin');
Route::get('/admin/forgot-password', [ForgotPasswordController::class, 'index'])->name('forgotPasswordAdmin');
Route::post('/admin/forgot-password', [ForgotPasswordController::class, 'forgotpasswordPost'])->name('forgotPasswordAdminPost');
// Route::get('/admin/reset-password', [ResetPasswordController::class, 'index'])->name('resetPassword');
Route::get('/admin/reset-passwordxx/{token}', [ForgotPasswordController::class, 'resetpassword'])->name('resetPasswordxx');
Route::post('/admin/reset-passwordxx', [ForgotPasswordController::class, 'resetpasswordpost'])->name('resetPasswordxxpost');

// 'middleware' => ['adminlogin']
Route::group(['prefix' => 'admin',  'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => 'category'], function () {
        Route::get('/', [CategoryController::class, 'show_category_sort'])->name('category.index');
        Route::get('/create', [CategoryController::class, 'add_category'])->name('category.create');
        Route::get('/delete/{id}', [CategoryController::class, 'delete_category'])->name('category.delete');
        Route::get('/edit/{id}', [CategoryController::class, 'edit_category'])->name('category.edit');
        Route::post('/add', [CategoryController::class, 'post_category'])->name('category.store');
        Route::post('/edit/{id}', [CategoryController::class, 'post_edit_category'])->name('category.update');
        Route::get('/{id}', [CategoryController::class, 'show'])->name('category.show');
        Route::post('/orderby-users', [CategoryController::class, 'OrderBy'])->name('sort');
        Route::get('/', [CategoryController::class, 'show_category_sort'])->name('showCategorySort');
    });

    Route::group(['prefix' => 'product'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('product.index');
        Route::get('/create', [ProductController::class, 'show_create'])->name('product.create');
        Route::post('/add', [ProductController::class, 'post_product'])->name('product.store');
        Route::get('/edit', [ProductController::class, 'show_edit'])->name('product.edit');
        Route::post('/edit/{id}', [ProductController::class, 'post_edit'])->name('product.update');
        Route::get('/view', [ProductController::class, 'view_single'])->name('product.show');
        Route::get('/delete', [ProductController::class, 'delete_product'])->name('product.delete');
    });

    Route::group(['prefix' => 'role'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('role.index');
        Route::get('/create', [RoleController::class, 'create'])->name('role.create');
        Route::post('/add', [RoleController::class, 'store'])->name('role.store');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::post('/edit/{id}', [RoleController::class, 'update'])->name('role.update');
        Route::get('/delete/{id}', [RoleController::class, 'delete'])->name('role.delete');
    });
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/add', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/edit/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    });
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', [PostController::class, 'index'])->name('post.index');
        Route::get('/create', [PostController::class, 'create'])->name('post.create');
        Route::post('/add', [PostController::class, 'store'])->name('post.store');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
        Route::post('/edit/{id}', [PostController::class, 'update'])->name('post.update');
        Route::get('/delete/{id}', [PostController::class, 'delete'])->name('post.delete');
    });
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
        Route::get('/create', [ProfileController::class, 'create'])->name('profile.create');
        Route::post('/add', [ProfileController::class, 'store'])->name('profile.store');
      
    });
});


/**rOUTES website */

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/menu', [HomeController::class, 'index_menu'])->name('menu.index_menu');
Route::get('/service', [HomeController::class, 'index_service'])->name('service.index_service');
Route::get('/about', [HomeController::class, 'index_about'])->name('about.index_about');
Route::get('/contact', [HomeController::class, 'index_contact'])->name('contactPage');
Route::get('/blog', [HomeController::class, 'index_blog'])->name('blogtPage');
Route::get('/blog-detail', [HomeController::class, 'index_blog_detail'])->name('blogtDetailPage');
Route::get('/login', [HomeController::class, 'login'])->name('loginPage');
Route::post('/login', [HomeController::class, 'post_login'])->name('post_login');
Route::get('/logout', [HomeController::class, 'logout'])->name('logout.logout');
Route::get('/register', [HomeController::class, 'register'])->name('registerPage');
Route::post('/register', [HomeController::class, 'post_register'])->name('post_register');
Route::get('/detail-product', [HomeController::class, 'detail_product'])->name('detailProductPage');
Route::get('/cart', [CartController::class, 'index'])->name('cartPage');


// error 
Route::get('/admin/error', [ErrorController::class, 'index'])->name('admin.error');

// them vao gio hang 
Route::post('/add-cart', [CartController::class, 'add'])->name('cart.add');
Route::get('/delete/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');



// checkout
Route::group(['prefix' => 'checkout'], function () {
    Route::get('/', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::get('/create', [CheckoutController::class, 'create'])->name('checkout.create');
    Route::post('/add', [CheckoutController::class, 'submit_form'])->name('checkout.store');
    Route::get('/checkout-success', [CheckoutController::class, 'form'])->name('checkout.success');
  
});

