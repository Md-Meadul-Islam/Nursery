<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\BuyerController;
use App\Http\Controllers\Backend\Seller\AllPlantsController;
use App\Http\Controllers\Backend\SellerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::group([], function () {
    Route::get('/', [HomeController::class, 'index'])->name('welcome');
    Route::get('/homesearchkey', [HomeController::class, 'searchKey'])->name('home.searchkey');
    Route::get('/homepagination', [HomeController::class, 'homePagination'])->name('home.pagination');
    Route::get('/homesearch', [HomeController::class, 'homeSearch'])->name('home.search');
    Route::get('/homeperpage', [HomeController::class, 'homePerPage'])->name('home.perpage');
    Route::get('/homefilter', [HomeController::class, 'homeFilter'])->name('home.filter');
    Route::get('/homeaddcart', [HomeController::class, 'homeAddToCart'])->name('home.addcart');
    Route::get('/homecart', [HomeController::class, 'homeCart'])->name('home.cart');
    Route::get('/homeremovecart', [HomeController::class, 'removeCartItem'])->name('home.removecart');
    Route::post('/homeconfirmorder', [HomeController::class, 'confirmOrder'])->name('home.confirmorder');
    Route::get('/hometopten', [HomeController::class, 'homeTopTen'])->name('home.topten');
    Route::get('/homegetowner', [HomeController::class, 'homeGetOwner'])->name('home.getowner');
    Route::post('/homeplantratingdetails', [HomeController::class, 'viewPlantRatingDetails'])->name('home.plantratingdetails');
    Route::post('/homecatchplantrating', [HomeController::class, 'catchPlantRating'])->name('home.catchplantrating');
});
Route::middleware(['auth', 'type:admin'])->prefix('admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});
Route::middleware(['auth', 'type:seller', 'web'])->prefix('seller')->group(function () {
    Route::get('dashboard', [SellerController::class, 'index'])->name('seller.dashboard');
    Route::get('addgardenpage', [SellerController::class, 'showAddGardenForm'])->name('seller.addgardenpage');
    Route::post('addgarden', [SellerController::class, 'addGarden'])->name('seller.addgarden');
    Route::get('viewgardenlist', [SellerController::class, 'viewGardenlist'])->name('seller.viewgardenlist');
    Route::get('allplants', [AllPlantsController::class, 'index'])->name('allplants.index');
    Route::post('allplants/store', [AllPlantsController::class, 'store'])->name('allplants.store');
    Route::post('allplants/update', [AllPlantsController::class, 'update'])->name('allplants.update');
    Route::post('allplants/delete', [AllPlantsController::class, 'destroy'])->name('allplants.delete');
    Route::get('allplants/paginated_plants', [AllPlantsController::class, 'paginate']);
});
Route::middleware(['auth', 'type:buyer'])->prefix('buyer')->group(function () {
    Route::get('dashboard', [BuyerController::class, 'index'])->name('buyer.dashboard');
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__ . '/auth.php';
