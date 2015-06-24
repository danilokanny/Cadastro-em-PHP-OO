<?php

require_once 'Crud.php';

class Usuarios extends Crud{
	
	protected $table = 'usuarios';
	private $nome;
	private $email;
	private $setor;

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setEmail($email){
		$this->email = $email;
	}

	public function setSetor($setor){
		$this->setor = $setor;
	}

	public function insert(){

		$sql  = "INSERT INTO $this->table (nome, email, setor) VALUES (:nome, :email, :setor)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':setor', $this->setor);
		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET nome = :nome, email = :email, setor = :setor WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':email', $this->email);
		$stmt->bindParam(':setor', $this->setor);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();

	}

}