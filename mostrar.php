<?php
require_once 'ventas.entidad.php';
require_once 'ventas.model.php';

// Logica
$alm = new Ventas();
$model = new VentaModel();



?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<title>PRACTICA CRUD 2DAW</title>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.5.0/pure-min.css">
	</head>
    <body style="padding:15px;">

        <div class="pure-g">
            <div class="pure-u-1-12">
                
               

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
                            <th style="text-align:left;">Albaran</th>
                            <th style="text-align:left;">Factura</th>
                            <th style="text-align:left;">Fecha</th>
                            <th style="text-align:left;">DNI</th>
							<th style="text-align:left;">Total</th>
							
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
                            <td><?php echo $r->__GET('albaran'); ?></td>
                            <td><?php echo $r->__GET('factura'); ?></td>
                            <td><?php echo $r->__GET('fecha') ;?></td>
                            <td><?php echo $r->__GET('dni'); ?></td>
							<td><?php echo $r->__GET('total'); ?></td>
							
                            
                        </tr>
                    <?php endforeach; ?>
                </table>                   
            </div>
        </div>
    </body>
</html>



