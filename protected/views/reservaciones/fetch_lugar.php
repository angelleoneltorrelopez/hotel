
<?php
if(isset($_POST['get_option']))
{
 $host = 'localhost';
 $user = 'root';
 $pass = 'melanie';
 mysql_connect($host, $user, $pass);
 mysql_select_db('dpi');

 $state = $_POST['get_option'];
 $find=mysql_query("select id_municipio,nombre_muni from municipio where departamento='$state'");
 while($row=mysql_fetch_array($find))
 {
  echo "<option value='".$row['id_municipio']."'>".$row['nombre_muni']."</option>";
  
 }
 exit;
}
?>