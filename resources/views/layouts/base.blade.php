@include('partials.head')
@include('partials.header')
@include('partials.sidebar')

<div class="content-wrapper">
@yield('content')


@include('partials.footer')
@include ('flash.msg')
@yield('footer')
</body>

</html>
