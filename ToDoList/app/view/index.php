<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../../assets/css/cssoriginal.css">
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
<!-- Aqui é uma barra lateral e poderia ter diferente ações como por exemplo itens que permitem a navegação na pagina-->
	<ul>
		<li>a</li>
		<li>b</li>
		<li>c</li>
		<li>d</li>
	</ul>
	
</div>
<div class="corpoabsoluto">

<section class="formulario">
	<a class="accordion" ><img src="../../assets/img/baseline-add-24px.svg"></img></a>
	<form action="../controlers/controlerGeral.php?acao=newtarefa" method="post" class="panel">
		<div class="campo" >
			<label>Digite aqui o nome da sua tarefa</label>
			<input type="text" name="nome" id="nome" require placeholder="Exemplo: 'Caminhar 4 km'">	
		</div>

		<div class="campo">
			<label>Detalhe-a</label>
			<input type="text" name="descricao" id="detalhe" require placeholder="Exemplo: 'Sair de casa as 20:00hrs' ">
		</div>

		<input id="submit" type="submit" value="Guarda">

	</form>
</section>
<section>
<!-- Mostra o dia atual -->
<?php if(isset($tarefasHoje)){ ?>
 <h2>Hoje</h2>


<!-- Mostra apenas as tarefas do dia atual, caso houver, claro -->
 <?php foreach ($tarefasHoje as $tarefaHoje): ?>
	<!--$data2 = date("d/m/Y", $data);
	Não consegui manipular para o padrão sul americano dia/mês/ano :( -->

	<!--E o dia que ela foi cadastrada -->
 		<h3 class="data"><?= $tarefaHoje->data?></h3>
		<!--mostra o nome da tarefa -->
	 	<h3><?= $tarefaHoje->nome ?></h3>
	 	
	 	
	 	<a href="../controlers/controlerGeral.php?acao=finalizaTarefa&idtarefa=<?=$tarefaHoje->id?>">Finalizar Tarefa</a>
	 	<div class="accordion">show more</div>

<div class="panel">
	<h3 class="data">Detalhes:</h3>
	<p><?=$tarefaHoje->descricao?></p>
	<a href="../controlers/controlerGeral.php?acao=excluiTarefa&idtarefa=<?=$tarefaHoje->id?>">Excluir</a>
</div>
 <hr>
 <?php endforeach; } ?>
</section>

	<!-- Caso existir, mostra as tarefas de outros dias -->
 
<?php 

 if (isset($tarefasHum)) {
 
 foreach ($tarefasHum as $tarefaHum) : ?>
 	<section>
	<h3 class="data"><?php 	$data = $tarefaHum->data;
	
	echo $data;

		?></h3>
	
	 	<h3><?= $tarefaHum->nome ?></h3>
	 	
	 	<a href="../controlers/controlerGeral.php?acao=finalizaTarefa&idtarefa=<?=$tarefaHum->id?>">Finalizar Tarefa</a>
		<div class="accordion">Show more</div>


	 
<div class="panel">
	<h3 class="data">Detalhes:</h3>
	<p><?= $tarefaHum->descricao ?></p>
	 	<a href="../controlers/controlerGeral.php?acao=excluiTarefa&idtarefa=<?=$tarefaHum->id?>">Excluir</a> 
</div>
<hr>
 <?php endforeach; } ?>
</section>

 <?php

 $finalizadas = $crud->showFinalizadas(); 
 //print_r($finalizadas[1]);die;

  if (isset($finalizadas)): ?>
  	<section>
  	<h2>Tarefas Finalizadas: </h2>
  	<?php foreach ($finalizadas as $finalizada) { ?>

  	<h3 class="data"><?= $finalizada->data?></h3>
  
 		<h3><?= $finalizada->nome?></h3>
  		<div class="accordion">show more</div>		

  <div class="panel">
  	<h3 class="data">Detalhes:</h3>
  <h3><?= $finalizada->descricao?></h3>
 		<a href="../controlers/controlerGeral.php?acao=excluiTarefaF&idtarefa=<?=$finalizada->id?>">Excluir</a>
  </div>
 		<hr>
 	
 <?php } endif ?>
	
</section>
	</div>


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