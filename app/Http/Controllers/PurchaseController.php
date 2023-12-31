<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\History; 
use Laravel\Sanctum\PersonalAccessToken;

class PurchaseController extends Controller
{
    public function submitForm(Request $request)
    {
        $jumlah = $request->input('jumlah');
        $id = $request->input('barang_id'); 
        $response = Http::get("localhost:5000/barang/{$id}"); 
        $stok = $response->json()["data"]["stok"];
        $token=$request->cookie('jwt'); 
        $yourtoken = PersonalAccessToken::findToken($token);
        if (!Auth::user()->is($yourtoken->tokenable)){
            echo "<h1 align='center' style='color:red'>Token yang salah!</h1>";
            redirect("/"); 
        }
        if($jumlah > $stok){
            $response = Http::get("localhost:5000/barang/{$id}"); 
            $perusahaan = Http::get("localhost:5000/perusahaan/{$response["data"]["perusahaan_id"]}");
            return view('purchase', 
            ['data' => $response["data"], 
            'perusahaan' => $perusahaan["data"]]
            )->withErrors([
                'message' => 'Jumlah yang dimasukkan harus lebih kurang atau sama dengan stok!',
            ]);
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
            $response= Http::put("localhost:5000/purchase/{$id}",[
                'nama' => $nama,
                'harga' => $harga, 
                'stok' => $stok - $jumlah, 
                'perusahaan_id' => $perusahaan_id, 
                'kode' => $kode
            ]);
            return redirect("api/success/{$nama}/{$total}/{$jumlah}"); 
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
        'perusahaan' => $perusahaan["data"]]
        )->withErrors([
            'message' => '',
        ]);
    }

    public function success_page($nama, $total, $jumlah)
    {
        return view('success',['total' => $total, 'jumlah' => $jumlah, 'nama' => $nama]); 
    }
}
