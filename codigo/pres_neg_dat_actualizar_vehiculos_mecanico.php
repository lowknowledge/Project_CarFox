<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizacion de vehiculos</title>
    <link rel="stylesheet" href="css/Style_formularios.css">
</head>
<body>
    <?php include('header_mecanico.php'); ?>
    <main>
    <?php
    class Vehiculos
    {
        public function actualizar($id_vehiculo)
        {
            include('conexion.php');
            $sql = "SELECT * FROM vehiculos where id_vehiculo='$id_vehiculo'";
	        if(!$result = $db->query($sql)):
		        die('Hay un error primera consulta!!! ['.$db->error.']');
            endif;

            while ($row=$result->fetch_assoc()):
                $id_vehiculo=stripslashes($row["id_vehiculo"]);
                $placa=stripslashes($row["placa"]);
                $marca=stripslashes($row["marca"]);
                $modelo=stripslashes($row["modelo"]);
                $tipo_de_vehiculo=stripslashes($row["tipo_de_vehiculo"]);
                $mecanico=stripslashes($row["mecanico"]);
                $doc_propietario=stripslashes($row["doc_propietario"]);
            endwhile;

            echo "<section class='container'>";
                echo "<article class='article__icon-triangle'> </article>";
                echo "<h2>VEHICULOS</h2>";
                echo "<article class='article__container-form'>";
                    echo "<form method='POST' action='neg_dat_actualizar_vehiculos_mecanico.php'>";
                    echo "<input type='hidden' name='id_vehiculo' value='$id_vehiculo'>";
                    echo "<label for='placa'>Placa del vehiculo</label>";
                    echo "<input type='text' id='placa' name='placa' placeholder='Ingresar placa del vehiculo' value='$placa' maxlength='6'>";
                    echo "<label for='marca' >Marca del vehiculo</label>";
                    echo "<input type='text' id='marca' name='marca' placeholder='Ingresar marca' value='$marca' maxlength='25'>";
                    echo "<label for='modelo'>Modelo del vehiculo</label>";
                    echo "<input type='text' id='modelo' name='modelo' placeholder='Ingresar modelo' value='$modelo' maxlength='35'>";
                    echo "<label for='tipo'>Tipo de vehiculo</label>";
                    echo "<input type='text' id='tipo' name='tipo' placeholder='Ingresar tipo de vehiculo' value='$tipo_de_vehiculo' maxlength='70'>";
                    echo "<label for='mecanico'>Mecanico</label>";
                    echo "<input type='number' id='mecanico' name='mecanico' placeholder='Ingresar doc mecanico' value='$mecanico' maxlength='10'>";
                    echo "<label for='doc_propietario'>Documento de propietario</label>";
                    echo "<input type='number' id='doc_propietario' name='doc_propietario' placeholder='Ingresar doc propietario' value='$doc_propietario' oninput='maxLengthCheck(this)' maxlength = '10'>";
                    echo "<input class='input__btn-color' type='submit'>";
                    echo "</form>";
                echo "</article>";
            echo "</section>";
        }
    }
    $nuevo=new Vehiculos();
    $nuevo -> actualizar($_POST["id_vehiculo"]);

        
    ?>
    </main>
</body>
</html>
<script src="js/maxLengthNumber.js"></script>