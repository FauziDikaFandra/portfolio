<?php



// namespace App\Http\Controllers\PDF;

namespace App\Http\Controllers;

// namespace Illuminate\View;
// use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Dompdf\Adapter\PDFLib;
use App\Http\Controllers\PDF;

use PhpOffice\PhpSpreadsheet\Writer\Pdf as WriterPdf;

class GoodsController extends Controller
{

    public function login()
    {
        if (Session::get('remember')) {
            if (!Session::get('login')) {
                return view('goods/login');
            } else {
                return view('goods/index', ['nama' => Session::get('user')]);
            }
        } else {
            if (!Session::get('login')) {
                return view('goods/login');
            } else {
                return view('goods/index', ['nama' => Session::get('user')]);
            }
        }
    }

    public function fetch(Request $request) //autocomplate text
    {
        // echo "oke";
        // if ($request->input('query')) {
        //     echo "bisa";
        // }
        if ($request->input('query')) {

            $query =  '%' . $request->input('query') . '%';
            if (DB::table('s_item_master')
                ->take(10)
                ->where('article_code', 'like', $query)
                ->doesntExist()

            ) {
                // echo 'kosong';
            } else {
                // echo 'ada';
                // die;
                $data = DB::table('s_item_master')
                    ->select('plu', 'long_description', 'price')
                    // ->take(10)
                    ->where('plu', 'like', $query)
                    // ->where('long_description', 'like', $query)
                    ->get();

                // echo $data[0]->description;
                // $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
                // $output = '<div class="dropdown-menu">';
                // foreach ($data as $row) {

                //     echo $data[0]->description;
                // }

                $output = '';
                foreach ($data as $row) {
                    $output .= '
               <a class="dropdown-item" href="#">' . trim($row->plu) . ' - ' . $row->long_description . '</a>
               ';
                }
                // $output .= '</div>';
                echo $output;
            }
        }
    }


    public function home(Request $request)
    {
        $user = $request->input('user');
        $password = $request->input('password');
        $remember = $request->input('remember');
        if (DB::table('s_user')
            ->where([['user', '=', $user], ['password', '=', $password]])
            ->doesntExist()
        ) {
            return view('login', ['status' => 'Failed']);
        } else {
            $userDB = DB::table('s_user')
                ->where([['user', '=', $user], ['password', '=', $password]])
                ->get();
        }
        Session::put('user', $user);
        Session::put('login', TRUE);
        Session::put('branch_id', $userDB[0]->branch_id);

        // if ($remember == true) {
        //     Session::put('remember', TRUE);
        //     Session::put('rememberuser', $user);
        //     Session::put('rememberpassword', $password);
        // } else {
        //     Session::put('remember', FALSE);
        //     Session::forget('rememberuser');
        //     Session::forget('rememberpassword');
        // }
        return view('goods/index', ['nama' => $user]);
    }

    public function logout()
    {
        Session::forget('user');
        Session::forget('login');
        return view('goods/login');
    }

    // public function inventory()
    // {
    //     // $thisdate = Carbon::today();
    //     // echo Carbon::parse($thisdate)->format('m/Y');
    //     // die;
    //     $month = '08';
    //     $inventoryDB = DB::table('s_stok')
    //         ->join('s_item_master', 's_stok.plu', '=', 's_item_master.plu')
    //         ->select('s_stok.*')
    //         ->take(10)
    //         ->whereMonth('date', '=', 8)
    //         ->whereYear('date', '=', 2020)
    //         ->where([['branch_id', '=', 'S001'], ['burui', 'like', '%1']])
    //         ->orderBy('plu', 'asc')
    //         ->get();
    //     return view('inventory', ['nama' => 'Fauzi Dika Fandra', 'inventory' => $inventoryDB]);
    // }




}
