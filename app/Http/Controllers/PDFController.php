<?php

namespace App\Http\Controllers;

use Mpdf\Mpdf;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Mpdf\Mpdf as MpdfMpdf;

class PdfController extends Controller
{

    public function exportpdfInventory($brand, $date)
    {
        $fileName = 'Inventory.pdf';
        $mpdf = new Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 15,
            'margin_bottom' => 20,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);

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
            // return view('exportpdf', ['docdate' =>  $docdate, 'inventory' => $inventoryDB]);
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
        $html = view('goods/Inventory/exportpdf',  ['inventory' => $inventoryDB]);

        $html = $html->render();

        $mpdf->WriteHTML($html);

        $mpdf->Output($fileName, 'I');
        // dd("oke");
        // die;
        // return view('exportpdf',  ['docdate' =>  $docdate, 'inventory' => $inventoryDB]);
    }

    public function exportpdfGoodsReceipt($date, $status, $vendor)
    {
        $fileName = 'GoodsReceipt.pdf';
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 15,
            'margin_bottom' => 20,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);

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
        $html = view('GoodsReceipt/exportpdf',  ['goodsreceipt' => $goodsreceipt]);

        $html = $html->render();

        $mpdf->WriteHTML($html);

        $mpdf->Output($fileName, 'I');
        // dd("oke");
        // die;
        // return view('exportpdf',  ['docdate' =>  $docdate, 'inventory' => $inventoryDB]);
    }


    public function exportpdfGoodsReturn($date, $status, $vendor)
    {
        $fileName = 'GoodsReturn.pdf';
        $mpdf = new \Mpdf\Mpdf([
            'margin_left' => 10,
            'margin_right' => 10,
            'margin_top' => 15,
            'margin_bottom' => 20,
            'margin_header' => 10,
            'margin_footer' => 10
        ]);

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
        $html = view('goods/GoodsReturn/exportpdf',  ['goodsreturn' => $goodsreturn]);

        $html = $html->render();

        $mpdf->WriteHTML($html);

        $mpdf->Output($fileName, 'I');
        // dd("oke");
        // die;
        // return view('exportpdf',  ['docdate' =>  $docdate, 'inventory' => $inventoryDB]);
    }
}
