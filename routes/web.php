<?php


use App\Livewire\Admin\Question\Filter\Filters;
use App\Livewire\Admin\Configuration;
use App\Livewire\Admin\ListUser;
use App\Livewire\Admin\Panel;
use App\Livewire\Admin\Dashboard\Master;
use App\Livewire\Admin\Essay\Essays;
use App\Livewire\Admin\Essay\EssaySkills;
use App\Livewire\Admin\Essay\Rating\Ratings;
use App\Livewire\Admin\Essay\Skills;
use App\Livewire\Admin\Essay\Topics;
use App\Livewire\Admin\Essay\TopicsBase;
use App\Livewire\Admin\Essay\TopicsProposal;
use App\Livewire\Admin\Mentoring\ContestDisciplines;
use App\Livewire\Admin\Mentoring\ContestMatters;
use App\Livewire\Admin\Mentoring\Contests;
use App\Livewire\Admin\Question\Question;
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
use App\Livewire\Admin\Question\QuestionAlternative;
use App\Livewire\Admin\Question\QuestionConfigs;
use App\Livewire\Admin\Question\QuestionCorrect;
use App\Livewire\Admin\Question\QuestionCreate;
use App\Livewire\Admin\Question\QuestionUpdate;
use App\Livewire\Admin\Treinament\Exercises;
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
    Route::get('/questões', Question::class)->name('questions');
    Route::get('/questões/nova', QuestionCreate::class)->name('new-question');
    Route::get('/questões/{questions}', QuestionUpdate::class)->name('edit-question');
    Route::get('/questões/configurações/{questions}', QuestionConfigs::class)->name('config-question');
    Route::get('/questões/alternativas/{questions}', QuestionAlternative::class)->name('alternative-question');
    Route::get('/questões/resposta-correta/{questions}', QuestionCorrect::class)->name('correct-question');
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
    //Treinament
    Route::get('/exercícios', Exercises::class)->name('exercises');
    //Essay
    Route::get('/competências', Skills::class)->name('skills');
    Route::get('/concursos', Essays::class)->name('essays');
    Route::get('/concursos/competências/{essay}', EssaySkills::class)->name('essays-skills');
    Route::get('/temas-para-redação', Topics::class)->name('topics');
    Route::get('/temas-para-redação/texto/{topic}', TopicsBase::class)->name('topics-base');
    Route::get('/temas-para-redação/proposta-do-tema/{topic}', TopicsProposal::class)->name('topics-proposal');

    // Route::get('/redações', AllEssays::class)->name('essays.all');
    Route::get('/avaliação/{essayUser}', Ratings::class)->name('essays.rating');
    //Mentoring
    Route::get('/mentoria', Contests::class)->name('contests');
    Route::get('/mentoria/disciplinas/{contest}', ContestDisciplines::class)->name('contestDiscipline');
    Route::get('/mentoria/disciplinas/matérias/{contestDiscipline}', ContestMatters::class)->name('contestMatters');
});
