<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\AdminController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Home\SettingController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\Condition_ol;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UniversityController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\CourseTypeController;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\PDFController;


//end
Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('home', function () {
        return view('index');
    });
});

Route::middleware(['auth', 'auth.session'])->group(function () {
    Route::get('/', [AuthController::class, 'index']);
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
    Route::get('login', 'login');
    Route::post('login', 'loginAction');
    //login
    //end
    Route::post('/logout', 'logout')->name('logout');
});

Route::get('change_pass', [ChangePasswordController::class, 'showChangePasswordForm']);
Route::post('change_pass', [ChangePasswordController::class, 'changePassword']);

Route::get('logout', function () {
    if (session()->has('email')) {
        session()->pull('email', null);
    }
    return redirect('login');
});


//Enquiry fetch directly from the table on the basis of frontend form 
Route::get('view_enquiry', [EnquiryController::class, 'View']);
//Enquiry end

//Contact fetch directly from the table on the basis of frontend form 
Route::get('view_contact', [ContactController::class, 'View']);

//Contact end
Route::get('add_universities', [UniversityController::class, 'index']);
Route::post('add_universities', [UniversityController::class, 'store']);
Route::get('view_universities', [UniversityController::class, 'ViewForm']);
Route::get('/university/{id}', [UniversityController::class, 'show'])->name('university.view');
Route::get('/university_edit/{id}', [UniversityController::class, 'editUniversity'])->name('university.edit');
Route::post('/university_update/{id}', [UniversityController::class, 'updateUniversity'])->name('university.update');
Route::get('/university/delete/{id}', [UniversityController::class, 'deleteUniversity'])->name('university.delete');
Route::post('/update_university_status', [UniversityController::class, 'update_university_status']);
Route::post('/update_university_authorization', [UniversityController::class, 'update_university_authorization']);
//routes/web.php
Route::post('/update-status', 'UniversityController@updateStatus');

Route::get('add_courses', [CoursesController::class, 'add']);
Route::post('add_courses', [CoursesController::class, 'store']);

Route::get('view_courses', [CoursesController::class, 'viewCoursesData']);
Route::post('/update_course_status', [CoursesController::class, 'update_course_status']);

Route::get('edit_course_data/{id}', [CoursesController::class, 'editcoursedata']);
Route::post('edit_course_data', [CoursesController::class, 'updatecoursedata']);

Route::get('/course/edit/{id}', [CoursesController::class, 'editcourse'])->name('course.edit');
Route::post('/course/update/{id}', [CoursesController::class, 'updatecourse'])->name('course.update');
Route::get('/course/{id}', [CoursesController::class, 'show'])->name('course.view');
Route::post('/getcourseeli', [CourseTypeController::class, 'get_course_eli']);
//Map Courses
Route::get('mapCourses/{id}', [CoursesController::class, 'viewMapCourses']);
Route::post('mapCourses/{id}', [CoursesController::class, 'addMapCourses']);
Route::get('view_mapCourses/{id}', [CoursesController::class, 'viewMappedCourses']);
Route::post('check_course', [CoursesController::class, 'checkCourse']);
Route::post('del_mapcourse', [CoursesController::class, 'delMapCourses']);
Route::get('editmapcourse/{crs_id}/{uni_id}', [CoursesController::class, 'edit_mapcrs']);
Route::post('update_mapcourse', [CoursesController::class, 'updateMapCourses']);


Route::get('importPage', [UniversityCoursesController::class, 'viewImportPage']);

//Course Type
Route::get('create_course_type', [CourseTypeController::class, 'show']);
Route::post('create_course_type_add', [CourseTypeController::class, 'add']);

//deletehandelroute
Route::post('delete_record', [DeleteController::class, 'deleterecord']);

// Route::get('/coursetype/delete/{id}', [CourseTypeController::class, 'deletecoursetype'])->name('coursetype.delete');


Route::get('create_course_category', [CourseCategoryController::class, 'show']);
Route::post('create_course_category', [CourseCategoryController::class, 'add']);
Route::get('/course_category/{id}', [CourseCategoryController::class, 'delete'])->name('course_category.delete');
Route::get('/edit_course_category/{id}', [CourseCategoryController::class, 'update_cat']);
Route::post('updatecoursecat', [CourseCategoryController::class, 'updatecoursecat']);


//agents
Route::get('add_agents', [AgentController::class, 'agents']);
Route::post('add_agents', [AgentController::class, 'addagent']);
Route::get('view_agents', [AgentController::class, 'view_agents']);
Route::get('view_subagents', [AgentController::class, 'view_subagents']);
Route::get('viewdetail_agents/{id}', [AgentController::class, 'view_detail_agent']);
Route::get('editagent/{id}', [AgentController::class, 'editagent']);
Route::post('updateagent', [AgentController::class, 'updateagent']);
Route::post('view_agents', [AgentController::class, 'updateagentstatus']);
Route::post('deleteagent', [AgentController::class, 'deleteagent']);
Route::post('/update_agent_status', [AgentController::class, 'update_agent_status']);
Route::post('/get_agent_detail', [AgentController::class, 'get_agent_detail']);

//student
Route::get('add_student', [StudentController::class, 'students']);
Route::post('add_student', [StudentController::class, 'add_student']);
Route::get('view_student', [StudentController::class, 'view_student']);
Route::get('view_detail_student/{id}', [StudentController::class, 'view_detail_student']);
Route::get('editstudent/{id}', [StudentController::class, 'editstudent']);
Route::post('editstudent', [StudentController::class, 'updatestudent']);
Route::post('deletestudent', [StudentController::class, 'deletestudent']);
Route::post('/update_student_status', [StudentController::class, 'update_student_status']);


//Profile settings
Route::get('profile', [ProfileController::class, 'profile']);
Route::post('profile', [ProfileController::class, 'updatesetting']);
//end

Route::get('test', [AgentController::class, 'test']);

// settings
Route::get('settings', [ProfileController::class, 'settings']);
Route::post('settings', [ProfileController::class, 'updatesitesetting']);


// Enquiry
// Route::get('view_courses', [EnquiryController::class, 'View']);
// Route::get('view_enquiry', [EnquiryController::class, 'View']);
// Route::get('/course/edit/{id}', [EnquiryController::class, 'editcourse'])->name('course.edit');
// Route::get('/course/delete/{id}', [EnquiryController::class, 'deletecourse'])->name('course.delete');

// Route::get('test', function () {
//     return view('test');
// });



// applications

Route::get('/view_application', [StudentController::class, 'application']);

Route::post('/application_status', [StudentController::class, 'update_application_status']);

Route::post('/enquiry_status', [StudentController::class, 'update_enquiry_status']);


// Commissions
Route::post('/generate_commission', [AgentController::class, 'generate_commission']);

Route::get('/view_commissions', [AgentController::class, 'commissions']);



// agent's Student

Route::post('/agent_student', [StudentController::class, 'get_agent_student']);

// student's Application
Route::post('/student_application', [StudentController::class, 'get_student_application']);


// agent status


Route::post('/ol_gen_mail', [SendMailController::class, 'index']);
Route::post('/stu_con_mail', [SendMailController::class, 'stu_confirm']);

// offer letter upload

Route::get('/offerLetter_upload/{stu_id}/{uni_id}/{course_id}', [StudentController::class, 'offer_letter']);

Route::post('/doc_pdf', [StudentController::class, 'gen_doc_pdf']);

Route::post('/upload_offerletter', [StudentController::class, 'upload_offer_letter']);

Route::get('gen_pdf', [PDFController::class, 'generatePDF']);

// offerLetter

Route::get('create_ol',[Condition_ol::class, 'view_form']);
Route::post('add_ol',[Condition_ol::class, 'add_condition_ol']);
Route::get('view_ol',[Condition_ol::class, 'view_ol']);



