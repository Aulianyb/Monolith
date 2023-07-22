<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
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
        ['data' => $response["data"]], 
        ['perusahaan' => $perusahaan["data"]]
        );
    }
}
