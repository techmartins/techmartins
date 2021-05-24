<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpresaController;

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

// Route::get('/', function () {
//     return view('welcome');
// });





Route::group(['middleware' => 'auth'] , function() {

    // $this->middleware

    Route::get('/analytics', function() {
        // $category_name = '';
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'analytics',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        // $pageName = 'analytics';
        return view('dashboard')->with($data);
    });
    
    Route::get('/sales', function() {
        // $category_name = '';
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'sales',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        // $pageName = 'sales';
        return view('dashboard2')->with($data);
    });

    Route::get('/empresa', 'EmpresaController@index');
    Route::post('/empresa', 'EmpresaController@store')->name('empresa.store');
    Route::get('/empresa/{id}', 'EmpresaController@show')->name('empresa.show');
    Route::get('/empresa/{id}/edit', 'EmpresaController@edit')->name('empresa.edit');
    Route::put('/empresa/{id}', 'EmpresaController@update')->name('empresa.update');
    Route::delete('/empresa/{id}', 'EmpresaController@destroy')->name('empresa.destroy');


    Route::get('/cadastrar-profissional', function() {
        $data = [
            'category_name' => 'profissional',
            'page_name' => 'cadastrar-profissional',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        return view('profissional.cadastrar_profissional')->with($data);
    });

    Route::get('/config-geral', function() {
        $data = [
            'category_name' => 'configuracao',
            'page_name' => 'config-geral',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
        ];
        return view('pages.configuracao.config_geral')->with($data);
    });
    
    // Pages
    Route::prefix('pages')->group(function () {
        Route::get('/coming_soon', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'coming_soon',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'coming_soon';
            return view('pages.pages.pages_coming_soon')->with($data);
        });
        Route::get('/contact_us_form', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'contact_us',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'contact_us';
            return view('pages.pages.pages_contact_us')->with($data);
        });
        Route::get('/error_404', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'error404',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'error404';
            return view('pages.pages.pages_error404')->with($data);
        });
        Route::get('/error_500', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'error500',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'error500';
            return view('pages.pages.pages_error500')->with($data);
        });
        Route::get('/error_503', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'error503',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'error503';
            return view('pages.pages.pages_error503')->with($data);
        });
        Route::get('/faq', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'faq',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'faq';
            return view('pages.pages.pages_faq')->with($data);
        });
        Route::get('/faq2', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'faq2',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'faq2';
            return view('pages.pages.pages_faq2')->with($data);
        });
        Route::get('/helpdesk', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'helpdesk',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'helpdesk';
            return view('pages.pages.pages_helpdesk')->with($data);
        });
        Route::get('/maintenence', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'maintenence',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'maintenence';
            return view('pages.pages.pages_maintenence')->with($data);
        });
        Route::get('/privacy_policy', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'pages',
                'page_name' => 'privacy',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'privacy';
            return view('pages.pages.pages_privacy')->with($data);
        });
    });

    // Users
    Route::prefix('users')->group(function () {
        Route::get('/account_settings', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'users',
                'page_name' => 'account_settings',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'account_settings';
            return view('pages.users.user_account_setting')->with($data);
        });
        Route::get('/profile', function() {
            // $category_name = '';
            $data = [
                'category_name' => 'users',
                'page_name' => 'profile',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',

            ];
            // $pageName = 'profile';
            return view('pages.users.user_profile')->with($data);
        });
    });

});

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/register', function() {
    return redirect('/login');    
});
Route::get('/password/reset', function() {
    return redirect('/login');    
});

Route::get('/', function() {
    return redirect('/analytics');    
});

Route::resource('profissional','ProfissionalController');
