<?php



use App\Http\Controllers\IndexController;
use App\Http\Controllers\GoodsController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\GoodsReceiptController;
use App\Http\Controllers\GoodsReceiptDetailsController;
use App\Http\Controllers\GoodsReturnController;
use App\Http\Controllers\GoodsReturnDetailsController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\LinkTreeController;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Route;

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



Route::get('/', [IndexController::class, 'index']);


//goods
Route::get('/goods', [GoodsController::class, 'login']);
Route::post('/goods/login', [GoodsController::class, 'home']);
Route::get('/goods/logout', [GoodsController::class, 'logout']);
Route::get('/goods/inventory', [InventoryController::class, 'index']);
Route::get('/goods/inventory/export/{brand}/{date}', [ExcelController::class, 'exportInventory'])->name('export.excel');
Route::get('/goods/inventory/exportpdf/{brand}/{date}', [PDFController::class, 'exportpdfInventory'])->name('export.pdf');
Route::match(['get', 'post'], '/goods/inventory/view', [InventoryController::class, 'store']); //mencoba akalin pagination tidak bisa pakai post

Route::get('/goods/goods-receipt', [GoodsReceiptController::class, 'index']);
Route::get('/goods/goods-receipt/export/{date}/{status}/{vendor}', [ExcelController::class, 'exportGoodsReceipt'])->name('export.excelGoodsReceipt');
Route::get('/goods/goods-receipt/exportpdf/{date}/{status}/{vendor}', [PDFController::class, 'exportpdfGoodsReceipt'])->name('export.pdfGoodsReceipt');

Route::get('/goods/goods-receipt/create', [GoodsReceiptController::class, 'create']);
Route::get('/goods/goods-receipt/{gr_code}', [GoodsReceiptController::class, 'edit']);
Route::get('/goods/goods-receipt/delete/{any}', [GoodsReceiptController::class, 'destroy']);
Route::post('/goods/goods-receipt/view', [GoodsReceiptController::class, 'store']);
Route::get('/goods/goods-receipt/{any}', [GoodsReceiptController::class, 'index']);
Route::post('/goods/goods-receipt/change', [GoodsReceiptController::class, 'update']);
Route::post('/goods/goods-receipt/createnew', [GoodsReceiptController::class, 'createnew']);
Route::post('/goods/goods-receipt-details/create', [GoodsReceiptDetailsController::class, 'create']);
Route::get('/goods/goods-receipt-details/{any}', [GoodsReceiptDetailsController::class, 'show']);
Route::get('/goods/goods-receipt-details/delete/{id}/{article}', [GoodsReceiptDetailsController::class, 'destroy'])->name('delete.detailGR');

Route::get('/goods/goods-return', [GoodsReturnController::class, 'index']);
Route::post('/goods/goods-return/view', [GoodsReturnController::class, 'store']);
Route::get('/goods/goods-return/delete/{any}', [GoodsReturnController::class, 'destroy']);
Route::get('/goods/goods-return/create', [GoodsReturnController::class, 'create']);
Route::get('/goods/goods-return/{rt_code}', [GoodsReturnController::class, 'edit']);
Route::get('/goods/goods-return/{any}', [GoodsReturnController::class, 'index']);
Route::post('/goods/goods-return/change', [GoodsReturnController::class, 'update']);
Route::post('/goods/goods-return/createnew', [GoodsReturnController::class, 'createnew']);
Route::get('/goods/goods-return/export/{date}/{status}/{vendor}', [ExcelController::class, 'exportGoodsReturn'])->name('export.excelGoodsReturn');
Route::get('/goods/goods-return/exportpdf/{date}/{status}/{vendor}', [PDFController::class, 'exportpdfGoodsReturn'])->name('export.pdfGoodsReturn');
Route::post('/goods/goods-return-details/create', [GoodsReturnDetailsController::class, 'create']);
Route::get('/goods/goods-return-details/{any}', [GoodsReturnDetailsController::class, 'show']);
Route::get('/goods/goods-return-details/delete/{id}/{article}', [GoodsReturnDetailsController::class, 'destroy'])->name('delete.detailRT');

Route::post('/goods/autocomplete/fetch', [GoodsController::class, 'fetch'])->name('autocomplete.fetch');
Route::get('/goods/{any}', [GoodsController::class, 'login']);


//link tree
Route::get('/linktree', [LinkTreeController::class, 'login']);
Route::post('/linktree/home', [LinkTreeController::class, 'home']);
Route::get('/linktree/logout', [LinkTreeController::class, 'logout']);
Route::post('/linktree/save', [LinkTreeController::class, 'create']);
Route::post('/linktree/delete', [LinkTreeController::class, 'destroy']);
Route::get('/linktree/select/{name}', [LinkTreeController::class, 'store']);

//api
Route::get('/api', [ApiController::class, 'index']);
Route::get('/api/all', [ApiController::class, 'get']);
Route::post('/api/save', [ApiController::class, 'create']);
Route::post('/api/update', [ApiController::class, 'edit']);
Route::get('/api/{id}', [ApiController::class, 'getid']);
Route::get('/api/delete/{id}', [ApiController::class, 'destroy']);
