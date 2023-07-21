@extends('layouts.app')
@section('content')
<head> 
</head>
<div class="container"> 
    <div class="row justify-content-center"> 
        <div class="col-md-8"> 
            <button type="button" class="btn btn-secondary" onclick="window.location='{{ url("/home") }}'">Back</button>
            <h1 style="margin-top:20px">Detail Barang</h1>
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
                            <th scope="row">KO1212</th>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                            <td>Test</td>
                        </tr>
                    </tbody>
                </table>

                <div> 
                    <button type="button" class="btn btn-primary" onclick="window.location='{{ url("/purchase") }}'">Buy</button>      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection