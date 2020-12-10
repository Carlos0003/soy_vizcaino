
<?php
    require 'app.php';
    require 'bd.php';

    $departamento = $_POST['departamento'];
    if($departamento != null) {
        $munic = listaMunicipios($con, $departamento);
        $resultado = "<label>Municipio</label>
			<select name='municipio'  required>
            <option>Seleccione una Opción</option>";
        foreach ($munic as $mun) {
            $resultado = $resultado.'<option value='.$mun['id_municipio'].'>'.$mun['municipio'].'</option>';
        }
        echo $resultado."</select>";
    }else {
        $resultado = "<label>Municipio</label>
			<select name='municipio'  required>
            <option>Seleccione una Opción</option>";
        echo $resultado."</select>";
    }



?>
