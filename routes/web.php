
<?php

//nên dùng as=>$controllerName bởi vì khi cần gọi url địa chỉ của từng trang thì route() gọi tên trang đó ra thôi
$prefixAdmin = config('zvn.url.prefix_admin');
$prefixNews = config('zvn.url.prefix_news');

Route::group(['prefix' => $prefixAdmin, 'namespace' => 'Admin'], function () {
        //quản lý dashboard
     $prefix ='dashboard';
     $controllerName = 'dashboard';
     Route::group(['prefix' => $prefix], function() use($controllerName) {
     $controller = ucfirst($controllerName).'Controller@';   
     Route::get('/',                           [ 'as'=>$controllerName,             'uses'=>$controller.'index']);

    });

    
  
    //quản lý slider
    $prefix ='slider';
    $controllerName = 'slider';
    Route::group(['prefix' => $prefix], function() use($controllerName) {
        $controller = ucfirst($controllerName).'Controller@';
        // Route::get('', function () {
        //     return 'slider list';
        // });
        // kenh14.com/admin/slider/controller.index

        Route::get('/',                           [ 'as' =>$controllerName,             'uses'=>$controller.'index']);
        Route::get('form/{id?}',                  [ 'as' =>$controllerName.'/form',     'uses'=>$controller.'form'])->where('id', '[0-9]+');
        Route::post('save',                       [ 'as' =>$controllerName.'/save',      'uses'=>$controller.'save']);
        Route::get('delete/{id}',                 [ 'as' =>$controllerName.'/delete',   'uses'=>$controller.'delete'])->where('id', '[0-9]+');
        Route::get('info/{id}',                 [ 'as'   =>$controllerName.'/info',   'uses'=>$controller.'info'])->where('id', '[0-9]+');
        Route::get('change-status-{status}/{id}', [ 'as' =>$controllerName.'/status',     'uses'=>$controller.'status']);
            //http://kenh14.com/admin/slider/change-status-active/3
   

    });


    
});
