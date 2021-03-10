<?php
require_once 'cliente.entidad.php';
require_once 'cliente.model.php';

// Logica
$alm = new Cliente();
$model = new ClienteModel();

if(isset($_REQUEST['action']))
{
	switch($_REQUEST['action'])
	{
		case 'actualizar':
			$alm->__SET('dni',              $_REQUEST['dni']);
			$alm->__SET('nombre',          $_REQUEST['nombre']);
			
			$alm->__SET('direccion',            $_REQUEST['direccion']);
			$alm->__SET('telefono', $_REQUEST['telefono']);
			

			$model->Actualizar($alm);
			header('Location: index.php');
			break;

		case 'registrar':
			$alm->__SET('dni',              $_REQUEST['dni']);
			$alm->__SET('nombre',          $_REQUEST['nombre']);
			
			$alm->__SET('direccion',            $_REQUEST['direccion']);
			$alm->__SET('telefono', $_REQUEST['telefono']);

			$model->Registrar($alm);
			header('Location: index.php');
			break;

		case 'eliminar':
			$model->Eliminar($_REQUEST['id']);
			header('Location: index.php');
			break;

		case 'editar':
			$alm = $model->Obtener($_REQUEST['id']);
			break;
	}
}

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
                
                <form action="?action=<?php echo $alm->dni > 0 ? 'actualizar' : 'registrar'; ?>" method="post" class="pure-form pure-form-stacked" style="margin-bottom:30px;">
                    <input type="hidden" name="dni" value="<?php echo $alm->__GET('dni'); ?>" />
                    
                    <table style="width:500px;">
						<tr>
                            <th style="text-align:left;">DNI</th>
                            <td><input type="text" name="dni" value="<?php echo $alm->__GET('dni'); ?>" style="width:100%;" /></td>
                        </tr>
					
                        <tr>
                            <th style="text-align:left;">Nombre</th>
                            <td><input type="text" name="nombre" value="<?php echo $alm->__GET('nombre'); ?>" style="width:100%;" /></td>
                        </tr>
                        
                        <tr>
                            <th style="text-align:left;">direccion</th>
                            <td>
                                <td><input type="text" name="direccion" value="<?php echo $alm->__GET('direccion'); ?>" style="width:100%;" /></td>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align:left;">telefono</th>
                            <td><input type="text" name="telefono" value="<?php echo $alm->__GET('telefono'); ?>" style="width:100%;" /></td>
                        </tr>
						
                           
                        <tr>
                            <td colspan="2">
                                <button type="submit" class="pure-button pure-button-primary">Guardar</button>
                            </td>
                        </tr>
                    </table>
                </form>

                <table class="pure-table pure-table-horizontal">
                    <thead>
                        <tr>
							<th style="text-align:left;">DNI</th>
                            <th style="text-align:left;">Nombre</th>
                            
                            <th style="text-align:left;">direccion</th>
                            <th style="text-align:left;">telefono</th>
							
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php foreach($model->Listar() as $r): ?>
                        <tr>
							<td><?php echo $r->__GET('dni'); ?></td>
                            <td><?php echo $r->__GET('nombre'); ?></td>
                            
                            <td><?php echo $r->__GET('direccion') ;?></td>
                            <td><?php echo $r->__GET('telefono'); ?></td>
							
                            <td>
                                <a href="?action=editar&id=<?php echo $r->__GET('dni'); ?>">Editar</a>
                            </td>
                            <td>
                                <a href="?action=eliminar&id=<?php echo $r->dni; ?>">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>                   
            </div>
        </div>
    </body>
</html>



