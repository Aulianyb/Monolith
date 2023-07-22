@extends('layouts.app')
@section('content')
<head> 
</head>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1> 
                Katalog Barang
            </h1>
            <div class="catalog-container"> 
                @foreach ($data as $item)
                    <div class="card container catalog-box">
                        <div class="card-body row"> 
                            <div> 
                                <h5 class="card-title">{{ $item["nama"] }}</h5>
                            </div>
                            <button type="button" class="btn btn-primary btn-sm" onclick="window.location='{{ url("/detail") }}'">Detail Barang</button>
                        </div> 
                    </div> 
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
