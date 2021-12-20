@extends('layouts.base')

@section('content')
<section class="content-title">
    <h1 style="text-transform: none;">
        <a href="{{ route('visiteurs.add') }}" class="btn bt-light bt-light-hover" style="border-radius:4px !important;" {{ disabled_button('Admin') }}> 
            AJOUTER VISITEUR 
        </a>
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li class="active"><a href="{{ route('home') }}">TABLEAU DE BORD</a> </li>
    </ol>
</section>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-12" style="padding-top: 30px !important;">
            <h2 class="c-secondary" style="font-weight: bold;">Liste des visiteurs</h2>
            <div class="box">
                <div class="box-body">
                     <div class="table-responsive">
                    <table id="payments" class="table table-bordered table-striped datatable table">
                        <thead >
                            <tr style="font-size:11px; color:white;" class="bc-secondary">
                                <th class="text-center">Numéro de pièce</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Prénom(s)</th>
                                <th class="text-center">Type de pièce</th>
                                <th class="text-center">Date d'enregistrement</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)


                                <tr style="font-size:12px;">
                                    <td> {{ $data['num_piece'] }} </td>
                                    <td>{{ $data['nom'] }}</td>
                                    <td>{{ $data['prenoms'] }} </td>
                                    <td>{{ $data['type_piece'] }} </td>
                                    <td> {{ formater_date($data['created_at']) }} à {{ formater_heure($data['created_at']) }}</td>
                                    <td>
                                        <a class="btn btn-sm bt-info" href="{{ route('visiteurs.show', $data['num_piece']) }}"><span class="fa fa-user"></span> Profile</a> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a class="btn btn-sm bt-success" href="{{ route('historique.visiteur', $data['num_piece']) }}"><span class="fa fa-calendar"></span> Historique</a> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <!--
                                        <a class="btn btn-sm btn-danger" href="{{ route('visiteurs.delete', $data['num_piece']) }}" onclick="{{ alert_confirm(route('visiteurs.delete', $data['num_piece'])) }}" {{ disabled_button('Admin') }}><span class="fa fa-trash"></span> Supprimer</a>
                                        -->
                                    </td>
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
