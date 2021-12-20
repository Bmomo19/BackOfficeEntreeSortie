@extends('layouts.base')


@section('content')
<section class="content-title">
        <h1>
            <a href="{{ route('users.add') }}" class="btn btn-primary btn-xs"> Nouvel utilisateur</a>
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Accueil</a></li>
            <li class=""><a href="{{ route('users') }}">Utilisateurs</a> </li>
            <li class="active">Nouvel utilisateur</li>
        </ol>
</section>

<section class="content">
        <div class="box box-form">
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-6 col-md-offset-3">

        <form method="post" action="{{route('users.store')}}"  class="form-horizontal" enctype="multipart/form-data">


            {{csrf_field()}}
            <input class="form-control @error('identifiant') is-invalid @enderror" type="text" id="identifiant" name="identifiant" placeholder="Matricule" value="{{old('identifiant')}}" autocomplete="off" required />
            @error('identifiant')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <input class="form-control @error('nom') is-invalid @enderror" type="text" id="nom" name="nom" placeholder="Nom" value="{{old('nom')}}" autocomplete="off"   required />
            @error('nom')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <input class="form-control @error('prenoms') is-invalid @enderror" type="text" id="prenoms" name="prenoms" placeholder="Prénom(s)" value="{{old('prenoms')}}" autocomplete="off" required />
            @error('prenoms')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <input class="form-control @error('tel') is-invalid @enderror" type="tel" id="tel" name="tel" placeholder="Téléphone" value="{{old('tel')}}" autocomplete="off" required />
            @error('tel')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <label class="control-label">Fonction</label>
            <select name="role" id="role" class="form-control" required>
                <option value="Admin">Administrateur</option>
                <option value="OCI">Responsable OCI</option>
                <option value="Chef virgile">Chef virgile</option>
                <option value="Virgile">Virgile</option>
            </select>
            <br>
            <input class="form-control @error('login') is-invalid @enderror" type="text" id="login" name="login" value="{{old('login')}}" autocomplete="off" placeholder="Login" required/>
            @error('login')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <br>
            <input class="form-control @error('password') is-invalid @enderror" type="password" id="password" name="password" value="{{old('password')}}" autocomplete="off" placeholder="Mot de passe" required/>
            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
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
