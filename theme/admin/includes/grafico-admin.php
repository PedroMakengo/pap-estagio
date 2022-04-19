<?php

$mensal = new Model();

$janeiro = $mensal->EXE_QUERY("SELECT count(id_empresa) as janeiro FROM tb_empresa
WHERE month(data_registro_empresa) = 1");
foreach($janeiro as $mostrar):
$janeiro = $mostrar['janeiro'];
endforeach;

$fevereiro = $mensal->EXE_QUERY("SELECT count(id_empresa) as fevereiro FROM tb_empresa
WHERE month(data_registro_empresa) = 2");
foreach($fevereiro as $mostrar):
$fevereiro = $mostrar['fevereiro'];
endforeach;

$marco = $mensal->EXE_QUERY("SELECT count(id_empresa) as marco FROM tb_empresa
WHERE month(data_registro_empresa) = 3");
foreach($marco as $mostrar):
$marco = $mostrar['marco'];
endforeach;

$abril = $mensal->EXE_QUERY("SELECT count(id_empresa) as abril FROM tb_empresa
WHERE month(data_registro_empresa) = 4");
foreach($abril as $mostrar):
$abril = $mostrar['abril'];
endforeach;

$maio = $mensal->EXE_QUERY("SELECT count(id_empresa) as maio FROM tb_empresa
WHERE month(data_registro_empresa) = 5");
foreach($maio as $mostrar):
$maio = $mostrar['maio'];
endforeach;

$junho = $mensal->EXE_QUERY("SELECT count(id_empresa) as junho FROM tb_empresa
WHERE month(data_registro_empresa) = 6");
foreach($junho as $mostrar):
$junho = $mostrar['junho'];
endforeach;

$julho = $mensal->EXE_QUERY("SELECT count(id_empresa) as julho FROM tb_empresa
WHERE month(data_registro_empresa) = 7");
foreach($julho as $mostrar):
$julho = $mostrar['julho'];
endforeach;

$agosto = $mensal->EXE_QUERY("SELECT count(id_empresa) as agosto FROM tb_empresa
WHERE month(data_registro_empresa) = 8");
foreach($agosto as $mostrar):
$agosto = $mostrar['agosto'];
endforeach;

$setembro = $mensal->EXE_QUERY("SELECT count(id_empresa) as setembro FROM tb_empresa
WHERE month(data_registro_empresa) = 9");
foreach($setembro as $mostrar):
$setembro = $mostrar['setembro'];
endforeach;

$outubro = $mensal->EXE_QUERY("SELECT count(id_empresa) as outubro FROM tb_empresa
WHERE month(data_registro_empresa) = 10");
foreach($outubro as $mostrar):
$outubro = $mostrar['outubro'];
endforeach;

$novembro = $mensal->EXE_QUERY("SELECT count(id_empresa) as novembro FROM tb_empresa
WHERE month(data_registro_empresa) = 11");
foreach($novembro as $mostrar):
$novembro = $mostrar['novembro'];
endforeach;

$dezembro = $mensal->EXE_QUERY("SELECT count(id_empresa) as dezembro FROM tb_empresa
WHERE month(data_registro_empresa) = 12");
foreach($dezembro as $mostrar):
$dezembro = $mostrar['dezembro'];
endforeach;

$empresaMensal[] = (int)$janeiro;
$empresaMensal[] = (int)$fevereiro;
$empresaMensal[] = (int)$marco;
$empresaMensal[] = (int)$abril;
$empresaMensal[] = (int)$maio;
$empresaMensal[] = (int)$junho;
$empresaMensal[] = (int)$julho;
$empresaMensal[] = (int)$agosto;
$empresaMensal[] = (int)$setembro;
$empresaMensal[] = (int)$outubro;
$empresaMensal[] = (int)$novembro;
$empresaMensal[] = (int)$dezembro;

// echo json_encode($empresaMensal);
