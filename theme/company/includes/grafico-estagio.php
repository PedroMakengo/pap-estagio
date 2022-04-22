<?php

$parametros = [":id"  => $_SESSION['id']];
$mensal = new Model();

$janeiro = $mensal->EXE_QUERY("SELECT count(id_empresa) as janeiro FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 1 AND tb_vaga_estagio.id_empresa=:id", $parametros);
foreach($janeiro as $mostrar):
$janeiro = $mostrar['janeiro'];
endforeach;

$fevereiro = $mensal->EXE_QUERY("SELECT count(id_empresa) as fevereiro FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 2 AND tb_vaga_estagio.id_empresa=:id", $parametros);
foreach($fevereiro as $mostrar):
$fevereiro = $mostrar['fevereiro'];
endforeach;

$marco = $mensal->EXE_QUERY("SELECT count(id_empresa) as marco FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 3 AND tb_vaga_estagio.id_empresa=:id", $parametros);
foreach($marco as $mostrar):
$marco = $mostrar['marco'];
endforeach;

$abril = $mensal->EXE_QUERY("SELECT count(id_empresa) as abril FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 4 AND tb_vaga_estagio.id_empresa=:id", $parametros);
foreach($abril as $mostrar):
$abril = $mostrar['abril'];
endforeach;

$maio = $mensal->EXE_QUERY("SELECT count(id_empresa) as maio FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 5 AND tb_vaga_estagio.id_empresa=:id", $parametros);
foreach($maio as $mostrar):
$maio = $mostrar['maio'];
endforeach;

$junho = $mensal->EXE_QUERY("SELECT count(id_empresa) as junho FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 6 AND tb_vaga_estagio.id_empresa=:id", $parametros);
foreach($junho as $mostrar):
$junho = $mostrar['junho'];
endforeach;

$julho = $mensal->EXE_QUERY("SELECT count(id_empresa) as julho FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 7 AND tb_vaga_estagio.id_empresa=:id", $parametros);
foreach($julho as $mostrar):
$julho = $mostrar['julho'];
endforeach;

$agosto = $mensal->EXE_QUERY("SELECT count(id_empresa) as agosto FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 8 AND tb_vaga_estagio.id_empresa=:id", $parametros);
foreach($agosto as $mostrar):
$agosto = $mostrar['agosto'];
endforeach;

$setembro = $mensal->EXE_QUERY("SELECT count(id_empresa) as setembro FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 9 AND tb_vaga_estagio.id_empresa=:id", $parametros);
foreach($setembro as $mostrar):
$setembro = $mostrar['setembro'];
endforeach;

$outubro = $mensal->EXE_QUERY("SELECT count(id_empresa) as outubro FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 10 AND tb_vaga_estagio.id_empresa=:id", $parametros);
foreach($outubro as $mostrar):
$outubro = $mostrar['outubro'];
endforeach;

$novembro = $mensal->EXE_QUERY("SELECT count(id_empresa) as novembro FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 11 AND tb_vaga_estagio.id_empresa=:id", $parametros);
foreach($novembro as $mostrar):
$novembro = $mostrar['novembro'];
endforeach;

$dezembro = $mensal->EXE_QUERY("SELECT count(id_empresa) as dezembro FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 12 AND tb_vaga_estagio.id_empresa=:id", $parametros);
foreach($dezembro as $mostrar):
$dezembro = $mostrar['dezembro'];
endforeach;

$estagioMensal[] = (int)$janeiro;
$estagioMensal[] = (int)$fevereiro;
$estagioMensal[] = (int)$marco;
$estagioMensal[] = (int)$abril;
$estagioMensal[] = (int)$maio;
$estagioMensal[] = (int)$junho;
$estagioMensal[] = (int)$julho;
$estagioMensal[] = (int)$agosto;
$estagioMensal[] = (int)$setembro;
$estagioMensal[] = (int)$outubro;
$estagioMensal[] = (int)$novembro;
$estagioMensal[] = (int)$dezembro;

// echo json_encode($mensalEmpresas);
