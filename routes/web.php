<?php

use App\Livewire\Admin\Question\Filter\Filters;
use App\Livewire\Admin\Configuration;
use App\Livewire\Admin\ListUser;
use App\Livewire\Admin\Panel;
use App\Livewire\Admin\Dashboard\Master;
use App\Livewire\Admin\Question\Filter\Disciplines;
use App\Livewire\Admin\Question\Filter\EducationAreas;
use App\Livewire\Admin\Question\Filter\ExaminingBoards;
use App\Livewire\Admin\Question\Filter\Institutions;
use App\Livewire\Admin\Question\Filter\Levels;
use App\Livewire\Admin\Question\Filter\Matters;
use App\Livewire\Admin\Question\Filter\Modalities;
use App\Livewire\Admin\Question\Filter\OccupationAreas;
use App\Livewire\Admin\Question\Filter\Offices;
use App\Livewire\Admin\Question\Filter\SubMatters;
use App\Livewire\Admin\Voucher\Plan;
use App\Livewire\Admin\Voucher\Voucher;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'registerLogging',
])->group(function () {
    Route::get('/usuários', ListUser::class)
        ->name('list-users');
    Route::get('/planos', Plan::class)
        ->name('plans');
    Route::get('/vouchers', Voucher::class)
        ->name('vouchers');
    //Questions

    //Filters
    Route::get('/filtros', Filters::class)
    ->name('filters');
    Route::get('/filtros/áreas-de-atuação', OccupationAreas::class)
    ->name('occupationArea');
    Route::get('/filtros/áreas-de-formação', EducationAreas::class)
    ->name('educationArea');
    Route::get('/filtros/bancas', ExaminingBoards::class)
    ->name('examiningBoard');
    Route::get('/filtros/cargos', Offices::class)
    ->name('office');
    Route::get('/filtros/disciplinas', Disciplines::class)
    ->name('discipline');
    Route::get('/filtros/instituições', Institutions::class)
    ->name('institution');
    Route::get('/filtros/níveis-de-formação', Levels::class)
    ->name('level');
    Route::get('/filtros/matérias', Matters::class)
    ->name('matter');
    Route::get('/filtros/modalidades', Modalities::class)
    ->name('modality');
    Route::get('/filtros/sub-topicos-das-matérias', SubMatters::class)
    ->name('subMatter');
});
