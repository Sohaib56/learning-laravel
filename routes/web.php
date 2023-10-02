<?php
use App\Models\User;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\profile\AvatarController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


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
    // view all
    // $users=DB::select('select * from users');
    // $users=User::find(1);
    // Inserting
    // $user=DB::insert('insert into users (name,email,password) value(?,?,?)',[
    //     'Ali',
    //     'alibhai1@gmail.com',
    //     'ali12345'
    // ]);
    // $user=DB::table('users')->insert([
    //     'name'=>'Syed',
    //     'email'=>'syed1@gmail.com',
    //     'password'=>'abcd12345'
    // ]);
    // $user=User::create([
    //         'name'=>'Ali Arslan',
    //          'email'=>'arslan356@gmail.com',
    //          'password'=>'arslanabc12345'
    //      ]);
    // Update in users
    // $user=DB::update('update users set name=? where email=?',[
    // 'Ali Bhai',
    // 'alibhai@gmail.com']);
    // $user=DB::table('users')->where('id',1)->update(['password'=>'def67890']);
    // deleting
    // $deleted = DB::delete('delete from users where id = ?', [7]);
        // $user=DB::table('users')->where('id',10)->delete();
    // dd($user->name);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
