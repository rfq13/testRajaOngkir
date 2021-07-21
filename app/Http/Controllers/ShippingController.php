<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use \App\Models\Provinces;

class ShippingController extends Controller
{
    function rajaOngkir(Request $request)
    {

        $unit = "province";
        $rajaOngkir = request_raja_ongkir($unit,"GET","");
        if (is_array($rajaOngkir)) {
            foreach ($rajaOngkir as $province) Provinces::create((array) $province);
        }

        return 'provinces data from RajaOngkir inserted successfully';
    }
}