<?php

/*Route::get('think', function () {
    return 'hello,ThinkPHP5!';
});

Route::get('hello/:name', 'index/hello');


return [

];*/
Route::group('index', function ()
{
    Route::get('index', 'index/indexController/index');
    Route::get('hello', 'index/indexController/hello');
    // http://mist.cc/index/edit/John
    Route::get('edit/:name', '\app\index\controller\IndexController@edit');
});
Route::group('post', function ()
{
    Route::post('add', '\app\index\controller\PostController@add');
})->middleware(app\http\middleware\Check::class);
