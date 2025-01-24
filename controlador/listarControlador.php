<?php if ($peticionesAjax) {
    require_once "../modelos/listarModelo.php";
}else {
    require_once "./modelos/listarModelo.php";
}
class listarControlador extends listarModelo{

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

                        <button type="button" class="btn btn-danger" value="<?php echo $row['id_medico']?>" id="eliminarMedico">Desabilitar</button></div>

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

                    <button type="submit" class="btn btn-danger"  value="<?php echo $row['id_usuario']?>" id="eliminarUsuario" ><i class="ti-close"></i>  Desabilitar</button>

                    </div>


                    </td>

                </tr>
                
                <?php
    
            }
        }
    }

}