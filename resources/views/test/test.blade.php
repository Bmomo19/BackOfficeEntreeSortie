<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div class="visible-print text-center">
	<h1>Laravel 5.7 - QR Code Generator Example</h1>

    {!! QrCode::format('png')->size(250)->generate('ItSolutionStuff.com', $url); !!}
   {{-- {!! QrCode::format('png')->size(250)->generate('ItSolutionStuff.com','/Users/imacoda09/Documents/image.png'); !!} --}}
   {{-- <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('Make me into an QrCode!')) !!} ">
   <a href="data:image/png;base64,{!! base64_encode(QrCode::format('png')->size(100)->generate('Make me into an QrCode!')) !!}">d</a> --}}

   {{$_SERVER['DOCUMENT_ROOT'].'/assets/img/imageqr.png'}}




    <p>example by ItSolutionStuf.com.</p>
</div>

</body>
</html>
