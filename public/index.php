<?php

/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader for
| our application. We just need to utilize it! We'll simply require it
| into the script here so that we don't have to worry about manual
| loading any of our classes later on. It feels great to relax.
|
*/

require __DIR__.'/../vendor/autoload.php';

/*
|--------------------------------------------------------------------------
| Turn On The Lights
|--------------------------------------------------------------------------
|
| We need to illuminate PHP development, so let us turn on the lights.
| This bootstraps the framework and gets it ready for use, then it
| will load up this application so that we can run it and send
| the responses back to the browser and delight our users.
|
*/

$app = require_once __DIR__.'/../bootstrap/app.php';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
|
| Once we have the application, we can handle the incoming request
| through the kernel, and send the associated response back to
| the client's browser allowing them to enjoy the creative
| and wonderful application we have prepared for them.
|
*/

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Illuminate\Http\Request::capture()
);

$response->send();

$kernel->terminate($request, $response);

/*
----------------------------------------------------------------------------------------------------

@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@#&&&&@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@&#&&&&@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@P.::::^^^^~~~!777????JJJYYP&@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@Y.::::^^^^~~~!777????JJJYYP@@@@@
@@@@@@P                         :#@@@BBBB############&&&&&&&&&&&&&&@J                         :@@@@@
@@@@@@P                         ^#@G~               ............::::!                         ^@@@@@
@@@@@@P                         ^#&J77???77777777?JJJJJJJJJJJJJJJJJJ7                         ^@@@@@
@@@@@@P         :7??JYYY^       ^#@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@J         ^???JYYY:       ^@@@@@
@@@@@@P         G@@@@@@@!       ^#&BBBBBBBBBBBB#@@@@@#BBBBBBBBBBB#@@J        :#@@@@@@@^       ^@@@@@
@@@@@@P        ^#@@@@@@@!       ^#J            ^&@@@&~           .Y@J        !@@@@@@@&^       ^@@@@@
@@@@@@P        7@@@@@@@@!       ^#J             P@@@G.            J@J        J@@@@@@@&^       ^@@@@@
@@@@@@P   .... J@@@@@@@@7 ..... ^#J             !@@@J             J@J   .....P@@@@@@@&^ ..... ^@@@@@
@@@@@@P  !#BBBB&@@@@@@@@#BBBBBB~^#J             .B@&^             J@J  ?BBBBB@@@@@@@@@#BBBBBG^:@@@@@
@@@@@@P  7@@@@@@@@@@@@@@@@@@@@@!^#J              J@G              J@J  J@@@@@@@@@@@@@@@@@@@@&^:@@@@@
@@@@@@P  7@@@@@@@@@@@@@@@@@@@@@!^#J              ^&7              J@J  Y@@@@@@@@@@@@@@@@@@@@@^:@@@@@
@@@@@@P  ^YYYY5&@@@@@@@@PJYYYYY:^#J               J:              J@J  ~YYYY5@@@@@@@@@5YYYYYJ:^@@@@@
@@@@@@P       .#@@@@@@@@!       ^#J        :^           ^         J@J       ^&@@@@@@@&:       ^@@@@@
@@@@@@P       :#@@@@@@@@!       ^#J        ~?           J.        J@J       ^@@@@@@@@&^       ^@@@@@
@@@@@@P       :#@@@@@@@@!       ^#J        ~P.          G:        J@J       ^@@@@@@@@&^       ^@@@@@
@@@@@@P       :#@@@@@@@@!       ^#J        ^&^         ^#.        J@J       ^@@@@@@@@&^       ^@@@@@
@@@@@@P       :#@@@@@@@@!       ^#J        ^&?         ?@.        J@J       ^@@@@@@@@&^       ^@@@@@
@@@@@@P       :#@@@@@@@@!       ^#J        ^&G         5@.        J@J       ^@@@@@@@@&^       ^@@@@@
@@@@@@P       :#@@@@@@@@!       ^#J        ^&&:       :#@.        J@J       ^@@@@@@@@&^       ^@@@@@
@@@@@@P       :#@@@@@@@@G~.     ^#J        ^&@?       !@@.        J@J       ^@@@@@@@@@5^.     ^@@@@@
@@@@@@P        5@@@@@@@@@@#BGGGJ^#?        ^&@P       5@@.        J@J       .#@@@@@@@@@@#BGGG7^@@@@@
@@@@@@P        ^B@@@@@@@@@@@@@@P^#Y:^^^^^^:!&@#~:^^^^^&@@^:^^^^^^:Y@J        ~#@@@@@@@@@@@@@@J^@@@@@
@@@@@@P         .?B&@@@@@@@@@@@P:G#################################&?         :YB@@@@@@@@@@@@J^@@@@@
@@@@@@P            :~77?JJJ??7!^ ....................................           .^!77JJJJ?77!:^@@@@@
@@@@@@P                                                                                       ^@@@@@
@@@@@@P                                                                                       ^@@@@@
@@@@@@P                                                                                       ^@@@@@
@@@@@@P                                                                                       ^@@@@@
@@@@@@P                         .!!~^:..                                                      ^@@@@@
@@@@@@B7?????JYYYYYY555555PPPPPPB@@@@&&#GG5YJ7!~^:.                 .??????JYYYYY555555PPPPPPPB@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@&#BGP5Y?7~~^:.     !@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@&#BGPYJP@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

                                        MADE BY TREMEMOTE
----------------------------------------------------------------------------------------------------

*/