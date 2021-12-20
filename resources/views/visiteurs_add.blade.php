@extends('layouts.base')


@section('content')
<section class="content-title">
        <h1>
            <a href="{{ route('visiteurs.add') }}" class="btn btn-primary btn-xs"> Nouveau visiteur</a>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Accueil</a></li>
            <li class=""><a href="{{ route('visiteurs') }}">Visiteurs</a> </li>
            <li class="active">Nouveau visiteurs</li>
        </ol>
</section>

<section class="content">
        <div class="box box-form">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6 col-md-offset-3">

                <form method="post" action="{{route('visiteurs.store')}}"  class="form-horizontal" >


            {{csrf_field()}}
            <input class="form-control @error('nmu_piece') is-invalid @enderror" id="num_piece" type="text" name="num_piece" placeholder="Numéro de pièce" value="{{old('num_piece')}}" autocomplete="off" required />
            @error('num_piece')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <input class="form-control @error('nom') is-invalid @enderror" type="text" id="nom" name="nom" placeholder="Nom" value="{{old('nom')}}" autocomplete="off"   required />
            @error('nom')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <input class="form-control @error('prenoms') is-invalid @enderror" type="text" id="prenoms" name="prenoms" placeholder="Prénoms" value="{{old('prenoms')}}" autocomplete="off" required />
            @error('prenoms')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <label class="control-label">Type de pièce</label>
            <select name="type_piece" id="type_piece" class="form-control">
                <option value="Carte OCI">Carte OCI</option>
                <option value="CNI">CNI</option>
                <option value="Attestation">Attestation d'identité</option>
                <option value="Permis">Permis de conduire</option>
                <option value="Passport">Passport</option>
                <option value="Carte consulaire">Carte consulaire</option>
            </select>
            @error('type_piece')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <label for="">Fonction</label>
            <select name="type_visiteur" id="type_visiteur" required class="form-control">
                @foreach ($type_visiteur as $item)
                    <option value="{{ $item['libelle'] }}">{{ $item['libelle'] }}</option>
                @endforeach
            </select>
            @error('type_visiteur')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <label> Validité du code QR </label>
            <br>
            <label for="">Du</label>
            <input class="form-control" type="date" name="date_debut" value="{{old('date_debut')}}" autocomplete="off" />

            <label for="">Au</label>
            <input class="form-control" type="date" name="date_fin" value="{{old('date_fin')}}" autocomplete="off" />

            <br>
            <button type="submit" class="btn bt-primary">
             valider <span class="fa fa-check-circle"></span>
            </button>




    </form>
                </div>
            </div>
            <!-- /.box-body -->
    </section>


@endsection
