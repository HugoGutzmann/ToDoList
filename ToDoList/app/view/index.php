<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ToDoList</title>
</head>

<style type="text/css">
	/* Style the buttons that are used to open and close the accordion panel */
.accordion {

  border: none;
  outline: none;
  transition: 0.4s;
}

/* Add a background color to the button if it is clicked on (add the .active class with JS), and when you move the mouse over it (hover) */
.active, .accordion:hover {

}

/* Style the accordion panel. Note: hidden by default */
.panel {
  padding: 0 18px;

  display: none;
  overflow: hidden;
}
	
</style>
<?php 

$tarefas = array('a','b');

 ?>
<body>
	<form action="../controlers/controlerGeral.php?acao=newtarefa" method="post">
		<div class="accordion">
			<label>Digite aqui o nome da sua tarefa</label>
			<input type="text" name="nome" require>	
		</div>

		<div class="panel">
			<label>Detalhe-a</label>
			<input type="text" name="descricao" require>
		</div>

		<input type="submit">

	</form>

<!-- Mostra o dia atual -->
 <h2>Hoje</h2>
 <!--Seguido do dia referente à semana -->
 <h3>Quarta-feira</h3>

<!-- Mostra apenas as tarefas do dia atual -->
 <?php foreach ($tarefasHoje as $tarefaHoje): ?>

 <ul>
 	<li><?= $tarefaHoje->nome ?></li>
 </ul>

 
 <?php endforeach;?>

<!-- Caso existir, mostra as tarefas de outros dias -->
 <?php 

 if (isset($tarefasHum)) {
 
 foreach ($tarefasHum as $tarefaHum) : ?>
 
	<h2><?php 

	$data = $tarefaHum->data;
	//$data2 = date("d/m/Y", $data);
	echo $data;

		?></h2>


 <ul>
 	<li><?= $tarefaHum->nome ?></li>
 </ul>

 <?php endforeach; } ?>

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