<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {

   return DB::table('seller_products')
    ->join('products','products.id','seller_products.product_id')
    ->join('product_tags','product_tags.id','seller_products.product_id')
    ->join('users','users.id','seller_products.user_id')
    ->join('seller_accounts','seller_accounts.user_id','users.id')
    ->leftJoin('seller_subcriptions','seller_subcriptions.seller_id','users.id')
    // ->whereIn('products.category_id', $category_ids)
    // ->where('seller_products.product_name','LIKE',"%{$request['keyword']}%")
    // ->orWhereIn('seller_products.product_id', $product_id_from_tag_table)
    ->select('seller_products.product_name as product_name', 'seller_products.slug as slug','users.email as seller_name', 'seller_subcriptions.id as seller_subs_id', 'seller_subcriptions.expiry_date as subcription_expiry_date','seller_accounts.id as holiday_mode_id','seller_accounts.holiday_mode','seller_accounts.holiday_date_start','seller_accounts.holiday_date_end','seller_accounts.holiday_date')
    // ->where('holiday_mode',0)
    // ->whereRaw(Carbon\Carbon::now().' BETWEEN holiday_date_start AND holiday_date_start OR holiday_date'.Carbon\Carbon::now())
    ->orWhereRaw('? NOT between holiday_date_start AND holiday_date_end AND holiday_date != ? AND holiday_mode = 1',[date('Y-m-d'),date('Y-m-d')])
    ->orWhere('holiday_mode', 0)
    ->where('expiry_date', '>=', date('Y-m-d'))
    ->inRandomOrder()
    // ->limit(6)
    // ->withCount('id')
    ->get();
});

Auth::routes();

Route::resource('articles', App\Http\Controllers\ArticleController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/download', [App\Http\Controllers\HomeController::class, 'download'])->name('download');

Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);

Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);
