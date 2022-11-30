<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\HomeController;
use App\Models\UnitOfMeasure;
use Illuminate\Support\Facades\Auth;

use App\Models\Client;
use App\Models\Invoice;
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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/panel', function () {
    return view('admin.panel');
})->name('admin.panel');

Route::resource('clients', 'ClientController')->only(['index', 'create', 'store']);
Route::get('invoices/{invoice}/mail', 'MailController@sendMail')->name('invoices.mail');

Auth::routes();

Route::resource('invoices', 'InvoiceController');
Route::put('invoices/{invoice}/update', 'InvoiceController@updateDescription')->name('invoices.description.update');

Route::get('/create', function () {
    $clients = Client::all();
    return view('invoices.create')->with([
        'clients' => $clients,
    ]);
})->name('invoices.create');

Route::resource('items', 'InvoiceItemController');
