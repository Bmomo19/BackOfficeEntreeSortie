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
                        <h5 class="widget-user-desc c-primary">{{set_type($user['type_visiteur']['libelle'])}}</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <a href="{{ route('download-qrcode', $user['num_piece']) }}">
                            @if ($codeqr != "")
                                <img class="img-responsive" src="{{ $codeqr['valeur'] }}">
                            @endif
                        </a>
                        <button class="btn btn-block bt-primary" style="margin-bottom: 15px;" data-toggle="modal" data-target="#generer_qr_code">
                            Generer
                        </button>
                    </div>
                </div>
            </div>
            <!-- /.widget-user -->
            <div class="box">
                <div class="box-header with-border">
                    <h4 class="c-primary text-center" style="font-weight:bold; text-transform: uppercase;"> Information visiteur</h4>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong>Numéro de pièce</strong>
                    <p>{{ $user['num_piece']  }}</p>
                    <strong>Type de pièce</strong>
                    <p>{{ $user['type_piece']  }}</p>
                    @if ($codeqr != "")
                        <strong>Validité du code QR {!! validite_codeqr($codeqr['date_fin']) !!}</strong>
                        <p>
                            Du <b>{{ formater_date($codeqr['date_debut']) }}</b> au <b>{{ formater_date($codeqr['date_fin']) }} </b>
                        </p>
                    @endif
                    @if ($piece != "")
                        <button class="btn btn-block bt-primary" style="margin-bottom: 15px;" data-toggle="modal" data-target="#piece_view">
                            Voir la pièce
                        </button>
                    @endif
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
                    <li class="active"><a href="#tab_2" data-toggle="tab"><b>Profile</b></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_2">
                        <div class="box box-form no-shadow">
                            <!-- /.box-header -->
                            <div class="box-body">
                                <form action="{{route('visiteurs.update', $user['num_piece'])}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div>
                                                        @foreach ($user['info_complementaire'] as $item)
                                                            @if ($item['type_info']['libelle'] === 'Photo')
                                                                <img class="img-responsive" src="{{ $item['valeur'] }}">
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="btn-bs-file btn btn-sm btn-block bt-primary" style="text-transform:none; margin-top:10px;">
                                                                    Changer la photo
                                                                    <input type="file" name="photos" class="form-control" style="display: none;" accept=".jpg, .jpeg, .png"/>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class='row'>
                                                    <div class='col-md-6'>
                                                        <div class='form-group'>
                                                            <label>Nom(s)</label>
                                                            <input class="form-control @error('nom') is-invalid @enderror"  value="{{ old('nom') ?: $user['nom']  }}" id="nom" name="nom" type="text" required/>
                                                            @error('nom')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class='col-md-6'>
                                                        <div class='form-group'>
                                                            <label>Prénom(s)</label>
                                                            <input class="form-control @error('prenoms') is-invalid @enderror" value="{{ old('prenoms') ?: $user['prenoms']  }}" id="prenoms" name="prenoms" type="text"  required/>
                                                            @error('prenoms')
                                                                <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class='row'>
                                                    <div class='col-md-12'>
                                                        <div class="form-group">
                                                            <label>Fonction :</label>
                                                            <select name="type_visiteur" required class="form-control">
                                                                @foreach ($type_visiteur as $item)
                                                                    <option value="{{ $item['libelle'] }}" {{ set_type_selected($user['type_visiteur']['libelle'], $item['libelle']) }}>{{ $item['libelle'] }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                   
                                                <div class='row'>
                                                    <div class='col-md-4 col-md-offset-4'>
                                                        <div class='form-group'  style="margin-top: 80px;">
                                                            <button type="submit" name="modifier" class="btn bt-primary btn-block pull-right">Modifier</button>
                                                        </div>
                                                    </div>
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


@section('footer')
    

<!-- MODALS GENERER CODE QR -->

<div class="modal fade" tabindex="-1" role="dialog" id="generer_qr_code">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header bc-secondary">
          <button type="button" class="close c-white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title c-white">Générer un nouveau code QR</h4>
        </div>
        <div class="modal-body">
            <h4 class="text-center c-primary" style="font-weight: bold; margin-bottom: 30px;">Validité</h4>
          <form action="{{route('generate_qrcode_visiteurs', $user['num_piece'])}}" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-6">
                    <label for="">Du</label>
                    <input type="date" class="form-control" name="date_debut" required>
                </div>
                <div class="col-md-6">
                    <label for="">Au</label>
                    <input type="date" class="form-control" name="date_fin" required>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
          <button type="submit" class="btn bt-primary">Générer</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
    </form> 



    <div class="modal fade" tabindex="-1" role="dialog" id="piece_view">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    @if ($piece != "")
                        <img src="{{ $piece['valeur'] }}" alt="" class="img-responsive">
                    @endif
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

  @endsection