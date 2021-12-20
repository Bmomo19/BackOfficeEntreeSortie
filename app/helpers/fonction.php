<?php

use Carbon\Carbon;


//formater un nombre


function format_number($nbre)
{
	$valeur = number_format($nbre);
	$formatage = str_replace(',',' ',$valeur);
	return $formatage;
}

//fonction de date

function formater_date($date) //formater une date
{
	$date1=new DateTime($date);
	$datef=$date1->format("d/m/Y");
	return $datef;
}

//fonction de date

function formater_heure($date) //formater une date
{
	$date1=new DateTime($date);
	$datef=$date1->format("H:i");
	return $datef;
}

function ajoute_periode_mois($date,$delai) //ajoute une periode en mois et retranche 1 jours
{
    $date_debut=new DateTime($date.'-1 day');
    $delais="P".$delai."M";
    $periode=new DateInterval($delais);
    $date_fin =$date_debut->add($periode);
    $datef=$date_fin->format('Y-m-d');
    return $datef;
}

function ajoute_periode_ans($date,$delai) //ajoute une periode en année et retranche 1 jours
{
    $date_debut=new DateTime($date.'-1 day');
    $delais="P".$delai."Y";
    $periode=new DateInterval($delais);
    $date_fin =$date_debut->add($periode);
    $datef=$date_fin->format('Y-m-d');
    return $datef;
}


function ajoute_periode_jour($date,$delai) //ajoute une periode en année et retranche 1 jours
{
    $date_debut=new DateTime($date.'-1 day');
    $delais="P".$delai."D";
    $periode=new DateInterval($delais);
    $date_fin =$date_debut->add($periode);
    $datef=$date_fin->format('Y-m-d');
    return $datef;
}

// function tri_tableau(Array $datas, $key, $value) {

//     $table = [];
//     foreach($datas as $data) {
//         if()
//         $data[$key]
//     }
// }

function getHistoryType($type) {
    switch ($type) {
        case '0':
            return "<button class='btn bt-primary'>Arrivée</button>";
            break;
        case '1':
            return "<button class='btn bt-light'>Depart</button>";
            break;

        default:
            return '';
            break;
    }
}
function set_type_selected($type_bd, $type_champ) {
    if ($type_bd == $type_champ) {
        return 'selected';
    }
}

function set_type($type) {
    switch ($type) {
        case 'OCI' == $type:
            return "Responsable OCI";
            break;
        case 'Admin' == $type:
            return "Administrateur";
            break;
        default:
            return $type;
            break;
    }
}

function msg_flash($message, $type = 'info'){
    session()->flash('msg_flash', $message);
    session()->flash('msg_type', $type);
}

function set_active_route($route)
    {
        //index.dec
        $name = Route::currentRouteName();

        $base = strstr($name, '.', true) ?: $name;

        return  $route == $base ? 'header' : '';

    }


    function alert_confirm($url)
    {
        return "event.preventDefault();
        Swal.fire({
            title: 'Etes-vous sûre?',
            text: 'Cette action est irréversible',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#ff7900',
            cancelButtonColor: '#000',
            confirmButtonText: 'Supprimer',
            cancelButtonText: 'Annuler',
          }).then((result) => {
            if (result.value) {
                window.location.href = '$url';
            }
          });";
    }

    function disabled_button($access, $access_role = null) {
        if (session('user')['role'] === "Admin") {
            return "";
        }

        if ($access_role === "Virgile" && session('user')['role'] === "Chef virgile") {
            return "";
        }

        if (session('user')['id'] === $access) {
            return "";
        }else {
            return "disabled";
        }
    }


    function read_only($access_id, $access_role = null) {
        if (session('user')['role'] === "Admin") {
            return "";
        }
        
        if ($access_role === "Virgile" && session('user')['role'] === "Chef virgile") {
            return "";
        }

        if (session('user')['id'] === $access_id) {
            return "";
        }else {
            return "readonly";
        }
    }


    function validite_codeqr($date) {
            if ($date != '')
            {
               $now = Carbon::now();
               $days = $now->floatDiffInRealDays($date);
               $days = round($days);

               if ($now->lessThanOrEqualTo($date))
               {
                    return '<b class="text-success">Valide</b>';  
               }else{
                    return '<b class="c-red">Expiré</b>';
               }
            } else {

                return '';
            }

            //dd($days->lessThanOrEqualTo($now));
    }


?>
