<?php
class Usuario extends Controller{

    public function index_action() {
        $user = new UsuarioDAO();
        $usuarios = $user->getUsuarios(null);
        
        $datas["title"] = "Usuários";        
        $datas["lista_usuarios"] = $usuarios;        
        $this->view('UsuarioView.class', $datas);
    }

    public function listar() {
        $categoria = $this->getParam('categoria');
        $user = new UsuarioDAO();
        $usuarios = $user->getUsuarios();
        $datas = array();
        if(isset($_SESSION['usuarioLogado'])){
            $datas["lista_usuarios"] = $usuarios;
            $datas["conteudo"] = CONTEUDOS . "UsuarioView.class.php";
            $this->view('IndexView.class', $datas);
        }else{
            $dados['mensagem'] = "Você precisa entrar antes.";
            $dados['conteudo'] = CONTEUDOS . "SessaoView.class.php";
            $this->view("indexView.class",$dados);
        }
    }

    public function perfil() {
        $eu = new UsuarioBean();
        $eu = $_SESSION['usuarioLogado'];
        
        if(isset($_SESSION['usuarioLogado'])){
            $datas["perfil"] = null;
            $datas["conteudo"] = CONTEUDOS . "UsuarioView.class.php";
            $this->view('IndexView.class', $datas);
        }else{
            $dados['mensagem'] = "Você precisa entrar antes.";
            $dados['conteudo'] = CONTEUDOS . "SessaoView.class.php";
            $this->view("indexView.class",$dados);
        }
    }
    
    public function ver() {
        $id = $this->getParam("id");
        $user = new UsuarioDAO();
        $usuarios = $user->getUsuarios("idUsuario = '$id'");

        $dados['usuario'] = $usuarios[0];
        $this->view("UsuarioView.class",$dados);
    }


    public function arquivos() {
        //$nome = $this->getParam('acao');
        //echo "Action arquivos $nome<br>";
   //     $this->config();
        echo "<b>getValor </b>" . $this->getValor();
        $user = new UsuarioDAO();
        $usuarios = $user->getUsuarios("Login_Usuario = '$login'");

        $datas["lista_usuarios"] = $usuarios;
        $datas["login"] = $login;

        $this->view('ArquivoMView.class', $datas);
    }

    public function cadastro(){
        $datas["title"] = "Cadastro";        
        $datas["cadastro"] = "cadastro";
        $datas["conteudo"] = CONTEUDOS . "UsuarioView.class.php";
        $this->view('IndexView.class', $datas);
    }

    public function cadastrar(){
        $nome = filter_input(INPUT_POST, 'Nome_Usuario');
        $email = filter_input(INPUT_POST, 'Email_Usuario');
        $nivel = filter_input(INPUT_POST, 'Nivel_Usuario');
        $login = filter_input(INPUT_POST, 'Login_Usuario');
        $senha = filter_input(INPUT_POST, 'Senha_Usuario');

        $senhaMD5 = md5($senha);
        //
        $usuarioBean = new UsuarioBean();

        $usuarioBean->setNomeUsuario($nome)
            ->setEmailUsuario($email)
            ->setNivelUsuario($nivel)
            ->setLoginUsuario($login)
            ->setSenhaUsuario($senha);

        if($nivel == 2){
            $professorBean = new professorBean();
            
        }
        $userDAO = new UsuarioDAO();
        $userDAO->salvarUsuario($usuarioBean);
    }

    public function editar(){
        echo "action de edicao de perfil e arquivos";
    }
    
    public function atividades(){
        echo "action de atividades";
    }

    public function carregar($login) {
        echo "action de uploads de arquivos " . $login;
    }
}