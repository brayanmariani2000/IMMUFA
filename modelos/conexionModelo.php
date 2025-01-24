<?php
class conexionModelo{

  /*----establecer conexion a la base de datos ---*/
  protected static function conectar(){
    $idb= new PDO("mysql:host=localhost;dbname=inmufa_5","root","");
    $idb->exec("SET CHARACTER SET utf8");
    return $idb;
  }
  /*----ejecutar consultas simples---*/
  protected static function ejecutar_consulta_simple($consulta){
    $sql=self::conectar()->prepare($consulta);
    $sql->execute();
    return $sql;


  }
  protected static function limpiar_texto($texto){
    $texto=trim($texto);
    $texto=stripcslashes($texto);
    $texto=str_ireplace("<script>" , "" , $texto);
    $texto=str_ireplace("</script>" , "" , $texto);
    $texto=str_ireplace("<script src>" , "" , $texto);
    $texto=str_ireplace("<script type=>" , "" , $texto);
    $texto=str_ireplace("SELECT * FROM" , "" , $texto);
    $texto=str_ireplace("INSERT INTO" , "" , $texto);
    $texto=str_ireplace("DELETE FROM" , "" , $texto);
    $texto=str_ireplace("DROP TABLE" , "" , $texto);
    $texto=str_ireplace("DROP DATABASE" , "" , $texto);
    $texto=str_ireplace("TRUNCATE TABLE" , "" , $texto);
    $texto=str_ireplace("SHOW TABLES" , "" , $texto);
    $texto=str_ireplace("SHOW DATABASES" , "" , $texto);
    $texto=str_ireplace("<?php" , "" , $texto);
    $texto=str_ireplace("<?" , "" , $texto);
    $texto=str_ireplace("--" , "" , $texto);
    $texto=str_ireplace(">" , "" , $texto);
    $texto=str_ireplace("<" , "" , $texto);
    $texto=str_ireplace("[" , "" , $texto);
    $texto=str_ireplace("]" , "" , $texto);
    $texto=str_ireplace("^" , "" , $texto);
    $texto=str_ireplace("==" , "" , $texto);
    $texto=str_ireplace(";" , "" , $texto);
    $texto=str_ireplace("::" , "" , $texto);
    $texto=stripcslashes($texto);
    $texto=trim($texto);
    $texto=strtoupper($texto);
    return $texto;

      
     



  }
  protected static function paginador(){
    echo'<div class="dataTables_paginate paging_simple_numbers" id="example23_paginate">
    <span>

    <a class="paginate_button previous disabled" aria-controls="example23" data-dt-idx="0" tabindex="0" id="example23_previous"></a>;
    <a class="paginate_button previous" aria-controls="example23" data-dt-idx="0" tabindex="0" id="example23_previous" href="'.$url.($pagina-1).'">Anterior</a>
    <a class="paginate_button current" aria-controls="example23" data-dt-idx="1" tabindex="0" href="'.$url.$i.'">'.$i.'</a>;
    <a class="paginate_button" aria-controls="example23" data-dt-idx="1" tabindex="0" href="'.$url.$i.'">'.$i.'</a>;
    <a class="paginate_button previous disabled" aria-controls="example23" data-dt-idx="0" tabindex="0" id="example23_previous" href="'.$url.($pagina+1).'"></a>;
    <a class="paginate_button previous" aria-controls="example23" data-dt-idx="0" tabindex="0" id="example23_previous" href="'.$url.($pagina+1).'">Siguiente</a>;
 </span>
</div>';
  }
}