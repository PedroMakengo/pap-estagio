<?php

$mensal = new Model();

$janeiro = $mensal->EXE_QUERY("SELECT count(id_empresa) as janeiro FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 1", $parametros);
foreach($janeiro as $mostrar):
$janeiro = $mostrar['janeiro'];
endforeach;

$fevereiro = $mensal->EXE_QUERY("SELECT count(id_empresa) as fevereiro FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 2", $parametros);
foreach($fevereiro as $mostrar):
$fevereiro = $mostrar['fevereiro'];
endforeach;

$marco = $mensal->EXE_QUERY("SELECT count(id_empresa) as marco FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 3", $parametros);
foreach($marco as $mostrar):
$marco = $mostrar['marco'];
endforeach;

$abril = $mensal->EXE_QUERY("SELECT count(id_empresa) as abril FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 4", $parametros);
foreach($abril as $mostrar):
$abril = $mostrar['abril'];
endforeach;

$maio = $mensal->EXE_QUERY("SELECT count(id_empresa) as maio FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 5", $parametros);
foreach($maio as $mostrar):
$maio = $mostrar['maio'];
endforeach;

$junho = $mensal->EXE_QUERY("SELECT count(id_empresa) as junho FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 6", $parametros);
foreach($junho as $mostrar):
$junho = $mostrar['junho'];
endforeach;

$julho = $mensal->EXE_QUERY("SELECT count(id_empresa) as julho FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 7", $parametros);
foreach($julho as $mostrar):
$julho = $mostrar['julho'];
endforeach;

$agosto = $mensal->EXE_QUERY("SELECT count(id_empresa) as agosto FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 8", $parametros);
foreach($agosto as $mostrar):
$agosto = $mostrar['agosto'];
endforeach;

$setembro = $mensal->EXE_QUERY("SELECT count(id_empresa) as setembro FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 9", $parametros);
foreach($setembro as $mostrar):
$setembro = $mostrar['setembro'];
endforeach;

$outubro = $mensal->EXE_QUERY("SELECT count(id_empresa) as outubro FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 10", $parametros);
foreach($outubro as $mostrar):
$outubro = $mostrar['outubro'];
endforeach;

$novembro = $mensal->EXE_QUERY("SELECT count(id_empresa) as novembro FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 11", $parametros);
foreach($novembro as $mostrar):
$novembro = $mostrar['novembro'];
endforeach;

$dezembro = $mensal->EXE_QUERY("SELECT count(id_empresa) as dezembro FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 12", $parametros);
foreach($dezembro as $mostrar):
$dezembro = $mostrar['dezembro'];
endforeach;

$alunoMensal[] = (int)$janeiro;
$alunoMensal[] = (int)$fevereiro;
$alunoMensal[] = (int)$marco;
$alunoMensal[] = (int)$abril;
$alunoMensal[] = (int)$maio;
$alunoMensal[] = (int)$junho;
$alunoMensal[] = (int)$julho;
$alunoMensal[] = (int)$agosto;
$alunoMensal[] = (int)$setembro;
$alunoMensal[] = (int)$outubro;
$alunoMensal[] = (int)$novembro;
$alunoMensal[] = (int)$dezembro;

// echo json_encode($mensalEmpresas);
