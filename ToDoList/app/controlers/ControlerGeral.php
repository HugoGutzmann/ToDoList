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
	//chama a função addTarefa
	$tarefa = $crud->addTarefa($obj);	
		
		header('Location: ControlerGeral.php');
		
		break;	

	case 'excluiTarefa':
	//pega a id por metodo GET
	$idTarefa = $_GET['idtarefa'];

	$crud = new geralCrud();
	//chama a função excluiTarefa
	$excluir = $crud->excluiTarefa($idTarefa);

		header('Location : ControlerGeral.php?acao=index');

		break;

	case 'finalizaTarefa':
		//pega a id por metodo get
		$idTarefa = $_GET['idtarefa'];

		$crud = new geralCrud();

		//pega o objeto da tarefa que deseja finalizar
		$tarefaFinalizada = $crud->showTarefa($idTarefa);
		//print_r($tarefaFinalizada->id);die;

		//adiciona à tabela finalizadas
		$finalizaTarefa = $crud->finalizaTarefa($tarefaFinalizada);

		//exclui a tarefa já finalizada da tabela "Afazeres"
		$excluiTarefa = $crud->excluiTarefa($idTarefa);

		header('Location : ControlerGeral.php');

		break;


		case 'excluiTarefaF':

		$id = $_GET['idtarefa'];

		$crud = new geralCrud();

		$excluiF = $crud->excluiTarefaF($id);

		break;

}

?>