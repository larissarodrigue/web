<div class="conteudo">
	 <?php
	require 'init.php';
    // pega o ID da URL
	$id = isset ($_GET['id']) ? (int) $_GET['id']: null;
	// valida o ID
 	if (empty ($id))
{
	echo "ID para alteração não definido";
 	exit;
}
 	// busca os dados do usuário a ser editado
 	$PDO = db_connect();
 	$sql = "SELECT nome, dataCadastro, email FROM Cliente WHERE idCliente = :id";
	$stmt = $PDO-> prepare($sql);
 	$stmt->bindParam(':id', $id , PDO::PARAM_INT);
 	$stmt->execute();
 	$cliente = $stmt->fetch(PDO::FETCH_ASSOC);
 	/* se o método fetch () não retornar um array
 	significa que o ID não corresponde a um usuário válido */
 	if (!is_array($cliente))
 	{
 		echo "Nenhum cliente encontrado";
 		exit;
 	}
 	$dataOK = dateConvert( $cliente['dataCadastro']);
 ?>
 	<form method ="post" name="formAltera" action ="editclientes.php" enctype="
		multipart/form-data">
 	<h1> Edição de dados </h1>
 	<table width="100%">
 		<tr>
 		<th width="18%">Nome</th>
 		<td width="82%"><input type="text" name="txtNome" value ="<?php echo $cliente ['nome']?>" style="color:#FF00FF"></td>
 		</tr>
 		<tr>
 			<th>Data de Cadastro</th>
 			<td ><input type="text " name="txtData" id="data" value="<?php echo $dataOK ?>" style="color:#FF00FF"></td>
		</tr>
 		<tr>
 			<th> Email </th>
 			<td><input type="text" name="txtEmail" value="<?php echo $cliente ['email']?>" style="color:#FF00FF"></td>
 		</tr>
 		<tr>
 			<input type="hidden" name="id" value="<?php echo $id ?>">
 			<td><input type="submit" name="btnEnviar" value="Alterar" style="color:#FF00FF"></td>
 			<td><input type="reset" name="bntLimpar" value="Limpar"  style="color:#FF00FF"></td>
 		</tr>
 			</table>
 		</form>
</div>
