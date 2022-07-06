<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\inventoryController;
use App\Http\Controllers\quotationController;
use App\Http\Controllers\purchaseorder\purchaseorderController;
use App\Http\Controllers\Authentication\UserAuthenticationController;
use App\Http\Controllers\invoiceController;
use App\Http\Controllers\ledgerController;
use App\Http\Controllers\DcController;
use App\Http\Controllers\reportsController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Voucher\VoucherController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\authCheck;
use App\Http\Middleware\alreadyLoggedin;
use App\Http\Controllers\FinancialOfferController;
use App\Http\Controllers\TechnicalOfferController;
use App\Http\Controllers\unitController;
use App\Http\Controllers\itemController;
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
// Auth Form
Route::get('/',[UserAuthenticationController::class,'login'])->middleware('isAlreadyLogged');

    // Auth Registration
    Route::post('/storeuser',[UserAuthenticationController::class,'storeuser'])->name('storeuser.todb');
    Route::post('/userlogin',[UserAuthenticationController::class,'userlogin'])->name('userlogin.soft');
    // logout
    Route::get('/logoutuser',[UserAuthenticationController::class,'logoutuser'])->name('logoutuser.soft');



Route::middleware([authCheck::class])->group(function () {
    Route::get('/registeruser',[UserAuthenticationController::class,'register']);





    Route::get('/dashboard',"App\Http\Controllers\dahboardController@index");

    Route::resource('/employee',"App\Http\Controllers\EmployeeController");
    Route::resource('/customer',"App\Http\Controllers\CustomerController");
    Route::resource('/category',"App\Http\Controllers\categoryController");
    Route::resource('/item',"App\Http\Controllers\itemController");
    Route::resource('/unit',"App\Http\Controllers\unitController");
    Route::resource('/supplier',"App\Http\Controllers\supplierController");
    Route::resource('/inventory',"App\Http\Controllers\inventoryController");
    Route::resource('/warehouse',"App\Http\Controllers\warehouseController");
    Route::resource('/quotation',"App\Http\Controllers\quotationController");
    Route::resource('/invoice',"App\Http\Controllers\invoiceController");
    Route::resource('/ledger',"App\Http\Controllers\ledgerController");


    Route::post('/getitems',[inventoryController::class,'getitems'])->name('getitems.oncat');
    Route::post('/getitemsonquotations',[quotationController::class,'getitemsoncat'])->name('quotationgetitems.oncat');
    Route::post('/getstockandprice',[quotationController::class,'get_item_detail'])->name('getstock.price');

    // for print the envolope and stick
    Route::get('/print', function () {
        return view('print.print');
    });

    //get recipet voucher
Route::get('/voucher',"App\Http\Controllers\Voucher\VoucherController@index");
//get payment voucher
Route::get('/payvoucher',"App\Http\Controllers\Voucher\VoucherController@pay");
//get general payment voucher
Route::get('/general',"App\Http\Controllers\Voucher\VoucherController@general");
//insert data in the gl acount table receipt voucher
Route::post('/store',[VoucherController::class,'store']);

//insert data in the gl acount table payment voucher
Route::post('/storepaymentvoucher',[VoucherController::class,'storepaymentvoucher']);

//insert data in the gl acount table general voucher
Route::post('/storegeneral',[VoucherController::class,'storegeneral']);
    // getting previous balance of invoice against master id
    Route::post('/getpreviousbalance',[invoiceController::class,'masterbalance'])->name('getpreviousbalance');
    // inseting installment using invoice controller
    Route::post('/addinstallment',[invoiceController::class,'insertinstallments']);
    // recievings

    // for getting stoc transaction out details view
    Route::get('/getreceving/{id}',[invoiceController::class,'invoicerecieving']);
    // for getting trsaction details using ajax
    Route::post('/getstocktransactiondata',[inventoryController::class,'getstockdatadetails'])->name('getstockwith.date');

    // for getting stockout view
    Route::get('/getstockintransactionview',[inventoryController::class,'getstockindetail']);
    // for getting stockin data
    Route::post('/getstockindetails',[inventoryController::class,'getstockindetails'])->name('stockin.date');



    // general ledger
    Route::post('/getdetaillegercredit',[ledgerController::class,'getdebitdetails'])->name('getdebitdetail.date');



    // return view for credit
    Route::get('/getCreditDetailsFromLedger',[ledgerController::class,'createledgercreditview']);
    // search data on ajax for credit details
    Route::post('/getCreditDetailsviewFromLedger',[ledgerController::class,'selectcreditdetails'])->name('customercedit.report');



    // return view general ledger credit dates creditdatesdetail
    Route::get('/getCreditDetailsbetweendates',[ledgerController::class,'creditdatesdetail']);
    // return Ajax Result
    Route::post('/getajaxledgerbetweendates',[ledgerController::class,'ceditdateshitory'])->name('ceditdateshitory.report');



    // dc
    Route::resource('/Delivery',"App\Http\Controllers\DcController");



    Route::resource('/purchaseorder',"App\Http\Controllers\purchaseorder\purchaseorderController");

    // Route for purchase order view action
    Route::get('/viewpoorder/{id}',[purchaseorderController::class,'PurchaseOrderview']);
    // route purchase order delete
    Route::get('/deletepoorder/{id}',[purchaseorderController::class,'PurchaseOrderDelete']);
    // purchase order parent update purchaseorderparentupdate
    Route::post('/purchaseorderparentupdate',[purchaseorderController::class,'purchaseorderparentupdate']);
    // purchase order comletition comletepoorder
    Route::get('/comletepoorder/{id}',[purchaseorderController::class,'comletepoorder']);

    // SELECTING ITEMS ON BASIS OF CATEGORY ON DC

    Route::post('/getstockandpriceondcitem',[DcController::class,'get_item_detail_dc'])->name('getstockondc.price');

    //exporting data in pdf
    Route::get('/invoicemaster/create-pdf', [invoiceController::class, 'exportPDF']);

    // reports controller
    // getting cusomers remaining balance
    ROute::get('/getCustomersRemaining','App\Http\Controllers\reportsController@getCustomersRemaining');
    // indiviual customer ledger
    ROute::get('/getCustomerLedger','App\Http\Controllers\reportsController@getCustomerLedger');
    // ajax get indiviual customer ledger between date
    ROute::post('/CustomerLedger',[reportsController::class, 'GetIndiviualCustomerDetail'])->name('IndiviualCustomerLedger.get');



    //
    // // Account COntroller
    // Route::resource('/account',"App\Http\Controllers\AccountController");
    // // Creating account
    // Route::post('/createaccount',[AccountController::class,'createuseraccount']);
    // // user login loginuser
    // Route::post('/loginuser',[AccountController::class,'loginuseraccount']);

    // Route::get('/logoutuser',[AccountController::class,'Logout']);


    // Route::get('/login', function () {
    //     return view('login.login');
    // })->middleware('userloggedout');



    Route::get('/invoicebill/{id}',[invoiceController::class,'invoicebill']);
    Route::post('/getSubGroupAccounts',[VoucherController::class,'getSubGroupAccounts'])->name('getSubGroupAccounts.get');
    Route::post('/CreateAccountAccReceipt',[VoucherController::class,'create_account_acc_receipt']);
    Route::get('/ViewNewSubAccountForm',[VoucherController::class,'ViewNewSubAccountForm']);
    Route::post('/GetSubGroup_on_new_sub_account',[VoucherController::class,'GetSubGroup_on_new_sub_account'])->name("GetSubGroup_on_new_sub_account.get");
    Route::post('/StoreNewSubGroupAccount',[VoucherController::class,'StoreNewSubGroupAccount']);
    Route::get('/generalvoucher',[VoucherController::class,'generalvoucherview']);
    Route::get('/ItemDetailedReport',[VoucherController::class,'ItemDetailedReportView']);
    Route::post('/ItemDetailInfo',[VoucherController::class,'ItemDetailInfo'])->name('itemDetail.get');
    // Pay Po
    Route::get('/PayBillView',[purchaseorderController::class,'PayBillView']);
    // ajax get unpaid po
    Route::post('/GetUnpaidPo',[purchaseorderController::class,'GetUnpaidPo'])->name('GetUnpaidPo.get');
    // ajax get po details
    Route::post('/GetPoDetailStatus',[purchaseorderController::class,'GetPoDetailStatus'])->name('GetPoDetailStatus.get');
    // pay bill
    Route::post('/PayBillPo',[purchaseorderController::class,'PayBillPo']);
    // supplier balance details
    Route::get('/SupplierBalanceDetail',[purchaseorderController::class,'SupplierBalanceDetail']);
    // fetch supplier records
    Route::post('/GetBalacneDetailSupplier',[purchaseorderController::class,'GetBalacneDetailSupplier'])->name('GetBalacneDetailSupplier.get');


    Route::get('editDC',[DcController::class,'edit']);
    Route::post('updateDC',[DcController::class,'update']);
    Route::post('deleteDCItem',[DcController::class,'deleteItem'])->name('deleteDCItem');
    Route::post('addSubUnit',[unitController::class,'addSubUnit']);
    
    //-----------------------------------------Financial offer routes-------------------------------------------------------
    Route::get('financialOfferView',[FinancialOfferController::class,'create']);
    Route::post('storeFinancialOffer',[FinancialOfferController::class,'store']);
    Route::get('getFinancialOffersList',[FinancialOfferController::class,'getFinancialOffersList']);
    Route::get('financialOfferPdf',[FinancialOfferController::class,'financialOfferPdf']);
    
    //-----------------------------------------Technical offer routes-------------------------------------------------------

    Route::get('geTechnicalOffersList',[TechnicalOfferController::class,'geTechnicalOffersList']);
    Route::get('technicalOfferPdf',[TechnicalOfferController::class,'technicalOfferPdf']);

    //----------------------------------------------------------item------------------
    Route::get('getUnitChildren',[itemController::class,'getUnitChildren'])->name('getUnitChildren');

    //------------------------------------------------INVOICES------------------
    Route::get('createInvoice',[invoiceController::class,'create']);
    Route::post('storeInvoice',[invoiceController::class,'store']);
    Route::get('invoicesList',[invoiceController::class,'index']);
});
