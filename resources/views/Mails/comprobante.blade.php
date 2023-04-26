<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="box" style="box-shadow: 0px 0px 8px black; background-color:#1595c2; color:white; display:flex; flex-direction:column; justify-content:center; align-items: center;">
        <h1 class="title">| Comprobante de pago | MLRepuestos |</h1>
        <h4></h4>
        <div class="photo" style="width: 30%;">
            <img src="{{$details['link']}}" alt="" style="width: 100%;">
        </div>
        <a href="https://www.mlrepuestos.com.ar/api/descargar/{{$details['id']}}" id="download-link" style="margin-top: 2%;margin-bottom: 2%; padding: 2% 4%; color: white; text-decoration: none; box-shadow: 0px 0px 4px black;">
            Descargar
        </a>
    </div>

</body>

</html>