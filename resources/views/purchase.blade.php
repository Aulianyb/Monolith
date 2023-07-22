@extends('layouts.app')
@section('content')
<head> 
</head>
<div class="container"> 
    <div class="row justify-content-center"> 
        <div class="col-md-8"> 
            <button type="button" class="btn btn-secondary" onclick="window.location='{{ url("/detail/{$data["id"]}") }}'">Back</button>
            <h1 style="margin-top:20px">Beli Barang</h1>
            <div style="margin-top:20px">
                <table class="table"> 
                    <thead>
                        <th scope="col">Kode</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Perusahaan</th>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach (array_slice($data, 1, -1) as $item)
                                <td>{{$item}}</td>
                            @endforeach
                            <td>{{$perusahaan["nama"]}}</td>
                        </tr>
                    </tbody>
                </table>

                <div> 
                    <h3 style="margin-top:20px;margin-bottom:20px">Informasi Pembelian</h3>
                    <div className="input-group">
                        <input type="number" class="form-control" placeholder="Masukan jumlah pembelian">
                    </div>
                    <div style="margin-top:20px;margin-bottom:20px">
                        <h5> Jumlah Pembelian : X </h5>
                        <h5> Total Pembelian : X </h5> 
                    </div>
                    <button type="button" class="btn btn-primary">Buy</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection