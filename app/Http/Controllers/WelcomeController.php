<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{

  public function login (Request $request)
  {
    $users = DB::select('select * from clientes where cl_ruc=\'' . $request->username . '\'');
    $password_web = $request->password;
    $password_db = str_replace(' ', '', $users[0]->CL_CLAVE);
    if (strcmp($password_web, $password_db) !== 0) {
      return redirect()->back();
    } else {
      return redirect()->route('listado_comprobantes', ['user_ruc' => $users[0]->CL_RUC]);
    }
  }
}
