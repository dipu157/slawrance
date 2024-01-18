<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Common\MessageController;
use App\Http\Controllers\Menu\MenuController;
use App\Http\Controllers\Common\SliderController;
use App\Http\Controllers\Menu\SubMenuController;
use App\Http\Controllers\Frontend\FrontHomeController;
use App\Http\Controllers\Institute\InstituteController;
use App\Http\Controllers\Members\BoardMemberController;
use App\Http\Controllers\Members\TeacherController;
use App\Http\Controllers\Menu\MenuPageController;
use App\Http\Controllers\Notice\EventsController;
use App\Http\Controllers\Notice\NewsController;
use App\Http\Controllers\Notice\NoticeController;
use Illuminate\Support\Facades\Route;

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

#Route::get('/', function () { return view('Frontend.landpage'); });
Route::get('/', [FrontHomeController::class, 'index'])->name('frontHomeIndex');
Route::get('/admin/login', function () { return view('auth.login'); });


Route::get('/dashboard', function () { return view('dashboard');})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    // User Registration Route
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    // User Profile Route
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['namespace' => 'Institute', 'middleware' => ['auth']], function () {

    //  Institute Manage Route
    Route::get('/instituteIndex',[InstituteController::class, 'index'])->name('manageInstitute');
    Route::get('/institutedata', [InstituteController::class, 'getAllInstitute'])->name('institutedata');
    Route::post('/saveInstitute', [InstituteController::class, 'create'])->name('saveInstitute');
    Route::get('/editInstitute', [InstituteController::class, 'edit'])->name('editInstitute');
    Route::post('/InstituteUpdate', [InstituteController::class, 'update'])->name('InstituteUpdate');


});

Route::group(['namespace' => 'Message', 'middleware' => ['auth']], function () {

    //  Institute Manage Route
    Route::get('/messageIndex',[MessageController::class, 'index'])->name('messageIndex');
    Route::get('/messageData', [MessageController::class, 'getAllMessage'])->name('messageData');
    Route::post('/saveMessage', [MessageController::class, 'create'])->name('saveMessage');
    Route::get('/editMessage', [MessageController::class, 'edit'])->name('editMessage');
    Route::post('/messageUpdate', [MessageController::class, 'update'])->name('updateMessage');
    Route::delete('/deleteMessage', [MessageController::class, 'delete'])->name('deleteMessage');


});

Route::group(['namespace' => 'Members', 'middleware' => ['auth']], function () {

    //  Members Manage Route
    Route::get('/boardMemberIndex',[BoardMemberController::class, 'index'])->name('boardMembers');
    Route::get('/boardMemberdata', [BoardMemberController::class, 'getAllMemebers'])->name('boardMemberdata');
    Route::post('/saveBMember', [BoardMemberController::class, 'create'])->name('save');
    Route::get('/editMember', [BoardMemberController::class, 'edit'])->name('edit');
    Route::post('/memberUpdate', [BoardMemberController::class, 'update'])->name('update');
    Route::delete('/deleteMember', [BoardMemberController::class, 'delete'])->name('delete');

    // Teacher Manage Route
    Route::get('/teacherIndex',[TeacherController::class, 'index'])->name('teacherIndex');
    Route::get('/teacherData', [TeacherController::class, 'getAllTeacher'])->name('teacherData');
    Route::post('/saveTeacher', [TeacherController::class, 'create'])->name('saveTeacher');
    Route::get('/editTeacher', [TeacherController::class, 'edit'])->name('editTeacher');
    Route::post('/updateTeacher', [TeacherController::class, 'update'])->name('updateTeacher');
    Route::delete('/deleteTeacher', [TeacherController::class, 'delete'])->name('deleteTeacher');

});

Route::group(['namespace' => 'Menu', 'middleware' => ['auth']], function () {

    //  Menu Manage Route
    Route::get('/menuIndex',[MenuController::class, 'index'])->name('manageMenu');
    Route::get('/menuData', [MenuController::class, 'getAllMenus'])->name('menuData');
    Route::post('/savemenu', [MenuController::class, 'create'])->name('saveMenu');
    Route::get('/editmenu', [MenuController::class, 'edit'])->name('editMenu');
    Route::post('/updatemenu', [MenuController::class, 'update'])->name('updateMenu');
    Route::delete('/deletemenu', [MenuController::class, 'delete'])->name('deleteMenu');

    Route::get('/menu/{id}', [MenuController::class, 'show'])->name('menu.show');

    //  SubMenu Manage Route
    Route::get('/submenuIndex',[SubMenuController::class, 'index'])->name('manageSubMenu');
    Route::get('/submenuData', [SubMenuController::class, 'getAllSubmenu'])->name('submenuData');
    Route::post('/savesub', [SubMenuController::class, 'create'])->name('savesub');
    Route::get('/editsub', [SubMenuController::class, 'edit'])->name('editsub');
    Route::post('/updatesub', [SubMenuController::class, 'update'])->name('updatesub');
    Route::delete('/deletesub', [SubMenuController::class, 'delete'])->name('deletesub');

    //  Menu Page Route
    Route::get('/menuPageIndex',[MenuPageController::class, 'index'])->name('menuPageIndex');
    Route::get('/menuPageData', [MenuPageController::class, 'getAllmenuPage'])->name('menuPageData');
    Route::post('/savemenupage', [MenuPageController::class, 'create'])->name('savemenupage');
    Route::get('/editmenupage', [MenuPageController::class, 'edit'])->name('editmenupage');
    Route::post('/updatemenupage', [MenuPageController::class, 'update'])->name('updatemenupage');
    Route::delete('/deletemenupage', [MenuPageController::class, 'delete'])->name('deletemenupage');

});

Route::group(['namespace' => 'Slider', 'middleware' => ['auth']], function () {

    //  Slider Manage Route
    Route::get('/sliderindex',[SliderController::class, 'index'])->name('manageSlider');
    Route::get('/sliderdata', [SliderController::class, 'getAllSlider'])->name('sliderdata');
    Route::post('/saveSlider', [SliderController::class, 'create'])->name('save');
    Route::get('/editSlider', [SliderController::class, 'edit'])->name('edit');
    Route::post('/sliderUpdate', [SliderController::class, 'update'])->name('update');
    Route::delete('/sliderDelete', [SliderController::class, 'delete'])->name('delete');

});

Route::group(['namespace' => 'Notice', 'middleware' => ['auth']], function () {

    //  Notice Manage Route
    Route::get('/noticeIndex',[NoticeController::class, 'index'])->name('manageNotice');
    Route::get('/noticeData', [NoticeController::class, 'getAllNotice'])->name('noticeData');
    Route::post('/savenotice', [NoticeController::class, 'create'])->name('saveNotice');
    Route::get('/editnotice', [NoticeController::class, 'edit'])->name('editNotice');
    Route::post('/updatenotice', [NoticeController::class, 'update'])->name('updateNotice');
    Route::delete('/deletenotice', [NoticeController::class, 'delete'])->name('deleteNotice');

    //  Important Notice Route
    Route::get('/inoticeIndex',[NoticeController::class, 'inoticeIndex'])->name('manageInotice');
    Route::get('/inoticeData', [NoticeController::class, 'getAllInotice'])->name('inoticeData');
    Route::post('/saveInotice', [NoticeController::class, 'createInotice'])->name('saveInotice');
    Route::get('/editInotice', [NoticeController::class, 'editInotice'])->name('editInotice');
    Route::post('/updateInotice', [NoticeController::class, 'updateInotice'])->name('updateInotice');
    Route::delete('/deleteInotice', [NoticeController::class, 'deleteInotice'])->name('deleteInotice');

    //  News Manage Route
    Route::get('/newsIndex',[NewsController::class, 'index'])->name('manageNews');
    Route::get('/newsData', [NewsController::class, 'getAllNews'])->name('newsData');
    Route::post('/savenews', [NewsController::class, 'create'])->name('savenews');
    Route::get('/editnews', [NewsController::class, 'edit'])->name('editnews');
    Route::post('/updatenews', [NewsController::class, 'update'])->name('updatenews');
    Route::delete('/deletenews', [NewsController::class, 'delete'])->name('deletenews');

    //  events Manage Route
    Route::get('/eventsIndex',[EventsController::class, 'index'])->name('manageEvents');
    Route::get('/eventsData', [EventsController::class, 'getAllEvent'])->name('eventsData');
    Route::post('/saveevents', [EventsController::class, 'create'])->name('saveEvents');
    Route::get('/editevents', [EventsController::class, 'edit'])->name('editEvents');
    Route::post('/updateevents', [EventsController::class, 'update'])->name('updateEvents');
    Route::delete('/deleteevents', [EventsController::class, 'delete'])->name('deleteEvents');

});



require __DIR__.'/auth.php';
