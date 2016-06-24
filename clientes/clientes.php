<?php
require_once 'init.php';
 $PDO = db_connect();
 $sql_count = "SELECT COUNT(*) AS total FROM Cliente ORDER BY nome ASC";
 
$sql = "SELECT idCliente, nome , dataCadastro , email FROM Cliente ORDER BY nome ASC";
 
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
			<h1>Cadastro de Clientes</h1>
			<p><a href="form-addclientes.php">Adicionar Cliente</a></p>
			<h2>Lista de Clientes</h2>
			<p>Total de Clientes: <?php echo $total ?></p>
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
				<?php while($cliente = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
				<tr>
					<?php $caminho = $cliente['email']; ?>
					<td><?php echo $cliente['email']?></td>
					<td><?php echo $cliente['idCliente'] ?></td>
 					<td><?php echo $cliente['nome'] ?></td>
					<td><?php echo dateConvert($cliente['dataCadastro'])?></td>
					<td>
					<a href="form-editclientes.php?id=<?php echo $cliente['idCliente']?>">Editar</a>
					<a href="deleteclientes.php?id=<?php echo $cliente['idCliente'] ?>" onclick="return confirm('Tem certeza que deseja excluir?');"> Excluir </a>
					</td>
				</tr>
				 <?php endwhile; ?>
 				</tbody>
					</table>
 			<?php else: ?>
 		<p> Nenhum cliente registrado </p>
 		<?php endif; ?>
 	</body>
 </html>
