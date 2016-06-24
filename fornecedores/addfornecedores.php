<?php
	require_once 'init.php';
	include_once 'fornecedores.class.php';
	
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

	// instancia objeto fornecedor
	$fornecedor = new Fornecedor($name,$dataCadastro,$email);

	// insere no BD
	$PDO = db_connect() ;
	$sql = "INSERT INTO Fornecedor(nome,dataCadastro,email) VALUES (:name , :dataCadastro , :email )";
	$stmt = $PDO->prepare($sql);
	$stmt->bindParam(':name' ,$fornecedor->getNome());
	$stmt->bindParam(':dataCadastro' ,$fornecedor->getDataCadastro());
	$stmt->bindParam(':email' ,$fornecedor->getEmail());
	if($stmt->execute()){
		header ('Location: fornecedores.php');
	}else{
		echo "Erro ao cadastrar!!";
		print_r( $stmt->errorInfo());
	}
?>
