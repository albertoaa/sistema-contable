<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Listado de comprobantes</title>


    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="{!! asset('css/listado_comprobantes.css') !!}">


</head>

<body>
 <?php
    use \App\Http\Controllers\ComprobantesController;
 ?>
    <div class="container-fluid">
        <h1 class="text-center">EMPRESA S.A.</h1>
        <h2 class="text-center">Logo Empresa</h2>
        <h3 class="text-center">Detalle de documentos electrónicos</h3>
        <table class="table table-responsive table-stripped table-hover" id="listado_comprobantes">
            <thead>
                <tr>
                    <th>DOCUMENTO</th>
                    <th>FECHA</th>
                    <th>SERIE-NUMERO</th>
                    <th>MONTO</th>
                    <th>CLAVE DE ACCESO</th>
                    <th>AUTORIZACION</th>
                    <th>XML</th>
                    <th>PDF</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comprobantes as $comprobante)
                    <tr>
                        <td>{{ ComprobantesController::tipo_comprobante($comprobante->TI_CODIGO)  }}</td>
                        <td>{{ date('Y/m/d', strtotime($comprobante->CA_FECHA)) }}</td>
                        <td>{{ $comprobante->CA_SERIE . '-' . $comprobante->CA_NUMERO }}</td>
                        <td>{{ $comprobante->CA_MONTO }}</td>
                        <td>{{ $comprobante->CA_COD_ACC }}</td>
                        <td>{{ $comprobante->CA_AUT_SRI }}</td>
                        <td class="text-center">
                            <a href="{{ url('obtener_xml/'.$comprobante->ID_CAB) }}">
                                <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                            </a>
                        </td>
                        <td class="text-center">
                            @if (strlen($comprobante->XM_PDF)>1)
                                <a href="{{ url('obtener_pdf/'.$comprobante->ID_CAB) }}">
                                    <span class="glyphicon glyphicon-download" aria-hidden="true"></span>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

 <script src='https://code.jquery.com/jquery-1.12.4.js'></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
 <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 <script src="{!! asset('js/listado_comprobantes_datatable.js') !!}"></script>
</body>
</html>
