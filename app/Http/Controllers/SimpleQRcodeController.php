<?php

namespace App\Http\Controllers;

use DB;

use SimpleSoftwareIO\QrCode\Facades\QrCode;


class SimpleQRcodeController extends Controller
{
    public function generate($id)
    {
        $url = DB::table('ressources')
            ->where('id', '=', $id)
            ->value('url');
        $qrcode = QrCode::size((90))->generate($url);
        return view("simple-qrcode", compact('qrcode', 'url'));
    }
}
