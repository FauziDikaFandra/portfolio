<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use League\CommonMark\Block\Element\Document;

class GoodsReceiptDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate([

            'item' => 'required',

            'quantity' => 'required|numeric|max:3'

        ], [

            'item.required' => 'item is required',

            'quantity.required' => 'quantity is required'

        ]);

        $gr_code = $request->input('gr_code');
        $quantity = $request->input('quantity');
        $plu = trim(substr($request->input('item'), 0, 12));

        $check = DB::table('s_item_master')
            ->where('plu', '=', $plu)
            ->get();

        $desc = $check[0]->description;
        // echo $plu;
        // die;
        $brand = $check[0]->brand;
        $article = $check[0]->article_code;

        $long_description = $check[0]->long_description;
        $frgn_description = $check[0]->frgn_description;
        $price = $check[0]->price;
        $class = $check[0]->class;
        $burui = $check[0]->burui;
        $dp2 = $check[0]->dp2;

        DB::table('s_goods_receipt_detail')->insert(
            [
                'gr_code' => $gr_code, 'article_code' => $article,
                'plu' => $plu, 'description' => $desc,
                'long_description' => $long_description, 'frgn_description' => $frgn_description,
                'price' => $price, 'class' => $class,
                'burui' => $burui, 'dp2' => $dp2,
                'brand' => $brand, 'qty' => $quantity,
                'useradded' => Session::get('user'),
                'dateadded' => date('Y-m-d'), 'useredited' => Session::get('user'), 'dateedited' => date('Y-m-d')
            ]
        );
        return redirect('/goods/goods-receipt-details/' . $gr_code);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */






    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // echo "masuk";
        $goodsreceiptdetails = DB::table('s_goods_receipt_detail')
            ->where('gr_code', '=', $id)
            ->get()
            ->sortBy('article_code'); //harus use use Illuminate\Support\Facades\DB; untuk konek ke database
        // var_dump($goodsreceipt);
        // echo date("Y-m-d");
        // die;
        return view('goods/GoodsReceipt/indexdetails', ['goodsreceiptdetails' => $goodsreceiptdetails, 'gr_code' => $id]);
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
    public function destroy($id, $article)
    {
        // echo $id . ' - ' . $article;
        DB::table('s_goods_receipt_detail')->where([['gr_code', '=', $id], ['article_code', '=', $article]])->delete();
        return redirect('/goods/goods-receipt-details/' . $id);
    }
}
