@extends('layouts.app')
@section('content')
<head> 
</head>
<div class="container"> 
    <div class="row justify-content-center"> 
        <div class="col-md-8"> 
            <button type="button" class="btn btn-secondary" onclick="window.location='{{ url("/home") }}'">Back</button>
            <h1 style="margin-top:20px">Riwayat Pembelian</h1>
            <div style="margin-top:20px">
                <table class="table"> 
                    <thead>
                        <th scope="col">Nama</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total</th>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">KO1212</th>
                            <td>Test</td>
                            <td>Test</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection