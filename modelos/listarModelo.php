<?php
require_once "conexionModelo.php";

class listarModelo extends conexionModelo {
    protected static function listar_pacientes_por_especialidad($id_especialidad) {
        $sql = conexionModelo::conectar()->prepare("SELECT * FROM paciente INNER JOIN cita ON paciente.id_persona = cita.persona_id WHERE cita.id_especialidad = :id_especialidad");
        $sql->bindParam(':id_especialidad', $id_especialidad);
        $sql->execute();
        return $sql;
    }


protected static function listar_etnias(){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM etnia WHERE id_etnia>0");
    
    $sql->execute();
    
    return $sql;
}
protected static function listar_discapacidad(){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM discapacidad WHERE id_discapacidad>0");
    
    $sql->execute();
    
    return $sql;
}
protected static function listar_especialidad(){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM especialidad");
    
    $sql->execute();
    
    return $sql;

}
protected static function listar_medico(){

    $sql=conexionModelo::conectar()->prepare("SELECT * FROM `medico` INNER JOIN especialidad,persona 
    
    WHERE medico.id_especialidad=especialidad.id_especialidad 
    
    AND persona.id_persona=medico.id_persona");
    
    $sql->execute();
    
    return $sql;
}
protected static function listar_municipio(){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM municipios");
    
    $sql->execute();
    
    return $sql;

}
protected static function listar_parroquia(){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM parroquia");
    
    $sql->execute();
    
    return $sql;
}
protected static function listar_dependencia(){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM dependencias");
    
    $sql->execute();
    
    return $sql;
}

protected static function listar_dias(){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM dias");
    
    $sql->execute();
    
    return $sql;
}
protected static function listar_turno(){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM turno");
    
    $sql->execute();
    
    return $sql;
}
protected static function tabla_usuario(){
    
    $sql=conexionModelo::conectar()->prepare("SELECT * FROM `usuario` INNER JOIN rol,persona WHERE usuario.persona_id=persona.id_persona AND usuario.rol=rol.id_rol");
    
    $sql->execute();
    
    return $sql;
}

protected static function especilidad_cant_paciente_modelo(){

    $sql=conexionModelo::conectar()->prepare("SELECT * FROM `consulta` INNER JOIN especialidad WHERE especialidad.id_especialidad=consulta.especialidad");
    
    $sql->execute();
    
    return $sql;

}

protected static function listar_roles_modelo(){

    $sql=conexionModelo::conectar()->prepare("SELECT * FROM  rol ");
    
    $sql->execute();
    
    return $sql;
}

protected static function listar_condicion_modelo(){

    $sql=conexionModelo::conectar()->prepare("SELECT * FROM  condicion ");
    
    $sql->execute();
    
    return $sql;
}

protected static function listar_distribucion_paciente_json_modelo(){

    $sql=conexionModelo::conectar()->prepare("SELECT 
    m.id_municipio,
    m.municipio,
    COUNT(p.id_persona) AS total_pacientes
FROM 
    municipios m
LEFT JOIN 
    parroquia pa ON m.id_municipio = pa.id_municipios
LEFT JOIN 
    persona p ON pa.id_parroquia = p.id_parroquia
GROUP BY 
    m.id_municipio, m.municipio
ORDER BY 
    total_pacientes DESC;");
    
    $sql->execute();
    
    return $sql;
}

protected static function listar_genero_paciente_json_modelo(){

    $sql=conexionModelo::conectar()->prepare("SELECT 
    CASE 
        WHEN sexo = 1 THEN 'Mujeres'
        WHEN sexo = 2 THEN 'Hombres'
        ELSE 'No especificado'
    END AS genero,
    COUNT(*) AS cantidad
FROM 
    persona
WHERE 
    sexo IN (1, 2)  -- Solo consideramos valores válidos (1 y 2)
GROUP BY 
    sexo;;");
    
    $sql->execute();
    
    return $sql;
}

protected static function listar_edades_paciente_json_modelo(){

    $sql=conexionModelo::conectar()->prepare("SELECT 
    CASE 
        WHEN TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 0 AND 1 THEN '0-1 año'
        WHEN TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 2 AND 5 THEN '2-5 años'
        WHEN TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 6 AND 12 THEN '6-12 años'
        WHEN TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 13 AND 19 THEN '13-19 años'
        WHEN TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 20 AND 34 THEN '20-34 años'
        WHEN TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) BETWEEN 35 AND 59 THEN '35-59 años'
        WHEN TIMESTAMPDIFF(YEAR, fecha_nacimiento, CURDATE()) >= 60 THEN '60+ años'
        ELSE 'Edad no especificada'
    END AS rango_edad,
    COUNT(*) AS cantidad_pacientes
FROM 
    persona
WHERE 
    fecha_nacimiento IS NOT NULL
GROUP BY 
    rango_edad
ORDER BY
    CASE rango_edad
        WHEN '0-1 año' THEN 1
        WHEN '2-5 años' THEN 2
        WHEN '6-12 años' THEN 3
        WHEN '13-19 años' THEN 4
        WHEN '20-34 años' THEN 5
        WHEN '35-59 años' THEN 6
        WHEN '60+ años' THEN 7
        ELSE 8
    END;");
    
    $sql->execute();
    
    return $sql;
}

protected static function listar_citas_especialidad_json_modelo(){

    $sql=conexionModelo::conectar()->prepare("SELECT 
    e.id_especialidad,
    e.especialidad,
    COUNT(c.id_cita) AS cantidad_citas
FROM 
    especialidad e
LEFT JOIN 
    consulta co ON e.id_especialidad = co.id_especialidad
LEFT JOIN 
    cita c ON co.id_consulta = c.id_consulta
GROUP BY 
    e.id_especialidad, e.especialidad
ORDER BY 
    cantidad_citas DESC;");
    
    $sql->execute();
    
    return $sql;
}
protected static function listar_citas_dependencia_json_modelo(){

    $sql=conexionModelo::conectar()->prepare("SELECT 
    d.dependencia AS Dependencia,
    COUNT(c.persona_id) AS Cantidad_Pacientes
FROM 
    dependencias d
LEFT JOIN 
    cita c ON d.id_dependencia = c.dependencia_id
GROUP BY 
    d.dependencia
ORDER BY 
    Cantidad_Pacientes DESC;");
    
    $sql->execute();
    
    return $sql;
}
protected static function citasdependeciasModelos(){

    $sql=conexionModelo::conectar()->prepare("SELECT 
                    d.id_dependencia,
                    d.dependencia AS nombre_dependencia,
                    COUNT(c.persona_id) AS numero_pacientes
                FROM 
                    dependencias d
                LEFT JOIN 
                    cita c ON d.id_dependencia = c.dependencia_id
                GROUP BY 
                    d.id_dependencia, d.dependencia
                ORDER BY 
                    numero_pacientes DESC;
    ");
    $sql->execute();
 return $sql;

}
protected static function pacientesPorMunicipioModelo() {
    $sql = conexionModelo::conectar()->prepare("SELECT 
                m.id_municipio,
                m.municipio AS nombre_municipio,
                COUNT(p.id_persona) AS numero_pacientes
            FROM 
                municipios m
            JOIN 
                parroquia pa ON m.id_municipio = pa.id_municipios
            LEFT JOIN 
                persona p ON pa.id_parroquia = p.id_parroquia
            LEFT JOIN
                cita c ON p.id_persona = c.persona_id
            GROUP BY 
                m.id_municipio, m.municipio
            ORDER BY 
                numero_pacientes DESC");
    
    $sql->execute();
    return $sql;
}

public static function listar_citas_diarias_especialidad_modelo($fecha) {
    $sql = conexionModelo::conectar()->prepare("SELECT 
            e.especialidad,
            COUNT(c.id_cita) AS cantidad_citas
        FROM 
            cita c
        JOIN 
            consulta co ON c.id_consulta = co.id_consulta
        JOIN 
            especialidad e ON co.id_especialidad = e.id_especialidad
        WHERE 
            DATE(co.fecha_consulta) = :fecha
            AND c.condicion_id = 1  -- Solo citas agendadas (opcional)
        GROUP BY 
            e.especialidad
        ORDER BY 
            cantidad_citas DESC
    ");
    
    $sql->bindParam(':fecha', $fecha);
    $sql->execute();
    
    return $sql;
}

}
