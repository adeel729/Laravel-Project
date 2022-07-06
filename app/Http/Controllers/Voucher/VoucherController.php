<?php

namespace App\Http\Controllers\voucher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\support\Facades\DB;

class VoucherController extends Controller
{
    public function index()
    {
        $data = DB::Select("SELECT a.a_id, a.name, b.account_group_name, c.account_sub_group_name FROM `macounts` a JOIN account_group b ON a.account_group_id = b.account_group_id JOIN account_sub_group c ON a.account_sub_group_id = c.account_sub_group_id WHERE status=1 AND a.account_sub_group_id=1");
        $account = DB::Select("SELECT a.a_id, a.name, b.account_group_name, c.account_sub_group_name FROM `macounts` a JOIN account_group b ON a.account_group_id = b.account_group_id JOIN account_sub_group c ON a.account_sub_group_id = c.account_sub_group_id WHERE status=1");
        $account_group = DB::Select("SELECT `account_group_id`, `account_group_name` FROM `account_group` ");
        return view('voucher.acc_receipt_voucher', compact("data", "account", "account_group"));
    }

    public function pay()
    {
        $data = DB::Select("SELECT a.a_id, a.name, b.account_group_name, c.account_sub_group_name FROM `macounts` a JOIN account_group b ON a.account_group_id = b.account_group_id JOIN account_sub_group c ON a.account_sub_group_id = c.account_sub_group_id WHERE status=1 AND a.account_sub_group_id=1");
        $account = DB::Select("SELECT a.a_id, a.name, b.account_group_name, c.account_sub_group_name FROM `macounts` a JOIN account_group b ON a.account_group_id = b.account_group_id JOIN account_sub_group c ON a.account_sub_group_id = c.account_sub_group_id WHERE status=1");
        $account_group = DB::Select("SELECT `account_group_id`, `account_group_name` FROM `account_group` ");
        return view('voucher.pay_voucher', compact("data", "account", "account_group"));
    }

    public function general()
    {
        $account = DB::Select("SELECT a.a_id, a.name, b.account_group_name, c.account_sub_group_name FROM `macounts` a JOIN account_group b ON a.account_group_id = b.account_group_id JOIN account_sub_group c ON a.account_sub_group_id = c.account_sub_group_id WHERE status=1");
        return view('voucher.new_j_voucher', compact("account"));
    }
    public function store(Request $request)
    {
        //storing data in array
        $data = array(
            'a_id' => $request->debit_a_id,
            'description' => $request->description,
            't_date' => $request->t_date,
            'debit' => $request->amount,
            // 'p_id'=>$request->p_id
        );
        //inserting data        

        $gl_id = DB::table('gl_account')->insertGetId($data);
        $voucher_last_id = 'R-v-' . $gl_id;
        $result = DB::table('gl_account')->where('gl_id', $gl_id)->update(['voucher_no' => $voucher_last_id]);
        //redirecting to a view


        // 2ND ENTRY    

        $data2 = array(
            'a_id' => $request->credit_a_id,
            'description' => $request->description,
            't_date' => $request->t_date,
            'credit' => $request->amount,
            // 'p_id'=>$request->p_id
        );

        $gl_id2 = DB::table('gl_account')->insertGetId($data2);
        $voucher_last_id2 = 'R-v-' . $gl_id;
        $result = DB::table('gl_account')->where('gl_id', $gl_id2)->update(['voucher_no' => $voucher_last_id2]);



        if ($result) {
            return redirect('/voucher')->with("AccountAdded", "New Acount Added");
        }
    }

    public function storepaymentvoucher(Request $request)
    {
        //storing data in array
        $data = array(
            't_date' => $request->t_date,
            'a_id' => $request->debit_a_id,
            'debit' => $request->amount,
            'credit' => $request->credit_a_id,
            'description' => $request->description,
            'p_id' => $request->p_id
        );
        //inserting data        

        $gl_id = DB::table('gl_account')->insertGetId($data);
        $voucher_last_id = 'P-v-' . $gl_id;
        $result = DB::table('gl_account')->where('gl_id', $gl_id)->update(['voucher_no' => $voucher_last_id]);
        //redirecting to a view
        if ($result) {
            return redirect('/payvoucher')->with("AccountAdded", "New Acount Added");
        }
    }

    public function storegeneral(Request $request)
    {
        $tdate = $request->t_date;
        $p_id = $request->p_id;

        for ($a = 0; $a < count($request->debit); $a++) {
            //storing data in array
            $data = array(
                'a_id' => $request->debit_a_id[$a],
                'debit' => $request->amount[$a],
                'credit' => $request->credit_a_id[$a],
                'description' => $request->description[$a],
            );
            //inserting data   03045593274     

            $gl_id = DB::table('gl_account')->insertGetId([$data]);
            $voucher_last_id = 'G-v-' . $gl_id;
            $result = DB::table('gl_account')->where('gl_id', $gl_id)->update(['voucher_no' => $voucher_last_id]);
            //redirecting to a view
            if ($result) {
                return redirect('/general')->with("AccountAdded", "New Acount Added");
            }
        }
    }



    // ajax to return subgroups
    public function getSubGroupAccounts(Request $request)
    {
        $account_group_id = $request->get('account_group_id');
        $accounts_sub_groups = DB::Select("SELECT `account_sub_group_id`, `account_sub_group_name` FROM `account_sub_group` WHERE `account_group_id`=$account_group_id");
        return view('ajax.getSubgroup', compact("accounts_sub_groups"));
    }
    // insertion of new account in account reciept
    public function create_account_acc_receipt(Request $request)
    {
        $today_date = date('Y-m-d');
        // `a_id`, `name`, `description`, `code`, `date`, `account_group_id`, `account_sub_group_id`, `status`, 
        $data = array(
            'name' => $request->acc_name,
            'description' => $request->acc_description,
            'date' => $today_date,
            'account_group_id' => $request->account_group,
            'account_sub_group_id' => $request->account_sub_group
        );
        DB::table('macounts')->insert($data);
        return back();
    }
    // Accounts
    public function ViewNewSubAccountForm()
    {

        $data = DB::Select("SELECT a.a_id, a.name, b.account_group_name, c.account_sub_group_name FROM `macounts` a JOIN account_group b ON a.account_group_id = b.account_group_id JOIN account_sub_group c ON a.account_sub_group_id = c.account_sub_group_id WHERE status=1 AND a.account_sub_group_id=1");
        $account = DB::Select("SELECT a.a_id, a.name, b.account_group_name, c.account_sub_group_name FROM `macounts` a JOIN account_group b ON a.account_group_id = b.account_group_id JOIN account_sub_group c ON a.account_sub_group_id = c.account_sub_group_id WHERE status=1");
        $maccount = DB::Select("SELECT * FROM `macounts` ");
        $account_group = DB::Select("SELECT * FROM `account_group` ");
        return view('accounting.new_sub_account', compact("data", "maccount", "account_group"));
    }

    public function GetSubGroup_on_new_sub_account(Request $request)
    {
        $account_group_id = $request->get('account_group_id');
        $Sub_group_data = DB::select("SELECT * FROM `account_sub_group` WHERE `account_group_id`=$account_group_id");
        return view('ajax.sub_group_sub_Accounts', ['Sub_group_data' => $Sub_group_data]);
    }
    // insert new sub group 
    public function StoreNewSubGroupAccount(Request $request)
    {
        // `a_id`, `name`, `description`, `code`, `date`, `account_group_id`, `account_sub_group_id`,
        $code = 'NA';
        // $debit=0;
        // $credit=0;
        // $balance=0;
        // $acc_desc='openig balance entry';
        $data = array(
            'name' => $request->name,
            'code' => $code,
            'description' => $request->description,
            'account_group_id' => $request->account_group_id,
            'account_sub_group_id' => $request->account_sub_group_id
        );
        DB::table("macounts")->insert($data);
        return back();
    }
    // return general voucher
    public function generalvoucherview()
    {
        $data = DB::Select("SELECT a.a_id, a.name, b.account_group_name, c.account_sub_group_name FROM `macounts` a JOIN account_group b ON a.account_group_id = b.account_group_id JOIN account_sub_group c ON a.account_sub_group_id = c.account_sub_group_id WHERE status=1 AND a.account_sub_group_id=1");
        $account = DB::Select("SELECT a.a_id, a.name, b.account_group_name, c.account_sub_group_name FROM `macounts` a JOIN account_group b ON a.account_group_id = b.account_group_id JOIN account_sub_group c ON a.account_sub_group_id = c.account_sub_group_id WHERE status=1");
        $maccount = DB::Select("SELECT * FROM `macounts` ");
        $account_group = DB::Select("SELECT * FROM `account_group` ");
        return view('accounting.viewGeneralEntries', compact("data", "account"));
    }

    public function ItemDetailedReportView()
    {
        $Items = DB::Select("SELECT `itemid`, `itemname` FROM `items` ");
        return view('reports.ItemDetailedReportView', compact("Items"));
    }


    public function ItemDetailInfo(Request $request)
    {
        $from = $request->get('from');
        $to = $request->get('to');
        $itemid = $request->get('itemid');

        $CurrentSTock = DB::select("SELECT items.itemname,inventories.unitprice,inventories.quantity,(inventories.unitprice*inventories.quantity) as total_cost_of_goods,inventories.purchasedate
    from inventories
    inner join items on inventories.itemid=items.itemid
    where inventories.itemid='$itemid' and inventories.purchasedate BETWEEN '$from' and '$to'");

        $Inventory_In = DB::select("SELECT items.itemname,inventories.unitprice,stocktransactions.stockinquantity,(inventories.unitprice*stocktransactions.stockinquantity) as 
    purchase_price,stocktransactions.sotckindate  
    from stocktransactions
    inner join items on stocktransactions.itemid=items.itemid 
    inner join inventories on stocktransactions.inventoryid=inventories.inventoryid
    where
    stocktransactions.itemid=$itemid and stocktransactions.sotckindate between '$from' and '$to'");
        $Inventory_out = DB::select("select invoicemasters.invoicennumber,invoicemasters.invoicedate,items.itemname,invoicechildren.unitprice,invoicechildren.quantity,invoicechildren.totalprice
    from dc_parents 
    inner JOIN invoicemasters on dc_parents.dcparentid=invoicemasters.dcparentid
    inner join invoicechildren on invoicemasters.imasterid=invoicechildren.imasterid
    inner join items on invoicechildren.itemid=items.itemid
    where dc_parents.dcdate BETWEEN '$from' and '$to' and invoicechildren.itemid=$itemid");

        return view('ajax.ItemDetailViewAjax', compact("CurrentSTock", "Inventory_In", "Inventory_out", "from", "to"));
    }
}
