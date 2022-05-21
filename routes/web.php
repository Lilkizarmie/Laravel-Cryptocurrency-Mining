<?php

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


Route::get('/ipnbtc', 'PaymentController@ipnBchain')->name('ipn.bchain');
Route::post('/ipncoinpaybtc', 'PaymentController@ipnCoinPayBtc')->name('ipn.coinPay.btc');
Route::get('/ipnpaypal', 'PaymentController@ipnpaypal')->name('ipn.paypal');
Route::get('/ipnperfect', 'PaymentController@ipnperfect')->name('ipn.perfect');
Route::post('/ipnstripe', 'PaymentController@ipnstripe')->name('ipn.stripe');
Route::get('/ipnskrill', 'PaymentController@skrillIPN')->name('ipn.skrill');
Route::get('/ipnflutter', 'PaymentController@flutterIPN')->name('ipn.flutter');
Route::get('/ipnpaystack', 'PaymentController@paystackIPN')->name('ipn.paystack');

// Front end routes
Route::get('/', 'FrontendController@index')->name('home');
Route::get('/faq', 'FrontendController@faq')->name('faq');
Route::get('/about', 'FrontendController@about')->name('about');
Route::get('/blog', 'FrontendController@blog')->name('blog');
Route::get('/terms', 'FrontendController@terms')->name('terms');
Route::get('/privacy', 'FrontendController@privacy')->name('privacy');
Route::get('/page/{id}', 'FrontendController@page');
Route::get('/single/{id}/{slug}', 'FrontendController@article');
Route::get('/cat/{id}/{slug}', 'FrontendController@category');
Route::get('/contact', 'FrontendController@contact')->name('contact');
Route::post('/contact', ['uses' => 'FrontendController@contactSubmit', 'as' => 'contact-submit']);
Route::post('/about', 'FrontendController@subscribe')->name('subscribe');

// User routes
Auth::routes();

Route::post('/login', 'LoginController@submitlogin')->name('submitlogin');
Route::get('/login', 'LoginController@login')->name('login');
Route::post('/2fa', 'LoginController@submitfa')->name('submitfa');
Route::get('/2fa', 'LoginController@faverify')->name('2fa');
Route::post('/register', 'RegisterController@submitregister')->name('submitregister');
Route::get('/register', 'RegisterController@register')->name('register');
Route::post('/referral', 'RegisterController@submitreferral')->name('submitreferral');
Route::get('/referral/{id}', 'RegisterController@referral')->name('referral');
Route::get('/forget', 'UserController@forget')->name('forget');
Route::get('/r_pass', 'UserController@r_pass')->name('r_pass');
Route::group(['prefix' => 'user', ], function () {
    Route::get('authorization', 'UserController@authCheck')->name('user.authorization');   
    Route::post('verification', 'UserController@sendVcode')->name('user.send-vcode');
    Route::post('smsVerify', 'UserController@smsVerify')->name('user.sms-verify');
    Route::post('verify-email', 'UserController@sendEmailVcode')->name('user.send-emailVcode');
    Route::post('postEmailVerify', 'UserController@postEmailVerify')->name('user.email-verify'); 
        Route::group(['middleware'=>'isActive'], function() {
            Route::middleware(['CheckStatus'])->group(function () {
                Route::middleware(['Tfa'])->group(function () {
                    Route::get('dashboard', 'UserController@dashboard')->name('user.dashboard');
                    Route::get('plans', 'UserController@plans')->name('user.plans');
                    Route::post('calculate', 'UserController@calculate');
                    Route::post('buy', 'UserController@buy');
                    Route::get('profile', 'UserController@profile')->name('user.profile');
                    Route::post('kyc', 'UserController@kyc');
                    Route::post('account', 'UserController@account');
                    Route::post('avatar', 'UserController@avatar');
                    Route::get('ticket', 'UserController@ticket')->name('user.ticket');
                    Route::post('submit-ticket', 'UserController@submitticket')->name('submit-ticket');
                    Route::get('ticket/delete/{id}', 'UserController@Destroyticket')->name('ticket.delete');
                    Route::get('reply-ticket/{id}', 'UserController@Replyticket')->name('ticket.reply');
                    Route::post('reply-ticket', 'UserController@submitreply');
                    Route::get('fund', 'UserController@fund')->name('user.fund');
                    Route::get('upgrade', 'UserController@upgrade')->name('user.upgrade');
                    Route::get('referral', 'UserController@referral')->name('user.referral');
                    Route::get('preview', 'UserController@depositpreview')->name('user.preview');
                    Route::post('fund', 'UserController@fundsubmit')->name('fund.submit');
                    Route::get('withdraw', 'UserController@withdraw')->name('user.withdraw');
                    Route::post('withdraw', 'UserController@withdrawsubmit')->name('withdraw.submit');                
                    Route::get('share', 'UserController@share')->name('user.share');
                    Route::post('share', 'UserController@sharesubmit')->name('share.submit');
                    Route::get('password', 'UserController@changePassword')->name('user.password');
                    Route::post('password', 'UserController@submitPassword')->name('change.password');
                    Route::get('pin', 'UserController@changePin')->name('user.pin');
                    Route::post('pin', 'UserController@submitPin')->name('change.pin');
                    Route::post('2fa', 'UserController@submit2fa')->name('change.2fa');
                    Route::get('deposit-verify/{id}', 'UserController@userDataUpdate')->name('deposit.verify');
                    Route::get('deposit-confirm', 'PaymentController@depositConfirm')->name('osit.confirm');
                });
            });
        });
    Route::get('logout', 'UserController@logout')->name('user.logout');
});

Route::get('user-password/reset', 'User\ForgotPasswordController@showLinkRequestForm')->name('user.password.request');
Route::post('user-password/email', 'User\ForgotPasswordController@sendResetLinkEmail')->name('user.password.email');
Route::get('user-password/reset/{token}', 'User\ResetPasswordController@showResetForm')->name('user.password.reset');
Route::post('user-password/reset', 'User\ResetPasswordController@reset');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', 'AdminLoginController@index')->name('admin.loginForm');
    Route::post('/', 'AdminLoginController@authenticate')->name('admin.login');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/logout', 'AdminController@logout')->name('admin.logout');
    Route::get('/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    //Blog controller
    Route::post('/createcategory', 'PostController@CreateCategory');
    Route::post('/updatecategory', 'PostController@UpdateCategory');
    Route::get('/post-category', 'PostController@category')->name('admin.cat');
    Route::get('/unblog/{id}', 'PostController@unblog')->name('blog.unpublish');
    Route::get('/pblog/{id}', 'PostController@pblog')->name('blog.publish');
    Route::get('blog', 'PostController@index')->name('admin.blog');
    Route::get('blog/create', 'PostController@create')->name('blog.create');
    Route::post('blog/create', 'PostController@store')->name('blog.store');
    Route::get('blog/delete/{id}', 'PostController@destroy')->name('blog.delete');
    Route::get('category/delete/{id}', 'PostController@delcategory')->name('blog.delcategory');
    Route::get('blog/edit/{id}', 'PostController@edit')->name('blog.edit');
    Route::post('blog-update', 'PostController@updatePost')->name('blog.update');

    //Web controller
    Route::post('social-links/update', 'WebController@UpdateSocial')->name('social-links.update');
    Route::get('social-links', 'WebController@sociallinks')->name('social-links'); 

    Route::post('about-us/update', 'WebController@UpdateAbout')->name('about-us.update');
    Route::get('about-us', 'WebController@aboutus')->name('about-us'); 

    Route::post('privacy-policy/update', 'WebController@UpdatePrivacy')->name('privacy-policy.update');
    Route::get('privacy-policy', 'WebController@privacypolicy')->name('privacy-policy');

    Route::post('terms/update', 'WebController@UpdateTerms')->name('terms.update');
    Route::get('terms', 'WebController@terms')->name('admin.terms'); 

    Route::post('/createfaq', 'WebController@CreateFaq');   
    Route::post('faq/update', 'WebController@UpdateFaq')->name('faq.update');
    Route::get('faq/delete/{id}', 'WebController@DestroyFaq')->name('faq.delete');
    Route::get('faq', 'WebController@faq')->name('admin.faq');   
    
    Route::post('/createservice', 'WebController@CreateService');   
    Route::post('service/update', 'WebController@UpdateService')->name('service.update');
    Route::get('service/delete/{id}', 'WebController@DestroyService')->name('service.delete');
    Route::get('service', 'WebController@services')->name('admin.service'); 
    
    Route::post('/createpage', 'WebController@CreatePage');   
    Route::post('page/update', 'WebController@UpdatePage')->name('page.update');
    Route::get('page/delete/{id}', 'WebController@DestroyPage')->name('page.delete');
    Route::get('page', 'WebController@page')->name('admin.page'); 
    Route::get('/unpage/{id}', 'WebController@unpage')->name('page.unpublish');
    Route::get('/ppage/{id}', 'WebController@ppage')->name('page.publish');    
    
    Route::post('/createreview', 'WebController@CreateReview');   
    Route::post('review/update', 'WebController@UpdateReview')->name('review.update');
    Route::get('review/edit/{id}', 'WebController@EditReview')->name('review.edit');
    Route::get('review/delete/{id}', 'WebController@DestroyReview')->name('review.delete');
    Route::get('review', 'WebController@review')->name('admin.review'); 
    Route::get('/unreview/{id}', 'WebController@unreview')->name('review.unpublish');
    Route::get('/preview/{id}', 'WebController@preview')->name('review.publish');    

    Route::get('currency', 'WebController@currency')->name('admin.currency');
    Route::get('pcurrency/{id}', 'WebController@pcurrency')->name('blog.publish'); 
    
    Route::get('logo', 'WebController@logo')->name('admin.logo');
    Route::post('updatelogo', 'WebController@UpdateLogo');
    Route::post('updatefavicon', 'WebController@UpdateFavicon');

    Route::get('home-page', 'WebController@homepage')->name('homepage');   
    Route::post('home-page/update', 'WebController@Updatehomepage')->name('homepage.update');
    Route::post('section1/update', 'WebController@section1');
    Route::post('section2/update', 'WebController@section2');
    Route::post('section3/update', 'WebController@section3');
    Route::post('section4/update', 'WebController@section4');

    //Withdrawal controller
    Route::get('withdraw-log', 'WithdrawController@withdrawlog')->name('admin.withdraw.log');
    Route::get('withdraw-approved', 'WithdrawController@withdrawapproved')->name('admin.withdraw.approved');
    Route::get('withdraw-declined', 'WithdrawController@withdrawdeclined')->name('admin.withdraw.declined');
    Route::get('withdraw-unpaid', 'WithdrawController@withdrawunpaid')->name('admin.withdraw.unpaid');
    Route::get('withdraw/delete/{id}', 'WithdrawController@DestroyWithdrawal')->name('withdraw.delete');
    Route::get('approvewithdraw/{id}', 'WithdrawController@approve')->name('withdraw.approve');
    Route::get('declinewithdraw/{id}', 'WithdrawController@decline')->name('withdraw.declined');   
    
    //Deposit controller
    Route::get('deposit-log', 'DepositController@depositlog')->name('admin.deposit.log');
    Route::get('deposit-method', 'DepositController@depositmethod')->name('admin.deposit.method');
    Route::post('storegateway', 'DepositController@store');
    Route::get('deposit-approved', 'DepositController@depositapproved')->name('admin.deposit.approved');
    Route::get('deposit-pending', 'DepositController@depositpending')->name('admin.deposit.pending');
    Route::get('deposit-declined', 'DepositController@depositdeclined')->name('admin.deposit.declined');
    Route::get('deposit/delete/{id}', 'DepositController@DestroyDeposit')->name('deposit.delete');
    Route::get('approvedeposit/{id}', 'DepositController@approve')->name('deposit.approve');
    Route::get('declinedeposit/{id}', 'DepositController@decline')->name('deposit.decline');
    
    //Py scheme controller
    Route::get('py-completed', 'PyschemeController@Completed')->name('admin.py.completed');
    Route::get('py-pending', 'PyschemeController@Pending')->name('admin.py.pending');
    Route::get('py-plans', 'PyschemeController@Plans')->name('admin.py.plans');
    Route::get('py/delete/{id}', 'PyschemeController@Destroy')->name('py.delete');
    Route::get('py-plan/delete/{id}', 'PyschemeController@PlanDestroy')->name('py.plan.delete');
    Route::get('py-plan-create', 'PyschemeController@Create')->name('admin.plan.create');
    Route::post('py-plan-create', 'PyschemeController@Store')->name('admin.plan.store');
    Route::get('py-plan/{id}', 'PyschemeController@Edit')->name('admin.plan.edit');
    Route::post('py-plan-edit', 'PyschemeController@Update')->name('admin.plan.update');

    //Setting controller
    Route::get('settings', 'SettingController@Settings')->name('admin.setting');
    Route::post('settings', 'SettingController@SettingsUpdate')->name('admin.settings.update');    
    Route::get('email', 'SettingController@Email')->name('admin.email');
    Route::post('email', 'SettingController@EmailUpdate')->name('admin.email.update');    
    Route::get('sms', 'SettingController@Sms')->name('admin.sms');
    Route::post('sms', 'SettingController@SmsUpdate')->name('admin.sms.update');    
    Route::get('account', 'SettingController@Account')->name('admin.account');
    Route::post('account', 'SettingController@AccountUpdate')->name('admin.account.update');

    //Transfer controller
    Route::get('transfers', 'TransferController@Transfers')->name('admin.transfers');  
    Route::get('referrals', 'TransferController@Referrals')->name('admin.referrals');    
    
    //User controller
    Route::get('users', 'AdminController@Users')->name('admin.users');  
    Route::get('messages', 'AdminController@Messages')->name('admin.message');  
    Route::get('unblock-user/{id}', 'AdminController@Unblockuser')->name('user.unblock');
    Route::get('block-user/{id}', 'AdminController@Blockuser')->name('user.block');
    Route::get('manage-user/{id}', 'AdminController@Manageuser')->name('user.manage');
    Route::get('user/delete/{id}', 'AdminController@Destroyuser')->name('user.delete');
    Route::get('email/{id}/{name}', 'AdminController@Email')->name('user.email');
    Route::post('email_send', 'AdminController@Sendemail')->name('user.email.send');    
    Route::get('promo', 'AdminController@Promo')->name('user.promo');
    Route::post('promo', 'AdminController@Sendpromo')->name('user.promo.send');
    Route::get('message/delete/{id}', 'AdminController@Destroymessage')->name('message.delete');
    Route::get('ticket', 'AdminController@Ticket')->name('admin.ticket');
    Route::get('ticket/delete/{id}', 'AdminController@Destroyticket')->name('ticket.delete');
    Route::get('close-ticket/delete/{id}', 'AdminController@Closeticket')->name('ticket.close');
    Route::get('manage-ticket/{id}', 'AdminController@Manageticket')->name('ticket.manage');
    Route::post('reply-ticket', 'AdminController@Replyticket')->name('ticket.reply');
    Route::post('profile-update', 'AdminController@Profileupdate');
    Route::get('approve-kyc/{id}', 'AdminController@Approvekyc')->name('admin.approve.kyc');
    Route::get('reject-kyc/{id}', 'AdminController@Rejectkyc')->name('admin.reject.kyc');

});