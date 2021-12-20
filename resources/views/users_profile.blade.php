@extends('layouts.base')


@section('content')
<section class="content">
    <div class="row">
        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="box">
                <div class="box box-widget widget-user ">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bc-secondary">
                        <h3 class="widg et-user-username">{{ $user['prenoms']  }} {{ $user['nom']  }}</h3>
                        <h5 class="widget-user-desc c-primary">{{set_type($user['role'])}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3" style="padding-bottom: 20px;">
                        <img class="img-responsive" src="{{ $user['photo'] }}">
                    </div>
                </div>
            </div>
            <!-- /.widget-user -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="c-primary text-center" style="font-weight:bold; text-transform:uppercase;"> Information utilisateur</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong>Nom d'utilisateur</strong>
                    <p>{{ $user['login']  }}</p>
                    <strong>Matricule</strong>
                    <p>{{ $user['identifiant']  }}</p>
                    <strong>Téléphone</strong>
                    <p>{{ $user['tel']  }}</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!--<div class="box">
                <div class="box-body">
                    <button type="button" class="btn btn-raised ripple-effect btn-block btn-danger">Delete</button>
                </div>

            </div>-->
        </div>
        <div class="col-md-8">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_2" data-toggle="tab"><b> {{ $user['identifiant'] === session('user')['identifiant'] ? "Modifier Profile" : "Profile" }} </b></a></li>
                    @if (session('user')['role'] === 'Admin' || session('user')['identifiant'] === $user['identifiant'] || ($user['role'] === "Virgile" && session('user')['role'] === "Chef virgile"))
                        <li class=""><a href="#tab_1" data-toggle="tab">Modifier mot de passe</a></li>
                    @endif

                </ul>
                <div class="tab-content">
                    <div class="tab-pane" id="tab_1">
                        <div class="row">
                            <div class='col-md-8 col-md-offset-2'>
                                <div class="box box-form no-shadow">
                                    <!-- /.box-header -->

                                    <div class="box-body">
                                        <form action="{{ route('users.edit-password') }}" method="post">
                                            {{csrf_field()}}
                                            <div class="col-md-12">
                                                <div class='row'>
                                                    <div class='col-md-12'>
                                                        <div class='form-group'>
                                                            <label>Nouveau mot de passe</label>
                                                            <input required="required" class="form-control @error('new_password') is-invalid @enderror" id="new_password" name="new_password" type="password" required/>
                                                            @error('new_password')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class='col-md-12'>
                                                        <div class='form-group'>
                                                            <label>Confirmer mot de passe</label>
                                                            <input required="required" class="form-control @error('new_password_confirmation') is-invalid @enderror" id="new_password_confirmation" name="new_password_confirmation" type="password" required/>
                                                            @error('new_password_confirmation')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class='col-md-12'>
                                                        <div class='form-group'>
                                                            <label>Mot de passe {{ $user['identifiant'] === session('user')['identifiant'] ? "actuel" : "administrateur" }}</label>
                                                            <input required="required" class="form-control @error('admin_password') is-invalid @enderror" id="admin_password" name="admin_password" type="password" />
                                                            @error('admin_password')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <input type="hidden" name="identifiant" value="{{ $user['identifiant'] }}">
                                                </div>
                                                <div class='row'>
                                                    <div class='col-md-12'>
                                                        <div class='form-group'>
                                                            <button type="submit" name="reset" class="btn bt-primary">Modifier</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane active" id="tab_2">
                        <div class="box box-form no-shadow">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form action="{{route('users.update', $user['identifiant'])}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class='row'>
                                                    <div class='col-md-6'>
                                                        <div class='form-group'>
                                                            <label>Nom(s)</label>
                                                            <input class="form-control @error('nom') is-invalid @enderror" value="{{ $user['nom'] ?: old('nom') }}" id="nom" name="nom" type="text" required {{ read_only($user['id'], $user['role'] ) }}/>
                                                            @error('nom')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <div class='form-group'>
                                                            <label>Prénom(s)</label>
                                                            <input class="form-control @error('prenoms') is-invalid @enderror" value="{{ $user['prenoms'] ?: old('prenoms') }}" id="prenoms" name="prenoms" type="text"  required  {{ read_only($user['id'], $user['role'] ) }}/>
                                                            @error('prenoms')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-md-6'>
                                                        <div class='form-group'>
                                                            <label>Téléphone</label>
                                                            <input class="form-control @error('tel') is-invalid @enderror" type="tel" id="tel" name="tel" value="{{ $user['tel'] ?: old('tel') }}" required {{ read_only($user['id'], $user['role'] ) }}/>
                                                            @error('tel')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <div class="form-group">
                                                            <label>Fonction :</label>
                                                            <select class="form-control" name="role" id="role" {{ read_only($user['id'], $user['role'] ) }}>
                                                                @if (session('user')['role'] === 'Admin')
                                                                    <option value="Admin" {{ set_type_selected($user['role'], 'Admin') }}>Administrateur</option>
                                                                @endif
                                                                <option value="OCI" {{ set_type_selected($user['role'], 'OCI') }}>Responsable OCI</option>
                                                                <option value="Chef virgile" {{ set_type_selected($user['role'], 'Chef virgile') }}>Chef virgile</option>
                                                                <option value="Virgile" {{ set_type_selected($user['role'], 'Virgile') }}>Virgile </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    @if (session('user')['id'] === $user['id'] || session('user')['role'] === "Admin")  
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label for="photo">Photo</label>
                                                                    <input class="form-control" type="file" name="photos" id="photo" accept=".jpg, .jpeg, .png"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                    <input type="hidden" value="{{ $user['identifiant']  }}" name="identifiant">
                                                    @if (session('user')['id'] === $user['id'] || session('user')['role'] === "Admin" || ($user['role'] === "Virgile" && session('user')['role'] === "Chef virgile"))
                                                        <div class='row'>
                                                            <div class='col-md-4 col-md-offset-4'>
                                                                <div class='form-group'  style="margin-top: 50px;">
                                                                    <button type="submit" name="modifier" class="btn bt-primary btn-block pull-right" {{ disabled_button($user['id'], $user['role']) }}>Modifier</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.box-body -->
                        </div>

                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
        </div>
    </div>
</section>
@endsection
