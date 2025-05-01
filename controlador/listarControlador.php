<?php if ($peticionesAjax) {
    require_once "../modelos/listarModelo.php";
} else {
    require_once "./modelos/listarModelo.php";
}

class listarControlador extends listarModelo {
    public function listar_especialidades_card() {

        $sql=listarModelo::listar_especialidad();

          
    if($sql->rowCount()>0){
   
        $lista=$sql->fetchAll();
   
        foreach($lista as $row){
   
            echo ' 
                            <div class="col-md-3">
                                <form action="tablaEspecialidad" method="POST">
                                    <button type="submit" class="card bg-success p-20" style="width: 100%; border: none; cursor: pointer;">
                                        <div class="media widget-ten">
                                            <div class="media-left meida media-middle">
                                                <span><i class="ti-vector f-s-40"></i></span>
                                            </div>
                                            <div class="media-body media-text-right">
                                                <h2 class="color-white"></h2>
                                                <p class="m-b-0">'.$row['especialidad'].'</p>
                                            </div>
                                        </div>
                                    </button>
                                    <input type="hidden" name="id_especialidad" value="'.$row['id_especialidad'].'">
                                </form>
                            </div>
';

   
        }
   
    }

    }

public function listar_especialidad_controlador(){
   
    $sql=listarModelo::listar_especialidad();
   
    if($sql->rowCount()>0){
   
        $lista=$sql->fetchAll();
   
        foreach($lista as $row){
   
            echo '<option value="'.$row['id_especialidad'].'">'.$row['especialidad'].'</option>';

   
        }
   
    }

}


public function listar_etnias_controlador(){

    $sql=listarModelo::listar_etnias();

    if($sql->rowCount()>0){

        $lista=$sql->fetchAll();

        foreach($lista as $row){

            echo '<option value="'.$row['id_etnia'].'">'.$row['etnias'].'</option>';


        }

    }

}


public function listar_discapacidad_controlador(){

    $sql=listarModelo::listar_discapacidad();

    if($sql->rowCount()>0){

        $lista=$sql->fetchAll();

        foreach($lista as $row){

            echo '<option value="'.$row['id_discapacidad'].'">'.$row['discapacidades'].'</option>';


        }

    }

}



public function listar_municipio_controlador(){

    $sql=listarModelo::listar_municipio();

    if($sql->rowCount()>0){

        $lista=$sql->fetchAll();

        foreach($lista as $row){

            echo '<option value="'.$row['id_municipio'].'">'.$row['municipio'].'</option>';

        }

    }

}


public function listar_parroquia_controlador(){

    $sql=listarModelo::listar_parroquia();

    if($sql->rowCount()>0){

        $lista=$sql->fetchAll();

        $json=array();

        foreach($lista as $row){

            $json[]=array(

                'value'=>$row['id_parroquia'],

                'parroquias'=>$row['parroquias'],

                'municipio_id'=>$row['id_municipios']

            );

        }

    }

    $jason=json_encode($json);

    echo $jason;

}


public function listar_dependencias_controlador(){

    $sql=listarModelo::listar_dependencia();

    if($sql->rowCount()>0){

        $lista=$sql->fetchAll();

        foreach($lista as $row){

            echo '<option value="'.$row['id_dependencia'].'">'.$row['dependencia'].'</option>';

        }

    }

}


public function listar_medico_controlador(){

    $sql=listarModelo::listar_medico();

    if($sql->rowCount()>0){

        $lista=$sql->fetchAll();

        foreach($lista as $row){

            echo '<option value="'.$row['id'].'">'.$row['nombre'].' '.$row['apellido'].'</option>';

        }

    }

}


public function listar_roles(){

    $sql=listarModelo::listar_roles_modelo();

    if($sql->rowCount()>0){

        $lista=$sql->fetchAll();

        foreach($lista as $row){

            echo '<option value="'.$row['id_rol'].'">'.$row['roles'].'</option>';

        }

    }
}


public function listar_condicion(){

    $sql=listarModelo::listar_condicion_modelo();

    if($sql->rowCount()>0){

        $lista=$sql->fetchAll();

        foreach($lista as $row){

            echo '<option value="'.$row['id_condicion'].'">'.$row['condicion'].'</option>';

        }

    }
}

}







class tablaControlador extends listarModelo{

    public function tabla_medico_controlador(){

        $sql=listarModelo::listar_medico();

        if($sql->rowCount()>0){

            $lista=$sql->fetchAll();

            foreach($lista as $row){

                    ?><tr>

                        <td><?php echo $row['nombre'].' '.$row['apellido']?></td>

                        <td><?php echo $row['especialidad']?></td>

                        <td><div style=" display: flex;">

                        <div style="margin:4px ;">

                        <button type="button" class="btn btn-danger btn-sm" value="<?php echo $row['id_medico']?>" id="eliminarMedico"><i class="fas fa-trash-alt"></i> Deshabilitar
</button>

                        <button class="btn btn-info btn-sm" value="<?php echo $row['id_medico']?>"  id="verMedicoModal"><i class="fa fa-eye"></i>Ver</button>

                        <div style="margin:4px ;">


                        </td>

                    </tr><?php
                        

                    }
    
                }
   
            }

   
            public function tabla_usuario_controlador(){
   
                $sql=listarModelo::tabla_usuario();
   
                if($sql->rowCount()>0){
   
                    $lista=$sql->fetchAll();
   
                    foreach($lista as $row){
                ?>

                <tr>

   
                    <td><?php echo $row['nombre'].' '.$row['apellido']?></td>

                    <td><?php echo $row['usuario']?></td>

                    <td><?php echo $row['roles']?></td>

                    <td><div style=" display: flex;">

                    <div style="margin:4px ;">

                    <button type="button" class="btn btn-danger btn-sm" value="<?php echo $row['id_usuario']?>" id="eliminarUsuario"><i class="fas fa-trash-alt"></i> Deshabilitar
</button>

                        <button class="btn btn-info btn-sm" value="<?php echo $row['id_usuario']?>"  id="verUsuarioBtn"><i class="fa fa-eye"></i>Ver</button>
                    </div>


                    </td>

                </tr>
                
                <?php
    
            }
        }
    }

    public function listar_distribucion_paciente_json_controlador(){

        $sql=listarModelo::listar_distribucion_paciente_json_modelo();

        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    
        // Estructura de datos para Chart.js
        $datos = [
            'labels' => array_column($resultados, 'municipio'),
            'datasets' => [[
                'label' => 'Personas por Municipio',
                'data' => array_column($resultados, 'total_pacientes'),
                'backgroundColor' => [
                    '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40',
                    '#8AC249', '#EA5F89', '#00BFFF', '#FFD700', '#32CD32', '#DA70D6'
                ]
            ]]
        ];
        
        echo json_encode($datos);

    }

    public function listar_genero_paciente_json_controlador(){

        $sql=listarModelo::listar_genero_paciente_json_modelo();

        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    
        // Estructura de datos para Chart.js
        $datos = [
            'generos' => array_column($resultados, 'genero'),
            'cantidades' => array_column($resultados, 'cantidad'),
            'colores' => ['#FF6384', '#36A2EB'] // Rosa para mujeres, Azul para hombres
        ];
        
        echo json_encode($datos);

    }

    public function listar_edades_paciente_json_controlador(){

        $sql=listarModelo::listar_edades_paciente_json_modelo();

        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    
        // Estructura de datos para Chart.js
        $datos = [
            'labels' => array_column($resultados, 'rango_edad'),
            'data' => array_column($resultados, 'cantidad_pacientes')
        ];
        
        echo json_encode($datos);

    }
    public function listar_citas_cantidad_especialidad_json_controlador(){

        $sql=listarModelo::listar_citas_especialidad_json_modelo();

        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        $colores = [
            'GINECOLOGIA' => 'bg-pink',
            'MAMOGRAFIA' => 'bg-purple',
            'MEDICINA INTERNA' => 'bg-cyan',
            'CARDIOLOGIA' => 'bg-danger',
            'MASTOLOGIA' => 'bg-warning',
            // Agrega más especialidades según sea necesario
        ];
        
        $datos = [];
        foreach ($resultados as $fila) {
            $datos[] = [
                'especialidad' => $fila['especialidad'],
                'cantidad' => $fila['cantidad_citas'],
                'color' => $colores[$fila['especialidad']] ?? 'bg-primary'
            ];
        }
        
        echo json_encode($datos);

    }
    public function listar_citas_cantidad_dependencia_json_controlador(){

        $sql=listarModelo::listar_citas_dependencia_json_modelo();

        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        $colores = [
            'GOBERNACION' => 'bg-danger',
            'PSUV' => 'bg-primary',
            'COMUNIDAD' => 'bg-success',
            'ALIANZAS' => 'bg-warning',
            'SATIUSUM' => 'bg-info',
            // Agrega más dependencias según sea necesario
        ];
        
        $datos = [];
        foreach ($resultados as $fila) {
            $datos[] = [
                'dependencia' => $fila['Dependencia'],
                'cantidad' => $fila['Cantidad_Pacientes'],
                'color' => $colores[$fila['Dependencia']] ?? 'bg-secondary'
            ];
        }
        
        echo json_encode($datos);

    }
    public function listar_edades_paciente_tabla_controlador(){

        $sql=listarModelo::listar_edades_paciente_json_modelo();

        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    
        // Estructura de datos para Chart.js
        foreach($resultados as $row){
            ?>

            <tr>

                <td><?php echo $row['rango_edad']?></td>

                <td><?php echo $row['cantidad_pacientes']?></td>

            </tr>
            
            <?php

    }
}
public function listar_citas_cantidad_especialidad_tabla_controlador(){

    $sql=listarModelo::listar_citas_especialidad_json_modelo();

    $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        // Estructura de datos para Chart.js
        foreach($resultados as $row){
            ?>

            <tr>

                <td><?php echo $row['especialidad']?></td>

                <td><?php echo $row['cantidad_citas']?></td>

            </tr>
            
            <?php

    }
    }

    public function listar_citas_cantidad_dependecias_tabla_controlador(){

        $sql=listarModelo::citasdependeciasModelos();
    
        $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);
    
            // Estructura de datos para Chart.js
            foreach($resultados as $row){
                ?>
    
                <tr>
    
                    <td><?php echo $row['nombre_dependencia']?></td>
    
                    <td><?php echo $row['numero_pacientes']?></td>
    
                </tr>
                
                <?php
    
        }
        }
    
public function listar_citas_cantidad_dependecias_js_controlador_donus(){

    $sql=listarModelo::citasdependeciasModelos();

    $resultados = $sql->fetchAll(PDO::FETCH_ASSOC);

        // Procesar resultados
        $datos = [
            'labels' => array_column($resultados, 'nombre_dependencia'),
            'data' => array_column($resultados, 'numero_pacientes')
        ];
        echo json_encode($datos);
    }

}