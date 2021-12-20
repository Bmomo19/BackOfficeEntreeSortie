<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class VisiteursController extends Controller
{

    public function __construct()
    {
        $this->middleware('user_auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd($_SERVER);
        try {
            $response = Http::get(config('app.api_url').'/visiteurs');
            $datas = $response->json();
            //dd($datas);
            return view('visiteurs', ['datas' => $datas]);

        } catch (\Throwable $th) {
            msg_flash('Une erreur est survenue', 'danger');
            return redirect()->route('home');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Http::get(config('app.api_url').'/type_visiteur');
        $type_visiteur = $response->json();
        return view('visiteurs_add', ['type_visiteur' => $type_visiteur]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'num_piece' => 'required|min:6',
            'nom' => 'required',
            'prenoms' => 'required',
            'type_piece' => 'required',
            'type_visiteur' => 'required',
        ])->validate();

        try {

            if ($request->type_visiteur === 'Academicien') {
                //dd($request->all());
                $response = Http::post(config('app.api_url')."/academicien/store", $request->all());
                $user = $response->json();
                //dd($user);
            } else {
                $response = Http::post(config('app.api_url')."/visiteurs/store", $request->all());
                $user = $response->json();
                //dd($user);
            }
            
            if ($user == 444) {
                msg_flash('Matricule ou login déjà utilisé', 'danger');
                return redirect()->back();
            }

            if ($user == 500) {
                msg_flash('Une erreur est survenue avec le serveur', 'danger');
                return redirect()->back();
            }

            

            msg_flash('Utilisateur crée avec succès', 'success');
            return redirect()->route('visiteurs.show', $user['num_piece']);

        } catch (\Throwable $th) {
            //msg_flash('Une erreur est survenue', 'danger');
            //return redirect()->route('home');
            return $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $response = Http::get(config('app.api_url')."/visiteurs/".$id);
            $user = $response->json();

            $response = Http::get(config('app.api_url').'/type_visiteur');
            $type_visiteur = $response->json();
            $piece = "";
            $photo = "";
            $codeqr = "";

            foreach ($user['info_complementaire'] as $item) {
                if ($item['type_info_id'] === 1) {
                    $piece = $item;
                }

                if ($item['type_info_id'] === 2) {
                    $photo = $item;
                }

                if ($item['type_info_id'] === 3) {
                    $codeqr = $item;
                }
            }

            //dd($piece);
            return view('visiteurs_profile', compact([
                'user', 
                'type_visiteur', 
                'photo', 
                'codeqr',
                'piece'
            ]));

        } catch (\Throwable $th) {
            msg_flash('Une erreur est survenue', 'danger');
            return redirect()->route('home');
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        Validator::make($request->all(), [
            'nom' => 'required',
            'prenoms' => 'required',
            'type_visiteur' => 'required',
        ])->validate();

        try{

            //dd($request->all());
            if (isset($request->photos)) {

                $file = $request->photos;
                $listExt = ['png', 'jpg', 'jpeg', 'gif'];
                $ext = $file->extension();


                if (!in_array($ext, $listExt)) {
                    msg_flash("Le type du fichier photo n'est pas pris en charge", 'danger'); 
                    return redirect()->route('visiteurs.show',$id); 
                }

                $photo = fopen($request->photos, 'r');
                $res = Http::attach('photo', $photo)->post(config('app.api_url')."/visiteurs/update/".$id);
            }

            $response = Http::post(config('app.api_url')."/visiteurs/update/".$id, $request->all());
            
            $user = $response->json();

            //dd($user);
            if ($user == 404) {

                msg_flash("Cet utilisateur n'existe pas", 'danger');
                return redirect()->route('visiteurs.show',$id);
            }

            if ($user == 500) {

                msg_flash("Echec lors de la modification", 'danger');
                return redirect()->route('visiteurs.show',$id);
            }

            msg_flash("Modification reussie", 'success');
            return redirect()->route('visiteurs.show',$id);
            //dd($user);

        } catch (\Throwable $th) {
            return $th;
            msg_flash("Echec lors de la modification", 'danger');
            return redirect()->route('visiteurs.show', $id);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            $response = Http::get(config('app.api_url')."/visiteurs/delete/".$id);
            $statut = $response->json();
            if ($statut == 200) {
                msg_flash("Visiteur supprimé", 'success');
                return redirect()->route('visiteurs');
            }
            else {
                msg_flash("Erreur lors de la suppression", 'danger');
                return redirect()->route('visiteurs');
            }
        } catch (\Throwable $th) {
            msg_flash('Une erreur est survenue', 'danger');
            return redirect()->route('home');
        }
    }



    function downloadQrcode($id) {

        try {

            $response = Http::get(config('app.api_url')."/visiteurs/".$id);
            $user = $response->json();
           // dd($user);

            if ($user) {

                foreach ($user['info_complementaire'] as $item) {
                    if ($item['type_info_id'] === 3) {
                        $url = $item['valeur'];
                    }
                }

                //dd($url);
                
                $sFilename = $user['nom'].'_'.$user['prenoms'].'_'.$user['num_piece'].'.png';
                //$url = $codeqr['valeur']; 
                // Envoye l'entête d'attachement. 
                $header  = "Content-Disposition: attachment; "; 
                $header .= "filename=$sFilename\n" ; 
                header($header); 
    
                // Envoye l'entête du type MIME (ici, "inconnu"). 
                header("Content-Type: x/y\n"); 

                // Envoye le document. 
                readfile($url);
            }else {
                msg_flash('Une erreur est survenue lors du téléchargement', 'danger');
                return redirect()->back();
            }

        } catch (\Throwable $th) {
            msg_flash('Une erreur est survenue', 'danger');
            return redirect()->back();
        }
    }
    
    function generer_qrcode(Request $request, $num_piece) {

        Validator::make($request->all(), [
            'date_debut' => 'required',
            'date_fin' => 'required',
        ])->validate();

        try {

            $response = Http::post(config('app.api_url')."/visiteurs/new-qrcode/".$num_piece, $request->all());
            $user = $response->json();
    
            if ($user == 404 || $user == 500) {
                msg_flash('Une erreur est survenue avec le serveur', 'danger');
                return redirect()->back();
            }

            msg_flash('Code QR généré avec succès', 'success');
            return redirect()->back();

        } catch (\Throwable $th) {
            msg_flash('Une erreur est survenue', 'danger');
            return redirect()->back();
        }
    }
}
