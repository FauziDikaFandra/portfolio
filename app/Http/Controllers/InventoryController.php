<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;


class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventoryDB = DB::table('s_stok')
            ->join('s_item_master', 's_stok.plu', '=', 's_item_master.plu')
            ->select('s_stok.*')
            ->whereMonth('date', '=', date('m'))
            ->whereYear('date', '=', date('Y'))
            ->where([['branch_id', '=', Session::get('branch_id')], ['burui', 'like', '%1']])
            ->orderBy('s_stok.plu', 'asc')
            ->paginate(15);
        $brandall = DB::table('s_item_master')
            ->select(DB::raw('DISTINCT brand'))
            ->orderBy('brand', 'asc')
            ->get();
        return view('goods/Inventory/index', ['docdate' =>  date("Y-m-d"), 'inventory' => $inventoryDB, 'brandall' => $brandall, 'brand' => '**ALL BRAND**']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $month = date("m", strtotime($docdate));
        $year = date("Y", strtotime($docdate));
        $brand = $request->input('brand');

        $brandall = DB::table('s_item_master')
            ->select(DB::raw('DISTINCT brand'))
            ->orderBy('brand', 'asc')
            ->get();

        if ($brand == '**ALL BRAND**') {
            $inventoryDB = DB::table('s_stok')
                ->join('s_item_master', 's_stok.plu', '=', 's_item_master.plu')
                ->select('s_stok.*')
                // ->take(20)
                ->whereMonth('date', '=', $month)
                ->whereYear('date', '=', $year)
                ->where([['branch_id', '=', Session::get('branch_id')], ['burui', 'like', '%1']])
                ->orderBy('s_stok.plu', 'asc')
                // ->get()
                ->paginate(15);
            return view('goods/Inventory/index', ['docdate' =>  $docdate, 'inventory' => $inventoryDB, 'brandall' => $brandall, 'brand' => $brand]);
        } else {
            $inventoryDB = DB::table('s_stok')
                ->join('s_item_master', 's_stok.plu', '=', 's_item_master.plu')
                ->select('s_stok.*')
                // ->take(20)
                ->whereMonth('date', '=', $month)
                ->whereYear('date', '=', $year)
                ->where([['branch_id', '=', Session::get('branch_id')], ['burui', 'like', '%1'], ['brand', '=', $brand]])
                ->orderBy('s_stok.plu', 'asc')
                // ->get()
                ->paginate(15);
        }



        return view('goods/Inventory/index',  ['docdate' =>  $docdate, 'inventory' => $inventoryDB, 'brandall' => $brandall, 'brand' => $brand]);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
