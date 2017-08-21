<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class ComprobantesController extends Controller
{
    public function listado_comprobantes($user_ruc){
      $comprobantes = DB::select('select * from dt_cabsdoc where cl_ruc=\'' . $user_ruc . '\' order by ca_fecha desc');
      return View::make('listado_comprobantes')->with('comprobantes', $comprobantes);
    }

    public static function tipo_comprobante($ti_codigo){
      $tipo_comprobante = DB::select('select ti_nombre from tip_comp where ti_codigo='. $ti_codigo);
      echo(utf8_encode($tipo_comprobante[0]->ti_nombre));
    }

    public function obtener_xml($id_comprobante) {
        $xml_data = DB::select('select xm_autorizado from dt_cabsdoc where id_cab=\''.$id_comprobante.'\'');
        $string_xml = $xml_data[0]->xm_autorizado;
        $xml_name = strftime($id_comprobante.'-%Y/%m/%d.xml');
        header('Content-type: text/xml');
        header('Content-Disposition: attachment; filename="'.$xml_name.'"');
        echo $string_xml;
    }

    public function obtener_pdf($id_comprobante) {
        $pdf_data = DB::select('select xm_pdf from dt_cabsdoc where id_cab=\''.$id_comprobante.'\'');
        $string_pdf = $pdf_data[0]->xm_pdf;
        $pdf_name = strftime($id_comprobante.'-%Y/%m/%d.pdf');
        header('Content-type: application/pdf');
        header('Content-Disposition: attachment; filename="'.$pdf_name.'"');
        echo $string_pdf;
    }

}