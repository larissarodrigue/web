<?php
	require_once 'init.php';
 	include_once 'fornecedores.class.php';
 	// validação da imagem
 	$dadosOK = true;
		
		// pega os dados do formulário
		$id = isset ($_POST['id']) ? $_POST['id']:null;
 		$name = isset ( $_POST ['txtNome']) ? $_POST ['txtNome']:null;
 		$dataCadastro = isset ($_POST['txtData']) ? $_POST ['txtData']:null;
 		// validação simples se campos estão vazios
 		if (empty ($name) || empty ($dataCadastro))
 		{
 			echo "Campos devem ser preenchidos!!";
 			exit;
 		}
 		// instancia objeto fornecedor
 		$aluno = new Fornecedor ($name,$dataCadastro,$file_src);
 		// atualiza o BD
 		$PDO = db_connect();
 		$sql = "UPDATE Fornecedor SET nome = :name,dataCadastro = :data, email = :email
			WHERE idFornecedor = : id";
 		$stmt = $PDO-> prepare($sql);
		$stmt-> bindParam(': name ', $fornecedor-> getNome());
 		$stmt-> bindParam(': data ', $fornecedor-> getDataCadastro());
 		$stmt-> bindParam(': email ',$fornecedor-> getEmail());
 		$stmt-> bindParam(': id ', $id,	PDO::PARAM_INT);

 		if ($stmt->execute())
 		{
 			header ('Location:fornecedores.php');
 		}
 		else
 		{
 			echo "Erro ao alterar";
 			print_r($stmt->errorInfo());
 		}
 		?>
