<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

class ExcelController extends Controller
{
    public function exportInventory($brand, $date)
    {

        $docdate = $date;
        $month = date("m", strtotime($docdate));
        $year = date("Y", strtotime($docdate));


        if ($brand == '**ALL BRAND**') {
            $inventoryDB = DB::table('s_stok')
                ->join('s_item_master', 's_stok.plu', '=', 's_item_master.plu')
                ->select('s_stok.*')
                // ->take(20)
                ->whereMonth('date', '=', $month)
                ->whereYear('date', '=', $year)
                ->where([['branch_id', '=', Session::get('branch_id')], ['burui', 'like', '%1']])
                ->orderBy('s_stok.plu', 'asc')
                ->get();
            // ->paginate(15);
            return view('goods/export', ['docdate' =>  $docdate, 'inventory' => $inventoryDB]);
        } else {
            $inventoryDB = DB::table('s_stok')
                ->join('s_item_master', 's_stok.plu', '=', 's_item_master.plu')
                ->select('s_stok.*')
                // ->take(20)
                ->whereMonth('date', '=', $month)
                ->whereYear('date', '=', $year)
                ->where([['branch_id', '=', Session::get('branch_id')], ['burui', 'like', '%1'], ['brand', '=', $brand]])
                ->orderBy('s_stok.plu', 'asc')
                ->get();
        }

        // $brandall = DB::table('s_item_master')
        //     ->select(DB::raw('DISTINCT brand'))
        //     ->orderBy('brand', 'asc')
        //     ->get();
        return view('goods/Inventory/export',  ['docdate' =>  $docdate, 'inventory' => $inventoryDB]);
    }

    public function exportGoodsReceipt($date, $status, $vendor)
    {
        $docdate = $date;
        $day =  date("d", strtotime($docdate));
        $month = date("m", strtotime($docdate));
        $year = date("Y", strtotime($docdate));
        $vendorcode = $vendor;

        if ($vendorcode == '**ALL VENDOR**' &&  $status == 'ALL STATUS') {
            $goodsreceipt = DB::table('s_goods_receipt')
                ->where('branch_id', '=', Session::get('branch_id'))
                ->whereDay('documentdate', '=', $day)
                ->whereMonth('documentdate', '=', $month)
                ->whereYear('documentdate', '=', $year)
                ->get()
                // ->paginate(5);
                ->sortByDesc('gr_code'); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
        } elseif ($vendorcode == '**ALL VENDOR**' &&  $status != 'ALL STATUS') {
            $goodsreceipt = DB::table('s_goods_receipt')
                ->where([['status', '=', $status], ['branch_id', '=', Session::get('branch_id')]])
                ->whereDay('documentdate', '=', $day)
                ->whereMonth('documentdate', '=', $month)
                ->whereYear('documentdate', '=', $year)
                ->get()
                ->sortByDesc('gr_code'); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
        } elseif ($vendorcode != '**ALL VENDOR**' &&  $status == 'ALL STATUS') {
            $goodsreceipt = DB::table('s_goods_receipt')
                ->where([['vendor_code', '=', substr($vendorcode, -5)], ['branch_id', '=', Session::get('branch_id')]])
                ->whereDay('documentdate', '=', $day)
                ->whereMonth('documentdate', '=', $month)
                ->whereYear('documentdate', '=', $year)
                ->get()
                ->sortByDesc('gr_code'); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
        } else {
            $goodsreceipt = DB::table('s_goods_receipt')
                ->where([['status', '=', $status], ['vendor_code', '=', substr($vendorcode, -5)], ['branch_id', '=', Session::get('branch_id')]])
                ->whereDay('documentdate', '=', $day)
                ->whereMonth('documentdate', '=', $month)
                ->whereYear('documentdate', '=', $year)
                ->get()
                ->sortByDesc('gr_code'); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
        }
        return view('goods/GoodsReceipt/export',  ['docdate' =>  $docdate, 'status' => $status, 'goodsreceipt' => $goodsreceipt, 'vendor' => $vendorcode]);
    }

    public function exportGoodsReturn($date, $status, $vendor)
    {
        $docdate = $date;
        $day =  date("d", strtotime($docdate));
        $month = date("m", strtotime($docdate));
        $year = date("Y", strtotime($docdate));
        $vendorcode = $vendor;

        if ($vendorcode == '**ALL VENDOR**' &&  $status == 'ALL STATUS') {
            $goodsreturn = DB::table('s_goods_return')
                ->where('branch_id', '=', Session::get('branch_id'))
                ->whereDay('documentdate', '=', $day)
                ->whereMonth('documentdate', '=', $month)
                ->whereYear('documentdate', '=', $year)
                ->get()
                // ->paginate(5);
                ->sortByDesc('rt_code'); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
        } elseif ($vendorcode == '**ALL VENDOR**' &&  $status != 'ALL STATUS') {
            $goodsreturn = DB::table('s_goods_return')
                ->where([['status', '=', $status], ['branch_id', '=', Session::get('branch_id')]])
                ->whereDay('documentdate', '=', $day)
                ->whereMonth('documentdate', '=', $month)
                ->whereYear('documentdate', '=', $year)
                ->get()
                ->sortByDesc('rt_code'); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
        } elseif ($vendorcode != '**ALL VENDOR**' &&  $status == 'ALL STATUS') {
            $goodsreturn = DB::table('s_goods_return')
                ->where([['vendor_code', '=', substr($vendorcode, -5)], ['branch_id', '=', Session::get('branch_id')]])
                ->whereDay('documentdate', '=', $day)
                ->whereMonth('documentdate', '=', $month)
                ->whereYear('documentdate', '=', $year)
                ->get()
                ->sortByDesc('rt_code'); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
        } else {
            $goodsreturn = DB::table('s_goods_return')
                ->where([['status', '=', $status], ['vendor_code', '=', substr($vendorcode, -5)], ['branch_id', '=', Session::get('branch_id')]])
                ->whereDay('documentdate', '=', $day)
                ->whereMonth('documentdate', '=', $month)
                ->whereYear('documentdate', '=', $year)
                ->get()
                ->sortByDesc('rt_code'); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
        }
        return view('goods/GoodsReturn/export',  ['docdate' =>  $docdate, 'status' => $status, 'goodsreturn' => $goodsreturn, 'vendor' => $vendorcode]);
    }
}
