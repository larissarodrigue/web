<?php
	require 'init.php';
    // pega o ID da URL
	$id = isset ( $_GET['id']) ? (int) $_GET['id']: null;
	// valida o ID
 	if (empty ($id))
{
	echo "ID para alteração não definido";
 	exit;
}
 	// busca os dados do usuário a ser editado
 	$PDO = db_connect();
 	$sql = "SELECT nome,dataCadastro,email FROM fornecedor WHERE idFornecedor = :id";
	$stmt = $PDO-> prepare($sql);
 	$stmt->bindParam(':id', $id , PDO::PARAM_INT);
 	$stmt->execute();
 	$fornecedor = $stmt->fetch (PDO::FETCH_ASSOC);
 	/* se o método fetch () não retornar um array
 	significa que o ID não corresponde a um usuário válido */
 	if (!is_array($fornecedor))
 	{
 		echo "Nenhum fornecedor encontrado";
 		exit;
 	}
 	$dataOK = dateConvert( $fornecedor['dataCadastro']);
 ?>
 <! DOCTYPE html >
 <html lang="pt-br">
 	<head>
 		<title> Edição de dados </title>
 		<meta charset="utf-8">
 		<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
 		<script type="text/javascript" src="jquery.maskedinput.js"></script>
 		<script>
 		$(document).ready (function(){
 			$("#data").mask ("99/99/9999");
 	});
 	</script>
 </head>
 <body>
 	<form method ="post" name="formAltera" action ="editfornecedores.php" enctype="
		multipart/form-data">
 	<h1> Edição de dados </h1>
 	<table width="100%">
 		<tr>
 		<th width="18%">Nome</th>
 		<td width="82%"><input type="text" name="txtNome" value ="<?php echo $fornecedor ['nome']?>"></td>
 		</tr>
 		<tr>
 			<th>Data de Cadastro</th>
 			<td ><input type="text " name="txtData" id="data" value="<?php echo $dataOK ?>"></td>
		</tr>
 		<tr>
 			<th> Email </th>
 			<td><input type="text" name="txtEmail" value="email"></td>
 		</tr>
 		<tr>
 			<input type="hidden" name="id" value="<?php echo $id ?>">
 			<td><input type="submit" name="btnEnviar" value="Alterar"></td>
 			<td><input type="reset" name="btnLimpar" value="Limpar"></td>
 				</tr>
 			</table>
 		</form>
 	</body>
 </html>
