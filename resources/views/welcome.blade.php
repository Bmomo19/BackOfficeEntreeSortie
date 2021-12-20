@extends('layouts.base')


@section('content')
<div class="container-fluid">
    <div class="row" style="padding-top: 80px;">
        <div class="col-md-3">
            <div class="info-box-3 bc-secondary" data-toggle="modal" data-target="#academicien_present_list">
                <div class="icon">
                  <i class="fa fa-user c-white"></i>
                </div>
                <div class="info-box-content">
                      <div class="text-center value c-white" style="font-size: 50px;">
                            {{ $visiteurPresent['nombre_present'] }}
                      </div>
                      <div class="text-uppercase text-center c-white" style="font-size:16px;">Academiciens presents</div>
                </div>
              </div>
        </div>
        <div class="col-md-3">
            <div class="info-box-3 bc-primary">
                <div class="icon">
                  <i class="fa fa-clock-o c-white"></i>
                </div>
                <div class="info-box-content">
                      <div class="text-center value c-white" style="font-size: 50px;">
                           {{ $heure_moy['arr']['moy'] ? formater_heure($heure_moy['arr']['moy']) : "" }} 
                      </div>
                      <div class="text-uppercase text-center c-white" style="font-size:16px;">Heure moyenne d'arrivée</div>
                </div>
              </div>
        </div>
        <div class="col-md-3">
            <div class="info-box-3 bc-primary">
                <div class="icon">
                  <i class="fa fa-clock-o c-white"></i>
                </div>
                <div class="info-box-content">
                      <div class="text-center value c-white" style="font-size: 50px;">
                           {{ $heure_moy['dep']['moy'] ? formater_heure($heure_moy['dep']['moy']) : "" }} 
                      </div>
                      <div class="text-uppercase text-center c-white" style="font-size:16px;">Heure moyenne de depart</div>
                </div>
              </div>
        </div>
        <div class="col-md-3">
            <div class="info-box-3 bc-secondary">
                <div class="icon">
                  <i class="fa fa-pie-chart c-white"></i>
                </div>
                <div class="info-box-content">
                      <div class="text-center value c-white" style="font-size: 50px;">
                          {{ $visiteurSemaine['Total'] }}
                      </div>
                      <div class="text-uppercase text-center c-white" style="font-size:16px; ">Visite de la semaine</div>
                </div>
              </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>

    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header bc-secondary">
                    <h3 class="" style="font-weight: bolder; text-transform: uppercase; text-align:center !important; color:white;">Dernieres entrees</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Numéro de pièce</th>
                            <th>Nom</th>
                            <th>Prénom(s)</th>
                            <th>Fonction</th>
                            <th>Motif</th>
                            <th>Responsable</th>
                            <th>Heure</th>
                        </tr>
                        <tr>
                        @if($arrived)
                            @foreach ($arrived as $data)


                            <td>{{$data['visiteur']['num_piece']}}</td>
                            <td>{{$data['visiteur']['nom']}}</td>
                            <td>{{$data['visiteur']['prenoms']}}</td>
                            <td>{{$data['visiteur']['type_visiteur']['libelle']}}</td>
                            <td>{{$data['motif']}}</td>
                            <td>{{$data['resp_entree']}}</td>
                            <td>{{formater_date($data['date_arrive'])}} à {{formater_heure($data['date_arrive'])}} </td>
                        </tr>
                        @endforeach
                        @else
                            <p class="text-center">Aucune donnée</p>
                        @endif
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header bc-primary">
                    <h3 class="" style="font-weight: bolder; text-transform: uppercase; text-align:center !important; color:white;">Dernieres sorties</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>Numéro de pièce</th>
                            <th>Nom</th>
                            <th>Prénom(s)</th>
                            <th>Fonction</th>
                            <th>Motif</th>
                            <th>Responsable</th>
                            <th>Heure</th>
                        </tr>
                        @if($arrived)
                        @foreach ($depart as $data)


                            <td>{{$data['visiteur']['num_piece']}}</td>
                            <td>{{$data['visiteur']['nom']}}</td>
                            <td>{{$data['visiteur']['prenoms']}}</td>
                            <td>{{set_type($data['visiteur']['type_visiteur']['libelle'])}}</td>
                            <td>{{$data['motif']}}</td>
                            <td>{{$data['resp_sortie']}}</td>
                            <td>{{formater_date($data['date_arrive'])}} à {{formater_heure($data['date_arrive'])}} </td>
                        </tr>
                        @endforeach
                        @else
                            <p class="text-center">Aucune donnée</p>
                        @endif

                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</div>


<!-- MODALS ACADEMICIAN PRESENT LIST VIEW -->

<div class="modal fade" tabindex="-1" role="dialog" id="academicien_present_list">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bc-secondary">
                <button type="button" class="close c-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title c-white">Liste des academiciens present</h4>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table id="payments" class="table table-bordered table-striped datatable table">
                        <thead >
                            <tr style="font-size:11px; color:white;" class="bc-secondary">
                                <th class="text-center">Matricule</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Prénom(s)</th>
                                <th class="text-center">Heure d'arrivée</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($visiteurPresent['visiteurs'])   
                                @foreach ($visiteurPresent['visiteurs'] as $data)


                                    <tr style="font-size:12px;">
                                        <td> {{ $data['visiteur']['num_piece'] }} </td>
                                        <td>{{ $data['visiteur']['nom'] }}</td>
                                        <td>{{ $data['visiteur']['prenoms'] }} </td>
                                        <td> {{ formater_heure($data['date_arrive']) }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <p class="text-center">Aucune donnée</p>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
            </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div> 

@endsection
