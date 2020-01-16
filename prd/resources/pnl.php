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



	  date_default_timezone_set('America/Sao_Paulo');
	  use Climatempo\Climatempo;
	  error_reporting(0);
	  require_once('resources/Climatempo.php');
	  require_once('resources/Wrapper.php');
	  require_once('resources/Forecast.php');
	  require_once('resources/Weather.php');
	  require_once('resources/dbconnect.php');
	  GLOBAL $msg;
	  GLOBAL $graus;
	  GLOBAL $ico;
	  GLOBAL $dias;
	  GLOBAL $graus;
	  GLOBAL $ico;
	  
	  $data = date('Y-m-d');
	  $dias = date('w', strtotime($data));
	  
	  VerificaTemperatura();
	  $msg = firstMSG();
	  $social = firstSocial();
	  if ($graus == '' && $ico == '') {
		getTemperatura();
	  }

// CORPO PAINEL

$stid = pg_exec(pgdb('CLT'), "SELECT a.ds_atividade, d.ds_dia, to_char(t.hr_atividade, 'HH24:MI') FROM atividades a, dias_semana d, dias_atividade t WHERE a.cd_atividade = t.cd_atividade AND d.cd_dia = t.cd_dia AND d.id_dia = $dias ORDER BY 3");
$i = 1;
$id = 1;
$atual = date("H");
while ($row = pg_fetch_assoc($stid)) {
	foreach ($row as $item) {
		if ($i == 1) {
			$ativ = $item;
			$i++;
		}	
		elseif ($i == 2) {
			$dia = $item;
			$i++;
		} 
		elseif ($i == 3) {
			$hr = $item;
			$aux = explode(":", $hr);
			if ($aux[0] >= $atual && $aux[0] <= ($atual+4) ) {
				echo "<at class='ativ".$id."'>
						<ativ>$ativ</ativ>
						<hora>$hr</hora>
				</at>\n";
				$id++;
			}
			$i++;
		}
	}
	$i = 1;
	if ($id > 4) {
		break;
	}
}
echo "<div class='container'>
		<div class='timer'></div>
		  <div class='slideshow'>
			<div class='slide'><img src='resources/images/slide/01.jpg'></div>
			<div class='slide'><img src='resources/images/slide/02.jpg'></div>
			<div class='slide'><img src='resources/images/slide/03.jpg'></div>
			<div class='slide'><img src='resources/images/slide/04.jpg'></div>
		  </div>
		  <div id='gifa' class='gif'>
		  <img id='anim' src='resources/images/doc2.gif' style='width: 100%; height: 100%;'/>
		  <div class='msg'>
			<span id='msgspan'>$msg</span>
		  </div>
			<div class='lowthird'>
				<span id='lowthird'>$social</span>
			</div>
		  </div>
	  </div>";
echo "<table class='forecast'>
	<tr>
		<td>
			<img class='icon' src='$ico'/>
		</td>
		<td>
			<graus>$graus</graus>
		</td>
	</tr>
</table>";

// EVENTOS
function getTemperatura() {
	GLOBAL $graus;
	GLOBAL $ico;

	$token      = '85bcbf6563490e3d4c9855da53c6b280';
	$id         = 4970;
	$climatempo = new Climatempo($token);
	
	try {
		$weather = $climatempo->current($id);
	} catch (Exception $e) {
		echo '<b>Error: </b>'.$e->getMessage();
		die();
	}
	
	$insertCT = pg_exec(pgdb('CLT'), "INSERT INTO clima_tempo (dt_clima, graus, icon) values (current_timestamp, '$weather->temperature °C', 'resources/images/$weather->icon.png')");
	$graus = "$weather->temperature °C";
	$ico = "resources/images/$weather->icon.png";
}

function VerificaTemperatura() {
	GLOBAL $graus;
	GLOBAL $ico;
	
	$tempo = pg_exec(pgdb('CLT'), "SELECT graus, icon, dt_clima FROM clima_tempo WHERE to_char(dt_clima, 'yyyy-mm-dd') = to_char(current_timestamp, 'yyyy-mm-dd') and sn_ativo = 'S' order by 3 desc");
	$t = 1;
	if ($row = pg_fetch_assoc($tempo)) {
		foreach ($row as $item) {
			if ($t == 1) {
				$graus = $item;
				$t++;
			}
			elseif ($t == 2) {
				$ico = $item;
				$t++;
			}
		}
	}
}
function firstMSG() {
	$stids = pg_exec(pgdb('CLT'), "SELECT ds_msg FROM mensagem WHERE sn_ativo = 'S'");
	while ($row = pg_fetch_assoc($stids)) {
		foreach ($row as $item) {
			$aux = $item;
		}
	}
	return $aux;
}

function firstSocial() {
	$stids = pg_exec(pgdb('CLT'), "SELECT rede_social ||': '|| ds_social FROM rede_social WHERE sn_ativo = 'S'");
	while ($row = pg_fetch_assoc($stids)) {
		foreach ($row as $item) {
			$aux = $item;
		}
	}
	return $aux;
}

function redeSocial() {
	$stids = pg_exec(pgdb('CLT'), "SELECT rede_social ||':  '|| ds_social FROM rede_social WHERE sn_ativo = 'S'");
	while ($row = pg_fetch_assoc($stids)) {
		foreach ($row as $item) {
			$aux[] = $item;
		}
	}
	return json_encode($aux);
}

function getMSG() {
	$aux;
	$stids = pg_exec(pgdb('CLT'), "SELECT ds_msg FROM mensagem WHERE sn_ativo = 'S'");
	while ($row = pg_fetch_assoc($stids)) {
		foreach ($row as $item) {
			$aux[] = $item;
		}
	}
	return json_encode($aux);
}



echo "<script language='javascript'>$(document).ready(function() {
	$('.msg').each(function() {
		$(this).textfill({
			maxFontPixels: 56,
			minFontPixels: 1,
			changeLineHeight: true
		});
	});
	$('.lowthird').each(function() {
		$(this).textfill({
			maxFontPixels: 28,
			minFontPixels: 1,
			changeLineHeight: true
		});
	});
    $('ativ').each(function() {
		$(this).textfill({
			innerTag: 'ativ',
			maxFontPixels: 90,
			minFontPixels: 1,
			changeLineHeight: true
		});
	});
	$('hora').each(function() {
		$(this).textfill({
			innerTag: 'hora',
			maxFontPixels: 150,
			minFontPixels: 1,
			changeLineHeight: true
		});
	});
	var esc;
	var anima;
	var msg = new Array();
	var rede = new Array();
	
	msg = ".getMSG().";
	rede = ".redeSocial().";

	Esc();
	
	function Anima() {
		var div = document.getElementById('gifa');
		
	    anima = window.setTimeout(function() { 
		if (div.style.display === 'none') {
			div.style.display = 'block';
			
			document.getElementById('anim').src='resources/images/doc2.gif';
			Rede();
			Esc();
		} else {
			div.style.display = 'none';

			document.getElementById('anim').src='';

			Rede();
			MSG();
			Esc();
		}}, 5000);

	}
	
	function MSG() {
		var i = Math.floor(msg.length*Math.random());
		document.getElementById('msgspan').innerHTML = msg[i];
	}
	function Rede() {
		var i = Math.floor(msg.length*Math.random());
		document.getElementById('lowthird').innerHTML = rede[i];
	}

	function Esc() {
		esc = window.setTimeout(function() { 
			Anima();
		}, 10000);
	}
	});</script>";
?>