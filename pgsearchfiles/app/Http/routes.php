<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@index']);
Route::group(['middleware' => ['web']], function(){
	Route::auth();
	Route::get('/home', 'HomeController@index');
});


Route::post('/login', [
    'as' => 'user.post.login',
    'uses' => 'Auth\AuthController@postLogin'
]);

Route::group(['middleware' => ['web']], function () {
    //Login Routes...
    Route::get('/admin/login','AdminAuth\AuthController@showLoginForm');
    Route::post('/admin/login','AdminAuth\AuthController@login');
    Route::get('/admin/logout', ['as' => 'admin.logout', 'uses' => 'AdminAuth\AuthController@logout']);

    // Registration Routes...
    Route::get('admin/register', 'AdminAuth\AuthController@showRegistrationForm');
    Route::post('admin/register', 'AdminAuth\AuthController@register');

    Route::post('admin/password/email','AdminAuth\PasswordController@sendResetLinkEmail');
    Route::post('admin/password/reset','AdminAuth\PasswordController@reset');
    Route::get('admin/password/reset/{token?}','AdminAuth\PasswordController@showResetForm');

    Route::get('/admin', ['as' => 'admin.home', 'uses' => 'AdminController@index']);

    //Rent Admin
    //Login Routes...
    Route::get('/rent/admin/login','RentAdminAuth\AuthController@showLoginForm');
    Route::post('/rent/admin/login','RentAdminAuth\AuthController@login');
    Route::get('/rent/admin/logout',['as' => 'rent_admin.logout' , 'uses' => 'RentAdminAuth\AuthController@logout']);

    // Registration Routes...
    Route::get('rent/admin/register', 'RentAdminAuth\AuthController@showRegistrationForm');
    Route::post('rent/admin/register', 'RentAdminAuth\AuthController@register');

    Route::post('rent/admin/password/email','RentAdminAuth\PasswordController@sendResetLinkEmail');
    Route::post('rent/admin/password/reset','RentAdminAuth\PasswordController@reset');
    Route::get('rent/admin/password/reset/{token?}','RentAdminAuth\PasswordController@showResetForm');

    Route::get('/rent/admin', ['as' => 'owner.home', 'uses' => 'RentAdminController@index']);
});  

Route::group(['prefix'=>'master'], function() {
    Route::get('/landmark/add', [
        'as' => 'master.landmark.add',
        'middleware' => ['admin'],
        'uses' => 'LandmarksController@create'
    ]);

    Route::get('/landmark/edit/{landmark_id}', [
        'as' => 'master.landmark.edit',
        'middleware' => ['admin'],
        'uses' => 'LandmarksController@edit'
    ]);

    Route::get('/landmark/remove/{landmark_id}', [
        'as' => 'master.landmark.remove',
        'middleware' => ['admin'],
        'uses' => 'LandmarksController@remove'
    ]);

    Route::post('/landmark/add', [
        'as' => 'master.landmark.add.post',
        'middleware' => ['admin'],
        'uses' => 'LandmarksController@doCreate'
    ]);

    Route::post('/landmark/edit/{landmark_id}', [
        'as' => 'master.landmark.update',
        'middleware' => ['admin'],
        'uses' => 'LandmarksController@doUpdate'
    ]);

    Route::get('/landmark/list-all', [
        'as' => 'landmark.index',
        'middleware' => ['admin'],
        'uses' => 'LandmarksController@index'
    ]);

    //location
    Route::get('/location/add', [
        'as' => 'location.add',
        'middleware' => ['admin'],
        'uses' => 'AdminController@addLocation'
    ]);

    Route::post('/location/add', [
        'as' => 'location.submit',
        'middleware' => ['admin'],
        'uses' => 'AdminController@submitLocation'
    ]); 


    Route::get('/location/edit/{location_id}', [
        'as' => 'location.edit',
        'middleware' => ['admin'],
        'uses' => 'AdminController@editLocation'
    ]);

    Route::post('/location/update/{location_id}', [
        'as' => 'location.update',
        'middleware' => ['admin'],
        'uses' => 'AdminController@updateLocation'
    ]); 

    Route::get('/location/view-all', [
        'as' => 'location.index',
        'middleware' => ['admin'],
        'uses' => 'AdminController@viewLocations'
    ]);

    //sub location
    Route::get('/sub-location/add', [
        'as' => 'sub_location.add',
        'middleware' => ['admin'],
        'uses' => 'AdminController@addSubLocation'
    ]);

    Route::post('/sub-location/add', [
        'as' => 'sub_location.submit',
        'middleware' => ['admin'],
        'uses' => 'AdminController@submitSubLocation'
    ]); 

    Route::get('/remove-sub-location/{sub_location_id}', [
        'as' => 'sub_location.remove',
        'middleware' => ['admin'],
        'uses' => 'AdminController@removeSubLocation'
    ]); 

    Route::get('/sub-location/view-all', [
        'as' => 'sub_location.index',
        'middleware' => ['admin'],
        'uses' => 'AdminController@viewSubLocations'
    ]);

    Route::get('/sub-location/edit/{sub_location_id}', [
        'as' => 'sub_location.edit',
        'middleware' => ['admin'],
        'uses' => 'AdminController@editSubLocation'
    ]);

    Route::post('/sub-location/update/{sub_location_id}', [
        'as' => 'sub_location.update',
        'middleware' => ['admin'],
        'uses' => 'AdminController@updateSubLocation'
    ]);
});


Route::group(['prefix'=>'premium'], function() {
    Route::get('/upgrade', [
        'as' => 'premium.upgrade',
        'middleware' => ['admin'],
        'uses' => 'AdminController@upgradePremium'
    ]);

    Route::post('/upgrade', [
        'as' => 'premium.upgrade.post',
        'middleware' => ['admin'],
        'uses' => 'AdminController@doUpgradePremium'
    ]);

    Route::get('/accounts/view-all', [
        'as' => 'premium.index',
        'middleware' => ['admin'],
        'uses' => 'AdminController@viewPremiumAccounts'
    ]);
});
Route::group(['prefix'=>'pg-location'], function() {
    
    Route::get('/add', [
        'as' => 'pg_location.add',
        'middleware' => ['rent_admin'],
        'uses' => 'PgLocationsController@create'
    ]);

    Route::post('/add', [
        'as' => 'pg_location.add_post',
        'middleware' => ['rent_admin'],
        'uses' => 'PgLocationsController@doCreate'
    ]);

    Route::get('/add-success', [
        'as' => 'pg_location.add_success',
        'middleware' => ['rent_admin'],
        'uses' => 'PgLocationsController@createSuccess'
    ]);

    Route::get('/view-all', [
        'as' => 'view_all_pg',
        'middleware' => ['admin'],
        'uses' => 'PgLocationsController@index'
    ]);

    Route::get('/my/view-all', [
        'as' => 'rent_admin.view_all_pgs',
        'middleware' => ['rent_admin'],
        'uses' => 'PgLocationsController@myPgs'
    ]);

    Route::get('/remove/{id}', [
        'as' => 'admin.remove_pg_location',
        'middleware' => ['admin'],
        'uses' => 'PgLocationsController@removebyAdmin'
    ]);

    Route::get('/my-pg/view/{id}', [
        'as' => 'rent_admin.view_pg_location',
        'middleware' => ['rent_admin'],
        'uses' => 'PgLocationsController@viewMyPglocation'
    ]);

    Route::get('/my-pg/edit/pg-basic-info/{id}', [
        'as' => 'rent_admin.edit_pg_lcoation_basic_info',
        'middleware' => ['rent_admin'],
        'uses' => 'PgLocationsController@editMyPGBasicInfo'
    ]);

    Route::post('/my-pg/edit/pg-basic-info/{id}', [
        'as' => 'rent_admin.update_pg_lcoation_basic_info',
        'middleware' => ['rent_admin'],
        'uses' => 'PgLocationsController@updateMyPGBasicInfo'
    ]);


    Route::get('/my-pg/edit/pg-ammenity-info/{id}', [
        'as' => 'rent_admin.edit_pg_lcoation_ammenity_info',
        'middleware' => ['rent_admin'],
        'uses' => 'PgLocationsController@editMyPGAmmenityInfo'
    ]);

    Route::post('/my-pg/edit/pg-ammenity-info/{id}', [
        'as' => 'rent_admin.update_pg_lcoation_ammenity_info',
        'middleware' => ['rent_admin'],
        'uses' => 'PgLocationsController@updateMyPGAmmenityInfo'
    ]);

    
});

Route::group(['prefix'=>'search'], function() {
    
    Route::get('/pg/geo', [
        'as' => 'pg.search_by_geolocation',
        'uses' => 'SearchController@searchByGeoLocation'
    ]);

    Route::get('/{location_string}', [
        'as' => 'pg.search_by_location',
        'uses' => 'SearchController@searchByLocation'
    ]);  
});

Route::group(['prefix'=>'pg'], function() {
    
    Route::get('/view/{subname}/{seo_friend}/{id}', [
        'as' => 'pg.view',
        'uses' => 'PgController@view'
    ]);

    Route::get('/view-all-owners', [
        'as' => 'pg.view_owners',
        'uses' => 'AdminController@viewPGOwners'
    ]);

    Route::get('/all-bookings', [
        'as' => 'admin.all.bookings',
        'middleware' => ['admin'],
        'uses' => 'AdminController@allBookings'
    ]);
});


Route::group(['prefix'=>'admin/cms/'], function() {
    Route::get('/list-all-contents', [
        'as' => 'cms.index',
        'middleware' => ['admin'],
        'uses' => 'CMSController@index'
    ]);

    Route::get('/add', [
        'as' => 'cms.add',
        'middleware' => ['admin'],
        'uses' => 'CMSController@addCMSContent'
    ]);

    Route::post('/add', [
        'as' => 'cms.post',
        'middleware' => ['admin'],
        'uses' => 'CMSController@postCMSContent'
    ]);

    Route::get('/edit/{id}', [
        'as' => 'cms.edit',
        'middleware' => ['admin'],
        'uses' => 'CMSController@editCMSContent'
    ]);

    Route::post('/edit/{id}', [
        'as' => 'cms.update',
        'middleware' => ['admin'],
        'uses' => 'CMSController@updateCMSContent'
    ]);


    Route::get('/add-new-home-banner', [
        'as' => 'cms.add_home_banner',
        'middleware' => ['admin'],
        'uses' => 'CMSController@addNewHomeBanner'
    ]);


    Route::post('/add-new-home-banner', [
        'as' => 'cms.post_home_banner',
        'middleware' => ['admin'],
        'uses' => 'CMSController@postNewHomeBanner'
    ]);

    Route::get('/view-all-home-banners', [
        'as' => 'cms.view_all_home_banners',
        'middleware' => ['admin'],
        'uses' => 'CMSController@viewAllHomeBanners'
    ]);

    Route::get('/edit-home-banner/{id}', [
        'as' => 'cms.edit_home_banner',
        'middleware' => ['admin'],
        'uses' => 'CMSController@editHomeBanner'
    ]);

    Route::get('/update-home-banner/{id}', [
        'as' => 'cms.update_home_banner',
        'middleware' => ['admin'],
        'uses' => 'CMSController@updateHomeBanner'
    ]);

    Route::get('/activate-home-banner/{id}', [
        'as' => 'cms.activate_home_banner',
        'middleware' => ['admin'],
        'uses' => 'CMSController@activateHomeBanner'
    ]);


    Route::get('/disable-home-banner/{id}', [
        'as' => 'cms.disable_home_banner',
        'middleware' => ['admin'],
        'uses' => 'CMSController@disableHomeBanner'
    ]);
});

Route::group(['prefix'=>'rest'], function() {
    
    Route::get('/get-cities', [
        'as' => 'rest.get_cities',
        'uses' => 'RESTController@getAllCities'
    ]);

    Route::get('/get-sub-locations', [
        'as' => 'rest.get_sublocations',
        'uses' => 'RESTController@getSubLocations'
    ]);

    Route::get('/landmark/get-info', [
        'as' => 'rest.get_landmark_info',
        'uses' => 'RESTController@getLandmarkInfo'
    ]);

    Route::get('/pg-room/get-info', [
        'as' => 'rest.pg_room_info',
        'uses' => 'RESTController@getRoomPrice'
    ]);

    Route::get('/get-distance', [
        'as' => 'rest.get_distance',
        'uses' => 'RESTController@getDistance'
    ]);

    Route::get('/love-pg', [
        'as' => 'rest.love_pg',
        'uses' => 'RESTController@lovePG'
    ]);

    Route::get('/add-to-wishlist', [
        'as' => 'rest.add_to_wishlist',
        'uses' => 'RESTController@addToWishlist'
    ]);
    
});

Route::group(['prefix'=>'book'], function() {
    Route::get('/pg/{subname}/{seo_friend}', [
        'as' => 'book_pg',
        'middleware' => ['auth'],
        'uses' => 'PgController@book'
    ]); 

    Route::post('/confirm-book', [
        'as' => 'confirm_book_pg',
        'middleware' => ['auth'],
        'uses' => 'PgController@confirmBooking'
    ]); 
    
    Route::get('/booking/free/confirm/{pg_room_id}', [
        'as' => 'confirm_free_book_pg',
        'middleware' => ['auth'],
        'uses' => 'PgController@confirmFreeBooking'
    ]);

    Route::get('/booking/confirm/receipt/{booking_id}', [
        'as' => 'booking.confirm.recipt',
        'middleware' => ['auth'],
        'uses' => 'PgController@confirmReceiptGenerate'
    ]);
});

Route::group(['prefix'=>'users'], function() {
    Route::get('/view-all', [
        'as' => 'view_all_users',
        'middleware' => ['admin'],
        'uses' => 'AdminController@viewRegUsers'
    ]);  
    Route::get('/remove-user/{user_id}', [
        'as' => 'remove_user',
        'middleware' => ['admin'],
        'uses' => 'AdminController@removeUser'
    ]);
});

Route::group(['prefix'=>'coupon'], function() {
    Route::get('/view-all', [
        'as' => 'coupon.index',
        'middleware' => ['admin'],
        'uses' => 'CouponsController@viewAllCoupons'
    ]); 

    Route::get('/add', [
        'as' => 'coupon.add',
        'middleware' => ['admin'],
        'uses' => 'CouponsController@create'
    ]); 

    Route::post('/add', [
        'as' => 'coupon.post',
        'middleware' => ['admin'],
        'uses' => 'CouponsController@addCoupon'
    ]); 
});

Route::group(['prefix'=>'deal'], function() {
    Route::get('/view-all', [
        'as' => 'deal.index',
        'middleware' => ['admin'],
        'uses' => 'DealsController@viewAllDeals'
    ]); 

    Route::get('/add', [
        'as' => 'deal.add',
        'middleware' => ['admin'],
        'uses' => 'DealsController@create'
    ]); 

    Route::post('/add', [
        'as' => 'deal.post',
        'middleware' => ['admin'],
        'uses' => 'DealsController@addDeal'
    ]); 
});


Route::group(['prefix'=>'banner'], function() {
    Route::get('/view-all', [
        'as' => 'banner.index',
        'middleware' => ['admin'],
        'uses' => 'BannersController@viewAllBanners'
    ]); 

    Route::get('/add', [
        'as' => 'banner.add',
        'middleware' => ['admin'],
        'uses' => 'BannersController@create'
    ]); 

    Route::post('/add', [
        'as' => 'banner.post',
        'middleware' => ['admin'],
        'uses' => 'BannersController@addBanner'
    ]); 
});
 

Route::get('/website/{cms_code}', [
    'as' => 'cms_view',
    'uses' => 'CMSController@viewCMSContent'
]); 

//accept.guest.lists
Route::get('/guest/requests', [
    'as' => 'accept.guest.lists',
    'uses' => 'RentAdminController@pendingGuestLists'
]); 

Route::get('/accept/guest/{booking_id}', [
    'as' => 'accept.guest',
    'uses' => 'RentAdminController@acceptGuest'
]); 

Route::group(['prefix'=>'user'], function() {
    Route::get('/view-wishlist', [
        'as' => 'user.view_wishlist',
        'middleware' => ['auth'],
        'uses' => 'UsersController@viewWishlist'
    ]);

    Route::get('/edit-profile', [
        'as' => 'user.edit_profile',
        'middleware' => ['auth'],
        'uses' => 'UsersController@editProfile'
    ]);

    Route::post('/update-profile', [
        'as' => 'user.update_profile',
        'middleware' => ['auth'],
        'uses' => 'UsersController@updateProfile'
    ]);

    Route::get('/my-bookings', [
        'as' => 'user.bookings',
        'middleware' => ['auth'],
        'uses' => 'UsersController@viewMyBookings'
    ]);
});


Route::group(['prefix'=>'feedback'], function() {
    Route::get('/add', [
        'as' => 'user.add_feedback',
        'uses' => 'FeedbacksController@addFeedback'
    ]);

    Route::post('/add', [
        'as' => 'user.post_feedback',
        'uses' => 'FeedbacksController@postFeedback'
    ]);

    Route::get('/after-submit', [
        'as' => 'user.after_submit',
        'uses' => 'FeedbacksController@afterSubmit'
    ]);

    Route::get('/view', [
        'as' => 'admin.view_feedback',
        'middleware' => ['admin'],
        'uses' => 'FeedbacksController@view'
    ]);
});

Route::get("/make-pass", function(){
   return bcrypt('password');
});