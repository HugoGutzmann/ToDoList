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
	
	$tarefa = $crud->addTarefa($obj);	
		
		header('Location: ControlerGeral.php');
		break;	
}

?>