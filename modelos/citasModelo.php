<?php
require_once 'conexionModelo.php';

class citaModelo extends conexionModelo{
protected static function contar_cita_modelo(){
    $sql=conexionModelo::ejecutar_consulta_simple("SELECT * FROM cita ");
    $sql->execute();
    return $sql;
}

protected static function mostrar_cita_modelo($inicio , $registrosPorPagina){
    $sql = conexionModelo::ejecutar_consulta_simple(
        "SELECT * FROM `cita` 
        INNER JOIN persona ON cita.persona_id=persona.id_persona
        INNER JOIN discapacidad ON persona.id_discapacidad=discapacidad.id_discapacidad
        INNER JOIN parroquia ON persona.id_parroquia=parroquia.id_parroquia
        INNER JOIN municipios ON parroquia.id_municipios=municipios.id_municipio
        INNER JOIN estados ON municipios.id_estado=estados.id_estado
        INNER JOIN etnia ON persona.id_etnia=etnia.id_etnia
        INNER JOIN dependencias ON cita.dependencia_id=dependencias.id_dependencia
        INNER JOIN consulta ON cita.id_consulta=consulta.id_consulta
        INNER JOIN especialidad ON consulta.id_especialidad=especialidad.id_especialidad
        INNER JOIN condicion ON cita.condicion_id=condicion.id_condicion
        WHERE cita.condicion_id = 1
        LIMIT $inicio, $registrosPorPagina"
    );
    $sql->execute();
    return $sql;
}

protected static function contar_citas_modelo_espera(){
    $sql = conexionModelo::ejecutar_consulta_simple(
        "SELECT COUNT(*) as total FROM `cita` 
        WHERE condicion_id = 1"
    );
    $sql->execute();
    return $sql->fetch()['total'];
}
protected static function mostrar_cita_modelo_atendidas($inicio , $registrosPorPagina){
    $sql = conexionModelo::ejecutar_consulta_simple(
        "SELECT * FROM persona INNER JOIN cita,condicion,consulta,dependencias,especialidad
        WHERE persona.id_persona=cita.persona_id
       AND cita.condicion_id=condicion.id_condicion
       AND cita.condicion_id=3
       AND cita.id_consulta=consulta.id_consulta
       AND cita.dependencia_id=dependencias.id_dependencia
       AND consulta.id_especialidad=especialidad.id_especialidad
        LIMIT $inicio, $registrosPorPagina"
    );
    $sql->execute();
    return $sql;
}

protected static function contar_citas_modelo_atendidas(){
    $sql = conexionModelo::ejecutar_consulta_simple(
        "SELECT COUNT(*) as total FROM `cita` 
        WHERE condicion_id = 3"
    );
    $sql->execute();
    return $sql->fetch()['total'];
}

  protected static function mostrar_cita_modelo_x_persona($id_cita){
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM `cita` INNER JOIN consulta,persona,condicion,especialidad WHERE 
    id_cita='$id_cita' AND 
    cita.persona_id=persona.id_persona AND
    cita.id_consulta=consulta.id_consulta AND 
    cita.condicion_id=condicion.id_condicion AND 
    consulta.id_especialidad=especialidad.id_especialidad;");
    $sql->execute();
    return $sql;
  }
  protected static function historia_cita_modelo($inicio, $registrosPorPagina) {
    $conexion = conexionModelo::conectar();
    
    // Consulta principal con LIMIT para paginación
    $sql = $conexion->prepare("SELECT 
        p.nombre AS Nombre_Paciente,
        p.apellido AS Apellido_Paciente,
        p.cedula AS Cedula_Paciente,
        e.especialidad AS Especialidad,
        m.nombre AS Nombre_Medico,
        m.apellido AS Apellido_Medico,
        c.fecha_consulta AS Fecha_Atencion,
        ci.fecha_registro AS Fecha_Registro,
        up.nombre AS Nombre_Registrador,
        up.apellido AS Apellido_Registrador
    FROM 
        cita ci
    JOIN 
        persona p ON ci.persona_id = p.id_persona
    JOIN 
        consulta c ON ci.id_consulta = c.id_consulta
    JOIN 
        especialidad e ON c.id_especialidad = e.id_especialidad
    JOIN 
        medico me ON c.id_medico = me.id_medico
    JOIN 
        persona m ON me.id_persona = m.id_persona
    JOIN 
        usuario u ON ci.id_usuario = u.id_usuario
    JOIN 
        persona up ON u.persona_id = up.id_persona
    ORDER BY ci.fecha_registro DESC
    LIMIT :inicio, :registrosPorPagina");
    
    $sql->bindValue(':inicio', (int)$inicio, PDO::PARAM_INT);
    $sql->bindValue(':registrosPorPagina', (int)$registrosPorPagina, PDO::PARAM_INT);
    $sql->execute();
    
    return $sql;
}

// Método para contar el total de registros
protected static function contar_citas_modelo() {
    $sql = conexionModelo::conectar()->prepare("SELECT COUNT(*) as total FROM cita");
    $sql->execute();
    return $sql->fetch()['total'];
}

protected static function citas_dias_modelos($especialidad,$especialista,$fecha_consulta){

    $sql=conexionModelo::conectar()->prepare("SELECT COUNT(*) AS total_citas
    FROM consulta 
    WHERE id_especialidad = $especialidad
    AND id_medico = $especialista
    AND fecha_consulta = '$fecha_consulta'
");
$sql->execute();
return $sql;

}
protected static function citasEspecialidadModelos($especialidad, $fecha_Actual, $inicio, $registrosPorPagina) {
    $sql = conexionModelo::conectar()->prepare("SELECT 
        cita.id_cita,
        persona.fecha_nacimiento,
        persona.id_persona,
        CONCAT(persona.nombre, ' ', persona.apellido) AS paciente,
        persona.cedula,
        persona.telefono,
        especialidad.especialidad,
        consulta.fecha_consulta,
        consulta.hora_consulta,
        medico.id_medico,
        dependencias.dependencia,
        condicion.condicion,
        condicion.id_condicion
    FROM 
        cita
    JOIN 
        persona ON cita.persona_id = persona.id_persona
    JOIN 
        consulta ON cita.id_consulta = consulta.id_consulta
    JOIN 
        especialidad ON consulta.id_especialidad = especialidad.id_especialidad
    JOIN 
        medico ON consulta.id_medico = medico.id_medico
    JOIN 
        dependencias ON cita.dependencia_id = dependencias.id_dependencia
    JOIN 
        condicion ON cita.condicion_id = condicion.id_condicion
    WHERE 
        consulta.id_especialidad = :especialidad 
        AND consulta.fecha_consulta = :fecha_actual
    LIMIT :inicio, :registrosPorPagina");
    
    $sql->bindParam(':especialidad', $especialidad, PDO::PARAM_INT);
    $sql->bindParam(':fecha_actual', $fecha_Actual, PDO::PARAM_STR);
    $sql->bindParam(':inicio', $inicio, PDO::PARAM_INT);
    $sql->bindParam(':registrosPorPagina', $registrosPorPagina, PDO::PARAM_INT);
    
    $sql->execute();
    return $sql;
}

// Método para contar el total de registros
protected static function contarCitasEspecialidad($especialidad, $fecha_Actual) {
    $sql = conexionModelo::conectar()->prepare("SELECT COUNT(*) as total 
        FROM cita
        JOIN consulta ON cita.id_consulta = consulta.id_consulta
        WHERE consulta.id_especialidad = :especialidad 
        AND consulta.fecha_consulta = :fecha_actual");
    
    $sql->bindParam(':especialidad', $especialidad, PDO::PARAM_INT);
    $sql->bindParam(':fecha_actual', $fecha_Actual, PDO::PARAM_STR);
    $sql->execute();
    return $sql->fetch(PDO::FETCH_ASSOC)['total'];
}

        protected static function citas_actualizar_Modelo($nuevo_estado,$id_cita){

            $sql=conexionModelo::conectar()->prepare("UPDATE cita 
                SET condicion_id = $nuevo_estado 
                WHERE id_cita = $id_cita 
            ");
        $sql->execute();
        return $sql;
        
        }

        public static function contar_pacientes_modelo() {
            $sql = conexionModelo::conectar()->prepare("SELECT COUNT(*) AS total FROM persona");
            $sql->execute();
            return $sql->fetch(PDO::FETCH_ASSOC);
        }
        public static function registrar_nueva_cita_modelo($datos) {
            $sql = conexionModelo::conectar()->prepare(
                "INSERT INTO cita (persona_id, id_consulta, fecha_consulta, id_condicion, usuario_id) 
                 VALUES (:persona_id, :consulta_id, :fecha_consulta, :condicion, :usuario_id)"
            );
            
            $sql->bindParam(":persona_id", $datos['persona_id'], PDO::PARAM_INT);
            $sql->bindParam(":consulta_id", $datos['consulta_id'], PDO::PARAM_INT);
            $sql->bindParam(":fecha_consulta", $datos['fecha_consulta'], PDO::PARAM_STR);
            $sql->bindParam(":condicion", $datos['condicion'], PDO::PARAM_INT);
            $sql->bindParam(":usuario_id", $datos['usuario_id'], PDO::PARAM_INT);
            
            if($sql->execute()) {
                return true;
            } else {
                return false;
            }
        }
        
        // Método para verificar disponibilidad de cita
        public static function verificar_disponibilidad_modelo($especialista_id, $fecha) {
            $sql = conexionModelo::conectar()->prepare(
                "SELECT COUNT(*) as total FROM cita 
                 INNER JOIN consulta ON cita.id_consulta = consulta.id_consulta
                 WHERE consulta.id_especialista = :especialista_id 
                 AND cita.fecha_consulta = :fecha"
            );
            
            $sql->bindParam(":especialista_id", $especialista_id, PDO::PARAM_INT);
            $sql->bindParam(":fecha", $fecha, PDO::PARAM_STR);
            $sql->execute();
            
            return $sql->fetch(PDO::FETCH_ASSOC)['total'];
        }
        protected static function mostrar_cita_modelo_perdidos($inicio , $registrosPorPagina){
            $sql = conexionModelo::ejecutar_consulta_simple(
                "SELECT * FROM `cita` 
                INNER JOIN persona ON cita.persona_id=persona.id_persona
                INNER JOIN discapacidad ON persona.id_discapacidad=discapacidad.id_discapacidad
                INNER JOIN parroquia ON persona.id_parroquia=parroquia.id_parroquia
                INNER JOIN municipios ON parroquia.id_municipios=municipios.id_municipio
                INNER JOIN estados ON municipios.id_estado=estados.id_estado
                INNER JOIN etnia ON persona.id_etnia=etnia.id_etnia
                INNER JOIN dependencias ON cita.dependencia_id=dependencias.id_dependencia
                INNER JOIN consulta ON cita.id_consulta=consulta.id_consulta
                INNER JOIN especialidad ON consulta.id_especialidad=especialidad.id_especialidad
                INNER JOIN condicion ON cita.condicion_id=condicion.id_condicion
                WHERE cita.condicion_id = 4
                LIMIT $inicio, $registrosPorPagina"
            );
            $sql->execute();
            return $sql;
        }
        
        protected static function contar_citas_modelo_perdidos(){
            $sql = conexionModelo::ejecutar_consulta_simple(
                "SELECT COUNT(*) as total FROM `cita` 
                WHERE condicion_id = 4"
            );
            $sql->execute();
            return $sql->fetch()['total'];
        }
        
}    