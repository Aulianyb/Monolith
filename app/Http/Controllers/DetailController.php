<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class DetailController extends Controller
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
        return view('detail', 
        ['data' => $response["data"]], 
        ['perusahaan' => $perusahaan["data"]]
        );
    }
}
