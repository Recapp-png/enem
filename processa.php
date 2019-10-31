<?php
isset($_POST['nome']){
 $nome=addslashes($_POST['nome']);
 $telefone= addslashes($_POST['telefone']);
 $email= addslashes($_POST['email']);
 $senha= addslashes($_POST['senha']);
 $confirmarSenha= addslashes($_POST['confSenha']);
 if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha]))
 {
 $u->conectar("projeto_login","localhost","root","");
 if( $u->msgErro==""){
 if($senha==$confirmarSenha)
 {
 if($u->cadstrar($nome,$telefone,$email,$senha))
 {
 echo"Cadastrado com sucesso!Acesse para entrar!";
 }else{
 echo "Email ja cadastrado!";
 }
 }else{
echo"Senha e confirmar senha são incompatíveis"; 
 }
 }else{
 echo="Erro:".$u->msgErro;
 }
 }
 }else{
  echo"Preencha os campos que faltam!";
 }
}
?>