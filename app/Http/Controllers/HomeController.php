<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
    
        $paginatedData = new LengthAwarePaginator(
            $items->forPage($page, $perPage),
            $items->count(),
            $perPage,
            $page,
            $options
        );
    
        return $paginatedData;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $response = Http::get('localhost:5000/barang'); 
        $data = $response->json()["data"]; 

        $page = $request->query('page', 1);

        $paginated = $this->paginate($data, 2, $page);  
        $nextPageUrl = $paginated->nextPageUrl(); 
        $previousPageUrl = $paginated->previousPageUrl();
        $items = $paginated->items();   

        // dd($paginated->previousUrlPage);
        $username = Auth::user()->name; 
        return view('home', ['data' => $items, 'username' => $username, 'nextPageUrl' => $nextPageUrl, 'previousPageUrl' => $previousPageUrl]);
    }
}
