<?php

use Illuminate\Support\Facades\Route;
use App\Models\Message;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\MultiImageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\HomeAboutController;
use App\Http\Controllers\ChangePasswordController;
use App\Models\User;
use App\Models\Brand;
use App\Models\HomeAbout;
use App\Models\MultiImage;

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
// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    //les messages les plus recents
    $brands = Brand::all();
    $abouts = HomeAbout::all();
    $images = MultiImage::all();
    return view('content_home',compact('brands', 'abouts', 'images'));
});

Route::post('/', function(){
    //Enregistrement d'un message
    $message = new Message;
    $message->author_name= request('author_name', 'Inconnu');
    $message->content = request('content','-');
    $message->save();
    
    return redirect('/');
});

Route::get('category/all',[CategoryController::class, 'index'])->name('categorie-all');
Route::post('add-categorie',[CategoryController::class, 'store'])->name('store.categorie');
Route::get('edit-categorie/{id}',[CategoryController::class, 'edit']);
Route::post('update-categorie/{id}',[CategoryController::class, 'update']);
Route::get('SoftDele-categorie/{id}',[CategoryController::class, 'SoftDelete']);
Route::get('restaurer-categorie/{id}',[CategoryController::class, 'restaurer']);
Route::get('supprimer-categorie/{id}',[CategoryController::class, 'supprimer']);

//Brand route
Route::get('brand-all',[BrandController::class, 'index'])->name('brand-all');
Route::post('brand-add',[BrandController::class, 'BrandStore'])->name('brand.store');
Route::get('edit-brand/{id}',[BrandController::class, 'BrandEdit']);
Route::post('update-brand/{id}',[BrandController::class, 'BrandUpdate']);
Route::get('delete-brand/{id}',[BrandController::class, 'delete']);

//Multi image url
Route::get('multi-image',[MultiImageController::class, 'images'])->name('multi.image');
Route::post('add-multi-image',[MultiImageController::class, 'store'])->name('image.store');

// Route admin contact
Route::get('admin-contact', [ContactController::class, 'index'])->name('admin.contact');
Route::get('add-admin-contact',[ContactController::class, 'create'])->name('add.admin.contact');
Route::post('store-contact',[ContactController::class, 'store'])->name('store.admin.contact');
Route::get('edit-admin-contact/{id}',[ContactController::class, 'edit']);
Route::post('update-admin-contact/{id}',[ContactController::class, 'update'])->name('update.admin.contact');
Route::get('delete-admin-contact/{id}',[ContactController::class, 'delete'])->name('delete.admin.contact');
    
//All message
Route::get('admin-message', [ContactController::class, 'messages'])->name('admin.message');
Route::get('delete-admin-message/{id}', [ContactController::class, 'delete_admin_message']);

// Portfolio
Route::get('portfolio', [ContactController::class, 'portfolio'])->name('portfolio');

//Contact page
Route::get('contact-page', [ContactController::class, 'client_contact'])->name('contact');
Route::post('contact-message', [ContactController::class, 'client_message'])->name('contact-message');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $incre = 1;
    $users = User::all();
    return view('admin.admin_master', ['users' =>$users, 'incre' =>$incre]);

})->name('dashboard');

Route::get('/user-logout', [UserController::class, 'logout'])->name('user.logout');

// Admin all route slider
Route::get('home-slider',[SliderController::class, 'index'])->name('home-slider');
Route::get('Add-slider',[SliderController::class, 'create'])->name('add-slider');
Route::post('Store-slider',[SliderController::class, 'store'])->name('store-slider');
Route::get('edit-slider/{id}',[SliderController::class, 'edit']);
Route::post('update-slider/{id}',[SliderController::class, 'update'])->name('update-slider');
Route::get('delete-slider/{id}',[SliderController::class, 'delete'])->name('delete-slider');

// Admin all route Home About
Route::get('Home-about',[HomeAboutController::class, 'index'])->name('home-about');
Route::get('Add-home-about',[HomeAboutController::class, 'create'])->name('add-about');
Route::post('Store-home-about',[HomeAboutController::class, 'store'])->name('store-about');
Route::get('edit-home-about/{id}',[HomeAboutController::class, 'edit']);
Route::post('update-home-about/{id}',[HomeAboutController::class, 'update'])->name('update-about');
Route::get('delete-home-about/{id}',[HomeAboutController::class, 'delete'])->name('delete-about');

//Change admin password
Route::get('Change-user-password',[ChangePasswordController::class, 'change_password'])->name('change.password');
Route::post('update-user-password',[ChangePasswordController::class, 'update_password']);
Route::get('update-user-profile',[ChangePasswordController::class, 'update_profile'])->name('update.user.profile');
Route::post('save-user-profile',[ChangePasswordController::class, 'save_profile'])->name('save.user.profile');
