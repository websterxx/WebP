<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use SimpleSoftwareIO\QrCode\Facades\QrCode;


class SimpleQRcodeController extends Controller
{
    // L'action "generate" de la route "simple-qrcode" (GET)

    public function generate()
    {
        //dd($request);
        // 2. On génère un QR code de taille 200 x 200 px
        //$qrcode = QrCode::size(200)->generate("Je suis un QR Code");
        //$qrcode = Qrcode::size(200)->generate("http://127.0.0.1:8000/createticket/?", [$id]);

        // 3. On envoie le QR code généré à la vue "simple-qrcode"
        return view("simple-qrcode", compact('qrcode'));
    }
}
