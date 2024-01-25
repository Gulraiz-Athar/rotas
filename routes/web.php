<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;

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
//Clear Config cache:
    Route::get('/config_cache', function() {
        $exitCode = Artisan::call('config:cache');
        $exitCode = Artisan::call('config:clear');
        $exitCode = Artisan::call('route:clear');
        return '<h1>Clear Config cleared</h1>';
    });

require __DIR__.'/auth.php';

Route::get('/', [HomeController::class,'index'])->name('home')->middleware(['XSS']);

Route::resource('/home', HomeController::class)->middleware(['auth','XSS']);

Route::post('/dashboard/location_filter', [HomeController::class,'location_filter'])->name('dashboard.location_filter')->middleware(['auth','XSS']);
Route::resource('/dashboard', HomeController::class)->middleware(['auth','XSS']);
Route::post('dayview_filter', [DailyViewController::class,'dayview_filter'])->name('dayview_filter')->middleware(['XSS']);
Route::resource('/day', DailyViewController::class)->middleware(['auth','XSS']);
Route::post('userviewfilter', [UserViewController::class,'userviewfilter'])->name('userviewfilter')->middleware(['XSS']);
Route::resource('/user-view', UserViewController::class)->middleware(['auth','XSS']);
Route::resource('/year', YearlyViewController::class)->middleware(['auth','XSS']);


Route::post('copy_week_sheet', [RotasController::class,'copy_week_sheet'])->name('copy.week.sheet')->middleware(['auth','XSS']);
Route::post('copy_week_sheet2solo', [RotasController::class,'copy_week_sheet2solo'])->name('copy_week_sheet2solo')->middleware(['auth','XSS']);
Route::post('copy_week_sheet3solo', [RotasController::class,'copy_week_sheet3solo'])->name('copy_week_sheet3solo')->middleware(['auth','XSS']);
Route::post('copy_week_sheet4solo', [RotasController::class,'copy_week_sheet4solo'])->name('copy_week_sheet4solo')->middleware(['auth','XSS']);




Route::post('hideavailability', [RotasController::class,'hideavailability'])->name('hideavailability')->middleware(['auth','XSS']);
Route::post('hideleave', [RotasController::class,'hideleave'])->name('hideleave')->middleware(['auth','XSS']);
Route::post('hidedayoff', [RotasController::class,'hidedayoff'])->name('hidedayoff')->middleware(['auth','XSS']);
Route::post('rotas/print', [RotasController::class,'printrotasInvoice'])->name('rotas.print')->middleware(['XSS']);
Route::post('/rota-date-change', [RotasController::class,'rota_date_change'])->name('rota.date.change')->middleware(['XSS']);
Route::post('/slug-match', [RotasController::class,'slug_match'])->name('slug.match')->middleware(['XSS']);
Route::get('/rotas/share/{slug}', [RotasController::class,'share_rotas'])->name('rotas.share')->middleware(['XSS']);
Route::post('/rotas/share_rotas_link', [RotasController::class,'share_rotas_link'])->name('rotas.share_rotas_link')->middleware(['auth','XSS']);
Route::get('/rotas/share_rotas_popup', [RotasController::class,'share_rotas_popup'])->name('rotas.share_popup')->middleware(['auth','XSS']);
Route::post('/rotas/shift_disable_reply', [RotasController::class,'shift_disable_reply'])->name('rotas.shift.disable.reply')->middleware(['auth','XSS']);
Route::get('/rotas/shift_disable_response/{id}', [RotasController::class,'shift_disable_response'])->name('rotas.shift.response')->middleware(['auth','XSS']);
Route::post('/rotas/shift_disable', [RotasController::class,'shift_disable'])->name('rotas.shift.disable')->middleware(['auth','XSS']);
Route::get('/rotas/shift_cancel/{id}', [RotasController::class,'shift_cancel'])->name('rotas.shift.cancel')->middleware(['auth','XSS']);
Route::get('/rotas/print_rotas_popup', [RotasController::class,'print_rotas_popup'])->name('rotas.print_rotas_popup')->middleware(['auth','XSS']);

Route::post('/rotas/send_email_rotas', [RotasController::class,'send_email_rotas'])->name('rotas.send_email_rotas')->middleware(['auth','XSS']);
Route::get('/rotas/add_remove_employee', [RotasController::class,'add_remove_employee'])->name('rotas.add_remove_employee')->middleware(['auth','XSS']);
Route::get('/rotas/add_remove_employee_popup', [RotasController::class,'add_remove_employee_popup'])->name('rotas.add_remove_employee_popup')->middleware(['auth','XSS']);
Route::post('/rotas/add_dayoff', [RotasController::class,'add_dayoff'])->name('rotas.add_dayoff')->middleware(['auth','XSS']);
Route::post('/rotas/add_amoff', [RotasController::class,'add_amoff'])->name('rotas.add_amoff')->middleware(['auth','XSS']);
Route::post('/rotas/add_pmoff', [RotasController::class,'add_pmoff'])->name('rotas.add_pmoff')->middleware(['auth','XSS']);
Route::post('/rotas/shift_copy', [RotasController::class,'shift_copy'])->name('rotas.shift_copy')->middleware(['auth','XSS']);
Route::post('/rotas/publish_weektwosolo', [RotasController::class,'publish_weektwosolo'])->name('rotas.publish_weektwosolo')->middleware(['auth','XSS']);
Route::post('/rotas/publish_weektwoduo', [RotasController::class,'publish_weektwoduo'])->name('rotas.publish_weektwoduo')->middleware(['auth','XSS']);
Route::post('/rotas/un_publish_weektwosolo', [RotasController::class,'un_publish_weektwosolo'])->name('rotas.un_publish_weektwosolo')->middleware(['auth','XSS']);
Route::post('/rotas/un_publish_weektwoduo', [RotasController::class,'un_publish_weektwoduo'])->name('rotas.un_publish_weektwoduo')->middleware(['auth','XSS']);

Route::post('/rotas/publish_weekthreesolo', [RotasController::class,'publish_weekthreesolo'])->name('rotas.publish_weekthreesolo')->middleware(['auth','XSS']);
Route::post('/rotas/publish_weekthreeduo', [RotasController::class,'publish_weekthreeduo'])->name('rotas.publish_weekthreeduo')->middleware(['auth','XSS']);
Route::post('/rotas/publish_weekthreetrio', [RotasController::class,'publish_weekthreetrio'])->name('rotas.publish_weekthreetrio')->middleware(['auth','XSS']);
Route::post('/rotas/un_publish_weekthreesolo', [RotasController::class,'un_publish_weekthreesolo'])->name('rotas.un_publish_weekthreesolo')->middleware(['auth','XSS']);
Route::post('/rotas/un_publish_weekthreeduo', [RotasController::class,'un_publish_weekthreeduo'])->name('rotas.un_publish_weekthreeduo')->middleware(['auth','XSS']);
Route::post('/rotas/un_publish_weekthreetrio', [RotasController::class,'un_publish_weekthreetrio'])->name('rotas.un_publish_weekthreetrio')->middleware(['auth','XSS']);


Route::post('/rotas/publish_weekfoursolo', [RotasController::class,'publish_weekfoursolo'])->name('rotas.publish_weekfoursolo')->middleware(['auth','XSS']);
Route::post('/rotas/publish_weekfourduo', [RotasController::class,'publish_weekfourduo'])->name('rotas.publish_weekfourduo')->middleware(['auth','XSS']);
Route::post('/rotas/publish_weekfourtrio', [RotasController::class,'publish_weekfourtrio'])->name('rotas.publish_weekfourtrio')->middleware(['auth','XSS']);
Route::post('/rotas/publish_weekfourquad', [RotasController::class,'publish_weekfourquad'])->name('rotas.publish_weekfourquad')->middleware(['auth','XSS']);



Route::post('/rotas/un_publish_weekfoursolo', [RotasController::class,'un_publish_weekfoursolo'])->name('rotas.un_publish_weekfoursolo')->middleware(['auth','XSS']);
Route::post('/rotas/un_publish_weekfourduo', [RotasController::class,'un_publish_weekfourduo'])->name('rotas.un_publish_weekfourduo')->middleware(['auth','XSS']);
Route::post('/rotas/un_publish_weekfourtrio', [RotasController::class,'un_publish_weekfourtrio'])->name('rotas.un_publish_weekfourtrio')->middleware(['auth','XSS']);
Route::post('/rotas/un_publish_weekfourquad', [RotasController::class,'un_publish_weekfourquad'])->name('rotas.un_publish_weekfourquad')->middleware(['auth','XSS']);




Route::post('/rotas/publish_week', [RotasController::class,'publish_week'])->name('rotas.publish_week')->middleware(['auth','XSS']);
Route::post('/rotas/un_publish_week', [RotasController::class,'un_publish_week'])->name('rotas.un_publish_week')->middleware(['auth','XSS']);


Route::post('/rotas/clear_week', [RotasController::class,'clear_week'])->name('rotas.clear_week')->middleware(['auth','XSS']);
Route::post('/rotas/clear_weektwosolo', [RotasController::class,'clear_weektwosolo'])->name('rotas.clear_weektwosolo')->middleware(['auth','XSS']);
Route::post('/rotas/clear_weektwoduo', [RotasController::class,'clear_weektwoduo'])->name('rotas.clear_weektwoduo')->middleware(['auth','XSS']);

Route::post('/rotas/clear_weekthirdsolo', [RotasController::class,'clear_weekthirdsolo'])->name('rotas.clear_weekthirdsolo')->middleware(['auth','XSS']);
Route::post('/rotas/clear_weekthirdduo', [RotasController::class,'clear_weekthirdduo'])->name('rotas.clear_weekthirdduo')->middleware(['auth','XSS']);
Route::post('/rotas/clear_weekthirdtrio', [RotasController::class,'clear_weekthirdtrio'])->name('rotas.clear_weekthirdtrio')->middleware(['auth','XSS']);

Route::post('/rotas/clear_weekfoursolo', [RotasController::class,'clear_weekfoursolo'])->name('rotas.clear_weekfoursolo')->middleware(['auth','XSS']);
Route::post('/rotas/clear_weekfourduo', [RotasController::class,'clear_weekfourduo'])->name('rotas.clear_weekfourduo')->middleware(['auth','XSS']);
Route::post('/rotas/clear_weekfourtrio', [RotasController::class,'clear_weekfourtrio'])->name('rotas.clear_weekfourtrio')->middleware(['auth','XSS']);
Route::post('/rotas/clear_weekfourquad', [RotasController::class,'clear_weekfourquad'])->name('rotas.clear_weekfourquad')->middleware(['auth','XSS']);

Route::post('/rotas/week_sheet', [RotasController::class,'week_sheet'])->name('rotas.week_sheet')->middleware(['auth','XSS']);
Route::post('/rotas/week_sheetam', [RotasController::class,'week_sheetam'])->name('rotas.week_sheetam')->middleware(['auth','XSS']);
Route::post('/rotas/week_sheetpm', [RotasController::class,'week_sheetpm'])->name('rotas.week_sheetpm')->middleware(['auth','XSS']);
Route::post('/rotas/week_sheet_second', [RotasController::class,'week_sheet_second'])->name('rotas.week_sheet_second')->middleware(['auth','XSS']);
Route::post('/rotas/week_sheet_second_two', [RotasController::class,'week_sheet_second_two'])->name('rotas.week_sheet_second_two')->middleware(['auth','XSS']);
Route::post('/rotas/week_sheet_third', [RotasController::class,'week_sheet_third'])->name('rotas.week_sheet_third')->middleware(['auth','XSS']);
Route::post('/rotas/week_sheet_third_two', [RotasController::class,'week_sheet_third_two'])->name('rotas.week_sheet_third_two')->middleware(['auth','XSS']);
Route::post('/rotas/week_sheet_third_three', [RotasController::class,'week_sheet_third_three'])->name('rotas.week_sheet_third_three')->middleware(['auth','XSS']);
Route::post('/rotas/week_sheet_four', [RotasController::class,'week_sheet_four'])->name('rotas.week_sheet_four')->middleware(['auth','XSS']);
Route::post('/rotas/week_sheet_four_two', [RotasController::class,'week_sheet_four_two'])->name('rotas.week_sheet_four_two')->middleware(['auth','XSS']);
Route::post('/rotas/week_sheet_four_three', [RotasController::class,'week_sheet_four_three'])->name('rotas.week_sheet_four_three')->middleware(['auth','XSS']);
Route::post('/rotas/week_sheet_four_quad', [RotasController::class,'week_sheet_four_quad'])->name('rotas.week_sheet_four_quad')->middleware(['auth','XSS']);
Route::get('/rotas/createtwo', [RotasController::class,'createtwo'])->name('rotas.createtwo')->middleware(['auth','XSS']);
Route::get('/rotas/createthree', [RotasController::class,'createthree'])->name('rotas.createthree')->middleware(['auth','XSS']);
Route::get('/rotas/createfour', [RotasController::class,'createfour'])->name('rotas.createfour')->middleware(['auth','XSS']);
// Rotas::get('/rotas/createtwo',[RotasController::class,'createtwo'])->name('rotas.createtwo')->middleware(['auth','XSS']);

Route::resource('/rotas', RotasController::class)->middleware(['auth','XSS']);
Route::get('rotas_date/{id}',[RotasController::class,"rotas_date"])->name('rotas_date')->middleware(['auth','XSS']);
Route::get('/two_weeks', [RotasController::class,'two_weeks'])->name('two_weeks');
Route::get('/three_weeks', [RotasController::class,'three_weeks'])->name('three_weeks');
Route::get('/four_weeks', [RotasController::class,'four_weeks'])->name('four_weeks');


Route::post('/change-password', [ProfileController::class,'updatePassword'])->name('update.password');
Route::get('/profile/{id?}', [ProfileController::class,'index'])->name('profile')->middleware(['auth','XSS']);
Route::resource('/profile', ProfileController::class)->middleware(['auth','XSS']);

Route::any('/employee/addpassword/{id}', [EmployeeController::class,'addpassword'])->name('employee.addpassword')->middleware(['auth','XSS']);
Route::get('/employee/set_password/{id}', [EmployeeController::class,'set_password'])->name('employee.set_password')->middleware(['auth','XSS']);
Route::get('/employee/manage_permission/{id}', [EmployeeController::class,'manage_permission'])->name('employee.manage_permission')->middleware(['auth','XSS']);
Route::any('employee/restore/{id}', [EmployeeController::class,'restore'])->name('employee.restore')->middleware(['auth','XSS']);
Route::post('employee/send-invitation/{id}', [EmployeeController::class,'send_invitation'])->name('employee.send_invitation')->middleware(['auth','XSS']);
Route::resource('/employees', EmployeeController::class)->middleware(['auth','XSS']);

Route::get('/change/mode',[EmployeeController::class,'changeMode'])->name('change.mode');

Route::resource('/locations', LocationController::class)->middleware(['auth','XSS']);

Route::resource('/roles', RoleController::class)->middleware(['auth','XSS']);

Route::resource('/past-employees', PastemployeesController::class)->middleware(['auth','XSS']);



Route::resource('/groups', GroupController::class)->middleware(['auth','XSS']);

Route::get('/holidays/yearly', [LeaveController::class,'yearlyView'])->middleware(['auth', 'XSS']);
Route::get('/holidays/monthly', [LeaveController::class,'monthlyView'])->middleware(['auth', 'XSS']);
Route::get('/holidays/annual-leave/{id}', [LeaveController::class,'annual_leave'])->name('holidays.annual_leave')->middleware(['auth','XSS']);
Route::get('/holidays/view-leave-response/{id}', [LeaveController::class,'view_leave_response'])->name('holidays.view-leave-response')->middleware(['auth','XSS']);
Route::get('/holidays/view-leave/{id}', [LeaveController::class,'view_leave'])->name('holidays.view_leave')->middleware(['auth','XSS']);
Route::post('/holidays/annual-leave-response/{id}', [LeaveController::class,'annual_leave_response'])->name('holidays.annual-leave-response')->middleware(['auth','XSS']);
Route::post('/holidays/leave_sheet', [LeaveController::class,'leave_sheet'])->name('holidays.leave_sheet')->middleware(['auth','XSS']);
Route::resource('/holidays', LeaveController::class)->middleware(['auth','XSS']);

Route::resource('/embargoes', EmbargoController::class)->middleware(['auth','XSS']);

Route::resource('/rules', RulesController::class)->middleware(['auth','XSS']);

Route::get('/leave-request/reply/{id}', [LeaveRequestController::class,'reply'])->name('leave-request.reply')->middleware(['auth','XSS']);
Route::post('/leave-request/response/{id}', [LeaveRequestController::class,'reply_response'])->name('leave-request.response')->middleware(['auth','XSS']);
Route::post('/leave-request/response-delete/{id}', [LeaveRequestController::class,'response_delete'])->name('leave-request.response-delete')->middleware(['auth','XSS']);
Route::resource('/leave-request', LeaveRequestController::class)->middleware(['auth','XSS']);

Route::get('/reports/{id?}', [ReportController::class,'index'])->name('reports')->middleware(['auth','XSS']);
Route::resource('/reports', ReportController::class)->middleware(['auth','XSS']);

Route::resource('/availabilities', AvailabilityController::class)->middleware(['auth','XSS']);

Route::post('payment-setting', [EmployeesettingController::class,'savePaymentSettings'])->name('payment.setting')->middleware(['auth','XSS']);
Route::post('email-setting', [EmployeesettingController::class,'saveEmailSettings'])->name('email.setting')->middleware(['auth','XSS']);
Route::post('pusher-setting', [EmployeesettingController::class,'pusherSetting'])->name('pusher.setting');

Route::post('test', [EmployeesettingController::class,'testMail'])->name('test.mail')->middleware(['auth','XSS']);
Route::post('test-mail', [EmployeesettingController::class,'testSendMail'])->name('test.send.mail')->middleware(['auth','XSS']);

Route::get('/leave-request/reply/{id}', [LeaveRequestController::class,'reply'])->name('leave-request.reply')->middleware(['auth','XSS']);
Route::get('/setting/saveBusinessSettings', [EmployeesettingController::class,'saveBusinessSettings'])->name('setting.saveBusinessSettings')->middleware(['auth','XSS']);
Route::post('/setting/saveZoomSettings/{id}', [EmployeesettingController::class,'saveZoomSettings'])->name('setting.ZoomSettings')->middleware(['auth','XSS']);
Route::any('/setting/saveCompanySetting/{id}', [EmployeesettingController::class,'saveCompanySettings'])->name('setting.CompanySettings')->middleware(['auth']);
Route::resource('/setting', EmployeesettingController::class)->middleware(['auth','XSS']);

Route::resource('/user', UserController::class)->middleware(['auth','XSS']);
// Route::resource('/plan', PlanController::class)->middleware(['auth','XSS']);
Route::get('user/{id}/plan', [UserController::class,'upgradePlan'])->name('plan.upgrade')->middleware(['auth', 'XSS']);
Route::get('user/{id}/plan/{pid}', [UserController::class,'activePlan'])->name('plan.active')->middleware(['auth', 'XSS']);
// Route::post('plan-pay-with-paypal', [PaypalController::class,'planPayWithPaypal'])->name('plan.pay.with.paypal')->middleware(['auth', 'XSS']);
// Route::get('{id}/plan-get-payment-status', [PaypalController::class,'planGetPaymentStatus'])->name('plan.get.payment.status')->middleware(['auth', 'XSS']);


// Route::group(['middleware' => ['auth', 'XSS']], function (){
//     Route::resource('coupon', CouponController::class);
// });

// Route::get('/apply-coupon', [CouponController::class,'applyCoupon'])->name('apply.coupon')->middleware(['auth', 'XSS']);

Route::group(['middleware' => ['auth', 'XSS']], function (){
    Route::get('order', [StripePaymentController::class,'index'])->name('order.index');
    Route::get('/stripe/{code}', [StripePaymentController::class,'stripe'])->name('stripe');
    Route::post('/stripe', [StripePaymentController::class,'stripePost'])->name('stripe.post');
});

Route::group([ 'middleware' => [ 'auth', 'XSS', ], ], function () {
    Route::get('change-language/{lang}', [LanguageController::class,'changeLanguage'])->name('change.language');
    Route::get('manage-language/{lang}', [LanguageController::class,'manageLanguage'])->name('manage.language');
    Route::post('store-language-data/{lang}', [LanguageController::class,'storeLanguageData'])->name('store.language.data');
    Route::get('create-language', [LanguageController::class,'createLanguage'])->name('create.language');
    Route::post('store-language', [LanguageController::class,'storeLanguage'])->name('store.language');
    Route::delete('lang/{lang}',[LanguageController::class,'destroyLang'])->name('lang.destroy');
});

//================================= Custom Landing Page ====================================//

// Route::get('/landingpage', 'LandingPageSectionsController@index')->name('custom_landing_page.index')->middleware(['auth','XSS']);

//========================================================================================//


//================================= Payment Gateways  ====================================//


//=======================================Import/Export======================================// 
Route::get('import/employee/file', [EmployeeController::class,'importFile'])->name('employee.file.import');
Route::post('import/employee', [EmployeeController::class,'import'])->name('employee.import');
Route::get('export/employee', [EmployeeController::class,'export'])->name('employee.export');

Route::get('export/location', [LocationController::class,'export'])->name('location.export');

Route::get('export/leave', [LeaveRequestController::class,'export'])->name('leave.export');

Route::get('export/availability' , [AvailabilityController::class,'export'])->name('availability.export');

//==================================================================================================//


//================================= ZOOM Page ====================================//
Route::resource('/zoom-meeting', ZoomMeetingController::class)->middleware(['auth','XSS']);
Route::any('zoommeeting/calendar', [ZoomMeetingController::class,'calender'])->name('zoommeeting.calender')->middleware(['auth','XSS']);

//================================= Slack ====================================//
Route::post('setting/slack',[EmployeesettingController::class,'slack'])->name('slack.setting');

//================================= Telegram ====================================//
Route::post('setting/telegram',[EmployeesettingController::class,'telegram'])->name('telegram.setting');

//===================================ReCaptcha====================================//
Route::post('/recaptcha-settings',[EmployeesettingController::class,'recaptchaSettingStore'])->name('recaptcha.settings.store')->middleware(['auth','XSS']);

//===================================Storage setting====================================//

Route::post('/storage-settings',[EmployeesettingController::class,'storageSettingStore'])->name('storage.setting.store')->middleware(['auth','XSS']);

//=================================FORGOT PASSWORD==================================//
Route::any('user-reset-password/{id}', [UserController::class,'userPassword'])->name('user.reset');
Route::post('user-reset-password/{id}', [UserController::class,'userPasswordReset'])->name('user.password.update');

Route::any('employee-reset-password/{id}', [EmployeeController::class,'employeePassword'])->name('employee.reset');
Route::post('employee-reset-password/{id}', [EmployeeController::class,'employeePasswordReset'])->name('employee.password.update');

//======================================Contract Module ==================================//
Route::resource('/contract_type', ContractTypeController::class)->middleware(['auth','XSS']);
Route::resource('/contract', ContractController::class)->middleware(['auth','XSS']);

Route::post('/contract_description/{id}' , [ContractController::class,'contractdescription'])->name('contract.description');

Route::any('/contract_comments/{id}', [ContractController::class,'contract_comments'])->name('contract.comments')->middleware(['auth','XSS']);
Route::any('/contract_comments_destroy/{id}/comments/{cid}', [ContractController::class,'contract_comments_destroy'])->name('comment.destroy')->middleware(['auth','XSS']);

Route::any('/contract_notes/{id}', [ContractController::class,'contract_notes'])->name('contract.notes')->middleware(['auth','XSS']);
Route::any('/contract_notes_destroy/{id}/notes/{nid}', [ContractController::class,'contract_notes_destroy'])->name('notes.destroy')->middleware(['auth','XSS']);

Route::post('/contract_status_edit/{id}', [ContractController::class,'contract_status_edit'])->name('contract.status')->middleware(['auth','XSS']);
Route::any('/contract_attachments/{id}', [ContractController::class,'contract_attachments'])->name('contract.attachments')->middleware(['auth','XSS']);
Route::any('/contract_attachments_destroy/{id}/attachments/{aid}', [ContractController::class,'contract_attachments_destroy'])->name('attachments.destroy')->middleware(['auth','XSS']);

Route::any('/fileDownload/{id}/file/{aid}', [ContractController::class,'fileDownload'])->name('contracts.file.download')->middleware(['auth','XSS']);

// Route::get('/contract/{id}/file/{fid}', ['as' => 'contracts.file.download','uses' => 'ContractController@fileDownload',])->middleware(['auth','XSS']);


Route::get('contract/{id}/send', [ContractController::class,'emailsend'])->name('contract.send');

Route::get('contract_copy/{id}', [ContractController::class,'copycontrat'])->name('contract.copy');
Route::any('contract_copys/{id}', [ContractController::class,'copycontratdata'])->name('contract.copydata');

Route::get('contract/pdf/{id}', [ContractController::class,'contract_preview'])->name('contract.pdf');
Route::get('contract/pdf_download/{id}', [ContractController::class,'contract_download'])->name('contract.pdf.download');

Route::any('contract/signature/{id}', [ContractController::class,'signture'])->name('contract.signature');
Route::any('contract/signature_data/{id}', [ContractController::class,'signture_data'])->name('contract.signaturedata');


Route::post('get_user_holiday_type', [LeaveController::class,'get_user_holiday_type']);






