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

Route::get('/', [
    'uses' => 'frontendController@index',
    'as'   => 'index'
]);
Route::post('/subscribe', function(){
   $email = request('email');
   Newsletter::subscribe($email);
   Session::flash('success','you succesfully subscribed newslater!');
   return redirect()->back();
});
Route::get('/results', function(){
    $posts = \App\Post::where('title','like','%'.request('query').'%')->get();
    return view('results')->with('posts',$posts)
                        ->with('title','search Results : '.request('query'))
                        ->with('setting',\App\Setting::first())
                        ->with('categories',\App\Category::take(5)->get())
                        ->with('tags',\App\tag::all())
                        ->with('query', request('query'));
});
Route::get('/post/{slug}', [
    'uses' => 'frontendController@singlePost',
    'as'   => 'post.single'
]);

Route::get('/category/{id}', [
    'uses' => 'frontendController@category',
    'as'   => 'category.single'
]);

Route::get('/tag/{id}', [
    'uses' => 'frontendController@tag',
    'as'   => 'tag'
]);

Auth::routes();

Route::group(['prefix'  => 'admin','middleware' => 'auth'],function(){
    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    //settings
    Route::get('/settings', 'SettingsController@index')->name('settings');
    Route::post('/settings.update/{id}', 'SettingsController@update')->name('settings.update');


    //posts
    Route::get('/post/create', 'PostsController@create')->name('post.create');
    Route::post('/post/store', 'PostsController@store')->name('post.store');
    Route::get('/posts', 'PostsController@index')->name('posts');
    Route::get('/post/edit/{id}', 'PostsController@edit')->name('post.edit');
    Route::post('/post/update/{id}', 'PostsController@update')->name('post.update');
    Route::get('/post/delete/{id}', 'PostsController@destroy')->name('post.delete');
    Route::get('/post/trashed', 'PostsController@trashed')->name('post.trashed');
    Route::get('/post/restore/{id}', 'PostsController@restore')->name('post.restore');
    Route::get('/post/kill/{id}', 'PostsController@kill')->name('post.kill');
    

    //category
    Route::get('/category/create', 'CategoriesController@create')->name('category.create');
    Route::post('/category/store', 'CategoriesController@store')->name('category.store');
    Route::get('/categories', 'CategoriesController@index')->name('categories');
    Route::get('/category/edit/{id}', 'CategoriesController@edit')->name('category.edit');
    Route::post('/category/update/{id}', 'CategoriesController@update')->name('category.update');
    Route::get('/category/delete/{id}', 'CategoriesController@destroy')->name('category.delete');

    //Tags
    Route::get('/tag/create', 'TagController@create')->name('tag.create');
    Route::post('/tag/store', 'TagController@store')->name('tag.store');
    Route::get('/tags', 'TagController@index')->name('tags');
    Route::get('/tag/edit/{id}', 'TagController@edit')->name('tag.edit');
    Route::post('/tag/update/{id}', 'TagController@update')->name('tag.update');
    Route::get('/tag/delete/{id}', 'TagController@destroy')->name('tag.delete');

    //user
    Route::get('/user','UsersController@index')->name('users');
    Route::get('/user/create','UsersController@create')->name('user.create');
    Route::post('/user/store','UsersController@store')->name('user.store');
    Route::get('/user/admin/{id}','UsersController@admin')->name('user.admin');
    Route::get('/user/not_admin/{id}','UsersController@not_admin')->name('user.not.admin');
    Route::get('/user/profile','ProfileController@index')->name('user.profile');
    Route::post('/user/profile/update','ProfileController@update')->name('user.profile.update');
    Route::get('/user/delete/{id}','UsersController@destroy')->name('user.delete');

      
});

