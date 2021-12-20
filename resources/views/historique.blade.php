@extends('layouts.base')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" style="padding-top: 30px !important;">
            <h2 class="c-secondary" style="font-weight: bold;">Historique</h2>
            <div class="box">
                <div class="box-body">
                     <div class="table-responsive">
                    <table id="payments" class="table table-bordered table-striped datatable table">
                        <thead >
                            <tr style="font-size:11px; color:white;" class="bc-secondary">
                                <th class="text-center">Numéro de pièce </th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Prénom(s)</th>
                                <th class="text-center">Type</th>
                                <th class="text-center">Motif</th>
                                <th class="text-center">Heure d'entrée</th>
                                <th class="text-center">Heure de sortie</th>
                                <th class="text-center">Responsable entrée</th>
                                <th class="text-center">Responsable sortie</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($history)
        
                            @foreach ($history as $datas)


                            <tr style="font-size:12px;">
                                <td>{{$datas['visiteur']['num_piece']}}</td>
                                <td>{{$datas['visiteur']['nom']}}</td>
                                <td>{{$datas['visiteur']['prenoms']}}</td>
                                <td>{{set_type($datas['visiteur']['type_visiteur']['libelle'])}}</td>
                                <td>{{$datas['motif']}}</td>
                                <td>{{formater_date($datas['date_arrive'])}} à {{formater_heure($datas['date_arrive'])}}</td>
                                <td>{{formater_date($datas['date_depart'])}} à {{formater_heure($datas['date_depart'])}}</td>
                                <td>{{$datas['resp_entree']}}</td>
                                <td>{{$datas['resp_sortie']}}</td>
                                <td> <a class="btn btn-sm bt-info" href="{{ route('historique.visiteur', $datas['visiteur']['num_piece']) }}"><span class="fa fa-calendar"></span> Historique </td>
                            </tr>

                            @endforeach
                            @else
                                <p class="text-center">Aucune donnée</p>
                            @endif

                        </tbody>
                    </table></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
