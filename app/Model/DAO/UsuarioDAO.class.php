<?php
//include_once("model.php");
//include_once("UsuarioBean.class.php");


class UsuarioDAO extends Model{

    public $_tabela = "usuario";


    public function salvarUsuario($usuarioBean){

            $nomeUsuario = $usuarioBean->getNomeUsuario();
            $nivelUsuario  = $usuarioBean->getNivelUsuario();
            $emailUsuario = $usuarioBean->getEmailUsuario();
            $loginUsuario = $usuarioBean->getLoginUsuario();
            $senhaUsuario = $usuarioBean->getSenhaUsuario();

            $dados = array('idUsuario' => 'null',
                        'Nome_Usuario' => $nomeUsuario,
                        'Nivel_Usuario' => $nivelUsuario,
                        'Email_Usuario' => $emailUsuario,
                        'Login_Usuario' => $loginUsuario,
                        'Senha_Usuario' => $senhaUsuario );

            $this->insert($dados);
            echo 'salvo com sucesso';
    }

    public function deletarUsuario($where){
            $this->delete( $where );
    }
    
    public function existeUsuario($where){
        $dados = $this->read($where,null,null,null);
        if(isset($dados) and $dados != array()){
            return true;

        }
        return false;
    }

    public function getUsuarios($where = null){
            $dados = $this->read($where,null,null,null);
            
            $listaDeUsuarios = array();
           // $i = 0;
            //$listaDeUsuarios
            foreach ($dados as $value) :
               // echo 'chave: ' . $key . ' valor: ' . $value['Nome_Usuario'] . '<br>';
                $usuario = new UsuarioBean();
                $usuario->setId($value['idUsuario'])
                        ->setNomeUsuario($value['Nome_Usuario'])
                        ->setNivelUsuario($value['Nivel_Usuario'])
                        ->setEmailUsuario($value['Email_Usuario'])
                        ->setLoginUsuario($value['Login_Usuario'])
                        ->setSenhaUsuario($value['Senha_Usuario']);
                array_push($listaDeUsuarios, $usuario);
               // $i++;                
            endforeach;
           
            echo "<pre>";
                 //  print_r($dados);
            echo "</pre>";

            //retorna um array de usuarios           
             return (array) ((object) $listaDeUsuarios);

    }


}