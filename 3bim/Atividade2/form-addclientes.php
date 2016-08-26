<?php
	require 'init.php';
?>
<html><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="layout.css" rel="stylesheet" type="text/css">
        <link href="jquery-ui.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="jquery-ui.js"></script>
		<script type="text/javascript" src="jquery.maskedinput.js"></script>
		 <script type="text/javascript" src="script.js"></script>
		 <script type="text/javascript" src="datepicker-pt-BR.js"></script>
		
    </head><body>
        <div class="menu">
            <div class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand"><img height="20" alt="Brand" src="disney-princess.png"></a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="inicio.html">Home</a>
                            </li>
                            <li>
                                <a href="clientes.php">Clientes</a>
                            </li>
                            <li>
                                <a href="fornecedores.php">Fornecedores</a>
                            </li>
                            <li>
                                <a href="sobre.html">Sobre</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
		<div class="conteudo">
		<form method="post" name="formCadastro" action="addclientes.php" enctype="multipart/form-data" onSubmit="return verifica()">
				<h1>Cadastro de Clientes</h1>
			<table width="100%">
				<tr>
					<th width="18%">Nome</th>
					<td width="82%"><input type="text" name="txtNome" style="color:#FF00FF"></td>
				</tr>				
				<tr>
					<th>Email</th>
					<td><input type="text" id="email" name="txtEmail" style="color:#FF00FF"></td>
				</tr>
				
				<tr>
					<th>Data de Cadastro</th>
					<td><input type="text" id="data" name="txtData" class="cC" Value="dd/mm/aaaa" readonly style="color:#FF00FF"></td>
				</tr>
				<tr></tr>
				<tr>
					<td></td>				
					<td><input type="submit" name="bntEnviar" value="Cadastrar" style="color:#FF00FF">
					<input type="reset" name="bntLimpar" value="Limpar"  style="color:#FF00FF"></td>
				</tr>

			</table>
		</form>
		</div>

</body></html>

	
