<?php

$mensal = new Model();
$janeiro = $mensal->EXE_QUERY("SELECT count(id_candidatura) as janeiro FROM tb_candidatura_vaga
WHERE month(data_registro_candidatura) = 1 ");
foreach($janeiro as $mostrar):
$janeiro = $mostrar['janeiro'];
endforeach;

$fevereiro = $mensal->EXE_QUERY("SELECT count(id_candidatura) as fevereiro FROM tb_candidatura_vaga
WHERE month(data_registro_candidatura) = 2 ");
foreach($fevereiro as $mostrar):
$fevereiro = $mostrar['fevereiro'];
endforeach;

$marco = $mensal->EXE_QUERY("SELECT count(id_candidatura) as marco FROM tb_candidatura_vaga
WHERE month(data_registro_candidatura) = 3 ");
foreach($marco as $mostrar):
$marco = $mostrar['marco'];
endforeach;

$abril = $mensal->EXE_QUERY("SELECT count(id_candidatura) as abril FROM tb_candidatura_vaga
WHERE month(data_registro_candidatura) = 4 ");
foreach($abril as $mostrar):
$abril = $mostrar['abril'];
endforeach;

$maio = $mensal->EXE_QUERY("SELECT count(id_candidatura) as maio FROM tb_candidatura_vaga
WHERE month(data_registro_candidatura) = 5 ");
foreach($maio as $mostrar):
$maio = $mostrar['maio'];
endforeach;

$junho = $mensal->EXE_QUERY("SELECT count(id_candidatura) as junho FROM tb_candidatura_vaga
WHERE month(data_registro_candidatura) = 6 ");
foreach($junho as $mostrar):
$junho = $mostrar['junho'];
endforeach;

$julho = $mensal->EXE_QUERY("SELECT count(id_candidatura) as julho FROM tb_candidatura_vaga
WHERE month(data_registro_candidatura) = 7 ");
foreach($julho as $mostrar):
$julho = $mostrar['julho'];
endforeach;

$agosto = $mensal->EXE_QUERY("SELECT count(id_candidatura) as agosto FROM tb_candidatura_vaga
WHERE month(data_registro_candidatura) = 8 ");
foreach($agosto as $mostrar):
$agosto = $mostrar['agosto'];
endforeach;

$setembro = $mensal->EXE_QUERY("SELECT count(id_candidatura) as setembro FROM tb_candidatura_vaga
WHERE month(data_registro_candidatura) = 9 ");
foreach($setembro as $mostrar):
$setembro = $mostrar['setembro'];
endforeach;

$outubro = $mensal->EXE_QUERY("SELECT count(id_candidatura) as outubro FROM tb_candidatura_vaga
WHERE month(data_registro_candidatura) = 10 ");
foreach($outubro as $mostrar):
$outubro = $mostrar['outubro'];
endforeach;

$novembro = $mensal->EXE_QUERY("SELECT count(id_candidatura) as novembro FROM tb_candidatura_vaga
WHERE month(data_registro_candidatura) = 11 ");
foreach($novembro as $mostrar):
$novembro = $mostrar['novembro'];
endforeach;

$dezembro = $mensal->EXE_QUERY("SELECT count(id_candidatura) as dezembro FROM tb_candidatura_vaga
WHERE month(data_registro_candidatura) = 12 ");
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

// echo json_encode($mensalEmpresas);


// TRABALHANDO NO GRÁFICO DE ESTUDANTES POR SEXO


$genero = new Model();
$genero_masculino = $genero->EXE_QUERY("SELECT count(id_aluno) as masculino FROM tb_aluno WHERE sexo='M'");
foreach($genero_masculino as $mostrar):
  $masculino = $mostrar['masculino'];
endforeach;

$genero_femenino = $genero->EXE_QUERY("SELECT count(id_aluno) as femenino FROM tb_aluno
WHERE sexo='F' ");
foreach($genero_femenino as $mostrar):
  $femenino = $mostrar['femenino'];
endforeach;

$dataSexo[] = (int)$masculino;
$dataSexo[] = (int)$femenino;





// GRÁFICO DE VAGAS
$janeiroVaga = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as janeiro FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 1 ");
foreach($janeiroVaga as $mostrar):
$janeiroMensal = $mostrar['janeiro'];
endforeach;

$fevereiroVaga = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as fevereiro FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 2 ");
foreach($fevereiroVaga as $mostrar):
$fevereiroMensal = $mostrar['fevereiro'];
endforeach;

$marcoVaga = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as marco FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 3 ");
foreach($marcoVaga as $mostrar):
$marcoMensal = $mostrar['marco'];
endforeach;

$abrilVaga = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as abril FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 4 ");
foreach($abrilVaga as $mostrar):
$abrilMensal = $mostrar['abril'];
endforeach;

$maioVaga = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as maio FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 5 ");
foreach($maioVaga as $mostrar):
$maioMensal = $mostrar['maio'];
endforeach;

$junhoVaga = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as junho FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 6 ");
foreach($junhoVaga as $mostrar):
$junhoMensal = $mostrar['junho'];
endforeach;

$julhoVaga = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as julho FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 7 ");
foreach($julhoVaga as $mostrar):
$julhoMensal = $mostrar['julho'];
endforeach;

$agostoVaga = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as agosto FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 8 ");
foreach($agostoVaga as $mostrar):
$agostoMensal = $mostrar['agosto'];
endforeach;

$setembroVaga = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as setembro FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 9 ");
foreach($setembroVaga as $mostrar):
$setembroMensal = $mostrar['setembro'];
endforeach;

$outubroVaga = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as outubro FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 10 ");
foreach($outubroVaga as $mostrar):
$outubroMensal = $mostrar['outubro'];
endforeach;

$novembroVaga = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as novembro FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 11 ");
foreach($novembroVaga as $mostrar):
$novembroMensal = $mostrar['novembro'];
endforeach;

$dezembroVaga = $mensal->EXE_QUERY("SELECT count(id_vaga_estagio) as dezembro FROM tb_vaga_estagio
WHERE month(data_registro_vaga) = 12 ");
foreach($dezembroVaga as $mostrar):
$dezembroMensal = $mostrar['dezembro'];
endforeach;

$dataVaga[] = (int)$janeiroMensal;
$dataVaga[] = (int)$fevereiroMensal;
$dataVaga[] = (int)$marcoMensal;
$dataVaga[] = (int)$abrilMensal;
$dataVaga[] = (int)$maioMensal;
$dataVaga[] = (int)$junhoMensal;
$dataVaga[] = (int)$julhoMensal;
$dataVaga[] = (int)$agostoMensal;
$dataVaga[] = (int)$setembroMensal;
$dataVaga[] = (int)$outubroMensal;
$dataVaga[] = (int)$novembroMensal;
$dataVaga[] = (int)$dezembroMensal;
