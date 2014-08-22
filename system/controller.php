<?php
class Controller extends System {
    protected function view( $nome, $vars = null ){
        if (is_array($vars) && count($vars) > 0) {
            extract($vars, EXTR_PREFIX_ALL, 'view');
        }
        require_once( VIEWS . $nome . '.php' );
        exit();
    }
    
    protected function ajaxView( $nome, $vars = null ){
        if (is_array($vars) && count($vars) > 0) {
            extract($vars, EXTR_PREFIX_ALL, 'ajax');
        }
        require_once( CONTEUDOS . $nome . '.php' );
        exit();
    }
}
