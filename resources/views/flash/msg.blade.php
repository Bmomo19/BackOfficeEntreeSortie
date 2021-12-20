@if (session()->has('msg_flash'))
    <script>
        $.notify({
            // options

            message:  "<p style='font-size: 20px;'><i class='fa fa-bell' style='color:white;'></i> &nbsp; <b>{{ session()->get('msg_flash') }}</b></p>"
        },{
            // settings
            type: "{{ session()->get('msg_type') }}",
            mouse_over: 'pause',
            delay: 3000,
        });
    </script>
    {{session()->forget('msg_flash')}}
@endif

