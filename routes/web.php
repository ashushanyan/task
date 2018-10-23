<?php


Route::get('/',  'PagesController@index');
Route::get('/about',  'PagesController@about');
Route::get('/services',  'PagesController@services');

Route::middleware(['auth'])->group(function () {

    Route::resource('users', 'User\UsersController');
    Route::resource('posts', 'Post\PostsController');
    Route::resource('comments', 'Comment\CommentsController');
    Route::resource('tags', 'Tag\TagsController');
    Route::resource('messages', 'Message\MessagesController');
    Route::resource('chat', 'Chat\ChatController');
    Route::resource('groupChats', 'GroupChat\GroupChatsController');
    Route::resource('groupMessages', 'GroupMessage\GroupMessagesController');
    Route::post('addTag', 'Post\PostsController@addTagInPost');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');


//Route::get('/foo', function () {
//    return view('flo');
//});