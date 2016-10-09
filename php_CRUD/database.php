<?php

require_once('config.php');

class Database
{
    /*
    private static $dbName = 'crud_tutorial' ;
    private static $dbHost = 'localhost' ;
    private static $dbUsername = 'root';
    private static $dbUserPassword = 'root';
    */

    private static $cont  = null;
     
    public static function connect()
    {
       // One connection through whole application
       if ( null == self::$cont )
       {     
       // try
       // {
          self::$cont = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_DATABASE);
      //  }
       }
       return self::$cont;
    }
     
    public static function disconnect()
    {
        self::$cont = null;
    }
}
?>