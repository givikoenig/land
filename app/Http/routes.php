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

Route::group([],function() {
    
    Route::match(['get','post'],'/',['uses'=>'IndexController@execute','as'=>'home']);
    Route::get('/page/{alias}',['uses'=>'PageController@execute','as'=>'page']);
    
    Route::auth();
    
});

//Route::get('/create', function(){
//    App\User::create([
//        'name' => 'SomeName',
//        'email' => 'Some@email',
//        'login' => 'somelogin',
//        'password' => bcrypt('SomePassword'),
//    ]);
//});

// admin/page, admin/portfopio, etc.
Route::group(['prefix'=>'admin','middleware'=>'auth'], function() {
    //admin
    Route::get('/', function() {
        
        if(view()->exists('admin.index')) {
            $data = ['title'=> 'Панель администратора'];
            
            return view('admin.index',$data);
        }
    });
    // admin/pages
    Route::group(['prefix'=>'pages'],function() {
        ///admin/pages
        Route::get('/',['uses'=>'PagesController@execute','as'=>'pages']);
        ///admin/pages/add
        Route::match(['get','post'],'/add',['uses'=>'PagesAddController@execute','as'=>'pagesAdd']);
        ///admin/pages/edit/2
        Route::match(['get','post','delete'],'/edit/{page}',['uses'=>'PagesEditController@execute','as'=>'pagesEdit']);
        
    });

    Route::group(['prefix'=>'portfolios'],function() {
        Route::get('/',['uses'=>'PortfoliosController@execute','as'=>'portfolio']);
        Route::match(['get','post'],'/add',['uses'=>'PortfoliosAddController@execute','as'=>'portfoliosAdd']);
        Route::match(['get','post','delete'],'/edit/{portfolio}',['uses'=>'PortfoliosEditController@execute','as'=>'portfoliosEdit']);
        
    });
    
    Route::group(['prefix'=>'services'],function() {
        Route::get('/',['uses'=>'ServicesController@execute','as'=>'services']);
        Route::match(['get','post'],'/add',['uses'=>'ServicesAddController@execute','as'=>'servicesAdd']);
        Route::match(['get','post','delete'],'/edit/{service}',['uses'=>'ServicesEditController@execute','as'=>'servicesEdit']);
        
    });
    
});