<?php

namespace App\Http\Controllers;

use App\Models\GoodsReturn;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class GoodsReturnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goodsreturn = GoodsReturn::where('branch_id', '=', Session::get('branch_id'))
            ->whereDay('documentdate', '=', date("d"))
            ->whereMonth('documentdate', '=', date("m"))
            ->whereYear('documentdate', '=', date("Y"))
            ->paginate(5);
        // echo  $goodsreturn[1]->rt_code;
        // die;
        $vendorall = DB::table('s_vendor')
            ->select(DB::raw('DISTINCT vendor_code,name'))
            ->orderBy('name', 'asc')
            ->get();
        return view('goods/GoodsReturn/index', ['nama' => 'Goods Return', 'docdate' => date("Y-m-d"), 'status' => 'ALL STATUS', 'goodsreturn' => $goodsreturn, 'vendorall' => $vendorall, 'vendor' => '**ALL VENDOR**']);
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
        return view('goods/GoodsReturn/create', ['vendorall' => $vendorall]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function createnew(Request $request)
    {


        if (GoodsReturn::where(DB::raw("substring(rt_code, 5, 6)"), '=', date('ymd'))
            ->doesntExist()
        ) {
            $rt_code = 'RT' . substr(Session::get('branch_id'), -2) . date('ymd') . '001';
        } else {
            $check = GoodsReturn::where(DB::raw("substring(rt_code, 5, 6)"), '=', date('ymd'))
                ->get()
                ->sortByDesc((int)'rt_code');
            // dd($check);
            $rt_code = 'RT' . substr(Session::get('branch_id'), -2) . date('ymd') . $this->generateCode((int)substr($check[0]->rt_code, -4));
        }


        $docdate = $request->input('docdate');
        $status = $request->input('status');
        $vendor_code = substr($request->input('vendor_code'), -5);
        $vendor_name = substr($request->input('vendor_code'), 0, strlen($request->input('vendor_code')) - 8);
        $remarks = $request->input('remarks');

        $GoodsReturn = new GoodsReturn;

        $GoodsReturn->branch_id = Session::get('branch_id');
        $GoodsReturn->branchname = $this->generateStore(Session::get('branch_id'));
        $GoodsReturn->rt_code = $rt_code;
        $GoodsReturn->status = $status;
        $GoodsReturn->postingdate = date('Y-m-d');
        $GoodsReturn->documentdate = $docdate;
        $GoodsReturn->vendor_code = $vendor_code;
        $GoodsReturn->vendorname = $vendor_name;
        $GoodsReturn->remarks = $remarks;
        $GoodsReturn->useradded = Session::get('user');
        $GoodsReturn->dateadded = date('Y-m-d');
        $GoodsReturn->useredited = Session::get('user');
        $GoodsReturn->dateedited = date('Y-m-d');
        $GoodsReturn->save();
        // DB::table('s_goods_receipt')->insert(
        //     [
        //         'branch_id' => Session::get('branch_id'), 'branchname' => $this->generateStore(Session::get('branch_id')),
        //         'rt_code' => $rt_code, 'status' => $status,
        //         'postingdate' => date('Y-m-d'), 'documentdate' => $docdate,
        //         'vendor_code' => $vendor_code, 'vendorname' => $vendor_name,
        //         'remarks' => $remarks, 'useradded' => Session::get('user'),
        //         'dateadded' => date('Y-m-d'), 'useredited' => Session::get('user'), 'dateedited' => date('Y-m-d')
        //     ]
        // );
        return redirect('/goods/goods-return');
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
            $goodsreturn = GoodsReturn::where('branch_id', '=', Session::get('branch_id'))
                ->whereDay('documentdate', '=', $day)
                ->whereMonth('documentdate', '=', $month)
                ->whereYear('documentdate', '=', $year)
                // ->get()
                ->paginate(5);
            // ->sortByDesc('gr_code'); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
        } elseif ($vendorcode == '**ALL VENDOR**' &&  $status != 'ALL STATUS') {
            $goodsreturn = GoodsReturn::where([['status', '=', $status], ['branch_id', '=', Session::get('branch_id')]])
                ->whereDay('documentdate', '=', $day)
                ->whereMonth('documentdate', '=', $month)
                ->whereYear('documentdate', '=', $year)
                ->paginate(5);
            // ->sortByDesc('gr_code'); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
        } elseif ($vendorcode != '**ALL VENDOR**' &&  $status == 'ALL STATUS') {
            $goodsreturn = GoodsReturn::where([['vendor_code', '=', substr($vendorcode, -5)], ['branch_id', '=', Session::get('branch_id')]])
                ->whereDay('documentdate', '=', $day)
                ->whereMonth('documentdate', '=', $month)
                ->whereYear('documentdate', '=', $year)
                ->paginate(5);
            // ->sortByDesc('gr_code'); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
        } else {
            $goodsreturn =  GoodsReturn::where([['status', '=', $status], ['vendor_code', '=', substr($vendorcode, -5)], ['branch_id', '=', Session::get('branch_id')]])
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
        return view('goods/GoodsReturn/index',  ['nama' => 'Goods Return', 'docdate' =>  $docdate, 'status' => $status, 'goodsreturn' => $goodsreturn, 'vendorall' => $vendorall, 'vendor' => $vendorcode]);
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
        $goodsreturn = GoodsReturn::where('rt_code', '=', $id)->get(); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
        // var_dump($goodsreceipt);
        // die;
        // $docdate = date("Y-m-d", strtotime($goodsreceipt[0]->documentdate));

        $vendorall = DB::table('s_vendor')
            ->select(DB::raw('DISTINCT vendor_code,name'))
            ->orderBy('name', 'asc')
            ->get();
        // echo $goodsreceipt[0]->vendorname . ' - ' . $goodsreceipt[0]->vendor_code;
        // die;
        return view('goods/GoodsReturn/edit', ['nama' => 'Goods Return', 'goodsreturn' => $goodsreturn, 'vendorall' => $vendorall, 'vendor' => $goodsreturn[0]->vendorname . ' - ' . $goodsreturn[0]->vendor_code]);
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

        $rt_code = $request->input('rt_code');
        if ($status == 'POST') {
            if (DB::table('s_goods_return_detail')
                ->where('rt_code', '=', $rt_code)
                ->doesntExist()
            ) {
                $goodsreturn = goodsreturn::where('rt_code', '=', $rt_code)->get(); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
                $vendorall = DB::table('s_vendor')
                    ->select(DB::raw('DISTINCT vendor_code,name'))
                    ->orderBy('name', 'asc')
                    ->get();
                return view('GoodsReturn\edit', ['nama' => 'Goods Return', 'status' => 'Failed', 'goodsreturn' => $goodsreturn, 'vendorall' => $vendorall, 'vendor' => $request->input('vendor_code')]);
            } else {
                DB::update('exec updatestokRT ' . $rt_code . ' ');
            }
        }

        $vendor_code = $request->input('vendor_code');
        $vendor_name = $request->input('vendor_name');
        $remarks = $request->input('remarks');
        goodsreturn::where('rt_code', $rt_code)
            ->update(['documentdate' => $docdate, 'status' => $status, 'vendor_code' => substr($vendor_code, -5), 'vendorname' => substr($vendor_code, 0, strlen($vendor_code) - 8), 'remarks' => $remarks]);
        return redirect('/goods/goods-return');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('s_goods_return')->where('rt_code', '=', $id)->delete();
        DB::table('s_goods_return_detail')->where('rt_code', '=', $id)->delete();
        return redirect('/goods/goods-return');
    }
}
