<?php

use App\Http\Controllers\AllController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaymentController;

use App\Http\Controllers\postController;
use App\Http\Controllers\AccountsController;

// Route::get('/', function () {
//     return redirect('/login');
// });

Route::get('/', function () {
    return view('/website.index',);
});
Route::get('/details/{id}', function ($id) {
    return view('/website.details', compact('id'));
});
Route::get('/about-us', function () {
    return view('/website.about');
});
Route::get('/apply', function () {
    return view('/website.howtoapply');
});

Route::post('/register', [AccountsController::class, 'store'])->name('register.store');
Route::post('/apply', [AccountsController::class, 'apply'])->name('register.apply');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        if (Auth::user()->account_type == 'Administrator') {
            return redirect('/motorcycle');
        } elseif (Auth::user()->account_type == 'Lender') {
            return redirect('/pending-loans');
        } elseif (Auth::user()->account_type == null) {
            return redirect('/apply/browse');
        } elseif (Auth::user()->account_type == 'Recipient') {
            return redirect('/active/loans');
        }
    });

    Route::get('/apply/browse', function () {
        return view('/pages.apply.browse');
    });
    Route::get('/active/loans', function () {
        return view('/pages.recipient.actived');
    });
    Route::get('/history/loans', function () {
        return view('/pages.recipient.history');
    });
    Route::get('/active/loans/payment/{id}', function ($id) {
        return view('/pages.recipient.payment', compact('id'));
    });

    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');

    Route::get('/pending-loans', function () {
        return view('/pages.lender.pending');
    });
    Route::get('/approved-loans', function () {
        return view('/pages.lender.approved');
    });
    Route::get('/payment-loans', function () {
        return view('/pages.lender.payment');
    });

    Route::get('/accounts', [AccountsController::class, 'index']);


    Route::get('/apply/status', [AllController::class, 'status_check']);

    Route::get('/reports', function () {
        return view('/pages.reports.index');
    });

    Route::get('/applicant/apply/{id}', [AllController::class, 'apply_applicant_index']);
    Route::get('/units/apply/{id}', [AllController::class, 'units']);
    Route::get('/billing/unit/{id}', [AllController::class, 'billing']);
    Route::get('/online/unit/{id}', [AllController::class, 'online']);
    Route::post('/billing/store', [AllController::class, 'biiling_store'])->name('billing.store');

    Route::get('/motorcycle', [postController::class, 'index']);
    Route::get('/motorcycle/new', [postController::class, 'create']);
    Route::post('/motorcycle/save', [postController::class, 'save'])->name('motorcycle.save');


    Route::get('/motorcycle', [postController::class, 'index']);
    Route::get('/motorcycle/new', [postController::class, 'create']);
    Route::post('/motorcycle/save', [postController::class, 'save'])->name('motorcycle.save');

    Route::get('/apply/co-maker', [AllController::class, 'comaker_index']);
    Route::get('/view/co-maker/{id}', [AllController::class, 'comaker_view']);
    Route::post('/comaker/save', [AllController::class, 'comaker_store'])->name('comaker.save');

    Route::get('/apply/co-maker-income', [AllController::class, 'co_income_index']);
    Route::get('/view/co-maker-income/{id}', [AllController::class, 'co_income_view']);
    Route::post('/income/save', [AllController::class, 'co_income_store'])->name('comakerincome.save');


    Route::get('/apply/informant', [AllController::class, 'informants_index']);
    Route::post('/informant/save', [AllController::class, 'informants_store'])->name('informants.save');

    Route::get('/apply/family-background', [AllController::class, 'family_index']);
    Route::get('/view/family-background/{id}', [AllController::class, 'family_view']);
    Route::post('/family/save', [AllController::class, 'family_store'])->name('family.save');

    Route::get('/apply/siblings', [AllController::class, 'bro_sis_index']);
    Route::get('/view/siblings/{id}', [AllController::class, 'bro_sis_view']);
    Route::post('/brosis/save', [AllController::class, 'bro_sis_store'])->name('brosis.save');


    Route::get('/apply/application', [AllController::class, 'applicant_index']);
    Route::get('/view/application/{id}', [AllController::class, 'applicant_view']);
    Route::post('/applicant/save', [AllController::class, 'applicant_store'])->name('application.save');

    Route::get('/apply/residence', [AllController::class, 'residence']);
    Route::get('/view/residence/{id}', [AllController::class, 'residence_view']);
    Route::post('/apply/residence/added', [AllController::class, 'residence_store'])->name('residence.save');

    Route::get('/apply/revenue', [AllController::class, 'revenue']);
    Route::get('/view/revenue/{id}', [AllController::class, 'revenue_view']);
    Route::post('/apply/revenue/added', [AllController::class, 'revenue_store'])->name('revenue.save');

    Route::get('/apply/dependent', [AllController::class, 'dependent']);
    Route::get('/view/dependent/{id}', [AllController::class, 'dependent_view']);
    Route::post('/apply/dependent/added', [AllController::class, 'dependent_store'])->name('dependent.save');

    Route::get('/apply/requirement', [AllController::class, 'requirement']);
    Route::get('/view/requirement{id}', [AllController::class, 'requirement_view']);
    Route::post('/apply/requirement/added', [AllController::class, 'requirement_store'])->name('requirement.save');

    Route::get('/apply/spouse-information', [AllController::class, 'spouse']);
    Route::get('/view/spouse-information/{id}', [AllController::class, 'spouse_view']);
    Route::post('/spouse/save', [AllController::class, 'spouse_store'])->name('spouse.save');
});
