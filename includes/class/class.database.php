<?php
namespace system;

class database
{
    public function connect_with_db(){
        $sqlhost="localhost";
        $sqluser="root";
        $sqlpass="";
        mysql_connect($sqlhost,$sqluser,$sqlpass) OR DIE( "Couldn't connect to MySQL server!");
    }
}
?>