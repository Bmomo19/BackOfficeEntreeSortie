<aside class="sidebar-left" style="background-color:black !important;">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
            <img src="{{ session('user')['photo'] }}" class="img-circle" alt="User Image">
            </div>
            <div class="info" style="white-space:none !important;margin-top:15px;">
                <p>{{session('user')['nom']}} {{session('user')['prenoms']}}</p>
                <p style="font-size:11px;">
                    <b class="c-primary">{{set_type(session('user')['role'])}}</b>
                </p>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="{{ set_active_route('home') }}">
                <a href="{{route('home')}}"><i class="fa fa-home"></i> <span>Tableau de bord</span></a>
            </li>
            <li class="{{ set_active_route('visiteurs') }}">
                <a href="{{route('visiteurs')}}"><i class="fa fa-users"></i> <span>Visiteurs</span></a>
            </li>
            <li class="{{ set_active_route('users') }}">
                <a href="{{route('users')}}"><i class="fa fa-user"></i> <span>Utilisateurs</span></a>
            </li>
            <li class="{{ set_active_route('historique') }}">
                <a href="{{route('historique')}}"><i class="fa fa-calendar"></i> <span>Historique</span></a>
            </li>
        </ul>

        <!-- /. sidebar-menu -->
    </section>
</aside>
