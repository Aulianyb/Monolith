@extends('layouts.app')
@section('content')
<head> 
</head>
@if(Session::has('error'))
    <script>
        alert("{{ Session::get('error') }}");
    </script>
@endif

<div class="container"> 
    <div class="row justify-content-center"> 
        <div class="col-md-8"> 
            <button type="button" class="btn btn-secondary" onclick="window.location='{{ url("api/detail/{$data["id"]}") }}'">Back</button>
            <h1 style="margin-top:20px">Beli Barang</h1>
            <div style="margin-top:20px">
                <table class="table"> 
                    <thead>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Kode</th>
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
                @error('message')
                <p style="color:red"><i> {{$message}} </i></p>
                @enderror
                <div> 
                    <h3 style="margin-top:20px;margin-bottom:20px">Informasi Pembelian</h3>
                    <form method="POST" action="{{ route('form.submit')}}">
                        @csrf
                        <div className="form-group">
                            <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="Masukan jumlah pembelian" min=1 required>
                            <input type="text" class="form-control invisible" id="barang_id" name="barang_id" value={{ $data["id"]}}>
                        </div>
                        <button type="submit" class="btn btn-primary">Buy</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection