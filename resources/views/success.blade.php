@extends('layouts.app')
@section('content')
<head> 
</head>

<div class="container"> 
    <div class="row justify-content-center"> 
        <div class="col-md-8"> 
            <button type="button" class="btn btn-secondary" onclick="window.location='{{ url("/api/home") }}'">Back</button>
            <h1 align="center"> PEMBELIAN BERHASIL </h1>
            <h5 align="center"> Berhasil membeli {{$jumlah}} buah {{$nama}}</h5>
            <h5 align="center"> Total : {{$total}}</h5>
        </div>
    </div>
</div>
@endsection