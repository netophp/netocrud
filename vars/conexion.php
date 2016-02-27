<?php

$serber="localhost";
$user1="root";
$pass1="";
$bd="amasw";




function conectar_bd()
{
        $result = mysql_pconnect('localhost', 'root', '');
	if (!$result)
		return false;
	if (!mysql_select_db('amasw'))
		return false;

	return $result;
} 

function Conectarse($serber,$user1,$pass1,$bd)
{
        if(!($link=mysql_connect($serber,$user1,$pass1)))
        {
                echo "Error conectado a la base de de datos.";
                exit();
        }
        if(!mysql_select_db($bd,$link))
        {
                echo "Error seleccionando la base de datos.";
                exit();
        }
        return $link;
}

?>
