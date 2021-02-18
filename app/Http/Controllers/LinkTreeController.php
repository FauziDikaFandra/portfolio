<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;


class LinkTreeController extends Controller
{


    public function login()
    {

        if (!Session::get('login')) {
            return view('linktree/login');
        } else {
            return view('linktree/index', ['nama' => Session::get('user')]);
        }
    }

    public function home(Request $request)
    {
        $user = $request->input('user_name');
        $password = $request->input('password');
        if (user::where([['user', '=', $user], ['password', '=', $password]])
            ->doesntExist()
        ) {
            return view('linktree/login', ['status' => 'Failed']);
        } else {
            $userDB = user::where([['user', '=', $user], ['password', '=', $password]])
                ->get();
        }
        Session::put('user', $user);
        Session::put('login', TRUE);



        return view('linktree/index', ['nama' => $user]);
    }

    public function logout()
    {
        Session::forget('user');
        Session::forget('login');
        return view('linktree/login');
    }

    public function create(Request $request)
    {
        // echo "masuk";
        $name = $request->input('name');
        $tipe = $request->input('tipe');
        $brand = $request->input('brand');
        $ulink = $request->input('ulink');
        // echo $brand;
        // die;
        // DB::table('link')->delete();
        link::insert(
            ['name' => $name, 'tipe' => $tipe, 'brand' => $brand, 'link' => $ulink, 'image' => '']
        );
    }

    public function destroy(Request $request)
    {


        $name = $request->input('name');
        $tipe = $request->input('tipe');
        link::where([['name', '=', $name], ['tipe', '=', $tipe]])->delete();
        echo "oke";
        die;
    }

    public function store($name)
    {

        $link = link::where('name', '=', $name)->get();
        // Fetch all records
        $userData['data'] = $link;
        echo json_encode($userData);
        exit;
    }
}
