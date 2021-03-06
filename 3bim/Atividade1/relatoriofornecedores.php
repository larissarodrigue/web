<div class="conteudo">
<?php
  // inclui classes necessárias
  spl_autoload_register(function ($class_name)
  {
    include 'html/'.$class_name.'.class.php';
  });
	require_once 'init.php';
		$PDO = db_connect();
 $sql_count = "SELECT COUNT(*) AS total FROM Fornecedor ORDER BY nome ASC";
 
$sql = "SELECT idFornecedor, nome, dataCadastro, email FROM Fornecedor ORDER BY nome ASC";
 
 $stmt_count = $PDO->prepare($sql_count);
 $stmt_count->execute();
 $total = $stmt_count->fetchColumn();
 
 $stmt= $PDO->prepare($sql);
 $stmt->execute();
	
		
  $html = new TElement('html');
  $html->lang = 'pt-br';
  $body = new TElement('body');
  $html->add($body);
  $tabela = new TTable;
  $tabela->width = 600;
  $tabela->border = 1;
  $cabecalho = $tabela->addRow();
  $cabecalho->bgcolor = '#DB7093';
  $cabecalho->addCell('Identificação');
  $cabecalho->addCell('Nome');
  $cabecalho->addCell('E-Mail');
  $cabecalho->addCell('Data');
  
  $i = 0;
 
  while($fornecedores = $stmt->fetch(PDO::FETCH_ASSOC))
  {
    
    $bgcolor = ($i % 2) == 0 ? '#FFC0CB' : '#DB7093';
    $linha = $tabela->addRow();
    $linha->bgcolor = $bgcolor;
   
    $linha->addCell($fornecedores['idFornecedor']);
    $linha->addCell($fornecedores['nome']);
    $linha->addCell(dateConvert($fornecedores['dataCadastro']));
    $linha->addCell($fornecedores['email']);
    
    $i++;
  }
?>	<div class="tabela">
	<?php
  $body->add($tabela);
  $html->show();
  ?>
 </div><?php
 
 
?>
</div>
