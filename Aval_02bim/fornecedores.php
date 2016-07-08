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
<html><head>
		<div class="conteudo">
			<h1>Cadastro de Fornecedores</h1>
			<p><input type="button" href="form-addfornecedores.php" onclick="chama(this)" value="Adicionar Fornecedor"  style="color:#FF00FF"></input></p>
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
		</div>
				<tbody>
				<?php while($fornecedor = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
				<tr>
					<?php $caminho = $fornecedor['email']; ?>
					<td><?php echo $fornecedor['email']?></td>
					<td><?php echo $fornecedor['idFornecedor'] ?></td>
 					<td><?php echo $fornecedor['nome'] ?></td>
					<td><?php echo dateConvert($fornecedor['dataCadastro'])?></td>
					<td>
					<input type="button" href="form-editfornecedores.php?id=<?php echo $fornecedor['idFornecedor']?>" onclick="chama(this)" value="Editar" style="color:#FF00FF"></input>
					<input type="button" onclick="chama(this)" href="deletefornecedores.php?id=<?php echo $fornecedor['idFornecedor'] ?>" value="Excluir" style="color:#FF00FF"> </input>
					</td>
				</tr>
				 <?php endwhile; ?>
 				</tbody>
					</table>
 			<?php else: ?>
 		<p> Nenhum fornecedor registrado </p>
 		<?php endif; ?>
</body></html>
