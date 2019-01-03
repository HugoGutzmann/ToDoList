<?php 
 
require_once "DBConnection.php";
require_once "Afazeres.php";


class GeralCrud
{
	public $conexao;

	public function __construct(){
    $this->conexao = DBConnection::getConexao();
}

//Adiciona uma tarefa
	public function addTarefa($Afazeres) {

		$sql = "INSERT INTO afazeres (nome,data,descricao) values('{$Afazeres->nome}','{$Afazeres->data}','{$Afazeres->descricao}');";
		//print_r($sql);die;
		$this->conexao->exec($sql);

	}
//Retorna as tarefas do banco com a data atual
	public function showTarefasHoje ($data){
		  $sql = "SELECT * FROM afazeres where data = '{$data}' ";
		  //print_r($sql);die;

        $resultado = $this->conexao->query($sql);
        $tarefas = $resultado->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tarefas as $tarefa) {
        	$id        = $tarefa['id'];
        	$nome 	   = $tarefa['nome'];
        	$data 	   = $tarefa['data'];
        	$descricao = $tarefa['descricao'];
        
        //cria um novo objeto Afazeres para cada tarefa retornada
        $obj = new Afazeres ($id,$nome,$data,$descricao);
        $listaAfazeres[] = $obj;
}
        return $listaAfazeres;
	}

//Retorna as tarefas que não são de hoje (Para verificar a funcionalidade, adicione diretamente ao banco)
	public function showTarefas ($data){
		  $sql = "SELECT * FROM afazeres where data != '{$data}' ";
		  //print_r($sql);die;

        $resultado = $this->conexao->query($sql);
        $tarefas = $resultado->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tarefas as $tarefa) {
        	$id        = $tarefa['id'];
        	$nome 	   = $tarefa['nome'];
        	$data 	   = $tarefa['data'];
        	$descricao = $tarefa['descricao'];
        
        //cria um novo objeto Afazeres para cada tarefa retornada
        $obj = new Afazeres ($id,$nome,$data,$descricao);
        $listaAfazeres[] = $obj;
}
//se existir tarefas, retorna
if (isset($listaAfazeres)) {
	
        return $listaAfazeres;
	}
 }
}

 ?>