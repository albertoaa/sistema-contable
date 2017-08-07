<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ComprobantesController extends Controller
{
    public function listado_comprobantes($user_ruc){
      $comprobantes = DB::select('select * from cabsdoc where cl_ruc=\'' . $user_ruc . '\'');
      return View::make('listado_comprobantes')->with('comprobantes', $comprobantes);
    }

    public static function tipo_comprobante($ti_codigo){
      $tipo_comprobante = DB::select('select ti_nombre from tip_comp where ti_codigo='. $ti_codigo);
      return $tipo_comprobante[0]->ti_nombre;
    }
}
