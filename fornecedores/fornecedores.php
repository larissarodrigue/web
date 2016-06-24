<?php
require_once 'init.php';
 $PDO = db_connect();
 $sql_count = "SELECT COUNT(*) AS total FROM Fornecedor ORDER BY nome ASC";
 
$sql = "SELECT idFornecedor, nome , dataCadastro , email FROM Fornecedor ORDER BY nome ASC";
 
 $stmt_count = $PDO->prepare($sql_count);
 $stmt_count->execute();
 $total = $stmt_count->fetchColumn();
 
 $stmt= $PDO->prepare($sql);
 $stmt->execute();

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>Cadastro</title>	
		<meta charset="utf-8">
	</head>
	<body>
			<h1>Cadastro de Fornecedores</h1>
			<p><a href="form-addfornecedores.php">Adicionar Fornecedor</a></p>
			<h2>Lista de Fornecedores</h2>
			<p>Total de Fornecedores: <?php echo $total ?></p>
				<?php if($total > 0): ?>
				<table width="100%" border="1"> 
					<thead>			
						<tr>
							<th>Email</th>
							<th>Identificação</th>
							<th>Nome</th>
							<th>Data de Cadastro</th>
							<th>Ações</th>
						</tr>
					</thead>
				<tbody>
				<?php while($fornecedor = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
				<tr>
					<?php $caminho = $fornecedor['email']; ?>
					<td><?php echo $fornecedor['email']?></td>
					<td><?php echo $fornecedor['idFornecedor'] ?></td>
 					<td><?php echo $fornecedor['nome'] ?></td>
					<td><?php echo dateConvert($fornecedor['dataCadastro'])?></td>
					<td>
					<a href="form-editfornecedores.php?id=<?php echo $fornecedor['idFornecedor']?>">Editar</a>
					<a href="deletefornecedores.php?id=<?php echo $fornecedor['idFornecedor'] ?>" onclick="return confirm('Tem certeza que deseja excluir?');"> Excluir </a>
					</td>
				</tr>
				 <?php endwhile; ?>
 				</tbody>
					</table>
 			<?php else: ?>
 		<p> Nenhum fornecedor registrado </p>
 		<?php endif; ?>
 	</body>
 </html>
