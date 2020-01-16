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
	 <div class='panel-heading'>Atividades / Modalidades</div>\n
	 <div class='panel-body'>\n";
echo "<table class='table table-dark table-bordered table-hover'>\n";
echo "<thead class='thead-inverse'>\n";
echo "<tr>\n";
echo "<th scope='col'></th>\n";
echo "<th scope='col'>C&oacute;d.</th>\n";
echo "<th scope='col'>Descri&ccedil;&atilde;o</th>\n";
echo "<th scope='col'>Situa&ccedil;&atilde;o</th>\n";
echo "</tr>\n";
echo "</thead>\n";
echo "<tbody>\n";
$stid = pg_exec(pgdb('CLT'), $selectAtiv);
while ($row = pg_fetch_array($stid)) {

	echo "<tr class='table-default'>\n";
	
	if ($row[2] == 'S') {
		$ativo = "Ativo";
	} else {
		$ativo = "Desativado";
	}
	echo "<td class='sys'></td>\n";
	echo "<td class='CD' width='90px'>$row[0]</td>\n";
	echo "<td class='DESCR'>$row[1]</td>\n";
	echo "<td class='ATIVO' width='160px'>$ativo</td>\n";

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
        var chk = $(this).find('.ATIVO').text();
		var ds = $(this).find('.DESCR').text();

		if (chk == 'Ativo') {
			ativ = true;
		} else {
			ativ = false;
		}
		document.getElementById("cd").value = id;
		document.getElementById("chkAt").checked = ativ;
		document.getElementById("ds").value = ds;

    });
    </script>
