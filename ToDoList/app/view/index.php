<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../../assets/css/css.css">
	<title>ToDoList</title>
</head>
<?php 

$tarefas = array('a','b');

 ?>
<body>
	<button class="accordion">Nova tarefa</button>
	<form action="../controlers/controlerGeral.php?acao=newtarefa" method="post" class="panel">
		<div >
			<label>Digite aqui o nome da sua tarefa</label>
			<input type="text" name="nome" require placeholder="Exemplo: 'Caminhar 4 km'">	
		</div>

		<div>
			<label>Detalhe-a</label>
			<input type="text" name="descricao" require placeholder="Exemplo: 'Sair de casa as 20:00hrs' ">
		</div>

		<input type="submit">

	</form>

<!-- Mostra o dia atual -->
<?php if(isset($tarefasHoje)){ ?>
 <h2>Hoje</h2>
 <!--Seguido do dia referente à semana -->
 <h3>Quarta-feira</h3>

<!-- Mostra apenas as tarefas do dia atual, caso houver, claro -->
 <?php foreach ($tarefasHoje as $tarefaHoje): ?>
<div class="accordion">
	 <ul>
	 	<li><?= $tarefaHoje->nome ?></li>
	 	<a href="../controlers/controlerGeral.php?acao=excluiTarefa&idtarefa=<?=$tarefaHoje->id?>">Excluir</a>
	 	<a href="../controlers/controlerGeral.php?acao=finalizaTarefa&idtarefa=<?=$tarefaHoje->id?>">Finalizar Tarefa</a>
	 </ul>
</div>
<div class="panel">
	<p><?=$tarefaHoje->descricao?></p>
</div>
 
 <?php endforeach; } ?>

	<!-- Caso existir, mostra as tarefas de outros dias -->
 
<?php 

 if (isset($tarefasHum)) {
 
 foreach ($tarefasHum as $tarefaHum) : ?>
 <div class="accordion">
	<h2><?php 

	$data = $tarefaHum->data;
	//$data2 = date("d/m/Y", $data);
	//Não consegui manipular para o padrão sul americano dia/mês/ano :( 
	echo $data;

		?></h2>


	 <ul>
	 	<li><?= $tarefaHum->nome ?></li>
	 	<a href="../controlers/controlerGeral.php?acao=excluiTarefa&idtarefa=<?=$tarefaHum->id?>">Excluir</a> 
	 	<a href="../controlers/controlerGeral.php?acao=finalizaTarefa&idtarefa=<?=$tarefaHum->id?>">Finalizar Tarefa</a>
	 </ul>
</div>
<div class="panel">
	<p><?= $tarefaHum->descricao ?></p>
</div>

 <?php endforeach; } ?>


 <?php

 $finalizadas = $crud->showFinalizadas(); 

  if (isset($finalizadas)): ?>
  	<h2>Tarefas Finalizadas: </h2>
  	<h3><?=$finalizadas[0]->data?></h3>
  	<ul>
 		<li><?= $finalizadas[0]->nome?></li>
 		<a href="../controlers/controlerGeral.php?acao=excluiTarefa&idtarefa=<?=$finalizadas[0]->id?>">Excluir</a>
 	</ul>
 <?php endif ?>

<script >
	//accordion (do w3schools para acelerar o processo)
	var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    /* Toggle between adding and removing the "active" class,
    to highlight the button that controls the panel */
    this.classList.toggle("active");

    /* Toggle between hiding and showing the active panel */
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>

</html>