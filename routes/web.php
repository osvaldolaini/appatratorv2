<?php

use App\Http\Controllers\Api\CourseController;
use App\Livewire\Admin\Question\Filter\Filters;
use App\Livewire\Admin\Configuration;
use App\Livewire\Admin\Course\CategoryCourses;
use App\Livewire\Admin\Course\Courses;
use App\Livewire\Admin\Course\Contents\ModuleContentEdit;
use App\Livewire\Admin\Course\CourseCreate;
use App\Livewire\Admin\Course\CourseDashboard;
use App\Livewire\Admin\Course\CourseDescription;
use App\Livewire\Admin\Course\CoursePivotCategories;
use App\Livewire\Admin\Course\CourseUpdate;
use App\Livewire\Admin\Course\CourseImage;
use App\Livewire\Admin\Course\CoursePackDescription;
use App\Livewire\Admin\Course\CoursePackPackage;
use App\Livewire\Admin\Course\CoursesPacks;
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
use App\Livewire\User\Apps\Treinaments\HomeTreinament;
use App\Livewire\User\CheckoutProd;
use App\Livewire\User\Courses\DashboardCourse;
use App\Livewire\User\Courses\DashboardModule;
use App\Livewire\User\InsertVouchers;
use App\Livewire\User\MyApps;
use App\Livewire\User\MyCourses;
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
//Api
Route::get('/apiCourses/{any}', [CourseController::class, 'course']);
Route::get('/apiCourses', [CourseController::class, 'index']);
Route::get('/apiCoursesDestaques', [CourseController::class, 'highlighted']);

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

//UPLOADS EDITOR DE TEXTO
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'registerLogging',
    'admin.access'
])->group(function () {
    Route::post('/upload-editor', function (Request $request) {
        $file = $request->file('file');
        $url = $file->store('public/uploads');
        return Storage::url($url);
    })->name('upload-editor');
});
//ADMIN
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

    Route::get('/cursos/dashboard/{course}', CourseDashboard::class)->name('course-dashboard');
    Route::get('/cursos/modulo/{course}', ModulesList::class)->name('module');
    Route::get('/cursos/modulo-novo/{course}', ModuleNew::class)->name('new-module');
    Route::get('/cursos/modulo-editar/{module}', ModuleEdit::class)->name('edit-module');
    Route::get('/cursos/modulo/conteúdo/{moduleContent}', ModuleContentEdit::class)->name('content-module');

        //Course Marketing
        Route::get('/cursos', Courses::class)->name('course');
        Route::get('/cursos/novo', CourseCreate::class)->name('new-course');
        Route::get('/cursos/{course}', CourseUpdate::class)->name('edit-course');
        Route::get('/cursos/descrição/{course}',CourseDescription::class)->name('course-descripition');
        Route::get('/cursos/categorias/{course}',CoursePivotCategories::class)->name('category-course-pivot');
        Route::get('/cursos/imagens/{course}',CourseImage::class)->name('course-images');
        Route::get('/categorias-de-curso',CategoryCourses::class)->name('category-course');
        Route::get('/cursos/valores/{course}',CoursesPacks::class)->name('course-values');
        Route::get('/cursos/valores/descrição/{packPivotCourse}',CoursePackDescription::class)->name('course-pack-description');
        Route::get('/cursos/valores/pacote/{packPivotCourse}',CoursePackPackage::class)->name('course-pack-package');

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
    Route::get('/meus-apps', MyApps::class)->name('user.apps');
    Route::get('/meus-cursos', MyCourses::class)->name('user.courses');
    Route::get('/meus-vouchers', MyVouchers::class)->name('user.vouchers');

    Route::get('/checkout-prod/{course}', CheckoutProd::class)->name('checkout-prod');
    Route::get('/inserir-vouchers', InsertVouchers::class)->name('checkout-success');
    Route::get('/inserir-vouchers', InsertVouchers::class,'error')->name('checkout-cancel');


    //redação
    Route::get('/app-de-redação', HomeEssay::class)->name('apps.essays');
    Route::get('/app-de-redação/minhas-redações', MyEssays::class)->name('apps.user-essay');
    Route::get('/app-de-redação/temas-propostos', ProposalTopic::class)->name('apps.proposal-topics');
    //questões
    Route::get('/app-de-questões', HomeQuestions::class)->name('apps.questions');
    Route::get('/app-de-questões/home', Stats::class)->name('apps.stats');

    //treinamento físico
    Route::get('/app-de-treinamento', HomeTreinament::class)->name('apps.treinaments');
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

//Courses
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'registerLogging'
])->group(function () {
    //lobby
    Route::get('/curso/{course:code}', DashboardCourse::class)->name('dashboard-course');
    Route::get('/curso/{course:code}/modulo/{module:code}', DashboardModule::class)->name('dashboard-module');
});
