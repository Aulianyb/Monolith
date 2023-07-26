<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\History;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $data = History::where('user_id', $id)->paginate(10);    
        $array = $data->toArray(); 
        // dd($array); 
        return view('history', ['data' => $array]);
    }
}
