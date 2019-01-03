<?php 

require '../models/geralCrud.php';
require_once '../models/Afazeres.php';



if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}


switch ($acao) {

	case 'index':

	$data = date('Y-m-d');
	$crud   = new geralCrud();
	$tarefasHoje = $crud->showTarefasHoje($data);

	$tarefasHum = $crud->showTarefas($data);

	$finalizadas = $crud->showFinalizadas();


		include "../view/index.php";

		break;

	case 'newtarefa':

	$data = date('Y-m-d');
//cria um novo objeto afazeres com os dados preenchidos no index
		$obj = new Afazeres(
			null,
			$_POST['nome'],
			$data,
			$_POST['descricao']
		);

	$crud = new geralCrud();
	
	$tarefa = $crud->addTarefa($obj);	
		
		header('Location: ControlerGeral.php');
		
		break;	

	case 'excluiTarefa':

	$idTarefa = $_GET['idtarefa'];

	$crud = new geralCrud();

	$excluir = $crud->excluiTarefa($idTarefa);

		header('Location : ControlerGeral.php');

		break;

	case 'finalizaTarefa':

		$idTarefa = $_GET['idtarefa'];

		$crud = new geralCrud();
		//pega o objeto da tarefa que deseja finalizar
		$tarefaFinalizada = $crud->showTarefa($idtarefa);
		//adiciona à tabela finalizadas
		$finalizaTarefa = $crud->finalizaTarefa($TarefaFinalizada);
		//exclui a tarefa já finalizada da tabela "Afazeres"
		$excluiTarefa = $crud->excluiTarefa($idTarefa);

		header('Location : ControlerGeral.php');

}

?>