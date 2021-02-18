<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use League\CommonMark\Block\Element\Document;

class GoodsReceiptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goodsreceipt = DB::table('s_goods_receipt')
            ->where('branch_id', '=', Session::get('branch_id'))
            ->whereDay('documentdate', '=', date("d"))
            ->whereMonth('documentdate', '=', date("m"))
            ->whereYear('documentdate', '=', date("Y"))
            ->paginate(5);
        // ->sortByDesc('gr_code'); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
        // var_dump($goodsreceipt);
        // echo date("Y-m-d");
        // die;
        $vendorall = DB::table('s_vendor')
            ->select(DB::raw('DISTINCT vendor_code,name'))
            ->orderBy('name', 'asc')
            ->get();
        return view('goods/GoodsReceipt/index', ['nama' => 'Goods Receipt', 'docdate' => date("Y-m-d"), 'status' => 'ALL STATUS', 'goodsreceipt' => $goodsreceipt, 'vendorall' => $vendorall, 'vendor' => '**ALL VENDOR**']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendorall = DB::table('s_vendor')
            ->select(DB::raw('DISTINCT vendor_code,name'))
            ->orderBy('name', 'asc')
            ->get();
        // echo  $this->generateStore('S001');
        // die;
        return view('goods/GoodsReceipt/create', ['vendorall' => $vendorall]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createnew(Request $request)
    {


        if (DB::table('s_goods_receipt')
            ->where(DB::raw("substring(gr_code, 5, 6)"), '=', date('ymd'))
            ->doesntExist()
        ) {
            $gr_code = 'GR' . substr(Session::get('branch_id'), -2) . date('ymd') . '001';
        } else {
            $check = DB::table('s_goods_receipt')
                ->where(DB::raw("substring(gr_code, 5, 6)"), '=', date('ymd'))
                ->get()
                ->sortByDesc((int)'gr_code');
            // dd($check);
            $gr_code = 'GR' . substr(Session::get('branch_id'), -2) . date('ymd') . $this->generateCode((int)substr($check[0]->gr_code, -4));
        }


        $docdate = $request->input('docdate');
        $status = $request->input('status');
        $vendor_code = substr($request->input('vendor_code'), -5);
        $vendor_name = substr($request->input('vendor_code'), 0, strlen($request->input('vendor_code')) - 8);
        $remarks = $request->input('remarks');
        DB::table('s_goods_receipt')->insert(
            [
                'branch_id' => Session::get('branch_id'), 'branchname' => $this->generateStore(Session::get('branch_id')),
                'gr_code' => $gr_code, 'status' => $status,
                'postingdate' => date('Y-m-d'), 'documentdate' => $docdate,
                'vendor_code' => $vendor_code, 'vendorname' => $vendor_name,
                'remarks' => $remarks, 'useradded' => Session::get('user'),
                'dateadded' => date('Y-m-d'), 'useredited' => Session::get('user'), 'dateedited' => date('Y-m-d')
            ]
        );
        return redirect('/goods/goods-receipt');
    }


    public function generateCode($var)
    {
        if ($var + 1 < 10) {
            return '00' . ($var + 1);
        } elseif ($var + 1 < 100) {
            return '0' . ($var + 1);
        } else {
            return ($var + 1);
        }
    }

    public function generateStore($var)
    {
        switch ($var) {
            case "HO01":
                return 'Head Office';
                break;
            case "S001":
                return 'STAR MKG';
                break;
            case "S002":
                return 'STAR SMS';
                break;
            case "S003":
                return 'STAR SMB';
                break;
            case "S025":
                return 'STAR ECOMMERCE';
                break;
            default:
                return 'ERROR';
                break;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $docdate = $request->input('docdate');
        $day =  date("d", strtotime($docdate));
        $month = date("m", strtotime($docdate));
        $year = date("Y", strtotime($docdate));
        $status = $request->input('status');
        $vendorcode = $request->input('vendor_code');

        if ($vendorcode == '**ALL VENDOR**' &&  $status == 'ALL STATUS') {
            $goodsreceipt = DB::table('s_goods_receipt')
                ->where('branch_id', '=', Session::get('branch_id'))
                ->whereDay('documentdate', '=', $day)
                ->whereMonth('documentdate', '=', $month)
                ->whereYear('documentdate', '=', $year)
                // ->get()
                ->paginate(5);
            // ->sortByDesc('gr_code'); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
        } elseif ($vendorcode == '**ALL VENDOR**' &&  $status != 'ALL STATUS') {
            $goodsreceipt = DB::table('s_goods_receipt')
                ->where([['status', '=', $status], ['branch_id', '=', Session::get('branch_id')]])
                ->whereDay('documentdate', '=', $day)
                ->whereMonth('documentdate', '=', $month)
                ->whereYear('documentdate', '=', $year)
                ->paginate(5);
            // ->sortByDesc('gr_code'); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
        } elseif ($vendorcode != '**ALL VENDOR**' &&  $status == 'ALL STATUS') {
            $goodsreceipt = DB::table('s_goods_receipt')
                ->where([['vendor_code', '=', substr($vendorcode, -5)], ['branch_id', '=', Session::get('branch_id')]])
                ->whereDay('documentdate', '=', $day)
                ->whereMonth('documentdate', '=', $month)
                ->whereYear('documentdate', '=', $year)
                ->paginate(5);
            // ->sortByDesc('gr_code'); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
        } else {
            $goodsreceipt = DB::table('s_goods_receipt')
                ->where([['status', '=', $status], ['vendor_code', '=', substr($vendorcode, -5)], ['branch_id', '=', Session::get('branch_id')]])
                ->whereDay('documentdate', '=', $day)
                ->whereMonth('documentdate', '=', $month)
                ->whereYear('documentdate', '=', $year)
                ->paginate(5);
            // ->sortByDesc('gr_code'); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
        }
        $vendorall = DB::table('s_vendor')
            ->select(DB::raw('DISTINCT vendor_code,name'))
            ->orderBy('name', 'asc')
            ->get();
        return view('goods/GoodsReceipt/index',  ['nama' => 'Goods Receipt', 'docdate' =>  $docdate, 'status' => $status, 'goodsreceipt' => $goodsreceipt, 'vendorall' => $vendorall, 'vendor' => $vendorcode]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goodsreceipt = DB::table('s_goods_receipt')->where('gr_code', '=', $id)->get(); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
        // var_dump($goodsreceipt);
        // die;
        // $docdate = date("Y-m-d", strtotime($goodsreceipt[0]->documentdate));

        $vendorall = DB::table('s_vendor')
            ->select(DB::raw('DISTINCT vendor_code,name'))
            ->orderBy('name', 'asc')
            ->get();
        // echo $goodsreceipt[0]->vendorname . ' - ' . $goodsreceipt[0]->vendor_code;
        // die;
        return view('goods/GoodsReceipt/edit', ['nama' => 'Goods Receipt', 'goodsreceipt' => $goodsreceipt, 'vendorall' => $vendorall, 'vendor' => $goodsreceipt[0]->vendorname . ' - ' . $goodsreceipt[0]->vendor_code]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $docdate = $request->input('docdate');
        // $day =  date("d", strtotime($docdate));
        // $month = date("m", strtotime($docdate));
        // $year = date("Y", strtotime($docdate));
        $status = $request->input('status');

        $gr_code = $request->input('gr_code');
        if ($status == 'POST') {
            if (DB::table('s_goods_receipt_detail')
                ->where('gr_code', '=', $gr_code)
                ->doesntExist()
            ) {
                $goodsreceipt = DB::table('s_goods_receipt')->where('gr_code', '=', $gr_code)->get(); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database

                $vendorall = DB::table('s_vendor')
                    ->select(DB::raw('DISTINCT vendor_code,name'))
                    ->orderBy('name', 'asc')
                    ->get();
                return view('goods\GoodsReceipt\edit', ['nama' => 'Goods Receipt', 'status' => 'Failed', 'goodsreceipt' => $goodsreceipt, 'vendorall' => $vendorall, 'vendor' => $request->input('vendor_code')]);
                // return redirect('goods-receipt/' . $gr_code, [$status => 'Failed']);
                // return redirect('/goods-receipt/' . $gr_code . '?status=gagal');
                //     ->withInput();
                // return back()->with('status', 'failed');
                // return redirect('edit'])->with('status', 'Customer Invoice Approved!!!');
            } else {

                DB::update('exec updatestokGR ' . $gr_code . ' ');
            }
        }

        $vendor_code = $request->input('vendor_code');
        $vendor_name = $request->input('vendor_name');
        $remarks = $request->input('remarks');
        DB::table('s_goods_receipt')
            ->where('gr_code', $gr_code)
            ->update(['documentdate' => $docdate, 'status' => $status, 'vendor_code' => substr($vendor_code, -5), 'vendorname' => substr($vendor_code, 0, strlen($vendor_code) - 8), 'remarks' => $remarks]);
        return redirect('/goods/goods-receipt');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('s_goods_receipt')->where('gr_code', '=', $id)->delete();
        DB::table('s_goods_receipt_detail')->where('gr_code', '=', $id)->delete();
        return redirect('/goods/goods-receipt');
    }
}
