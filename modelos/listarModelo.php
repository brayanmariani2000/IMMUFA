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
protected static function pacientesPorEtniaModelo() {
    $sql = conexionModelo::conectar()->prepare("SELECT 
                e.id_etnia,
                e.etnias AS nombre_etnia,
                COUNT(p.id_persona) AS numero_pacientes
            FROM 
                etnia e
            LEFT JOIN 
                persona p ON e.id_etnia = p.id_etnia
            LEFT JOIN
                cita c ON p.id_persona = c.persona_id
            GROUP BY 
                e.id_etnia, e.etnias
            ORDER BY 
                numero_pacientes DESC");
    
    $sql->execute();
    return $sql;
}
protected static function pacientesPorDiscapacidadModelo() {
    $sql = conexionModelo::conectar()->prepare("SELECT 
                d.id_discapacidad,
                d.discapacidades AS tipo_discapacidad,
                COUNT(p.id_persona) AS numero_pacientes
            FROM 
                discapacidad d
            LEFT JOIN 
                persona p ON d.id_discapacidad = p.id_discapacidad
            LEFT JOIN
                cita c ON p.id_persona = c.persona_id
            GROUP BY 
                d.id_discapacidad, d.discapacidades
            ORDER BY 
                numero_pacientes DESC");
    
    $sql->execute();
    return $sql;
}
public static function citasdependeciasModelosFechas($fechaInicio = null, $fechaFin = null) {
    $sql = conexionModelo::conectar()->prepare("SELECT 
    d.id_dependencia,
    d.dependencia,
    COUNT(cita.id_cita) AS pacientes_atendidos
FROM 
    dependencias d
LEFT JOIN 
    cita ON d.id_dependencia = cita.dependencia_id
LEFT JOIN 
    consulta ON cita.id_consulta = consulta.id_consulta
LEFT JOIN 
    condicion ON cita.condicion_id = condicion.id_condicion
WHERE 
    condicion.condicion = 'ATENDIDA'
    AND consulta.fecha_consulta BETWEEN '$fechaInicio' AND '$fechaFin'  -- Rango de fechas (ajustable)
GROUP BY 
    d.id_dependencia, d.dependencia
ORDER BY 
    pacientes_atendidos DESC;");
    $sql->execute();
    return $sql;
}
public static function pacientesDiscapacidadModeloFechas($fechaInicio = null, $fechaFin = null) {
    $sql = conexionModelo::conectar()->prepare("SELECT 
                d.id_discapacidad,
                d.discapacidades AS tipo_discapacidad,
                COUNT(p.id_persona) AS pacientes_atendidos
            FROM 
                discapacidad d
            LEFT JOIN 
                persona p ON d.id_discapacidad = p.id_discapacidad
            LEFT JOIN
                cita c ON p.id_persona = c.persona_id
            LEFT JOIN
                condicion co ON c.condicion_id = co.id_condicion
            LEFT JOIN
                consulta con ON c.id_consulta = con.id_consulta
            WHERE 
                co.condicion = 'ATENDIDA'
                AND (:fechaInicio IS NULL OR con.fecha_consulta >= :fechaInicio)
                AND (:fechaFin IS NULL OR con.fecha_consulta <= :fechaFin)
            GROUP BY 
                d.id_discapacidad, d.discapacidades
            ORDER BY 
                pacientes_atendidos DESC");
    
    // Asignar valores a los parámetros
    $sql->bindValue(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
    $sql->bindValue(":fechaFin", $fechaFin, PDO::PARAM_STR);
    
    $sql->execute();
    return $sql;
}
public static function pacientesEtniaModeloFechas($fechaInicio = null, $fechaFin = null) {
    $sql = conexionModelo::conectar()->prepare("SELECT 
                e.id_etnia,
                e.etnias AS tipo_etnia,
                COUNT(p.id_persona) AS pacientes_atendidos
            FROM 
                etnia e
            LEFT JOIN 
                persona p ON e.id_etnia = p.id_etnia
            LEFT JOIN
                cita c ON p.id_persona = c.persona_id
            LEFT JOIN
                condicion co ON c.condicion_id = co.id_condicion
            LEFT JOIN
                consulta con ON c.id_consulta = con.id_consulta
            WHERE 
                co.condicion = 'ATENDIDA'
                AND (:fechaInicio IS NULL OR con.fecha_consulta >= :fechaInicio)
                AND (:fechaFin IS NULL OR con.fecha_consulta <= :fechaFin)
            GROUP BY 
                e.id_etnia, e.etnias
            ORDER BY 
                pacientes_atendidos DESC");
    
    // Asignar valores a los parámetros
    $sql->bindValue(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
    $sql->bindValue(":fechaFin", $fechaFin, PDO::PARAM_STR);
    
    $sql->execute();
    return $sql;
}
public static function pacientesEdadModeloFechas($fechaInicio = null, $fechaFin = null) {
    $sql = conexionModelo::conectar()->prepare("SELECT 
                CASE
                    WHEN TIMESTAMPDIFF(YEAR, p.fecha_nacimiento, CURDATE()) BETWEEN 0 AND 12 THEN '0-12 años'
                    WHEN TIMESTAMPDIFF(YEAR, p.fecha_nacimiento, CURDATE()) BETWEEN 13 AND 18 THEN '13-18 años'
                    WHEN TIMESTAMPDIFF(YEAR, p.fecha_nacimiento, CURDATE()) BETWEEN 19 AND 30 THEN '19-30 años'
                    WHEN TIMESTAMPDIFF(YEAR, p.fecha_nacimiento, CURDATE()) BETWEEN 31 AND 50 THEN '31-50 años'
                    WHEN TIMESTAMPDIFF(YEAR, p.fecha_nacimiento, CURDATE()) BETWEEN 51 AND 65 THEN '51-65 años'
                    ELSE '65+ años'
                END AS grupo_edad,
                COUNT(p.id_persona) AS pacientes_atendidos
            FROM 
                persona p
            JOIN
                cita c ON p.id_persona = c.persona_id
            JOIN
                condicion co ON c.condicion_id = co.id_condicion
            JOIN
                consulta con ON c.id_consulta = con.id_consulta
            WHERE 
                co.condicion = 'ATENDIDA'
                AND (:fechaInicio IS NULL OR con.fecha_consulta >= :fechaInicio)
                AND (:fechaFin IS NULL OR con.fecha_consulta <= :fechaFin)
            GROUP BY 
                grupo_edad
            ORDER BY
                CASE grupo_edad
                    WHEN '0-12 años' THEN 1
                    WHEN '13-18 años' THEN 2
                    WHEN '19-30 años' THEN 3
                    WHEN '31-50 años' THEN 4
                    WHEN '51-65 años' THEN 5
                    ELSE 6
                END");
    
    // Asignar valores a los parámetros
    $sql->bindValue(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
    $sql->bindValue(":fechaFin", $fechaFin, PDO::PARAM_STR);
    
    $sql->execute();
    return $sql;
}
public static function pacientesEspecialidadModeloFechas($fechaInicio = null, $fechaFin = null) {
    $sql = conexionModelo::conectar()->prepare("SELECT 
                e.id_especialidad,
                e.especialidad AS nombre_especialidad,
                COUNT(cita.id_cita) AS pacientes_atendidos
            FROM 
                especialidad e
            LEFT JOIN 
                consulta con ON e.id_especialidad = con.id_especialidad
            LEFT JOIN
                cita ON con.id_consulta = cita.id_consulta
            LEFT JOIN
                condicion co ON cita.condicion_id = co.id_condicion
            WHERE 
                co.condicion = 'ATENDIDA'
                AND (:fechaInicio IS NULL OR con.fecha_consulta >= :fechaInicio)
                AND (:fechaFin IS NULL OR con.fecha_consulta <= :fechaFin)
            GROUP BY 
                e.id_especialidad, e.especialidad
            ORDER BY 
                pacientes_atendidos DESC");
    
    // Asignar valores a los parámetros
    $sql->bindValue(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
    $sql->bindValue(":fechaFin", $fechaFin, PDO::PARAM_STR);
    
    $sql->execute();
    return $sql;
}
public static function pacientesMunicipioModeloFechas($fechaInicio = null, $fechaFin = null) {
    $sql = conexionModelo::conectar()->prepare("SELECT 
                m.id_municipio,
                m.municipio AS nombre_municipio,
                COUNT(p.id_persona) AS pacientes_atendidos
            FROM 
                municipios m
            LEFT JOIN 
                parroquia pr ON m.id_municipio = pr.id_municipios
            LEFT JOIN
                persona p ON pr.id_parroquia = p.id_parroquia
            LEFT JOIN
                cita c ON p.id_persona = c.persona_id
            LEFT JOIN
                condicion co ON c.condicion_id = co.id_condicion
            LEFT JOIN
                consulta con ON c.id_consulta = con.id_consulta
            WHERE 
                co.condicion = 'ATENDIDA'
                AND (:fechaInicio IS NULL OR con.fecha_consulta >= :fechaInicio)
                AND (:fechaFin IS NULL OR con.fecha_consulta <= :fechaFin)
            GROUP BY 
                m.id_municipio, m.municipio
            ORDER BY 
                pacientes_atendidos DESC");
    
    // Asignar valores a los parámetros
    $sql->bindValue(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
    $sql->bindValue(":fechaFin", $fechaFin, PDO::PARAM_STR);
    
    $sql->execute();
    return $sql;
}
public static function pacientesParroquiaModeloFechas($fechaInicio = null, $fechaFin = null) {
    $sql = conexionModelo::conectar()->prepare("SELECT 
                pr.id_parroquia,
                pr.parroquias AS nombre_parroquia,
                m.municipio AS nombre_municipio,
                COUNT(p.id_persona) AS pacientes_atendidos
            FROM 
                parroquia pr
            JOIN
                municipios m ON pr.id_municipios = m.id_municipio
            LEFT JOIN
                persona p ON pr.id_parroquia = p.id_parroquia
            LEFT JOIN
                cita c ON p.id_persona = c.persona_id
            LEFT JOIN
                condicion co ON c.condicion_id = co.id_condicion
            LEFT JOIN
                consulta con ON c.id_consulta = con.id_consulta
            WHERE 
                co.condicion = 'ATENDIDA'
                AND (:fechaInicio IS NULL OR con.fecha_consulta >= :fechaInicio)
                AND (:fechaFin IS NULL OR con.fecha_consulta <= :fechaFin)
            GROUP BY 
                pr.id_parroquia, pr.parroquias, m.municipio
            ORDER BY 
                m.municipio, pacientes_atendidos DESC");
    
    // Asignar valores a los parámetros
    $sql->bindValue(":fechaInicio", $fechaInicio, PDO::PARAM_STR);
    $sql->bindValue(":fechaFin", $fechaFin, PDO::PARAM_STR);
    
    $sql->execute();
    return $sql;
}
public static function pacientesPorParroquiaModelo($id_municipio) {
    $sql = conexionModelo::conectar()->prepare("SELECT 
                pr.id_parroquia,
                pr.parroquias AS nombre_parroquia,
                COUNT(p.id_persona) AS numero_pacientes
            FROM 
                parroquia pr
            LEFT JOIN 
                persona p ON pr.id_parroquia = p.id_parroquia
            LEFT JOIN
                cita c ON p.id_persona = c.persona_id
            LEFT JOIN
                condicion co ON c.condicion_id = co.id_condicion
            LEFT JOIN
                consulta con ON c.id_consulta = con.id_consulta
            WHERE 
                co.condicion = 'ATENDIDA'
                AND pr.id_municipios = :id_municipio
            GROUP BY 
                pr.id_parroquia, pr.parroquias
            ORDER BY 
                numero_pacientes DESC");
    
    $sql->bindParam(":id_municipio", $id_municipio, PDO::PARAM_INT);
    $sql->execute();
    return $sql;
}

}
