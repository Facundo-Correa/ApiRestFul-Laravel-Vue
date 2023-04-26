<?php

namespace App\Http\Controllers;

use App\Comprobantes;
use App\Mail\ComprobanteMail;
use App\Mail\ComprobanteMailable;
use App\Personas;
use App\User;
use DateTime;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class DownloadController extends Controller
{
    public function download($id)
    {
        // || Get href by id
        $comp = Comprobantes::where('id', $id)->get()->first();
        $href = $comp->Href;

        //$href = 'comprobante_111_1644953496.jpg';
        
        $file = public_path() . '/' . $href;

        $headers = array(
            'Content-Type: application/' . mime_content_type($file)
        );

        return Response::download($file, basename($file), $headers);
    }

}
