<?php

namespace App\Http\Controllers;

use App\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Psr\Http\Message\ResponseInterface;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('user_auth');
    }

    public function index() {

        try {
            $response = Http::get(config('app.api_url').'/users');
            $datas = $response->json();

            if (session('user')['role'] === "Chef virgile") {
                foreach ($datas as $data) {
                    if ($data['role'] === "Chef virgile" || $data['role'] === "Virgile") {
                        $new_datas[] = $data;
                    }
                }

                $datas = $new_datas;
            }
            //dd($datas);
            return view('users', ['datas' => $datas]);

        } catch (\Throwable $th) {
            msg_flash('Une erreur est survenue', 'danger');
            return redirect()->route('home');
        }

    }

    public function create() {
        return view('users_add');
    }

    // public function edit() {

    //     return view('update_user');
    // }

    public function show($id) {

        try {
            $response = Http::get(config('app.api_url')."/users/".$id);
            $user = $response->json();

            return view('users_profile', compact('user'));

        } catch (\Throwable $th) {
            msg_flash('Une erreur est survenue', 'danger');
            return redirect()->route('home');
        }

    }

    public function store(Request $request) {

        Validator::make($request->all(), [
            'identifiant' => 'required|min:4',
            'nom' => 'required',
            'prenoms' => 'required',
            'tel' => 'required',
            'role' => 'required',
            'login' => 'required',
            'password' => 'required|min:6',
        ])->validate();

        try {
            $response = Http::post(config('app.api_url')."/users", $request->all());
            $user = $response->json();

            if ($user == 444) {
                msg_flash('Matricule ou login déjà utilisé', 'danger');
                return redirect()->back();
            }

            if ($user == 500) {
                msg_flash('Une erreur est survenue avec le serveur', 'danger');
                return redirect()->back();
            }

            msg_flash('Utilisateur crée avec succès', 'success');
            return redirect()->route('users.show', $user['identifiant']);

        } catch (\Throwable $th) {
            msg_flash('Une erreur est survenue', 'danger');
            return redirect()->route('home');
        }

    }

    public function update(Request $request) {

        Validator::make($request->all(), [
            'nom' => 'required',
            'prenoms' => 'required',
            'tel' => 'required',
            'role' => 'required',
        ])->validate();

        try {
            
            //dd($request->all());
            // if (!$request->photo) {
            //     $response = Http::asForm()->post(config('app.api_url')."/users/update/".$request->identifiant, $request->all());
            //     //dd($request->all());
            //     $user = $response->json();
            // } else {
            //     $response = '';
            //     $client = new Client([
            //         // Base URI is used with relative requests
            //         'base_uri' => config('app.api_url'),
            //     ]);
    
            //     $promise = $client->requestAsync('POST', config('app.api_url')."/users/update/".$request->identifiant, [
            //         'multipart' => [
            //             [
            //                 'name'     => 'nom',
            //                 'contents' => $request->nom
            //             ],
            //             [
            //                 'name'     => 'prenoms',
            //                 'contents' => $request->prenoms
            //             ],
            //             [
            //                 'name'     => 'tel',
            //                 'contents' => $request->tel
            //             ],
            //             [
            //                 'name'     => 'role',
            //                 'contents' => $request->role
            //             ],
            //             [
            //                 'name'     => 'photo',
            //                 'contents' => fopen($request->photo->path(), 'r')
            //             ],
            //         ]
            //     ]);

            //     $promise->then(
            //         function (ResponseInterface $res) {
            //              dd($res->getStatusCode() . "\n");
            //         },
            //         function (RequestException $e) {
            //             return $e->getMessage() . "\n";
            //             echo $e->getRequest()->getMethod();
            //         }
            //     );
                
            // }
            

            if (isset($request->photos)) {

                $file = $request->photos;
                $listExt = ['png', 'jpg', 'jpeg', 'gif'];
                $ext = $file->extension();


                if (!in_array($ext, $listExt)) {
                    msg_flash("Le type du fichier photo n'est pas pris en charge", 'danger'); 
                    return redirect()->back(); 
                }

                $photo = fopen($request->photos, 'r');
                $response = Http::attach('photo', $photo)->post(config('app.api_url')."/users/update/".$request->identifiant);
            }

            $response = Http::post(config('app.api_url')."/users/update/".$request->identifiant, $request->all());
            //dd($request->all());
            $user = $response->json();


            if ($user == 404) {

                msg_flash("Cet utilisateur n'existe pas", 'danger');
                return redirect()->route('users.show',$request->identifiant);
            }

            if ($user == 500) {

                msg_flash("Echec lors de la modification", 'danger');
                return redirect()->route('users.show',$request->identifiant);
            }

            msg_flash("Modification reussie", 'success');
            return redirect()->route('users.show',$request->identifiant);
            //dd($user);

        } catch (\Throwable $th) {
            return $th;
            msg_flash("Echec lors de la modification", 'danger');
            return redirect()->route('users.show', $request->identifiant);
        }

    }

    public function delete($id) {

        try {
            $response = Http::get(config('app.api_url')."/users/delete/".$id);
            $statut = $response->json();
            if ($statut == 200) {
                msg_flash("Utilisateur supprimé", 'success');
                return redirect()->route('users');
            }
            else {
                msg_flash("Erreur lors de la suppression", 'danger');
                return redirect()->route('users');
            }
        } catch (\Throwable $th) {
            msg_flash('Une erreur est survenue', 'danger');
            return redirect()->route('home');
        }
    }


    public function edit_password(Request $request) {


        if (mb_strlen($request->new_password) < 6) {
            msg_flash('Le mot de passe doit contenir au minimun 6 caractères', 'danger');
            return redirect()->back();
        }

        if ($request->new_password != $request->new_password_confirmation) {
            
            msg_flash('Les deux mots de passe ne correspondent pas', 'danger');
            return redirect()->back();
        }

        if (!Hash::check($request->admin_password, session('user')['password'])) {
            if (session('user')['role'] === "Admin") {
                msg_flash('Mot de passe administrateur incorrect', 'danger');
                return redirect()->back();
            } else {
                msg_flash('Mot de passe actuel incorrect', 'danger');
                return redirect()->back();
            }  
        }

        try {
            $response = Http::post(config('app.api_url')."/users/edit-password/".$request->identifiant , $request->all());
            $user = $response->json();
            

            if ($user == 200) {
                msg_flash('Mot de passe modifié avec succès', 'success');
                return redirect()->route('users.show', $request->identifiant);
            }else {
                //dd($user);
                msg_flash("Echec lors de la modification", 'danger');
                return redirect()->route('users.show', $request->identifiant);
            }
        } catch (\Throwable $th) { 
            //return $th;
            msg_flash('Une erreur est survenue', 'danger');
            return redirect()->route('home');
        }
    }
   
}
