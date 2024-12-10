<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseLabelController;
use App\Http\Controllers\Admin\InstructorController;
use App\Http\Controllers\Admin\ListInstructorsController;
use App\Http\Controllers\Admin\ListStudentsController;
use App\Http\Controllers\Admin\ManageSubscriptionsController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\SigninController;
use App\Http\Controllers\Auth\SignupController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CourseDetailsController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MentorDetailController;
use App\Http\Controllers\MentorsController;
use App\Http\Controllers\Student\MyCoursesController;
use App\Http\Controllers\Student\ProfileController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/courses', [CoursesController::class, 'index'])->name('courses');
Route::get('/course/{courseSlug}', [CourseDetailsController::class, 'index'])->name('courseDetails');
Route::get('/mentors', [MentorsController::class, 'index'])->name('mentors');
Route::get('/mentor/{mentorId}', [MentorDetailController::class, 'index'])->name('mentorDetail');
Route::get('/contact-us', [ContactUsController::class, 'index'])->name('contactUs');

// AUTH ROUTES
Route::get('/auth/sign-in', [SigninController::class, 'index'])->middleware('guest')->name('login');
Route::post('/auth/user-authenticate', [SigninController::class, 'processLogin'])->middleware('guest')->name('processLogin');
Route::get('/auth/sign-up', [SignupController::class, 'index'])->middleware('guest')->name('signup');
Route::get('/auth/logout', [SigninController::class, 'logout'])->middleware('auth')->name('logout');
Route::post('/auth/signUp', [SignupController::class, 'processSignup'])->middleware('guest')->name('processSignup');

// stripe payment routes
Route::post('/checkout/{slug}', [CheckoutController::class, 'createCheckoutSession']);
Route::get('/payment/success', [CheckoutController::class, 'paymentSuccess'])->name('payment.success');
Route::get('/payment/cancel', [CheckoutController::class, 'paymentCancel'])->name('payment.cancel');

// email verification routes
// Route to show the verification notice (after registration)
Route::get('/email/verify', function () {
    // If the user is already verified, redirect to admin dashboard
    if (auth()->user()->hasVerifiedEmail()) {
        return redirect('/account/index');
    }

    // Otherwise, show the verification notice
    return view('verify-email'); // Create this view for email verification notice
})->middleware(['auth'])->name('verification.notice');

// Route to handle the email verification (this is automatically handled by Laravel)
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    if ($request->user()->hasVerifiedEmail()) {
        return redirect()->route('admin.dashboard'); // Already verified
    }

    $request->fulfill();
    return redirect()->route('admin.dashboard'); // After verification
})->middleware(['auth', 'signed'])->name('verification.verify');

// Route to resend the email verification link
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('success', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');


// other routes for admin, student, and instructor routes
Route::middleware(['auth', 'verified'])->group(function () {
    // Route accessible to all authenticated and verified users
    Route::get('/account/index', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    // Routes restricted individually by admin role
    Route::resource('/account/categories', CategoryController::class)->middleware('role:admin');
    Route::resource('/account/course', CourseController::class)->middleware('role:admin');
    Route::resource('/account/instructor', InstructorController::class)->middleware('role:admin');
    Route::resource('/account/course-label', CourseLabelController::class)->middleware('role:admin');
    Route::get('/account/list-instructors', [ListInstructorsController::class, 'index'])->middleware('role:admin')->name('admin.list-instructors');
    Route::get('/account/list-students', [ListStudentsController::class, 'index'])->middleware('role:admin')->name('admin.list-students');
    Route::get('/account/manage-subscriptions', [ManageSubscriptionsController::class, 'index'])->middleware('role:admin')->name('admin.manage-subscriptions');


    // student routes
    Route::get('/account/profile', [ProfileController::class, 'index'])->middleware('role:student')->name('student.profile');
    Route::post('/account/profile-update', [ProfileController::class, 'profileUpdate'])->middleware('role:student')->name('student.update');
    Route::get('/account/my-courses', [MyCoursesController::class, 'index'])->middleware('role:student')->name('student.mycourses');

});

//reset password routes
Route::get('/auth/forget-password',[ForgetPasswordController::class,'index'])->middleware('guest')->name('forgetPassword');
Route::post('/auth/process-forgot-password',[ForgetPasswordController::class,'processForgotPassword'])->middleware('guest')->name('processForgotPassword');
Route::get('/auth/reset-password/{token}',[ForgetPasswordController::class,'resetPassword'])->middleware('guest')->name('resetPassword');
Route::post('/auth/process-reset-password',[ForgetPasswordController::class,'processResetPassword'])->middleware('guest')->name('processResetPassword');

// newsletter
Route::post('/newsletter', function (Request $request) {
    return handleNewsletter($request);
});

// contactus
Route::post('/contact', [ContactUsController::class, 'handleContactForm']);


