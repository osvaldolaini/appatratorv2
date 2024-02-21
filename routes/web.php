<?php

use App\Livewire\Admin\Configuration;
use App\Livewire\Admin\ListUser;
use App\Livewire\Admin\Panel;
use App\Livewire\Admin\Dashboard\Master;
use App\Livewire\Admin\Marketing\PageEmails;
use App\Livewire\Admin\Marketing\SocialMedia;
use App\Livewire\Admin\Marketing\Subscribers;
use App\Livewire\Admin\Properties\Properties;
use App\Livewire\Admin\PropertyConfigs\Features;
use App\Livewire\Admin\PropertyConfigs\Finalities;
use App\Livewire\Admin\PropertyConfigs\Types;
use App\Livewire\Admin\Registers\Generals;
use App\Livewire\Admin\UserAccesses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

// Configurations pageAccess 11
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'registerLogging'
])->group(function () {
    Route::get('/dashboard', Panel::class)->name('dashboard');
    Route::get('/painel-de-controle-administrador', Master::class)
        ->name('master-panel');
    Route::get('/', Panel::class)->name('dashboard');
    Route::get('', Panel::class)->name('dashboard');
});



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'registerLogging'
])->group(function () {

    Route::post('/upload-editor', function (Request $request) {
        $file = $request->file('file');
        $url = $file->store('public/uploads');
        return Storage::url($url);
    })->name('upload-editor');
});

// Configurations pageAccess 1
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'registerLogging',
    'pagesAccess:1'
])->group(function () {
    Route::get('/configurações-da-página', Configuration::class)
        ->name('configuration')
        ->middleware('admin.access');
    Route::get('/opções-finalidade', Finalities::class)
        ->name('finality');
    Route::get('/opções-tipo-do-imóvel', Types::class)
        ->name('type');
    Route::get('/opções-características-extras', Features::class)
        ->name('features');
});
// Usuários pageAccess 2
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'registerLogging',
    'pagesAccess:2'
])->group(function () {
    Route::get('/usuários', ListUser::class)
        ->name('list-users');
    Route::get('/acessos-do-usuários/{user}', UserAccesses::class)
        ->name('user.access');
});
// Cadastros pageAccess 3
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'registerLogging',
    'pagesAccess:3'
])->group(function () {
    Route::get('/cadastros-geral', Generals::class)
        ->name('general');
});
// Cadastros pageAccess 4
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'registerLogging',
    'pagesAccess:4'
])->group(function () {
    Route::get('/imoveis', Properties::class)
        ->name('property');
});
// Cadastros pageAccess 6
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'registerLogging',
    'pagesAccess:6'
])->group(function () {
    Route::get('/mídias-sociais', SocialMedia::class)
        ->name('social-media');
    Route::get('/inscritos', Subscribers::class)
        ->name('subscribers');
    Route::get('/emails-recebidos', PageEmails::class)
        ->name('emails');
});
