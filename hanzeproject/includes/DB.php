<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "mission-reisbureau");

/*
 * Een class wordt aangemaakt waarin verschillende functies m.b.t de database in kunnen worden aangeroepen
 */
class database
{    
    /*
     * Onderstaande variabelen worden opgevuld in login.php
     * Deze variabelen zijn echter alleen beschikbaar binnen deze class omdat ze private zijn
     */
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;
    
    private $dbh;
    private $error;
    
    private $stmt;
    
    /*
     * Een constructor waarbij $dsn alle gegevens van de server bevat
     * Ook wordt er een nieuwe PDO instantie aangemaakt
     */
    public function __construct() 
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT    => true,
            PDO::ATTR_ERRMODE       => PDO::ERRMODE_EXCEPTION
        );
        
        /*
         * Nieuwe PDO instantie aanmaken
         */
        try
        {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);            
        }
        
        /*
         * Opvangen van eventuele foutmeldingen
         */
        catch(PDOException $e)
        {
            $this->error = $e->getMessage();
            echo $e->getMessage();
            exit();
        }
    }
    
    /*
     * Functie om de meegeven SQL-Query te preparen
     */
    public function query($query)
    {
        /*
         * Prepared Statement maken
         */
        if($this->dbh != NULL)
        {
            $this->stmt = $this->dbh->prepare($query);
        }    
    }
    
    /*
     * Functie om bij een query, paramaters als variabele aan te maken.
     * Hierna kunnen deze gegevens worden verwerkt in de website
     */
    public function bind($param, $value, $type = null)
    {
        if (is_null($type))
        {
            switch (true) 
            {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                    case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                    default:
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }   
    /*
     * Deze functie voert een execute() uit op de query
     */
    public function execute()
    {
        /*
         * De query wordt uitgevoerd
         */
        return $this->stmt->execute();
    }    
    /*
     * Functie die hetzelfde als onderstaande functie uitvoert, maar zet dan een nieuwe key in de array
     */
    public function resultset()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }    
    /*
     * Functie die de uitkomst van de query geeft
     */
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }    
    /*
     * de query leeghalen
     */
    public function reset()
    {
        $this->stmt = NULL;
    }
}

/*********************************************************************************************************
 *                                                                                                       *           
 *      //Include het bestand DB.php, waarin de class database staat met alle benodigde functies         *
 *      include 'DB.php';                                                                                *
 *                                                                                                       *
 *      //nieuwe instantie van class database gedefinieerd in $db.                                       *
 *      //Oproepen van functies binnen de class database kan via $db->function()                         *
 *      $db = new database;                                                                              *
 *                                                                                                       *       
 *      //INSERT-Query                                                                                   *
 *      //Omdat er geen variabelen in staan, zal deze actie maar één keer worden uitgevoerd              *
 *      $db->query('INSERT INTO user (username, password) VALUES(:username, :password)');                *
 *      $db->bind(':username', 'janwillem');                                                             *   
 *      $db->bind('password', 'Welkom2012');                                                             *   
 *                                                                                                           *                                                                                     
 *      $db->execute();                                                                              * 
 *                                                                                                       *   
 *********************************************************************************************************
 *                                                                                                       *  
 *      //SELECT-Query                                                                                   *
 *      $db->query('SELECT username FROM user');                                                         *   
 *      $db->execute();                                                                                  *   
 *      $user_name = $db->resultset();                                                                   *
 *                                                                                                       *
 *      echo $user_name <br>;                                                                            *
 *                                                                                                       *
 *      $db->query('SELECT username FROM user');                                                         *
 *      $db->execute();                                                                                  *   
 *      $pass_word = $db->resultset;                                                                     *   
 *                                                                                                       * 
 *      echo $password <br>;                                                                             *
 *                                                                                                       *   
 *********************************************************************************************************
 *                                                                                                       *
 *      //UPDATE-Query                                                                                   *
 *      $db->query('UPDATE user SET password = $new_passwd WHERE naam = 'janwillem');                    *
 *      $db->execute();                                                                                  *   
 *                                                                                                       *
 *********************************************************************************************************
 */




