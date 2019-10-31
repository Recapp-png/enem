<?php 

Class Usuario
{
	private $pdo;
	public function conectar($nome,$host,$usuario,$senha)
	{
		global $pdo;
		public $msgErro = "";
		global $msgErro;
		try{
		$pdo=new PDO("mysql:dbname=".$nome.";host=".$host,$usuario, $senha);
		}catch(PDOException $e){
			$msgErro=$e->getMessage();
		}
		
	}
	public function cadstrar($nome,$telefone,$email,$senha)
	{
		
		global $pdo;
		//verfificar possivel cadastro
		$sql=$pdo->prepare("SELECT id_usuario FROM usuariosn where email=;e");
		$sql->bindValue(":e",$email);
		$sql->execute();
		if($sql->rowCount() > 0)
		{
			return false;
		}
		else{
			$sql=$pdo->prepare("INSERT INTO usuarios(nome,telefone,email,senha) VALUES(:n,:t,:e,:s)");
			$sql->bindValue(":n",$nome);
			$sql->bindValue(":t",$telefone);
			$sql->bindValue(":e",$email);
			$sql->bindValue(":s",md5$senha);
			$sql->execute();
			return true;
		}
		
	}
	public function logar($email,$senha)
	{
		global $pdo;
		$sql=$pdo->prepare("SELECT id_usuario FROM usuarios where email=:e AND senha=;s");
		$sql->bindValue(":e",$email);
			$sql->bindValue(":s",md5$senha);
				$sql->execute();
				if($sql->rowCount()>0)
				{
					$dado = $sql->fetch();
					session_star();
					$_SESSION['id_usuario']=$dado['id_usuario'];
					return true;
				}else{
					return false;
     }
	}
}



?>