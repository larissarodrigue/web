<?php 
	class Cliente{
		//decarando variaveis//
		private $nome;
		private $dataCadastro;
		private $email;

		//construtor//
		public function __construct($nome, $dataCadastro, $email){
			$this->setNome($nome);
			$this->setDataCadastro($dataCadastro);
			$this->setEmail($email);
		}
		//pega e entrega NOME//
		public function setNome($nome){
			$this->nome= $nome;
		}
		public function getNome(){
			return $this->nome;
		}
		//pega e entrega DATA NASCIMENTO//
		public function setDataCadastro($dataCadastro){
			$data = explode('/',$dataCadastro);
			$this->dataCadastro= "$data[2]-$data[1]-$data[0]";			
		}
		public function getDataCadastro(){
			return $this->dataCadastro;
		}
		//pega e entrega FOTO//
		public function setEmail($email){
			$this->email= $email;
		}
		public function getEmail(){
			return $this->email;
		}
	}

?>
