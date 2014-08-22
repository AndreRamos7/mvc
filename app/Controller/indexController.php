<?php
 class index extends Controller{

    public function index_action(){
        
        if(isset($_SESSION['usuarioLogado'])){
            $dados["title"] = "Início";        
            $dados['conteudo'] =  CONTEUDOS . "HomeView.class.php";
        }else {
            $dados["title"] = "Início";        
            $dados['conteudo'] = CONTEUDOS . "SessaoView.class.php";
        }
        $this->view('indexView.class', $dados);
    }
    
    public function sobre(){
        $dados["title"] = "Sobre";        
        $dados['conteudo'] =  CONTEUDOS . "HomeView.class.php";
        $this->view('indexView.class', $dados);
    }
    
    public function editar(){
        $this->view('indexView.class', null);
    }
    
    public function excluir(){
        $this->view('indexView.class', null);
    }
}

?>
