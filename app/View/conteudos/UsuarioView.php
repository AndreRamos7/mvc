<?php  if(isset($view_lista_usuarios)){ ?>                                 
 <!-- =============================================================================================== -->    
 <!-- ===================== ConteudoListarUsuario =================================================== -->    
 <!-- =============================================================================================== -->    
 
    <div id="conteudoListaUsuario">
        <p><h3>Usuários</h3>
            <?php 
                $usuari = new UsuarioBean();
                foreach ($view_lista_usuarios as $usuari):
                    echo "" . $usuari->getNomeUsuario() ."<br>";
                endforeach;
            ?>
        </p>        
    </div>         
    
<?php }else if(isset($view_perfil)){ ?>            
 <!-- =============================================================================================== -->    
 <!-- ===================== conteudoPerfilUuario ==================================================== -->    
 <!-- =============================================================================================== -->    
 
    <div id="conteudoPerfilUsuario">
        perfil
    </div>         

<?php }else if(isset ($view_cadastro)){ ?>           <!-- formulario de cadastro do Usuario -->

<div id="conteudoFormularioCadastroUsuario">

<fieldset> 
    <form method="POST" action="/sam/Usuario/cadastrar">
        <fieldset> 
            <label>
                Nome <input type="text" size="35px" placeholder="Digite seu nome completo" required autofocus /> 
                Email <input type="email" size="50px" required/>
            </label> <hr />


            Tipo de Usuário:
            <input type="radio" name="Nivel_Usuario" value="1" id="adm" />Administrador
            <input type="radio" name="Nivel_Usuario" value="2" id="prof"/> Professor
            <input type="radio" name="Nivel_Usuario" value="3" id="alu" /> Aluno

            <input type="text" id="2" name="siape_professor" placeholder="Número do SIAPE" required style="display:none;"> 
            <input type="text" id="3" name="matricula_aluno" placeholder="Número de Matrícula" required style="display:none;">
             <hr />

            <label> 
                Login <input type="text" name="Login_Usuario"/> 
                <div class="fieldset-legend"> 
                    *Nome que o usuário utilizará para acessar o sistema. 
                </div> 
            </label> <hr />
            <label> 
                Senha <input type="password" maxlength="8" name="Senha_Usuario"/> 
                Confirmar senha <input type="password" maxlength="8" /> 
                <div class="fieldset-legend"> 
                    *Máximo 8 caracteres. 
                </div> 
            </label> <hr/>

            <div class="fieldset-button">
                <label>
                    <input type="submit" /> 
                    <input type="button" value="Voltar" /> 
                </label> 
            </div>
        </fieldset> 
    </form>
</fieldset>
    
</div>   
<?php }else if(false){ ?>                              <!-- outraConteudo -->



    
<?php }else{ ?>                          
 <!-- =============================================================================================== -->    
 <!-- ===================== Conteudo para listar usuários =========================================== -->    
 <!-- =============================================================================================== -->    
    <div id="">
    </div>         


<?php } 
