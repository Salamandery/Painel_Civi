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



		require_once ("resources/dbconnect.php");
		require_once ("resources/queries.php");
	
			$stid = pg_exec(pgdb('CLT'), $selectAtiv);

			echo "<option value='n' selected>< -- SELECIONE O MODELO -- ></option>\n";
			
			while ($row = pg_fetch_array($stid)) {
			
				echo "<option value='$row[0]'>$row[1]</option>\n";
			}
?>