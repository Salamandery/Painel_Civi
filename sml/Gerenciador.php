<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel - &copy;</title>
	<script language="JavaScript" type="text/javascript" src="resources/js/jquery-3.2.1.js"></script>
	<script language="JavaScript" type="text/javascript" src="resources/js/jquery.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="resources/js/jquery.textfill.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="resources/js/jquery.textfill.js"></script>
	<script language="JavaScript" type="text/javascript" src="resources/js/jquery.mask.min.js"></script>
	<script language="JavaScript" type="text/javascript" src="resources/css/bootstrap.min.js"></script>
    <link rel="stylesheet" href="resources/css/bootstrap.min.css"> 
	<link rel="stylesheet" href="resources/css/main.css">  
</head>
<body>
<div class="content">
<?php 
/*
@name          Painel civi 
@programmer    Rodolfo M F Abreu - Salamandery
@layout        Arianne Michelle dos Santos Brito
@layout        Alan
@version       1.0.1f
@date          2018-06-26
@copyright     (c) 2018
@license       MIT License

@contato:       rodolfo_mferreira@hotmail.com
*/


include ('resources/nav-bar.php');
if ($_GET['f']) {
	$div = $_GET['f'];
} else {
	$div = "homeBtn";
}?>
	<div class="container menu-nav dark">
	  <ul class="nav flex-column">
	  	<li class="nav-item">
		  <button class="a-nav nav-link" id="homeBtn" onclick="TabVerticalBar(event, 'Home')">Home</button>
		</li>
		<li class="nav-item">
		  <button class="a-nav nav-link" id="ativBtn" onclick="TabVerticalBar(event, 'Ativ')">Atividades</button>
		</li>
		<li class="nav-item">
		  <button class="a-nav nav-link" id="listBtn" onclick="TabVerticalBar(event, 'List')">Lista de Horários</button>
		</li>
		<li class="nav-item">
		  <button class="a-nav nav-link" id="diaBtn" onclick="TabVerticalBar(event, 'Hours')">Dias da Semana</button>
		</li>
		<li class="nav-item">
		  <button class="a-nav nav-link" id="msgBtn" onclick="TabVerticalBar(event, 'Msg')">Mensagens</button>
		</li>
		<li class="nav-item">
		  <button class="a-nav nav-link" id="redeBtn" onclick="TabVerticalBar(event, 'Rede')">Rede Social</button>
		</li>
	  </ul>
	</div>
	<div id="Ativ" class="tabcontent">
		<div id="forms">
		<h2>Atividades / Modalidades</h2><br/>
			<form class="form-inline" method="POST" action="resources/insert_ativ.php">
				<div class="form-group">
					<label for="Cod">Código:</label>&nbsp;&nbsp;
					<input type="text" class="form-control" id="cd" name="cd" placeholder="C&Oacute;DIGO" readonly>
				</div>
				<div class="checkbox">&nbsp;&nbsp;
					<label><input type="checkbox" id="chkAt" name="chkAt" checked>&nbsp;&nbsp;&nbsp;Ativo s/n?</label>
				</div><br/><br/>
				<div class="form-group" style="width: 100%;">
					<label for="Ds">Descri&ccedil;&atilde;o:</label>&nbsp;&nbsp;
					<input type="text" class="form-control" id="ds" name="ds" placeholder="DESCRI&Ccedil;&Atilde;O" style="width: 50%;" />&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="submit" id="insert" name="insert" class="btn">Cadastrar</button>&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="submit" id="update" name="update" class="btn">Atualizar</button>
				</div><br/>
				<div class="messagebox" style="text-align: center;">		
					<?php 
						if (isset($_GET['t'])) {if ($_GET['t'] == 1) {
							$result='<div class="alert alert-success fade in">Dados gravados com sucesso.</div>';
							echo "$result";
						} elseif ($_GET['t'] == 2) {
							$result='<div class="alert alert-danger fade in">Erro ao executar opera&ccedil;&atilde;o.</div>';
							echo "$result"; 
						}}
					?>   
				</div>
			</form>
			<div class="tableling">
				<?php include('resources/tab-ativ.php'); ?>
			</div>
		</div>
	</div>
	<div id="List" class="tabcontent">
		<div id="forms">
		<h2>Lista de Atividades / Modalidades</h2><br/>
			<form class="form-inline" method="POST" action="resources/insert_list.php">
				<div class="form-group">
					<label for="Cod">Código:</label>&nbsp;&nbsp;
					<input type="text" class="form-control" id="cd2" name="cd2" placeholder="C&Oacute;DIGO" readonly>
				</div>&nbsp;&nbsp;&nbsp;&nbsp;
				<br/><br/>
				<div class="form-group">
					<label for="Dia">Dia:</label>&nbsp;&nbsp;
					<select class="form-control" id="dia" name="dia">
						<?php include('resources/dias.php'); ?>
					</select>
				</div>&nbsp;&nbsp;&nbsp;&nbsp;
				<div class="form-group">
					<label for="Hour">Horário:</label>&nbsp;&nbsp;
					<input type="text" placeholder="hh:mm" class="form-control" id="hour" name="hour">
				</div><br/><br/>
				<div class="form-group" style="width: 100%;">
					<label for="Ds">Atividade:</label>&nbsp;&nbsp;
					<select class="form-control" id="ativ2" name="ativ2">
						<?php include('resources/ativ.php'); ?>
					</select>&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="submit" id="insert" name="insert" class="btn">Cadastrar</button>&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="submit" id="update" name="update" class="btn">Atualizar</button>
				</div><br/>
				<div class="messagebox" style="text-align: center;">		
					<?php 
						if (isset($_GET['t'])) {if ($_GET['t'] == 1) {
							$result='<div class="alert alert-success fade in">Dados gravados com sucesso.</div>';
							echo "$result";
						} elseif ($_GET['t'] == 2) {
							$result='<div class="alert alert-danger fade in">Erro ao executar opera&ccedil;&atilde;o.</div>';
							echo "$result"; 
						}}
					?>  
				</div>
				</form>
			<div class="tableling">
				<?php include('resources/tab-list.php'); ?>
			</div>
		</div>
	</div>
	<div id="Hours" class="tabcontent">
		<div id="forms">
		<h2>Dias da Semana</h2><br/>
			<div class="tableling">
				<?php include('resources/tab-dias.php'); ?>
			</div>
		</div>
	</div>
	<div id="Msg" class="tabcontent">
	<div id="forms">
		<h2>Mensagens</h2><br/>
			<form class="form-inline" method="POST" action="resources/insert_msg.php">
				<div class="form-group">
					<label for="Cod">Código:</label>&nbsp;&nbsp;
					<input type="text" class="form-control" id="cd3" name="cd3" placeholder="C&Oacute;DIGO" readonly>
				</div>
				<div class="checkbox">&nbsp;&nbsp;
					<label><input type="checkbox" id="chkAt3" name="chkAt3" checked>&nbsp;&nbsp;&nbsp;Ativo s/n?</label>
				</div><br/><br/>
				<div class="form-group" style="width: 100%;">
					<label for="Ds">Descri&ccedil;&atilde;o:</label>&nbsp;&nbsp;
					<input type="text" class="form-control" id="ds3" name="ds3" placeholder="DESCRI&Ccedil;&Atilde;O" style="width: 50%;" />&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="submit" id="insert" name="insert" class="btn">Cadastrar</button>&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="submit" id="update" name="update" class="btn">Atualizar</button>
				</div><br/>
				<div class="messagebox" style="text-align: center;">
					<?php 
						if (isset($_GET['t'])) {if ($_GET['t'] == 1) {
							$result='<div class="alert alert-success fade in">Dados gravados com sucesso.</div>';
							echo "$result";
						} elseif ($_GET['t'] == 2) {
							$result='<div class="alert alert-danger fade in">Erro ao executar opera&ccedil;&atilde;o.</div>';
							echo "$result"; 
						}}
					?>  
				</div>
			</form>
			<div class="tableling">
				<?php include('resources/tab-msg.php'); ?>
			</div>
		</div>
	</div>
	<div id="Rede" class="tabcontent">
	<div id="forms">
		<h2>Redes Sociais</h2><br/>
			<form class="form-inline" method="POST" action="resources/insert_rede.php">
				<div class="form-group">
					<label for="Cod">Código:</label>&nbsp;&nbsp;
					<input type="text" class="form-control" id="cd4" name="cd4" placeholder="C&Oacute;DIGO" readonly>
				</div>&nbsp;&nbsp;
				<div class="form-group">
					<label for="Cod">Rede Social:</label>&nbsp;&nbsp;
					<input type="text" class="form-control" id="rede" name="rede" placeholder="Rede Social">
				</div>
				<div class="checkbox">&nbsp;&nbsp;
					<label><input type="checkbox" id="chkAt4" name="chkAt4" checked>&nbsp;&nbsp;&nbsp;Ativo s/n?</label>
				</div><br/><br/>
				<div class="form-group" style="width: 100%;">
					<label for="Ds">Descri&ccedil;&atilde;o:</label>&nbsp;&nbsp;
					<input type="text" class="form-control" id="ds4" name="ds4" placeholder="DESCRI&Ccedil;&Atilde;O" style="width: 50%;" />&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="submit" id="insert" name="insert" class="btn">Cadastrar</button>&nbsp;&nbsp;&nbsp;&nbsp;
						<button type="submit" id="update" name="update" class="btn">Atualizar</button>
				</div><br/>
				<div class="messagebox" style="text-align: center;">
				    <?php 
						if (isset($_GET['t'])) {if ($_GET['t'] == 1) {
							$result='<div class="alert alert-success fade in">Dados gravados com sucesso.</div>';
							echo "$result";
						} elseif ($_GET['t'] == 2) {
							$result='<div class="alert alert-danger fade in">Erro ao executar opera&ccedil;&atilde;o.</div>';
							echo "$result"; 
						}}
					?>  
				</div>
			</form>
			<div class="tableling">
				<?php include('resources/tab-lowthird.php'); ?>
			</div>
		</div>
	</div>
	<div id="Home" class="tabcontent">
		<div id="forms">
			<h2>Bem - vindo!</h2><br/>
			<p>
				Atenção: Para funcionamento do Painel, é necessário fazer o Cadastro das Atividades / Modalidades.<br/><br/> Em seguida, você será capaz de montar sua Lista de Atividades por Dia e Horário.<br/><br/>
				É possível montar uma Lista de Mensagens e Rede Sociais para ser exibida aleatoriamente.
			</p>
		</div>
	</div>
</div>
	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
	  <div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">&times;</button>
		<h4 class="modal-title"><strong></strong></h4>
	  </div>
	   <div class="modal-body">
		 <form class="form-inline" method="POST" action="solicitacao.php">
			 <div class="form-group">
				<label for="Solic">Solicitante:</label>&nbsp;&nbsp;
				<input type="text" class="form-control" id="solic" name="solic" placeholder="USU&Aacute;rio MV"/>&nbsp;&nbsp;
				<button type="submit" id="chama" name="chama" class="btn btn-primary">Confirmar</button>
			 </div>
		 </form>
	   </div>
	   <div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
	  </div>
	</div>

	</div>
	</div>
	
<script language="javascript">
	$(document).ready(function() {
		$('#hour').mask('00:00');
		$(".alert").fadeOut(5000);
		var div = document.getElementById("<?php echo $div; ?>");
		eventFire(div, 'click');
	});
	function TabVerticalBar(evt, Item) {
		// var
		var i, tabcontent, tablinks;

		// Pega content
		tabcontent = document.getElementsByClassName("tabcontent");
		for (i = 0; i < tabcontent.length; i++) {
			tabcontent[i].style.display = "none";
		}

		// Pega link
		tablinks = document.getElementsByClassName("a-nav");
		for (i = 0; i < tablinks.length; i++) {
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		}

		// Muda ativo
		document.getElementById(Item).style.display = "block";
		evt.currentTarget.className += " active";
	}
	function eventFire(el, etype){
		if (el.fireEvent) {
			el.fireEvent('on' + etype);
		} else {
			var evObj = document.createEvent('Events');
			evObj.initEvent(etype, true, false);
			el.dispatchEvent(evObj);
		}
	}
</script>
</body>
</html>