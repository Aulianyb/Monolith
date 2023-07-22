<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\History; 

class PurchaseController extends Controller
{

    public function submitForm(Request $request)
    {
        $jumlah = $request->input('jumlah');
        $total = $jumlah; 
        dd($jumlah); 
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($id)
    {
        $response = Http::get("localhost:5000/barang/{$id}"); 
        $perusahaan = Http::get("localhost:5000/perusahaan/{$response["data"]["perusahaan_id"]}");

        return view('purchase', 
        ['data' => $response["data"], 
        'perusahaan' => $perusahaan["data"], 
        'jumlah' => 0, 
        'total' => 0]
        );
    }
}
