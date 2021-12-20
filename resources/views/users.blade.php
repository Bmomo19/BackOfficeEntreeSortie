@extends('layouts.base')

@section('content')
<section class="content-title">
    <h1 style="text-transform: none;">
        <a href="{{ route('users.add') }}" class="btn bt-light bt-light-hover" style="border-radius:4px !important;" {{ disabled_button('Admin') }}> 
            AJOUTER UTILISATEUR 
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
            <h2 class="c-secondary" style="font-weight: bold;">Liste des utilisateurs</h2>
            <div class="box">
                <div class="box-body">
                     <div class="table-responsive">
                    <table id="payments" class="table table-bordered table-striped datatable table">
                        <thead >
                            <tr style="font-size:11px; color:white;" class="bc-secondary">
                                <th class="text-center">Matricule</th>
                                <th class="text-center">Nom</th>
                                <th class="text-center">Prénom(s)</th>
                                <th class="text-center">Contact</th>
                                <th class="text-center">Fonction</th>
                                <th class="text-center">Date enregistrement</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datas as $data)


                                <tr style="font-size:12px;">
                                    <td> {{ $data['identifiant'] }} </td>
                                    <td>{{ $data['nom'] }}</td>
                                    <td>{{ $data['prenoms'] }} </td>
                                    <td>{{ $data['tel'] }} </td>
                                    <td>{{set_type($data['role'])}} </td>
                                    <td> {{ formater_date($data['created_at']) }} à {{ formater_heure($data['created_at']) }}</td>
                                    <td>
                                        <a class="btn btn-sm bt-info" href="{{ route('users.show', $data['identifiant']) }}"><span class="fa fa-user"></span> Profile</a> &nbsp;&nbsp;&nbsp;&nbsp;
                                        <a class="btn btn-sm btn-danger" href="{{ route('users.delete', $data['identifiant']) }}" onclick="{{ alert_confirm(route('users.delete', $data['identifiant'])) }}" {{ disabled_button('Admin') }}><span class="fa fa-trash"></span> Supprimer</a>
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
