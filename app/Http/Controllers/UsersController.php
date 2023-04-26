<?php

namespace App\Http\Controllers;

use App\AlertaProductoUsuario;
use App\Domicilios;
use App\FirebaseUserToken;
use App\Seguimientos;
use App\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\CambioPassword;
use App\Mail\NewRegistration;
use App\Mail\PassRecovery;
use App\Personas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\Debug\Exception\FatalThrowableError;


class UsersController extends Controller
{
    public function login(Request $request)
    {
        $notificacion = '';

        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];
        $msg = [
            'email.required' => 'El campo EMAIL es requerido.',
            'email.email' => 'El campo EMAIL no es un email valido.',
            'password.required' => 'El campo PASSWORD es requerido.',
        ];

        $v = Validator::make($request->toArray(), $rules, $msg);

        if ($v->fails())
            return $this->errorResponse($v->errors(), 422);

        $user = User::where('email', $request->email)->first();

        if (!$user || md5($request->password) != $user->password)
            return $this->errorResponse('Usuario o contraseña incorrectos.', 403);

        //obtengo datos de la persona logueada

        if (!$user->activado)
            return $this->errorResponse('Usuario bloqueado. Si no lo activo todavia, revise su email.', 403);

        if ($user->isMoroso())
            return $this->errorResponse('Usuario bloqueado. comuniquese con Administracion tiene facturas pendientes de pago en su CTA CTE.', 403);


        if (!$user->persona->terminos)
            return $this->errorResponse('Debe aceptar los terminos para poder usar el sitio', 403);


        try {
            $token = $user->createToken();
        } catch (\Error $e) {

            return $this->errorResponse('Error en la creación de token, revise si Passport se encuentra correctamente configurado.', 403);
        } catch (\Throwable $e) {

            return $this->errorResponse('Error en la creación de token, revise si Passport se encuentra correctamente configurado.', 403);
        }

        /***
         * Registramos el login en seguimiento
         */
        $seguimiento = new Seguimientos();
        $seguimiento->user_id = $user->id;
        $seguimiento->seccion = 'login';
        $seguimiento->accion = 'ingreso'; // ver como cambiar a reconeccion
        $seguimiento->atributo = 'ip';
        $seguimiento->atributo_valor = $request->getClientIp();
        $seguimiento->referido = $request->hasHeader('referer') ? $request->header('referer') : 'sin datos';
        $seguimiento->save();

        $notify = $user->notificaciones()->get();


        if (count($notify) > 0) {
            foreach ($notify as $item) {
                $ids[] = $item->id;
            }

            // Marcar notificacion en 1 = email Creo que podemos optimizar con el hasmany de user pero no me salio
            AlertaProductoUsuario::whereIN('id', $ids)
                ->update(['notificacion' => '2']);

            $notificacion = 'Ingresaron articulos al stock que usted tenia en alerta <br> y se agregaron a su carrito para que pueda hacer el pedido <br> no los deje pasar esta vez!';
        }

        return $this->showMessage([
            'user' => $user,
            'token' => $token,
            'notificacion' => $notificacion
        ]);
    }

    public function loginExterno(Request $request)
    {
        return $request;
        $status = "ok";
        $token = \GuzzleHttp\json_decode('{"access_token":""}');
        $user = User::where('email', $request->email)->first();

        if (!$user || md5($request->password) != $user->password) {
            return $this->showResponse([
                'status' => 'error',
                'user'  => '0',
                'token' => $token,
                'msg'   => 'credenciales incorrectas'
            ]);
        }
        try {
            //$token = $user->createToken();

            $status = 'ok';
        } catch (\Error $e) {
            return $this->errorResponse('Error en la creación de token, revise si Passport se encuentra correctamente configurado.', 403);
        } catch (\Throwable $e) {
            return $this->errorResponse('Error en la creación de token, revise si Passport se encuentra correctamente configurado.', 403);
        }

        /*
        if($ut = FirebaseUserToken::where('user_id', $user->id)){
            $ut->delete();
        }
        $user_token = FirebaseUserToken::create([
            'token' => $request->token,
            'user_id' => $user->id
        ]);*/


        if (!$user->activado)
            return $this->showResponse([
                'status' => 'error',
                'user'  => $user->id,
                'token' => $token,
                'msg'   => 'Usuario bloqueado. Si no lo activo todavia, revise su email.'

            ]);

        if ($user->isMoroso())
            return $this->showResponse([
                'status' => 'error',
                'user'  => $user->id,
                'token' => $token,
                'msg'   => 'Usuario bloqueado. comuniquese con Administracion tiene facturas pendientes de pago en su CTA CTE.'

            ]);

        if (!$user->persona->terminos)
            return $this->showResponse([
                'status' => 'error',
                'user'  => $user->id,
                'token' => $token,
                'msg'   => 'Debe aceptar los terminos para poder usar el sitio'

            ]);


        /***
         * Registramos el login en seguimiento
         */

        $seguimiento = new Seguimientos();
        $seguimiento->user_id = $user->id;
        $seguimiento->seccion = 'login';
        $seguimiento->accion = 'ingreso'; // ver como cambiar a reconeccion
        $seguimiento->atributo = 'ip';
        $seguimiento->atributo_valor = $request->getClientIp();
        $seguimiento->referido = $request->hasHeader('referer') ? $request->header('referer') : 'sin datos';
        $seguimiento->save();

        /*
        return $this->showResponse([
            'status' => $status,
            'user'  => $user->id,
            'token' => $token,
            'msg'   => 'Logueado exitosamente'
        ]);*/

        return '{"token":{"access_token":"' . implode('', $token) . '"}}';
    }

    public function checktoken(Request $request)
    {


        $status = "error";
        $user = [];
        $token = $request->token;
        $user_token = FirebaseUserToken::token($token)->first();


        if ($user_token) {
            $user = $user_token->user;
            //obtengo datos de la persona logueada

            if (!$user->activado)
                return $this->showResponse([
                    'status' => 'error',
                    'user'  => $user->id,
                    'token' => $token,
                    'msg'   => 'Usuario bloqueado. Si no lo activo todavia, revise su email.'

                ]);

            if ($user->isMoroso())
                return $this->showResponse([
                    'status' => 'error',
                    'user'  => $user->id,
                    'token' => $token,
                    'msg'   => 'Usuario bloqueado. comuniquese con Administracion tiene facturas pendientes de pago en su CTA CTE.'

                ]);

            if (!$user->persona->terminos)
                return $this->showResponse([
                    'status' => 'error',
                    'user'  => $user->id,
                    'token' => $token,
                    'msg'   => 'Debe aceptar los terminos para poder usar el sitio'

                ]);

            try {
                $token = $user->createToken();
                $status = 'ok';
            } catch (\Error $e) {
                return $this->errorResponse('Error en la creación de token, revise si Passport se encuentra correctamente configurado.', 403);
            } catch (\Throwable $e) {
                return $this->errorResponse('Error en la creación de token, revise si Passport se encuentra correctamente configurado.', 403);
            }

            /***
             * Registramos el login en seguimiento
             */
            $seguimiento = new Seguimientos();
            $seguimiento->user_id = $user->id;
            $seguimiento->seccion = 'login';
            $seguimiento->accion = 'ingreso'; // ver como cambiar a reconeccion
            $seguimiento->atributo = 'ip';
            $seguimiento->atributo_valor = $request->getClientIp();
            $seguimiento->referido = $request->hasHeader('referer') ? $request->header('referer') : 'sin datos';
            $seguimiento->save();

            return $this->showResponse([
                'status' => $status,
                'user'  => $user->id,
                'token' => $token,
                'msg'   => 'todo ok'
            ]);
        } else {
            return $this->showResponse([
                'status' => 'error',
                'user'  => '',
                'token' => $token,
                'msg'   => 'no existe el usuario'
            ]);
        }
    }

    public function register(Request $request)
    {
        $rules = [
            'nombre' => 'required|min:4',
            'apellido' => 'required|min:4',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',

        ];
        $msg = [
            'nombre.required' => 'El nombre es obligatorio',
            'apellido.required' => 'El apellido es obligatorio',
            'nombre.min' => 'El nombre debe tener al menos 4 caracteres',
            'apellido.min' => 'El apellido debe tener al menos 4 caracteres',
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email no es un email valido',
            'email.unique' => 'El email ya se encuentra en uso',
            'password.required' => 'El password es obligatorio',
            'password.min' => 'El password debe tener al menos 8 caracteres',
            'telefono.numeric' => 'El telefono debe ser numerico',
            'telefono.min' => 'El telefono debe ser mayor a 7 digitos',
            'cuit.required' => 'El cuit es obligatorio',
            'cuit.min' => 'El cuit debe ser mayor a 7 digitos',
            'recibe_ofernews.boolean' => 'el dato debe ser bool',
            'terminos.boolean' => 'el dato debe ser bool'
        ];


        $this->validate($request, $rules, $msg);


        //creamos una persona con los datos del login
        $persona = Personas::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'mail' => $request->email,
            'tipo_persona_id' => 4,
            //agregado para mlv2
            'telefono' => $request->telefono,
            'phone' => $request->telefono,
            'cuit' => $request->cuit,
            'newsletter_mail' => $request->newsletter,
            'ofertas_mail' => $request->ofertas,
            'terminos' => $request->terminos,
            //'n_plataforma'=>$request->n_plataforma,
            'status_id' => 1
        ]);

        //Creamos el domicilio para la nueva persona
        $domicilio = Domicilios::create([
            'direccion' => $request->direccion,
            'id_persona' => $persona->id,
            'geolocalizacion_id' => $request->localidad['id']

        ]);

        //Creamos el usuario
        $user = User::create(array(
            'name' => $request->nombre . " " . $request->apellido,
            'email' => $request->email,
            'role' => 'usuario',
            'activado' => 1,
            'persona_id' => $persona->id,
            'password' => md5($request->password),
        ));


        $title = 'Usuario creado con éxito en MLRepuestos.com.ar';
        $content = 'Usuario creado con éxito en MLRepuestos.com.ar<br>' . PHP_EOL;
        $content .= 'El usuario ' . $user->name . ' fue creado con éxito con el mail ' . $user->email . PHP_EOL;


        /*  Mail::to($request->email)->send(new NewRegistration($title, $content));
        Mail::to(env('ADMIN_RECIPIENT'))->send(new NewRegistration($title, $content));*/

        return $this->showMessage('Usuario creado y activado. Le pedimos que ingrese con sus nuevas credenciales');
    }

    public function passRecovery(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
        $msg = [
            'email.required' => 'El email es obligatorio',
            'email.email' => 'El email no es un email valido',
            'password.required' => 'El password es obligatorio',
            'password.min' => 'El password debe tener al menos 8 caracteres',
        ];

        $this->validate($request, $rules, $msg);

        //Modificamos el usuario
        User::where('email', $request->email)->update(['password' => md5($request->password)]);

        $title = 'Recupero de Contraseña en MLRepuestos.com.ar';
        $content = 'Recupero de Contraseña en MLRepuestos.com.ar<br>' . PHP_EOL;
        $content .= 'La contraseña para el usuario ' . $request->email . ' fue modificadada por: ' . $request->password . PHP_EOL;

        /*Mail::to($request->email)->send(new PassRecovery($title, $content));
        Mail::to(env('ADMIN_RECIPIENT'))->send(new PassRecovery($title, $content));*/

        return $this->showMessage('Contraseña modificada con éxito. Le pedimos que ingrese con sus nuevas credenciales');
    }


    public function show(User $user)
    {
        $user = User::find($user->id);
        return $this->showMessage($user);
    }

    public function renovateToken(Request $request)
    {
        $id = '';
        $usr = $request->user;
        $tkn = $request->token;

        if ($user = User::where('email', $usr)->first()) {
            $id = $user->id;
            if ($token = FirebaseUserToken::where('user_id', $id)->first()) {
                $token->delete();
            }
        }

        if($id != '') {
            $fToken = new FirebaseUserToken();
            $fToken->token = $tkn;
            $fToken->user_id = $id;
            $fToken->save();

            return 'OK';

        }

        return 'NOK';
    }

    /*
    public function update($user_id, Request $request)
    {
        $user = \App\User::where('id', $user_id)->first();

        if ($request->new_email){
            $rules = [
                'new_email'=>'required|email|unique:users,email',
                'new_email_confirmation'=>'required',
                'password'=>'required',
            ];
            $msg=[
                'new_email.required'=>'El email es obligatorio',
                'new_email.email'=>'El email no es un email valido',
                'new_email.unique'=>'El email ya se encuentra en uso',
                'new_email_confirmation.required'=>'El email de confirmacion es obligatorio',
                'new_email_confirmation.email'=>'El email no es un email valido',
                'password.required'=>'La contraseña actual es obligatoria',
            ];

            $this->validate($request,$rules,$msg);

        } elseif ($request->new_password){
            $rules = [
                'password'=>'required',
                'new_password'=>'required|min:8',
            ];
            $msg=[
                'password.required'=>'La contraseña actual es obligatoria',
                'new_password.required'=>'La contraseña es obligatorio',
                'new_password.min'=>'La contraseña debe tener al menos 8 caracteres',
            ];

            $this->validate($request,$rules,$msg);

        }

        if ($request->new_password != null && $request->new_password_confirmation != null){
            if (Hash::check($request->password, $user->password)){
                if ($request->new_password == $request->new_password_confirmation) {
                    User::where('id', $user_id)
                        ->update([
                            'password'=>Hash::make($request->new_password),
                        ]);
                } else {
                    return $this->errorResponse('Las contraseñas no coinciden',422);
                }
            } else {
                return $this->errorResponse('La contraseña es incorrecta',422);
            }
        }

        if ($request->new_email != null && $request->new_email_confirmation != null){
            if (Hash::check($request->password, $user->password)){
                if ($request->new_email == $request->new_email_confirmation) {



                    $user->email=$request->new_email;
                    $user->save();

                    //Luego CAMBIAR PERSONA EMAIL
//                    $person = $user->persona;
//                    $person->mail=$request->new_email;
//                    $person->save();

                } else {
                    return $this->errorResponse('Los email no coinciden',422);
                }
            } else {
                return $this->errorResponse('La contraseña es incorrecta',422);exit

            }
        }

        return $this->showMessage('Usuario modificado con exito!');
    }
    */

    public function getPuntos()
    {
        return $this->showMessage(Auth::user()->total_puntos);
    }

    public function getClientes()
    {
        return $this->showAll(User::with('persona')->get());
    }

    public function changeStatus($cliente_id)
    {
        $user = User::with('persona')->where("persona_id", $cliente_id)->first();
        // dd($user->persona->status_id);
        $user->persona->status_id = 1;
        $user->persona->save();

        return $this->showMessage('¡Cliente habilitado exitosamente!');
    }

    public function editClient($id, $n_plataforma)
    {
        $user = User::with('persona')->where("persona_id", $id)->first();

        $user->persona->n_plataforma = $n_plataforma;
        $user->persona->save();

        //User::join('personas', 'users.persona_id', '=', 'personas.id')
        //  ->where('personas.id', '=', $id)
        //->update(['personas.n_plataforma' => $n_plataforma]);

        return $this->showMessage('¡Cliente modificado exitosamente!');
    }

    public function filterCLient(Request $request)
    {
        if ($request->id != null) {
            $users = User::select('*')
                ->join('personas', 'users.persona_id', '=', 'personas.id')
                ->where('personas.id', '=', $request->id)
                ->get();
        }

        if ($request->n_plataforma != null) {
            $users = User::select('*')
                ->join('personas', 'users.persona_id', '=', 'personas.id')
                ->where('personas.n_plataforma', '=', $request->n_plataforma)
                ->get();
        }

        if ($request->nombre != null) {
            $users = User::select('*')
                ->join('personas', 'users.persona_id', '=', 'personas.id')
                ->where('personas.nombre', 'like', $request->nombre . '%')
                ->orWhere('personas.apellido', 'like', $request->nombre . '%')
                ->get();
        }

        if ($request->email != null) {
            $users = User::select('*')
                ->join('personas', 'users.persona_id', '=', 'personas.id')
                ->where('users.email', 'like', $request->email . '%')
                ->get();
        }

        if ($request->status_id != null) {
            $users = User::select('*')
                ->join('personas', 'users.persona_id', '=', 'personas.id')
                ->where('personas.status_id', '=', $request->status_id)
                ->get();
        }

        if (!$users) {
            $users = $this->showAll(User::all()->load([
                'persona',
            ]));
        }

        return $this->showAll($users);
    }
}
