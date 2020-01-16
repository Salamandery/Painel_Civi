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

error_reporting(0);

function pgdb($nome_db) {
	   $user = "postgres";
	   $senha = "1234"; 
	   $bd = "localhost";	
	   $pg_conexao = pg_connect("host=$bd port=5432 dbname=$nome_db user=$user password=$senha");
		// connection
		if ($pg_conexao)   
		//echo "Conexão bem sucedida."; 
			return $pg_conexao;
		else														   
		//echo "Erro na conexão com o Oracle.";	
			return null;
}
?>