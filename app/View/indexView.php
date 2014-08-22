<?php
    $usuarioLogado = new UsuarioBean();
    if (isset($_SESSION['usuarioLogado']) and isset($usuarioLogado) ) {
        $usuarioLogado = $_SESSION['usuarioLogado'];
    }else{
        $usuarioLogado = new UsuarioBean();
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="http://localhost/sam/app/View/imagens/favicon.ico" rel="shortcut icon"></link>
        <link rel="stylesheet" type="text/css" href="http://localhost/sam/app/View/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="http://localhost/sam/app/View/css/estiloConteudos.css"/>
        <script type="text/javascript" src="http://localhost/sam/app/View/javascript/jquery-1.4.2.min.js"></script>
        <script>
        $(document).ready(function(){
            $("input#adm").click(function(){    
              $('#2').hide();
              $('#3').hide();
            });
            $("input#prof").click(function(){    
              $('#2').show();
              $('#3').hide();
            });
            $("input#alu").click(function(){    
              $('#2').hide();
              $('#3').show();
            });
        }); 
        </script>
        
        <title> SAM - <?php if (isset($view_title)) {echo "$view_title";}?></title>
    </head>

<body>

<div class="container">
  <div class="header"><!-- end .header --></div>
  <div class="sidebar1">
    <ul class="nav"> <!-- O menu muda de acordo com o tipo de usuarios-->
        
      <?php if( $usuarioLogado->getNivelUsuario() == 1){ //se o usuario for administrador ?>  
        <li><a href="/sam/Usuario/perfil">Perfil</a></li>
        <li><a href="/sam/index">Início</a></li>
        <li><a href="/sam/index/sobre">Sobre o SAM</a></li>
        <li><a href="/sam/Usuario/cadastro">cadastrar usuarios</a></li>
        <li><a href="/sam/Usuario/listar/categoria/alunos">Alunos</a></li>
        <li><a href="/sam/Usuario/listar/categoria/professores">Professores</a></li>
        <li><a href="/sam/Usuario/listar/categoria/eixostematicos">Eixos Temáticos</a></li>
        <li><a href="/sam/Turma">Turmas</a></li>
        <li><a href="/sam/Usuario/listar/categoria/temas">Temas</a></li>
        <li><a href="/sam/Usuario/listar/categoria/arquivos">Arquivos</a></li>
        <li><a href="/sam/Usuario/listar/categoria/minicursos">Minicursos</a></li>
        <li><a href="/sam/Usuario/listar/categoria/?">Backup</a></li> <!-- pagina para definir backup do sistema -->   

      <?php } else if($usuarioLogado->getNivelUsuario() == 2){ //se o usuario for professor ?>  
        <li><a href="/sam/index">Início</a></li>
        <li><a href="/sam/Usuario/perfil">Perfil</a></li>
        <li><a href="/sam/index/sobre">Sobre o SAM</a></li>
        <li><a href="/sam/Usuario/listar/categoria/alunos">Alunos</a></li>
        <li><a href="/sam/Usuario/cadastro">cadastrar usuarios</a></li>
        <li><a href="/sam/Usuario/listar/categoria/professores">Professores</a></li>
        <li><a href="/sam/Usuario/listar/categoria/eixostematicos">Eixos Temáticos</a></li>
        <li><a href="/sam/Turma">Turmas</a></li>
        <li><a href="/sam/Usuario/listar/categoria/temas">Temas</a></li>
        <li><a href="/sam/Usuario/listar/categoria/arquivos">Arquivos</a></li>
        <li><a href="/sam/Usuario/listar/categoria/minicursos">Minicursos</a></li>
                
      <?php } else if($usuarioLogado->getNivelUsuario() == 3){ //se o usuario for aluno ?>  
        <li><a href="/sam/index">Início</a></li>
        <li><a href="/sam/Usuario/perfil">Perfil</a></li>
        <li><a href="#">Meus arquivos</a></li>
        <li><a href="/sam/Usuario/listar/categoria/minicursos">Minicursos</a></li>
      
      <?php }else{ // se o usuario não for ninguem  ?>
        <li><a href="/sam/index">Início</a></li>
        <li><a href="/sam/Sessao">login</a></li>
        <li><a href="/sam/index/sobre">Sobre o SAM</a></li>

      <?php }?>
    </ul>
    </div>
  <div class="content">
  
    <?php   
        if (isset($usuarioLogado) and $usuarioLogado->getNomeUsuario() != null) {
            //$usuarioLogado = $_SESSION['usuarioLogado'];
             echo "<p align='center'>Bem vindo, " . $usuarioLogado->getNomeUsuario() . ".<a href='/sam/Sessao/logout'> sair </a> </p>"; 
        }else{        
            }
        if (isset($view_mensagem)){
            echo "<script> alert('" . $view_mensagem . "'); </script>";         
        }
        if(isset($view_conteudo)){
            include_once $view_conteudo; 
        }
    ?>
  
        <!-- end .content --></div>
<div class="footer">
      <div class="p-footer">
      <p>Copyright &copy;&nbsp;2014 SAM / <a href="http://www.ufpa.br"> Universidade Federal do Pará</a> - Faculdade de Medicina Veterinária. </br>
      </p>
      <p>      Desenvolvido por Faculdade de Computação - UFPA - Campus Castanhal </p>
  </div>
    <!-- end .footer --></div>

<!-- end .container --></div>
</body>
</html>
