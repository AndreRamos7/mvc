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
        
        #versao do encoding xml
        $dom = new DOMDocument("1.0", "ISO-8859-1");


        #retirar os espacos em branco
        $dom->preserveWhiteSpace = false;

        #gerar o codigo
        $dom->formatOutput = true;

        #criando o nó principal (root)
        $root = $dom->createElement("agenda");

        #nó filho (contato)
        $contato = $dom->createElement("contato");

        #setanto nomes e atributos dos elementos xml (nós)
        $nome = $dom->createElement("nome", "Rafael Clares");
        $telefone = $dom->createElement("telefone", "(11) 5500-0055");
        $endereco = $dom->createElement("endereco", "Av. longa n 1");

        #adiciona os nós (informacaoes do contato) em contato
        $contato->appendChild($nome);
        $contato->appendChild($telefone);
        $contato->appendChild($endereco);

        #adiciona o nó contato em (root) agenda
        $root->appendChild($contato);
        $dom->appendChild($root);

        # Para salvar o arquivo, descomente a linha
        //$dom->save("contatos.xml");
        #cabeçalho da página
        header("Content-Type: text/xml");
        # imprime o xml na tela

        print $dom->saveXML();

        
    
    }
    
    public function atividades(){
        echo "action de atividades";
    }

    public function carregar($login) {
        echo "action de uploads de arquivos " . $login;
    }
}