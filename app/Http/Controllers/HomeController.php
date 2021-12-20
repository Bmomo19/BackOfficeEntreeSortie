<?php

namespace App\Http\Controllers;

use BaconQrCode\Encoder\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use SimpleSoftwareIO\QrCode\BaconQrCodeGenerator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('user_auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $responseLastArrived = Http::get(config('app.api_url')."/in_out/get/last_arrived");
        $datasLastArrived = $responseLastArrived->json();
        //dd($datasLastArrived);
        
        $responseLastDepart = Http::get(config('app.api_url')."/in_out/get/last_depart");
        $datasLastDepart = $responseLastDepart->json();
        //dd($datasLastDepart);

        $visiteurPresent = Http::get(config('app.api_url')."/statistique/get/in");
        $visiteurP = $visiteurPresent->json();
        //dd($visiteurP);

        $visiteurSemaine = Http::get(config('app.api_url')."/statistique/get/in_out_of_week");
        $visiteurS = $visiteurSemaine->json();
        //dd($visiteurS);

        $resp_heure_moy_arr = Http::get(config('app.api_url')."/statistique/get/avg_hour_academician");
        $heure_moy = $resp_heure_moy_arr->json();
        //dd($heure_moy);

        return view('welcome', [
            'arrived' => $datasLastArrived, 
            'depart' => $datasLastDepart, 
            'visiteurPresent' => $visiteurP, 
            'visiteurSemaine' => $visiteurS,
            "heure_moy" => $heure_moy,
        ]);
    }
}
