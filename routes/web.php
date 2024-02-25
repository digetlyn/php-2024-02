<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/articles/create', function () {  //글쓰기 화면쪽 라우터
    return view('articles/create');
});


//유효성 검사.
Route::post('/articles', function (Request $request) {   //글쓰기를 완료하면 hello라는 문구가 나온다.

    // 비어있지 않고, 문자열이고, 255자를 넘으면 안된다는 규칙을 가정.
    
    //배열형태로도 가능
    $request->validate([
        'body'=>[
            'required',
            'string',
            'max:255'            
        ],
    ]);
    // $body = $_POST['body'];

    // if(!$body){
    //     return redirect()->back();
    // }

    // if(!is_string($body)){
    //     return redirect()-> back();
    // }

    // if(strlen($body) > 255){
    //     return redirect()-> back();
    // }
    return 'hello';
});