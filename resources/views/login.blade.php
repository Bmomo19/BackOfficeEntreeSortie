@include('partials.head')
<body>


<div class="container">
    <div class="col-md-6 col-md-offset-3">
        <form class="form-signin" method="POST" action="{{route('auth')}}">
            {{csrf_field()}}
            <div class="text-center mb-4">
              <img class="mb-4" src="{{asset('assets/img/logo2.png')}}" alt="" >
              <h1 class="h3 mb-3 font-weight-normal">Se connecter</h1>

            </div>


            <div class="form-label-group">
              <input type="text" id="inputEmail" class="form-control" placeholder="Login" autocomplete="off" required autofocus name="login">

            </div>
            <br>

            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Mot de passe" required name="password">

            </div>

            <div class="checkbox mb-3">
              <label>
                <input type="checkbox" value="remember-me" autocomplete="off"> Remember me
              </label>
            </div>
            <button class="btn btn-lg bt-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted text-center">&copy; 2020</p>
          </form>
    </div>
</div>

<footer>
  <script src="{{ asset('assets/vendor/jQuery/jquery-2.2.3.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
</footer>
@include('flash.msg')

</body>
</html>
