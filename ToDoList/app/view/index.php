<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../../assets/css/css.css">
	<!-- eu não soube como linkar o js, por isso ele ficou no final da pagina, mas o arquivo continua existindo -->
	<link rel="stylesheet" href="../../assets/js/js.js">
	<title>ToDoList</title>
</head>
<?php 

$tarefas = array('a','b');

 ?>
<body>

<div class="barracima">
<p>Aqui pode ter uma barra de pesquisa por exemplo :)</p>
</div>

<div class="container">

<div class="navbar">

	<ul>
		<li>a</li>
		<li>b</li>
		<li>c</li>
		<li>d</li>
	</ul>
	
</div>

<section>
	<a class="accordion" ><img src="../../assets/img/baseline-add-24px.svg"></img></a>
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
</section>

<section>
<!-- Mostra o dia atual -->
<?php if(isset($tarefasHoje)){ ?>
 <h2>Hoje</h2>
 <!--Seguido do dia referente à semana -->
 <h3>Quarta-feira</h3>

<!-- Mostra apenas as tarefas do dia atual, caso houver, claro -->
 <?php foreach ($tarefasHoje as $tarefaHoje): ?>
<div class="accordion">
	
	 	<p><?= $tarefaHoje->nome ?></p>
	 	<a href="../controlers/controlerGeral.php?acao=excluiTarefa&idtarefa=<?=$tarefaHoje->id?>">Excluir</a>
	 	<a href="../controlers/controlerGeral.php?acao=finalizaTarefa&idtarefa=<?=$tarefaHoje->id?>">Finalizar Tarefa</a>
	 
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


	
	 	<p><?= $tarefaHum->nome ?></p>
	 	<hr>
	 	<a href="../controlers/controlerGeral.php?acao=excluiTarefa&idtarefa=<?=$tarefaHum->id?>">Excluir</a> 
	 	<a href="../controlers/controlerGeral.php?acao=finalizaTarefa&idtarefa=<?=$tarefaHum->id?>">Finalizar Tarefa</a>

	 
</div>
<div class="panel">
	<p><?= $tarefaHum->descricao ?></p>
</div>

 <?php endforeach; } ?>


 <?php

 $finalizadas = $crud->showFinalizadas(); 
 //print_r($finalizadas[1]);die;

  if (isset($finalizadas)): ?>
  	<h2>Tarefas Finalizadas: </h2>
  	<?php foreach ($finalizadas as $finalizada) { ?>
  <div class="accordion">
  	<h3><?= $finalizada->data?></h3>
  
 		<p><?= $finalizada->nome?></p>
 		<a href="../controlers/controlerGeral.php?acao=excluiTarefaF&idtarefa=<?=$finalizada->id?>">Excluir</a>

  </div>		
  <div class="panel">
  	<p><?= $finalizada->descricao?></p>
  </div>
 		<hr>
 	
 <?php } endif ?>
	
	</div>
</section>


<footer>
	<p>Desenvolvido por Hugo Gutzmann Puga</p>
</footer>



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
	</body>
</html>