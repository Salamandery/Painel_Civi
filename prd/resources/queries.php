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

$selectAtiv = "SELECT cd_atividade, ds_atividade, sn_ativo FROM atividades ORDER BY 2 asc, 3 asc";

$selectDias = "SELECT cd_dia, ds_dia FROM dias_semana ORDER BY 1";

$selectLista = "SELECT t.cd_dias_atividade, d.ds_dia, a.ds_atividade, to_char(t.hr_atividade, 'HH24:MI') FROM atividades a, dias_semana d, dias_atividade t WHERE d.cd_dia = t.cd_dia AND a.cd_atividade = t.cd_atividade AND t.sn_ativo = 'S' ORDER BY 4 asc, 1 asc";

$selectMsg = "SELECT cd_msg, ds_msg, sn_ativo FROM mensagem ORDER BY 1";

$selectRede = "SELECT cd_social, ds_social, rede_social, sn_ativo FROM rede_social ORDER BY 1";
?>