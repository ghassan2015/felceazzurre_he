<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\UserController;

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


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


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



Route::get('/login', [\App\Http\Controllers\Admin\Auth\AuthController::class, 'getLogin'])->name('login');
Route::post('admin/login', [\App\Http\Controllers\Admin\Auth\AuthController::class, 'postLogin'])->name('adminLoginPost');
Route::get('admin/logout', [\App\Http\Controllers\Admin\Auth\AuthController::class, 'logout'])->name('adminLogout');


Route::group(['middleware' => ['auth:admin','active_admin'],'prefix'=>'admins'], function () {
    // Admin Dashboard
    Route::get('/admin', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.index');

    Route::get('/analysis', [\App\Http\Controllers\Admin\DashboardController::class, 'statistics'])    ->name('admin.analysis');

    Route::group(['prefix' => 'roles', 'middleware' => 'can:roles'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\RoleController::class, 'index'])->name('admin.roles.index');
        Route::get('/getRoles', [\App\Http\Controllers\Admin\RoleController::class, 'gerRole'])->name('admin.roles.getRoles');
        Route::get('create', [\App\Http\Controllers\Admin\RoleController::class, 'create'])->name('admin.roles.create');
        Route::post('store', [\App\Http\Controllers\Admin\RoleController::class, 'saveRole'])->name('admin.roles.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\RoleController::class, 'edit'])->name('admin.roles.edit');
        Route::post('update/', [\App\Http\Controllers\Admin\RoleController::class, 'update'])->name('admin.roles.update');
        Route::post('updateStatus', [\App\Http\Controllers\Admin\RoleController::class, 'updateStatus'])->name('admin.roles.updateStatus');
        Route::post('delete', [\App\Http\Controllers\Admin\RoleController::class, 'delete'])->name('admin.roles.delete');

    });

    Route::group(['prefix' => 'admins','middleware' => 'can:admins'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Admin\AdminController::class, 'index'])->name('admin.admins.index');
        Route::get('/getAdmin', [\App\Http\Controllers\Admin\Admin\AdminController::class, 'getAdmin'])->name('admin.admins.getAdmin');
        Route::get('/create', [\App\Http\Controllers\Admin\Admin\AdminController::class, 'create'])->name('admin.admins.create');
        Route::post('/store/', [\App\Http\Controllers\Admin\Admin\AdminController::class, 'store'])->name('admin.admins.store');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\Admin\AdminController::class, 'edit'])->name('admin.admins.edit');
        Route::post('/update/', [\App\Http\Controllers\Admin\Admin\AdminController::class, 'update'])->name('admin.admins.update');
        Route::post('updateStatus', [\App\Http\Controllers\Admin\Admin\AdminController::class, 'updateStatus'])->name('admin.admins.updateStatus');
        Route::post('/delete', [\App\Http\Controllers\Admin\Admin\AdminController::class, 'delete'])->name('admin.admins.delete');
        Route::post('/excel', [\App\Http\Controllers\Admin\Admin\AdminController::class, 'excel'])->name('admin.admins.excel');

    });

    Route::group(['prefix' => 'categories','middleware' => 'can:categories'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/getAdmin', [\App\Http\Controllers\Admin\CategoryController::class, 'get_category'])->name('admin.getCategory');
        Route::get('/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/store/', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('edit/{id}', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::post('/update/', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.categories.update');
        Route::post('/delete', [\App\Http\Controllers\Admin\CategoryController::class, 'delete'])->name('admin.categories.delete');
        Route::post('/updateStatus', [\App\Http\Controllers\Admin\CategoryController::class, 'updateStatus'])->name('admin.categories.updateStatus');
        Route::post('/search', [\App\Http\Controllers\Admin\CategoryController::class, 'search'])->name('admin.categories.search');

    });


    Route::group(['prefix' => 'products','middleware' => 'can:products'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\ProductController::class, 'index'])->name('admin.products.index');
        Route::get('/getProduct', [\App\Http\Controllers\Admin\ProductController::class, 'getProduct'])->name('admin.getProduct');
        Route::get('/create', [\App\Http\Controllers\Admin\ProductController::class, 'create'])->name('admin.product.create');
        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('admin.product.edit');
        Route::post('/', [\App\Http\Controllers\Admin\ProductController::class, 'store'])->name('admin.product.store');
        Route::post('/update/', [\App\Http\Controllers\Admin\ProductController::class, 'update'])->name('admin.product.update');
        Route::post('/delete', [\App\Http\Controllers\Admin\ProductController::class, 'delete'])->name('admin.product.delete');
        Route::get('/categories/', [\App\Http\Controllers\Admin\ProductController::class, 'getCategory'])->name('admin.product.getcategory');
        Route::get('/{slug}', [\App\Http\Controllers\Admin\ProductController::class, 'show'])->name('admin.product.shows');

    });

    Route::group(['prefix' => 'posts','middleware' => 'can:posts'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Post\PostController::class, 'index'])->name('admin.posts.index');
        Route::get('/getPost', [\App\Http\Controllers\Admin\Post\PostController::class, 'getPost'])->name('admin.getPost');
        Route::post('/store', [\App\Http\Controllers\Admin\Post\PostController::class, 'store'])->name('admin.posts.store');
        Route::post('/update/', [\App\Http\Controllers\Admin\Post\PostController::class, 'update'])->name('admin.posts.update');
        Route::post('/delete', [\App\Http\Controllers\Admin\Post\PostController::class, 'delete'])->name('admin.posts.delete');

    });

    Route::group(['prefix' => 'stories','middleware' => 'can:stories' ], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Story\StroryController::class, 'index'])->name('admin.story.index');
        Route::get('/getStory', [\App\Http\Controllers\Admin\Story\StroryController::class, 'getStory'])->name('admin.story.getStory');
        Route::get('/create', [\App\Http\Controllers\Admin\Story\StroryController::class, 'create'])->name('admin.story.create');
        Route::post('/store', [\App\Http\Controllers\Admin\Story\StroryController::class, 'store'])->name('admin.story.store');

        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\Story\StroryController::class, 'edit'])->name('admin.story.edit');
        Route::post('/update/', [\App\Http\Controllers\Admin\Story\StroryController::class, 'update'])->name('admin.story.update');
        Route::post('/delete', [\App\Http\Controllers\Admin\Story\StroryController::class, 'delete'])->name('admin.story.delete');
    });
    Route::group(['prefix' => 'agent','middleware' => 'can:agent' ], function () {
        Route::get('/', [\App\Http\Controllers\Admin\Agent\AgentController::class, 'index'])->name('admin.agent.index');
        Route::get('/getAgent', [\App\Http\Controllers\Admin\Agent\AgentController::class, 'getAgent'])->name('admin.getAgent');
        Route::post('/', [\App\Http\Controllers\Admin\Agent\AgentController::class, 'store'])->name('admin.agent.store');
        Route::post('/update', [\App\Http\Controllers\Admin\Agent\AgentController::class, 'update'])->name('admin.agent.update');
        Route::post('/delete', [\App\Http\Controllers\Admin\Agent\AgentController::class, 'delete'])->name('admin.agent.delete');
    });
    Route::group(['prefix' => 'sliders','middleware' => 'can:sliders' ], function () {
        Route::get('/', [\App\Http\Controllers\Admin\SliderController::class, 'index'])->name('admin.slider.index');
        Route::get('/getSlider', [\App\Http\Controllers\Admin\SliderController::class, 'getSlider'])->name('admin.getSlider');
        Route::get('/add', [\App\Http\Controllers\Admin\SliderController::class, 'add'])->name('admin.slider.create');

        Route::post('/', [\App\Http\Controllers\Admin\SliderController::class, 'store'])->name('admin.slider.store');
        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\SliderController::class, 'edit'])->name('admin.slider.edit');

        Route::post('/update', [\App\Http\Controllers\Admin\SliderController::class, 'update'])->name('admin.slider.update');

        Route::post('/delete', [\App\Http\Controllers\Admin\SliderController::class, 'delete'])->name('admin.slider.delete');
    });
    Route::group(['prefix' => 'Video','middleware' => 'can:Video'], function () {

        Route::get('/edit/', [\App\Http\Controllers\Admin\VideoController::class, 'edit'])->name('admin.video.edit');
        Route::post('/update', [\App\Http\Controllers\Admin\VideoController::class, 'update'])->name('admin.video.update');
            });

    Route::group(['prefix' => 'content','middleware' => 'can:content'], function () {
        Route::get('/edit/', [\App\Http\Controllers\Admin\ContentController::class, 'edit'])->name('admin.content.edit');
        Route::post('/update', [\App\Http\Controllers\Admin\ContentController::class, 'update'])->name('admin.content.update');
    });
    Route::group(['prefix' => 'saponello','middleware' => 'can:saponello'], function () {
        Route::get('/edit/', [\App\Http\Controllers\Admin\SapomelloController::class, 'edit'])->name('admin.saponello.edit');
        Route::post('/update', [\App\Http\Controllers\Admin\SapomelloController::class, 'update'])->name('admin.saponello.update');
    });
    Route::group(['prefix' => 'Labrosan','middleware' => 'can:Labrosan'], function () {
        Route::get('/edit/', [\App\Http\Controllers\Admin\LabrosanController::class, 'edit'])->name('admin.Labrosan.edit');
        Route::post('/update', [\App\Http\Controllers\Admin\LabrosanController::class, 'update'])->name('admin.labronsan.update');
    });

    Route::group(['prefix' => 'settings','middleware' => 'can:settings'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\SettingController::class, 'index'])->name('admin.settings.index');
        Route::put('/update', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('admin.settings.update');
    });

    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('admin.profile.index');
        Route::post('/update', [\App\Http\Controllers\Admin\ProfileController::class, 'UpdateProfile'])->name('admin.profile.update');
        Route::get('/change_password', [\App\Http\Controllers\Admin\ProfileController::class, 'changePassword'])->name('admin.profile.changePassword');
        Route::post('/update_change_password', [\App\Http\Controllers\Admin\ProfileController::class, 'changePasswordProfile'])->name('admin.profile.changePasswordProfile');


    });



});
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {
    Route::get('/felceazzurra/location/agent/word', [\App\Http\Controllers\FrontController::class, 'agent'])->name('new_agent');

    Route::get('/profumalatuavita', [\App\Http\Controllers\FrontController::class, 'profumalatuavita'])->name('profumalatuavita');
    Route::get('/story-perfume', [\App\Http\Controllers\FrontController::class, 'storyPerfume'])->name('story-perfume');
    Route::get('/', [\App\Http\Controllers\FrontController::class, 'index'])->name('home');
    Route::get('labrosan', [\App\Http\Controllers\FrontController::class, 'labrosan'])->name('labrosan');
    Route::get('saponello', [\App\Http\Controllers\FrontController::class, 'saponello'])->name('saponello');

    Route::get('/{slug}', [\App\Http\Controllers\FrontController::class, 'category'])->name('category.index');
    Route::get('/{member}/{slug?}', [\App\Http\Controllers\FrontController::class, 'productByCategory'])->name('product.productByCategory');
    Route::get('/{member}/{category}/{product}', [\App\Http\Controllers\FrontController::class, 'show'])->name('product.show');
});
