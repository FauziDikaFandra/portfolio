<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class ApiController extends Controller
{


    public function index()
    {

        return view('api/index');
        // return view('api/test');
    }

    public function get()
    {

        return Item::all();
    }

    public function getid($id)
    {

        return Item::where('plu', $id)->get();
    }

    public function create(Request $request)
    {
        // echo "berhasil";
        // die;


        $plu = $request->plu;
        $article_code = substr($request->plu, 0, 8);
        $burui = 'MANUAL';
        $brand = $request->brand;
        $description = $request->long_description;
        $price = $request->price;
        $class = 'XXX';
        $dp2 = 'LA';

        Item::insert(
            [
                'plu' => $plu, 'article_code' => $article_code,
                'brand' => $brand, 'burui' => $burui,
                'description' => $description, 'long_description' => $description,
                'frgn_description' => $description, 'price' => str_replace(',', '', $price),
                'class' => $class, 'dp2' => $dp2
            ]
        );
    }

    public function edit(Request $request)
    {
        // echo "berhasil";
        // die;


        $plu = $request->plu;
        $brand = $request->brand;
        $description = $request->long_description;
        $price = $request->price;

        Item::where('plu', $plu)
            ->update([
                'brand' => $brand, 'description' => $description,
                'long_description' => $description, 'frgn_description' => $description,
                'price' => str_replace(',', '', $price)
            ]);
    }

    public function destroy($id)
    {
        Item::where('plu', '=', $id)->delete();
    }
}
