<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

use App\Models\CarBooking;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerBookingController;

use App\Http\Controllers\CarController;
use App\Http\Controllers\MotorcycleController;
use App\Http\Controllers\HelicopterTourController;

use App\Http\Controllers\CarBookingController;
use App\Http\Controllers\MotorcycleBookingController;
use App\Http\Controllers\HelicopterBookingController;
use App\Http\Controllers\CarPaymentController;
use App\Http\Controllers\InvoiceController;

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminCarController;
use App\Http\Controllers\AdminMotorcycleController;
use App\Http\Controllers\AdminHelicopterTourController;
use App\Http\Controllers\AdminCustomerController;
use App\Http\Controllers\AdminRevenueController;
use App\Http\Controllers\AdminAvailabilityController;
use App\Http\Controllers\AdminCarBookingController;

/*
|--------------------------------------------------------------------------
| PUBLIC PAGE
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/cars', [CarController::class, 'index'])->name('cars');
Route::get('/motorcycle', [MotorcycleController::class, 'index'])->name('motorcycle');
Route::get('/helicopter', [HelicopterTourController::class, 'index'])->name('helicopter');

Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');


/*
|--------------------------------------------------------------------------
| GUEST ONLY
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', function () {

        if (auth()->check()) {
            return redirect()->route('home');
        }

        return redirect('/?login=1');

    })->name('login');

    Route::post('/login', [CustomerAuthController::class, 'authenticate'])
        ->middleware('throttle:5,1')
        ->name('login.submit');

    Route::post('/register', [CustomerAuthController::class, 'storeRegister'])
        ->middleware('throttle:3,1')
        ->name('register.store');

});


/*
|--------------------------------------------------------------------------
| LOGOUT
|--------------------------------------------------------------------------
*/

Route::post('/logout', [CustomerAuthController::class, 'logout'])
    ->middleware('auth')
    ->name('logout');


/*
|--------------------------------------------------------------------------
| GOOGLE LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/auth/google', [GoogleAuthController::class, 'redirect'])
    ->name('google.login');

Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])
    ->name('google.callback');


/*
|--------------------------------------------------------------------------
| MIDTRANS CALLBACK (PUBLIC)
|--------------------------------------------------------------------------
*/

Route::post('/midtrans/notification', [CarPaymentController::class, 'notification'])
    ->name('midtrans.notification');


/*
|--------------------------------------------------------------------------
| AUTH + VERIFIED CUSTOMER
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {

    /*
|--------------------------------------------------------------------------
| EMAIL VERIFICATION
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {

        $request->fulfill();

        return redirect()->route('home')
            ->with('success', 'Email verified successfully.');

    })->middleware(['signed', 'throttle:6,1'])
      ->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {

        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Verification link sent.');

    })->middleware('throttle:6,1')
      ->name('verification.send');

});

    /*
    |--------------------------------------------------------------------------
    | BOOKING
    |--------------------------------------------------------------------------
    */

    Route::middleware(['auth'])->group(function () {

    Route::get('/cars/booking', [CarBookingController::class, 'create'])
        ->name('cars.booking');

    Route::post('/cars/booking', [CarBookingController::class, 'store'])
        ->name('cars.booking.store');

    Route::get('/motorcycles/booking', [MotorcycleBookingController::class, 'create'])
        ->name('motorcycles.booking');

    Route::post('/motorcycles/booking', [MotorcycleBookingController::class, 'store'])
        ->name('motorcycles.booking.store');

    Route::get('/helicopter/booking', [HelicopterBookingController::class, 'create'])
        ->name('helicopter.booking');

    Route::post('/helicopter/booking', [HelicopterBookingController::class, 'store'])
        ->name('helicopter.booking.store');

    Route::get('/cars/payment/{booking}', [CarPaymentController::class, 'show'])
        ->name('cars.payment');

    Route::get('/invoice/{booking}', [InvoiceController::class, 'download'])
        ->name('invoice.download');

});

    /*
    |--------------------------------------------------------------------------
    | MY BOOKINGS
    |--------------------------------------------------------------------------
    */

    Route::get('/my-bookings', [CustomerBookingController::class, 'index'])
        ->name('customer.bookings');

    Route::get('/my-bookings/{booking}', [CustomerBookingController::class, 'show'])
        ->name('customer.bookings.show');

});


/*
|--------------------------------------------------------------------------
| CHECK BOOKING (OPTIONAL)
|--------------------------------------------------------------------------
|
|
*/

Route::get('/check-booking', function () {
    return view('booking.check');
})->name('booking.check');

Route::post('/check-booking', function (Request $request) {

    $booking = CarBooking::where('booking_code', $request->booking_code)
        ->where('customer_email', $request->customer_email)
        ->first();

    return view('booking.check-result', compact('booking'));

})->name('booking.check.submit');


/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    Route::get('/admin', [AdminDashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::resource('/admin/cars', AdminCarController::class)
        ->names('admin.cars');

    Route::resource('/admin/motorcycles', AdminMotorcycleController::class)
        ->names('admin.motorcycles');

    Route::resource('/admin/helicopter-tours', AdminHelicopterTourController::class)
        ->names('admin.helicopter-tours');

    Route::get('/admin/carbooking', [AdminCarBookingController::class, 'index'])
        ->name('admin.carbooking.index');

    Route::patch('/admin/carbooking/{booking}/status',
        [AdminCarBookingController::class, 'updateStatus'])
        ->name('admin.carbooking.status');

    Route::patch('/admin/carbooking/{booking}/payment',
        [AdminCarBookingController::class, 'updatePaymentStatus'])
        ->name('admin.carbooking.payment');

    Route::get('/admin/customers',
        [AdminCustomerController::class, 'index'])
        ->name('admin.customers.index');

    Route::get('/admin/revenue',
        [AdminRevenueController::class, 'index'])
        ->name('admin.revenue.index');

    Route::get('/admin/availability',
        [AdminAvailabilityController::class, 'index'])
        ->name('admin.availability.index');

});


/*
|--------------------------------------------------------------------------
| 404
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    abort(404);
});