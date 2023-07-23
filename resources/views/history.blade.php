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
                    @foreach ($data["data"] as $item)
                        <tr>
                                <td>{{$item["nama"]}}</td>
                                <td>{{$item["jumlah"]}}</td>
                                <td>{{$item["total"]}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    @if ($data['prev_page_url'])
                        <li class="page-item"><a class="page-link" href="{{$data['prev_page_url']}}">Previous</a></li>
                    @endif
                    @for ($i=1; $i <= $data['last_page'];$i++)
                        @if ($data['current_page'] == $i)
                            <li class="page-item"><a class="page-link active" href="{{$data['links'][$i]['url']}}">{{$i}}</a></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{$data['links'][$i]['url']}}">{{$i}}</a></li>
                        @endif
                    @endfor
                    @if ($data['next_page_url'])
                        <li class="page-item"><a class="page-link" href="{{$data['next_page_url']}}">Next</a></li>
                    @endif
                </ul>
            </nav>
        </div>
    </div>
</div>
@endsection