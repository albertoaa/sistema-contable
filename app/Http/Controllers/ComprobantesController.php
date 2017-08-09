<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ComprobantesController extends Controller
{
    public function listado_comprobantes($user_ruc){
      $comprobantes = DB::select('select * from cabsdoc where cl_ruc=\'' . $user_ruc . '\' order by ca_fecha desc');
      return View::make('listado_comprobantes')->with('comprobantes', $comprobantes);
    }

    public static function tipo_comprobante($ti_codigo){
      $tipo_comprobante = DB::select('select ti_nombre from tip_comp where ti_codigo='. $ti_codigo);
      return $tipo_comprobante[0]->ti_nombre;
    }

    public function obtener_xml($id_comprobante) {
        $xml_data = DB::select('select xm_autorizado from xmlgenerados where id_cab=\''.$id_comprobante.'\'');
        $string_xml = $xml_data[0]->xm_autorizado;
        $xml_name = strftime($id_comprobante.'-%Y/%m/%d.xml');
        header('Content-type: text/xml');
        header('Content-Disposition: attachment; filename="'.$xml_name.'"');
        echo $string_xml;
    }
}