<?php

$parametros = [":id"  => $_SESSION['id']];
$mensal = new Model();
$janeiro = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as janeiro FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 1 AND id_empresa=:id", $parametros);
foreach($janeiro as $mostrar):
$janeiro = $mostrar['janeiro'];
endforeach;

$fevereiro = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as fevereiro FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 2 AND id_empresa=:id", $parametros);
foreach($fevereiro as $mostrar):
$fevereiro = $mostrar['fevereiro'];
endforeach;

$marco = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as marco FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 3 AND id_empresa=:id", $parametros);
foreach($marco as $mostrar):
$marco = $mostrar['marco'];
endforeach;

$abril = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as abril FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 4 AND id_empresa=:id", $parametros);
foreach($abril as $mostrar):
$abril = $mostrar['abril'];
endforeach;

$maio = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as maio FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 5 AND id_empresa=:id", $parametros);
foreach($maio as $mostrar):
$maio = $mostrar['maio'];
endforeach;

$junho = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as junho FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 6 AND id_empresa=:id", $parametros);
foreach($junho as $mostrar):
$junho = $mostrar['junho'];
endforeach;

$julho = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as julho FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 7 AND id_empresa=:id", $parametros);
foreach($julho as $mostrar):
$julho = $mostrar['julho'];
endforeach;

$agosto = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as agosto FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 8 AND id_empresa=:id", $parametros);
foreach($agosto as $mostrar):
$agosto = $mostrar['agosto'];
endforeach;

$setembro = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as setembro FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 9 AND id_empresa=:id", $parametros);
foreach($setembro as $mostrar):
$setembro = $mostrar['setembro'];
endforeach;

$outubro = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as outubro FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 10 AND id_empresa=:id", $parametros);
foreach($outubro as $mostrar):
$outubro = $mostrar['outubro'];
endforeach;

$novembro = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as novembro FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 11 AND id_empresa=:id", $parametros);
foreach($novembro as $mostrar):
$novembro = $mostrar['novembro'];
endforeach;

$dezembro = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as dezembro FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 12 AND id_empresa=:id", $parametros);
foreach($dezembro as $mostrar):
$dezembro = $mostrar['dezembro'];
endforeach;

$candidaturas[] = (int)$janeiro;
$candidaturas[] = (int)$fevereiro;
$candidaturas[] = (int)$marco;
$candidaturas[] = (int)$abril;
$candidaturas[] = (int)$maio;
$candidaturas[] = (int)$junho;
$candidaturas[] = (int)$julho;
$candidaturas[] = (int)$agosto;
$candidaturas[] = (int)$setembro;
$candidaturas[] = (int)$outubro;
$candidaturas[] = (int)$novembro;
$candidaturas[] = (int)$dezembro;




// GRÁFICO DE VAGAS
$mensal = new Model();
$janeiro = $mensal->EXE_QUERY("SELECT count(id_candidatura) as janeiro FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 1 AND tb_vaga_estagio.id_empresa=:id AND estado_candidatura=1", $parametros);
foreach($janeiro as $mostrar):
$janeiro1 = $mostrar['janeiro'];
endforeach;

$fevereiro = $mensal->EXE_QUERY("SELECT count(id_candidatura) as fevereiro FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 2 AND tb_vaga_estagio.id_empresa=:id AND estado_candidatura=1", $parametros);
foreach($fevereiro as $mostrar):
$fevereiro2 = $mostrar['fevereiro'];
endforeach;

$marco = $mensal->EXE_QUERY("SELECT count(id_candidatura) as marco FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 3 AND tb_vaga_estagio.id_empresa=:id AND estado_candidatura=1", $parametros);
foreach($marco as $mostrar):
$marco3 = $mostrar['marco'];
endforeach;

$abril = $mensal->EXE_QUERY("SELECT count(id_candidatura) as abril FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 4 AND tb_vaga_estagio.id_empresa=:id AND estado_candidatura=1", $parametros);
foreach($abril as $mostrar):
$abril4 = $mostrar['abril'];
endforeach;

$maio = $mensal->EXE_QUERY("SELECT count(id_candidatura) as maio FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 5 AND tb_vaga_estagio.id_empresa=:id AND estado_candidatura=1", $parametros);
foreach($maio as $mostrar):
$maio5 = $mostrar['maio'];
endforeach;

$junho = $mensal->EXE_QUERY("SELECT count(id_candidatura) as junho FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 6 AND tb_vaga_estagio.id_empresa=:id AND estado_candidatura=1", $parametros);
foreach($junho as $mostrar):
$junho6 = $mostrar['junho'];
endforeach;

$julho = $mensal->EXE_QUERY("SELECT count(id_candidatura) as julho FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 7 AND tb_vaga_estagio.id_empresa=:id AND estado_candidatura=1", $parametros);
foreach($julho as $mostrar):
$julho7 = $mostrar['julho'];
endforeach;

$agosto = $mensal->EXE_QUERY("SELECT count(id_candidatura) as agosto FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 8 AND tb_vaga_estagio.id_empresa=:id AND estado_candidatura=1", $parametros);
foreach($agosto as $mostrar):
$agosto8 = $mostrar['agosto'];
endforeach;

$setembro = $mensal->EXE_QUERY("SELECT count(id_candidatura) as setembro FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 9 AND tb_vaga_estagio.id_empresa=:id AND estado_candidatura=1", $parametros);
foreach($setembro as $mostrar):
$setembro9 = $mostrar['setembro'];
endforeach;

$outubro = $mensal->EXE_QUERY("SELECT count(id_candidatura) as outubro FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 10 AND tb_vaga_estagio.id_empresa=:id AND estado_candidatura=1", $parametros);
foreach($outubro as $mostrar):
$outubro10 = $mostrar['outubro'];
endforeach;

$novembro = $mensal->EXE_QUERY("SELECT count(id_candidatura) as novembro FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 11 AND tb_vaga_estagio.id_empresa=:id AND estado_candidatura=1", $parametros);
foreach($novembro as $mostrar):
$novembro11 = $mostrar['novembro'];
endforeach;

$dezembro = $mensal->EXE_QUERY("SELECT count(id_candidatura) as dezembro FROM tb_candidatura_vaga
INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
WHERE month(data_registro_candidatura) = 12 AND tb_vaga_estagio.id_empresa=:id AND estado_candidatura=1", $parametros);
foreach($dezembro as $mostrar):
$dezembro12 = $mostrar['dezembro'];
endforeach;

$dataEstagiario[] = (int)$janeiro1;
$dataEstagiario[] = (int)$fevereiro2;
$dataEstagiario[] = (int)$marco3;
$dataEstagiario[] = (int)$abril4;
$dataEstagiario[] = (int)$maio5;
$dataEstagiario[] = (int)$junho6;
$dataEstagiario[] = (int)$julho7;
$dataEstagiario[] = (int)$agosto8;
$dataEstagiario[] = (int)$setembro9;
$dataEstagiario[] = (int)$outubro10;
$dataEstagiario[] = (int)$novembro11;
$dataEstagiario[] = (int)$dezembro12;
