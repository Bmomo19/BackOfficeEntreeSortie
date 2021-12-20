@extends('layouts.base')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" style="padding-top: 30px !important;">
            <h2> <span class="c-primary" style="font-weight: bold;">Historique de:</span>  {{$user['prenoms']}} {{$user['nom']}}  <span class="pull-right"> <span class="c-primary" style="font-weight: bold;">Numéro de pièce:  </span> {{$user['num_piece']}}</span> </h2>

            <div class="box">
                <div class="box-body">
                     <div class="table-responsive">
                    <table id="payments" class="table table-bordered table-striped datatable table">
                        <thead >
                            <tr style="font-size:11px; color:white;" class="bc-secondary">
                                <th class="text-center">Heure d'entrée</th>
                                <th class="text-center">Responsable entrée</th>
                                <th class="text-center">Motif</th>
                                <th class="text-center">Heure de sortie</th>
                                <th class="text-center">Responsable sortie</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($user['in_out'] as $datas)

                            <tr style="font-size:12px;">
                                <td>{{formater_date($datas['date_arrive'])}} à {{formater_heure($datas['date_arrive'])}}</td>
                                <td>{{$datas['resp_entree']}}</td>
                                <td>{{$datas['motif']}}</td>
                                <td>{{formater_date($datas['date_depart'])}} à {{formater_heure($datas['date_depart'])}}</td>
                                <td>{{$datas['resp_sortie']}}</td>
                            </tr>

                            @endforeach



                        </tbody>
                    </table></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
