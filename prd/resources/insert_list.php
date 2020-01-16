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
      require_once('dbconnect.php');
      require_once('queries.php');

      $cd = $_POST['cd2'];
      $dia = $_POST['dia'];
      $hr = $_POST['hour'];
      $ativ = $_POST['ativ2'];
    

      if (isset($_POST['insert'])) {
        $insert = 'insert';
      }
      if (isset($_POST['update'])) {
        $update = 'update';
      }

      if ($insert == 'insert') {
        // echo "<script>console.log('INSERT INTO dias_atividade (cd_dia, cd_atividade, hr_atividade, sn_ativo) values ($dia, $ativ, to_date($hr, yyyy-mm-dd HH24:MI), $sn)');</script>";
        $stid = pg_exec(pgdb('CLT'),"INSERT INTO dias_atividade (cd_dia, cd_atividade, hr_atividade) values ($dia, $ativ, to_timestamp('0001-01-01 $hr', 'yyyy-mm-dd HH24:MI'))");

        if ($stid) {
            $t = 1;
            echo "<script language='javascript' type='text/javascript'>
            alert('Cadastro realizado com sucesso!');
            </script>";
           //header('location:../gerenciador.php');
        } else {
            $t = 2;
            echo "<script language='javascript' type='text/javascript'>
            alert('Erro ao cadastrar!');
            </script>";
            //header('location:../gerenciador.php');
        }
        Header("location:../gerenciador.php?f=listBtn&t=$t");
      } else {
          ECHO "NAO - $update - $insert";

        if ($update == 'update') {
            // echo "<script>console.log('UPDATE dias_atividade SET cd_dia = $dia, cd_atividade = $ativ, hr_atividade = to_timestamp('0001-01-01 $hr', 'yyyy-mm-dd HH24:MI'), sn_ativo = $sn WHERE cd_dias_atividade = $cd');</script>";

            $stid = pg_exec(pgdb('CLT'),"UPDATE dias_atividade SET cd_dia = $dia, cd_atividade = $ativ, hr_atividade = to_timestamp('0001-01-01 $hr', 'yyyy-mm-dd HH24:MI') WHERE cd_dias_atividade = $cd");

            if ($stid) {
                $t = 1;
                echo "<script language='javascript' type='text/javascript'>
                alert('Cadastro realizado com sucesso!');
                </script>";
            //header('location:../gerenciador.php');
            } else {
                $t = 2;
                echo "<script language='javascript' type='text/javascript'>
                alert('Erro ao cadastrar!');
                </script>";
                //header('location:../gerenciador.php');
            }
        }
        Header("location:../gerenciador.php?f=listBtn&t=$t");
    }
?>