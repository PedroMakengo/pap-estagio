<?php

$parametros = [":id"  => $_GET['id']];
$mensal = new Model();

$janeiro = $mensal->EXE_QUERY("SELECT count(id_relatorio) as janeiro FROM tb_relatorio_estagio
WHERE month(data_registro_relatorio) = 1 and id_aluno=:id", $parametros);
foreach($janeiro as $mostrar):
$janeiro = $mostrar['janeiro'];
endforeach;

$fevereiro = $mensal->EXE_QUERY("SELECT count(id_relatorio) as fevereiro FROM tb_relatorio_estagio
WHERE month(data_registro_relatorio) = 2 and id_aluno=:id", $parametros);
foreach($fevereiro as $mostrar):
$fevereiro = $mostrar['fevereiro'];
endforeach;

$marco = $mensal->EXE_QUERY("SELECT count(id_relatorio) as marco FROM tb_relatorio_estagio
WHERE month(data_registro_relatorio) = 3 and id_aluno=:id", $parametros);
foreach($marco as $mostrar):
$marco = $mostrar['marco'];
endforeach;

$abril = $mensal->EXE_QUERY("SELECT count(id_relatorio) as abril FROM tb_relatorio_estagio
WHERE month(data_registro_relatorio) = 4 and id_aluno=:id", $parametros);
foreach($abril as $mostrar):
$abril = $mostrar['abril'];
endforeach;

$maio = $mensal->EXE_QUERY("SELECT count(id_relatorio) as maio FROM tb_relatorio_estagio
WHERE month(data_registro_relatorio) = 5 and id_aluno=:id", $parametros);
foreach($maio as $mostrar):
$maio = $mostrar['maio'];
endforeach;

$junho = $mensal->EXE_QUERY("SELECT count(id_relatorio) as junho FROM tb_relatorio_estagio
WHERE month(data_registro_relatorio) = 6 and id_aluno=:id", $parametros);
foreach($junho as $mostrar):
$junho = $mostrar['junho'];
endforeach;

$julho = $mensal->EXE_QUERY("SELECT count(id_relatorio) as julho FROM tb_relatorio_estagio
WHERE month(data_registro_relatorio) = 7 and id_aluno=:id", $parametros);
foreach($julho as $mostrar):
$julho = $mostrar['julho'];
endforeach;

$agosto = $mensal->EXE_QUERY("SELECT count(id_relatorio) as agosto FROM tb_relatorio_estagio
WHERE month(data_registro_relatorio) = 8 and id_aluno=:id", $parametros);
foreach($agosto as $mostrar):
$agosto = $mostrar['agosto'];
endforeach;

$setembro = $mensal->EXE_QUERY("SELECT count(id_relatorio) as setembro FROM tb_relatorio_estagio
WHERE month(data_registro_relatorio) = 9 and id_aluno=:id", $parametros);
foreach($setembro as $mostrar):
$setembro = $mostrar['setembro'];
endforeach;

$outubro = $mensal->EXE_QUERY("SELECT count(id_relatorio) as outubro FROM tb_relatorio_estagio
WHERE month(data_registro_relatorio) = 10 and id_aluno=:id", $parametros);
foreach($outubro as $mostrar):
$outubro = $mostrar['outubro'];
endforeach;

$novembro = $mensal->EXE_QUERY("SELECT count(id_relatorio) as novembro FROM tb_relatorio_estagio
WHERE month(data_registro_relatorio) = 11 and id_aluno=:id", $parametros);
foreach($novembro as $mostrar):
$novembro = $mostrar['novembro'];
endforeach;

$dezembro = $mensal->EXE_QUERY("SELECT count(id_relatorio) as dezembro FROM tb_relatorio_estagio
WHERE month(data_registro_relatorio) = 12 and id_aluno=:id", $parametros);
foreach($dezembro as $mostrar):
$dezembro = $mostrar['dezembro'];
endforeach;

$atividadeGrafico[] = (int)$janeiro;
$atividadeGrafico[] = (int)$fevereiro;
$atividadeGrafico[] = (int)$marco;
$atividadeGrafico[] = (int)$abril;
$atividadeGrafico[] = (int)$maio;
$atividadeGrafico[] = (int)$junho;
$atividadeGrafico[] = (int)$julho;
$atividadeGrafico[] = (int)$agosto;
$atividadeGrafico[] = (int)$setembro;
$atividadeGrafico[] = (int)$outubro;
$atividadeGrafico[] = (int)$novembro;
$atividadeGrafico[] = (int)$dezembro;

// echo json_encode($mensalEmpresas);
