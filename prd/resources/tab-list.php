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
require_once ("resources/dbconnect.php");
require_once ("resources/queries.php");

echo "<div class='panel'>\n
	 <div class='panel-heading'>Dias da Semana</div>\n
	 <div class='panel-body'>\n";
echo "<table class='table table-dark table-bordered table-hover'>\n";
echo "<thead class='thead-inverse'>\n";
echo "<tr>\n";
echo "<th scope='col'>Cód.</th>\n";
echo "<th scope='col'>Dia</th>\n";
echo "<th scope='col'>Atividade / Modalidade</th>\n";
echo "<th scope='col'>Horário</th>\n";
echo "</tr>\n";
echo "</thead>\n";
echo "<tbody>\n";
$stid = pg_exec(pgdb('CLT'), $selectLista);
while ($row = pg_fetch_array($stid)) {

	echo "<tr class='table-default'>\n";
	if ($row[3] == 'S') {
		$ativo = "Ativo";
	} else {
		$ativo = "Desativado";
	}
	echo "<td class='CD' width='200px'>$row[0]</td>\n";
	echo "<td class='DIA' width='200px'>$row[1]</td>\n";
	echo "<td class='ATIV'>$row[2]</td>\n";
	echo "<td class='HOUR'>$row[3]</td>\n";

	echo "</tr>\n";
	
}
echo "</tbody>\n";
echo "</table>\n";
echo "</div>\n				
	  </div>";
?>
	<script type="text/javascript">
    $("tr").click(function() {

		var id = $(this).find('.CD').text();
		var hr = $(this).find('.HOUR').text();

		document.getElementById("cd2").value = id;
		document.getElementById("hour").value = hr;

    });
    </script>
