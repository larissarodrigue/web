<?php
	require_once 'init.php';
	include_once 'clientes.class.php';
	
	$dadosOK = true ;
	
	// pega os dados do formulário
	$name = isset ($_POST['txtNome'])?$_POST['txtNome']:null;
	$dataCadastro = isset ($_POST['txtData'])?$_POST['txtData']:null ;
	$email = isset ($_POST['txtEmail'])?$_POST['txtEmail']:null ;
	// validação simples se campos estão vazios
	if( empty ( $name ) || empty ( $dataCadastro) ){
		echo "Campos devem ser preenchidos!!";
		exit ;
	}

	// instancia objeto cliente
	$cliente = new Cliente($name,$dataCadastro,$email);

	// insere no BD
	$PDO = db_connect() ;
	$sql = "INSERT INTO Cliente(nome,dataCadastro,email) VALUES (:name , :dataCadastro , :email )";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':name' ,$cliente->getNome());
	$stmt->bindParam(':dataCadastro' ,$cliente->getDataCadastro());
	$stmt->bindParam(':email' ,$cliente->getEmail());
	if($stmt->execute()){
		header ('Location: index.html');
	}else{
		echo "Erro ao cadastrar!!";
		print_r( $stmt->errorInfo());
	}
?>
