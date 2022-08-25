<?php

use App\Http\Controllers\Admin\ChatsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Event\EventController;
use App\Http\Controllers\Admin\Jobs\JobsAppliedController;
use App\Http\Controllers\Admin\Jobs\JobsCategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\QrCodeController;
use App\Http\Controllers\Admin\User\ProfileController;
use App\Http\Controllers\Admin\User\UserSettingController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\Admin\Post\ArticleController;
use App\Http\Controllers\Admin\Post\CategoryController;
use App\Http\Controllers\Admin\Post\UploadController;
use App\Http\Controllers\Admin\Settings\ConfigurationController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ScreenController;
use App\Http\Controllers\Frontend\ScreensController;
use App\Http\Controllers\Admin\Jobs\JobsController;
use App\Http\Controllers\Admin\Post\TagController;
use App\Http\Controllers\Admin\Prosiding\NaskahController;
use App\Http\Controllers\Admin\Prosiding\PembayaranController;
use App\Http\Controllers\Admin\Prosiding\PesertaController;
use App\Http\Controllers\Admin\Prosiding\ProsidingController;
use App\Http\Controllers\Admin\Prosiding\BidangIlmuController;
use App\Http\Controllers\Frontend\JobsController as FrontendJobsController;
use App\Http\Controllers\Admin\Settings\RolePermissionController;
use App\Http\Controllers\Prosiding\CustomerCareController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/post/{slug}', [ScreenController::class, 'post']);
Route::get('/posts', [ScreensController::class, 'posts']);
Route::get('/jobs/{slug}', [FrontendJobsController::class, 'show'])->name('jobs-detail');
Route::get('/jobs', [FrontendJobsController::class, 'index'])->name('jobs-list');
Route::post('apply', [FrontendJobsController::class, 'store'])->name('jobs-apply');


// BACKEND DASHBOARD
Route::group(['middleware' => ['role:super admin|writer|admin|peserta']], function () {
    Route::get('qrcodes', [QrCodeController::class, 'index']);
    Route::resource('friends', FriendsController::class);
    Route::controller(FriendsController::class)->group(function(){
        Route::get('/friends', 'friends')->name('profile.friends');
        Route::get('/friends/add/{id}', 'add')->name('addfriends');
        Route::get('/friends/delete/{id}', 'unfriends')->name('profile.friends.delete');
    });

    Route::prefix('cms')->group(function (){
        // data prosiding
        Route::prefix('prosiding')->group(function (){
            // menu peserta
            Route::resource('upload-naskah', NaskahController::class);
            Route::resource('upload-pembayaran', PembayaranController::class);

            Route::get('info', [ProsidingController::class, 'info'])->name('prosiding.info');
            Route::get('info/{slug}', [ProsidingController::class, 'infoDetail'])->name('prosiding.info-detail');
            Route::get('seminar', [ProsidingController::class, 'seminar'])->name('prosiding.seminar');
            Route::get('sertifikat', [ProsidingController::class, 'sertifikat'])->name('prosiding.sertifikat');
            Route::get('upload-naskah', [NaskahController::class, 'upload'])->name('prosiding.upload-naskah');
            Route::get('bukti-pembayaran', [PembayaranController::class, 'uploadPembayaran'])->name('prosiding.bukti-pembayaran');

            // admin access
            Route::group(['middleware' => ['role:admin|super admin|writer']], function () {
                Route::get('peserta', [PesertaController::class, 'index'])->name('prosiding.peserta');
                Route::get('naskah', [NaskahController::class, 'naskah'])->name('prosiding.naskah');
                Route::get('pembayaran', [PembayaranController::class, 'index'])->name('prosiding.pembayaran');

                Route::get('info-prosiding', [ArticleController::class, 'infoProsiding'])->name('prosiding.table-info-prosiding');
                Route::resource('event', EventController::class);
                Route::resource('bidang-ilmu', BidangIlmuController::class);
                Route::resource('customer-care', CustomerCareController::class);

            });
        });


        Route::resource('articles', ArticleController::class);
        Route::resource('categories', CategoryController::class);
        Route::resource('tags', TagController::class);

        Route::resource('chats', ChatsController::class);
        Route::resource('userssetting', UserSettingController::class);
        Route::post('changepassword', [UserSettingController::class, 'changePassword'])->name('changepassword');
        Route::controller(ProfileController::class)->group(function(){
            Route::get('/profile', 'index')->name('profile.index');
        });

        Route::resource('configuration', ConfigurationController::class);
    });

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::group(['middleware' => ['role:super admin|admin']], function () {
    Route::resource('users', UserController::class);
    Route::get('/user/trashed', [UserController::class, 'showTrashed'])->name('usershowTrashed');

    // role permission
    Route::resource('role-permission', RolePermissionController::class);
    Route::get('/permission', [RolePermissionController::class, 'createPermission'])->name('permission');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('phpinfo', fn () => phpinfo());
