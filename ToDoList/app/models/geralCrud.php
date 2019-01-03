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
if (isset($listaAfazeres)) {

        return $listaAfazeres;
    }
}

//Retorna as tarefas que não são de hoje ordenadas pela mais recente (Para verificar a funcionalidade, adicione diretamente ao banco com uma data diferente da atual :)
	public function showTarefas ($data){
		  $sql = "SELECT * FROM afazeres where data != '{$data}' order by data desc";
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

 public function excluiTarefa($idTarefa){
    $sql = "DELETE FROM afazeres where id = '{$idTarefa}' ";
    //print_r($sql);die;
    $this->conexao->exec($sql);
 }

    public function finalizaTarefa($tarefa){
       $sql1 = "DELETE FROM afazeres where id = '{$tarefa->id}' ";
       $sql2 = "INSERT INTO finalizadas (nome,data,descricao) values('{$tarefa->nome}','{$tarefa->data}','{$tarefa->descricao}')";

        $this->conexao->exec($sql1);
        $this->conexao->exec($sql2);


    }
// retorna uma tarefa específica para obter o objeto tarefa referente a ela.
    public function showTarefa($id){
        $sql = "SELECT * from afazeres where id = '{$id}'";

           $resultado = $this->conexao->query($sql);
        $tarefas = $resultado->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tarefas as $tarefa) {
            $id        = $tarefa['id'];
            $nome      = $tarefa['nome'];
            $data      = $tarefa['data'];
            $descricao = $tarefa['descricao'];
        
        //cria um novo objeto Afazeres para cada tarefa retornada
        $obj = new Afazeres ($id,$nome,$data,$descricao);
        $listaAfazeres[] = $obj;

    }
}

    public function showFinalizadas(){
        $sql ="select * from finalizadas";

        $this->conexao->exec($sql);
    }

}

 ?>