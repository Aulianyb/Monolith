<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\History; 

class PurchaseController extends Controller
{
    public function submitForm(Request $request)
    {
        $jumlah = $request->input('jumlah');
        $id = $request->input('barang_id'); 
        $response = Http::get("localhost:5000/barang/{$id}"); 
        $stok = $response->json()["data"]["stok"];
        if($jumlah > $stok){
            Session::flash('error', 'Jumlah yang dibeli lebih banyak daripada stok!');
            return redirect()->back();
        } else{
            $nama = $response->json()["data"]["nama"]; 
            $harga = $response->json()["data"]["harga"];
            $perusahaan_id = $response->json()["data"]["perusahaan_id"]; 
            $kode = $response->json()["data"]["kode"];
            
            $total = $jumlah * $harga; 
            $history = new History; 
            $history->user_id = Auth::user()->id; 
            $history->nama = $nama;
            $history->jumlah = $jumlah;
            $history->total = $total;  
            $history->save(); 
            $response= Http::put("localhost:5000/barang/{$id}",[
                'nama' => $nama,
                'harga' => $harga, 
                'stok' => $stok - $jumlah, 
                'perusahaan_id' => $perusahaan_id, 
                'kode' => $kode
            ]);
            return redirect('/home'); 
        } 
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
