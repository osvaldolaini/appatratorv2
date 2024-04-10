<?php

use App\Livewire\Admin\Question\Filter\Filters;
use App\Livewire\Admin\Configuration;
use App\Livewire\Admin\Course\Courses;
use App\Livewire\Admin\Course\Contents\ModuleContentEdit;
use App\Livewire\Admin\Course\Modules\ModuleEdit;
use App\Livewire\Admin\Course\Modules\ModuleNew;
use App\Livewire\Admin\Course\Modules\ModulesList;
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
use App\Livewire\User\Lobby;
use App\Livewire\Admin\Mentoring\ContestDisciplines;
use App\Livewire\Admin\Mentoring\ContestMatters;
use App\Livewire\Admin\Mentoring\Contests;
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
use App\Livewire\Admin\Question\Question;
use App\Livewire\Admin\Question\QuestionAlternative;
use App\Livewire\Admin\Question\QuestionConfigs;
use App\Livewire\Admin\Question\QuestionCorrect;
use App\Livewire\Admin\Question\QuestionCreate;
use App\Livewire\Admin\Question\QuestionUpdate;
use App\Livewire\Admin\Treinament\Exercises;
use App\Livewire\Admin\Voucher\Plan;
use App\Livewire\Admin\Voucher\Voucher;
use App\Livewire\User\Apps\Essay\HomeEssay;
use App\Livewire\User\Apps\Essay\MyEssays;
use App\Livewire\User\Apps\Essay\ProposalTopic;
use App\Livewire\User\Apps\Mentoring\MentoringContestUser;
use App\Livewire\User\Apps\Treinaments\ListExercises;
use App\Livewire\User\Apps\Treinaments\SeasonExercises;
use App\Livewire\User\Apps\Treinaments\SeasonTreinaments;
use App\Livewire\User\Apps\Treinaments\SeasonUser;
use App\Livewire\User\Apps\Treinaments\StatsTreinaments;
use App\Livewire\User\Apps\Treinaments\Trainings;
use App\Livewire\User\Apps\Treinaments\TrainingUpdate;
use App\Livewire\User\Apps\Mentoring\MentoringController;
use App\Livewire\User\Apps\Mentoring\MentoringControllerCycleUser;
use App\Livewire\User\Apps\Mentoring\MentoringEssaysUser;
use App\Livewire\User\Apps\Mentoring\MentoringPlanningCyclesUser;
use App\Livewire\User\Apps\Mentoring\MentoringPlanningDailyUser;
use App\Livewire\User\Apps\Mentoring\MentoringPlanningTasksUser;
use App\Livewire\User\Apps\Mentoring\MentoringPlanningUser;
use App\Livewire\User\Apps\Mentoring\MentoringPlanningWeekUser;
use App\Livewire\User\Apps\Mentoring\MentoringQuestionsChart;
use App\Livewire\User\Apps\Mentoring\MentoringReviewsUser;
use App\Livewire\User\Apps\Mentoring\MentoringSimulatedsUser;
use App\Livewire\User\Apps\Questions\HomeQuestions;
use App\Livewire\User\Apps\Questions\Stats;
use App\Livewire\User\MyVouchers;
use App\Livewire\User\UserProfile;
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
    'admin.access'
])->group(function () {
    Route::get('/painel-de-controle-administrador', Master::class)
        ->name('master-panel');
    Route::get('/usuários', ListUser::class)
        ->name('list-users');
    Route::get('/planos', Plan::class)
        ->name('plans');
    Route::get('/vouchers', Voucher::class)
        ->name('vouchers');
    //Courses
    Route::get('/cursos', Courses::class)->name('course');
    Route::get('/cursos/modulo/{course}', ModulesList::class)->name('module');
    Route::get('/cursos/modulo-novo/{course}', ModuleNew::class)->name('new-module');
    Route::get('/cursos/modulo-editar/{module}', ModuleEdit::class)->name('edit-module');

    Route::get('/cursos/modulo/conteúdo/{moduleContent}', ModuleContentEdit::class)->name('content-module');


    //Questions
    Route::get('/questões', Question::class)->name('question');
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

//App
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'registerLogging'
])->group(function () {
    //lobby
    Route::get('/lobby', Lobby::class)->name('lobby');
    Route::get('/meus-dados', UserProfile::class)->name('profile.user');
    Route::get('/meus-vouchers', MyVouchers::class)->name('user.vouchers');

    // Route::get('/questões', Lobby::class)->name('apps.questions');
    // Route::get('/treinamento-físico', Lobby::class)->name('apps.treinaments');
    // Route::get('/mentoria', Lobby::class)->name('apps.mentorings');
    //redação
    Route::get('/app-de-redação', HomeEssay::class)->name('apps.essays');
    Route::get('/app-de-redação/minhas-redações', MyEssays::class)->name('apps.user-essay');
    Route::get('/app-de-redação/temas-propostos', ProposalTopic::class)->name('apps.proposal-topics');
    //questões
    Route::get('/app-de-questões', HomeQuestions::class)->name('apps.questions');
    Route::get('/app-de-questões/home', Stats::class)->name('apps.stats');

    //treinamento físico
    Route::get('/app-de-treinamento', SeasonUser::class)->name('apps.treinaments');
    Route::get('/app-de-treinamento/concursos', SeasonUser::class)->name('apps.season');
    Route::get('/app-de-treinamento/concursos/exercicios/{season}', SeasonExercises::class)->name('apps.season.exercises');
    Route::get('/app-de-treinamento/meus-exercícios-propostos', ListExercises::class)->name('apps.user.exercises');
    Route::get('/app-de-treinamento/concursos/treino/{season}', SeasonTreinaments::class)->name('apps.season.treinaments');
    Route::get('/app-de-treinamento/concursos/novo-treino/{season}', Trainings::class)->name('apps.season.treining');
    Route::get('/app-de-treinamento/concursos/editar-treino/{seasonTreinament}', TrainingUpdate::class)->name('apps.season.treiningUpdate');
    Route::get('/app-de-treinamento/concursos/estatisticas/{season}', StatsTreinaments::class)->name('apps.season.stats');

    //mentoria
    Route::get('/app-de-mentoria', MentoringController::class)->name('apps.mentorings');
    Route::get('/meu-concurso', MentoringContestUser::class)->name('apps.contest.user');
    Route::get('/app-de-mentoria/redações', MentoringEssaysUser::class)->name('apps.contestEssays.user');
    Route::get('/app-de-mentoria/simulados', MentoringSimulatedsUser::class)->name('apps.contestSimulateds.user');
    Route::get('/app-de-mentoria/questões', MentoringQuestionsChart::class)->name('apps.contestQuestionsChart.user');
    Route::get('/app-de-mentoria/revisões', MentoringReviewsUser::class)->name('apps.contestReviews.user');
    Route::get('/app-de-mentoria/meu-planejamento', MentoringPlanningUser::class)->name('apps.contestPlanningUser.user');
    Route::get('/app-de-mentoria/meu-planejamento/{contestPlanningUser:code}', MentoringPlanningDailyUser::class)->name('apps.contestPlanningDailyUser.user');

    Route::get('/app-de-mentoria/planejamento-da-semana', MentoringPlanningWeekUser::class)->name('apps.contestPlanningWeekUser.user');
    Route::get('/app-de-mentoria/tarefas-diárias', MentoringPlanningTasksUser::class)->name('apps.contestPlanningTasksUser.user');
    Route::get('/app-de-mentoria/tarefas-diárias/{contestPlanningUser:code}', MentoringPlanningTasksUser::class)->name('apps.contestPlanningTaskUser.user');

    Route::get('/app-de-mentoria/planejamento-por-ciclo', MentoringPlanningCyclesUser::class)->name('apps.contestPlanningCyclesUser.user');
    Route::get('/app-de-mentoria/ciclo', MentoringControllerCycleUser::class)->name('apps.contestControllerCycleUser.user');
});
