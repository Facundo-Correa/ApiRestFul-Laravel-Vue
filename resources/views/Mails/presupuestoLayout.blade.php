<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <style>
        a, a:hover, a:visited {
            color: #7f132d;
        }
        body {
            background-color: rgb(235, 235, 235);
            font-family: "Roboto", sans-serif;
            padding: 0;
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }
        .body td, .body th {
            padding: 3px 5px;
        }
        .body td {
            background: #e2e2e2;
        }
        .body td a.btn {
            background: #fdb94d;
            padding: 8px 15px;
            color: #fff;
            text-decoration: none;
            border-radius: 1em;
            border: 1px solid #ceab79;
            display: inline-block;
        }
        .body td a:hover {
            background: #d29a3f;
            border: 1px solid #ae9066;
        }
        .body .container {
            max-width: 500px;
            margin-left: auto;
            margin-right: auto;
        }
        .footer {
            font-size: .65em;
            color: #000;
        }
        .footer td {
            background-color: #fff;
            padding: 5px 0;
        }
        .footer table {
            max-width: 500px;
            margin: 0 auto;
        }
        .footer a {
            color: #3295c2;
        }
        .pr-3 {
            padding-right: .5em
        }
        .pl-3 {
            padding-left: .5em
        }
        .pr-4 {
            padding-right: .75em
        }
        .pl-4 {
            padding-left: .75em
        }
    </style>
    @yield('css')
</head>
<body>
    <table>
        <tr class="body">
            <td>
                @yield('body')
            </td>
        </tr>
        <tr class="footer">
            <td>
                <table>
                    @yield('footer')
                    <tr>
                        <td style="padding: 20px 0 25px">
                            All Rights Reserved &copy; - {{\Carbon\Carbon::now()->format('Y')}}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
