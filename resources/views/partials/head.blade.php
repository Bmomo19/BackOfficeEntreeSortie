<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-register</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link href="{{ asset('assets/img/logo.png') }}" rel="shortcut icon" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/vendor/style_header.css') }}" />
     <link rel="stylesheet" href="{{ asset('assets/vendor/iCheck/all.css') }}" />
     <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" />
     <link rel="stylesheet" href="{{ asset('assets/vendor/morris/morris.css') }}" />
     <link rel="stylesheet" href="{{ asset('assets/vendor/dropzone/dropzone.css') }}" />
     <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/dataTables.bootstrap.css') }}" />
     <link rel="stylesheet" href="{{ asset('assets/vendor/responsive-tables/responsivetables.css') }}" />
     <link rel="stylesheet" href="{{ asset('assets/css/info-box.css') }}" />
     <link rel="stylesheet" href="{{ asset('assets/css/color.css') }}" />
     <link rel="stylesheet" href="{{ asset('assets/css/msg_flash.css') }}" />
     <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert2.min.css') }}">
    <!-- Icons -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <!--<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">-->
    <link rel="stylesheet" href="{{ asset('assets/icons/font-awesome/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/icons/themify-icons/themify-icons.css') }}" />
    <!--animate css-->
    <link rel="stylesheet" href="{{ asset('assets/vendor/animate.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/compte.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main-style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/skins/all-skins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <script src="{{ asset('assets/vendor/jQuery/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/compte.js') }}"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script async src="../../../www.googletagmanager.com/gtag/js6882?id=UA-112423372-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'UA-112423372-2');
    </script>
    <script>
        function showVt(str)
        {
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            }
            else
            {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else {
                    // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET","getVt.php?q="+str,true);
                xmlhttp.send();
            }
        }
    </script>

</head>
