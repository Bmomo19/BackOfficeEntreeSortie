<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HistoriqueController extends Controller
{

    public function __construct()
    {
        $this->middleware('user_auth');
    }

    public function index() {

        $resp_history = Http::get(config('app.api_url').'/in_out/');
        $data_history = $resp_history->json();
        //dd($data_history);
        return view('historique',['history'=>$data_history]);
    }

    public function show($id) {

        $response = Http::get(config('app.api_url')."/in_out/".$id);
        $user = $response->json();
        
        //dd($user);
        return view('historique_user',['user' => $user]);
    }
}
