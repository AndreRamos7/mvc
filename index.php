<?php
     
    ini_set('error_reporting', E_ALL | E_STRICT);
    ini_set('display_errors', 'on' );
    
    define( 'CONTEUDOS', 'app/View/conteudos/' );
    define( 'CONTROLLERS', 'app/Controller/' );
    define( 'VIEWS', 'app/View/' );
    define( 'MODELS', 'app/Model/' );
    define( 'HELPERS', 'system/helpers/' );
    
    require_once('system/system.php');
    //require_once('system/system2.php');
    require_once('system/controller.php');
    require_once('system/model.php');
    
    function __autoload( $file ){
        //echo "__autoload(" . $file . ")<br>";
        if( file_exists( MODELS . $file . '.class.php' ) ){
            require_once( MODELS . $file . '.class.php' );        
        }else if( file_exists( MODELS . "DAO/" . $file . '.class.php' ) ){
            require_once( MODELS . "DAO/" . $file . '.class.php' );        
        }else if( file_exists( MODELS . "Beans/" . $file . '.class.php' ) ){
            require_once( MODELS . "Beans/" . $file . '.class.php' );        
        }else if( file_exists( MODELS . "Autenticacao/" . $file . '.class.php' ) ){
            require_once( MODELS . "Autenticacao/" . $file . '.class.php' );        
        }else if( file_exists( HELPERS . $file . '.php' ) ){
            require_once( HELPERS . $file . '.php' );
        }else if( file_exists( "app/mocks/" . $file . '.php' ) ){
            require_once("app/mocks/"  . $file . '.php' );
        }else{
            die( "Model ou Helper nao encontrado." );
        }
    }
    
    session_name("sam");
    //session_cache_limiter('private');
    //session_cache_limiter(1);
    session_start();
    $Auth = null;
    //ini_set("session.gc_maxlifetime", "30");
    
    $start = new System;
    $start->rum();
?>
