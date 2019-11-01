<?php

require_once'CLASSES/usuarios.php';
$u=new Usuário
?>


<html>
<head>
	<meta charset="utf-8"/>
	<title>Projeto Login</title>
	<link rel="stylesheet" href="CSS/estilo.css">
</head>
<body>
<div id="corpo-form-cad">
	<h1>Cadastrar</h1>
	<form method="POST" action="usuarios.php">
		<input type="text" name="nome" placeholder="Nome Completo" maxlength="40">
		<input type="text" name="telefone" placeholder="Telefone" maxlength="35">
			<input type="email" name="email" placeholder="Usuário" maxlength="40">
			<input type="password" name="senha" placeholder="senha" maxlength="15">
			<input type="password" name="confSenha" placeholder="Confirmar Senha">
			<input type="submit" value="Cadastre">
		</form>
</div>
<?php
if(isset($_POST['nome'])){
 $nome=addslashes($_POST['nome']);
 $telefone= addslashes($_POST['telefone']);
 $email= addslashes($_POST['email']);
 $senha= addslashes($_POST['senha']);
 $confirmarSenha= addslashes($_POST['confSenha']);
 if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha) && !empty($confirmarSenha))
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
 echo "Erro:".$u->msgErro;
 }
 }
 }else{
  echo"Preencha os campos que faltam!";
 }
?>
</body>
</html>