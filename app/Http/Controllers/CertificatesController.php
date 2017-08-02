<?php

namespace App\Http\Controllers;

use App\Material;
use App\CertificatesProduct;

class CertificatesController extends Controller
{
    public function certificates()
    {
        return view('pages.certificates',['certificates'=> CertificatesProduct::all(),'material'=> Material::find(2)]);
    }
}
