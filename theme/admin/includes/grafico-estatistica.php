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


// TRABALHANDO NO GR??FICO DE ESTUDANTES POR SEXO


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





// GR??FICO DE VAGAS
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



// GR??FICO DECLARA????ES
$janeiroDeclaracao = $mensal->EXE_QUERY("SELECT count(id_declaracao) as janeiro FROM tb_emissao_declaracao
WHERE month(data_emissao) = 1 ");
foreach($janeiroDeclaracao as $mostrar):
$janeiroMensal1 = $mostrar['janeiro'];
endforeach;

$fevereiroDeclaracao = $mensal->EXE_QUERY("SELECT count(id_declaracao) as fevereiro FROM tb_emissao_declaracao
WHERE month(data_emissao) = 2 ");
foreach($fevereiroDeclaracao as $mostrar):
$fevereiroMensal2 = $mostrar['fevereiro'];
endforeach;

$marcoDeclaracao = $mensal->EXE_QUERY("SELECT count(id_declaracao) as marco FROM tb_emissao_declaracao
WHERE month(data_emissao) = 3 ");
foreach($marcoDeclaracao as $mostrar):
$marcoMensal3 = $mostrar['marco'];
endforeach;

$abrilDeclaracao = $mensal->EXE_QUERY("SELECT count(id_declaracao) as abril FROM tb_emissao_declaracao
WHERE month(data_emissao) = 4 ");
foreach($abrilDeclaracao as $mostrar):
$abrilMensal4 = $mostrar['abril'];
endforeach;

$maioDeclaracao = $mensal->EXE_QUERY("SELECT count(id_declaracao) as maio FROM tb_emissao_declaracao
WHERE month(data_emissao) = 5 ");
foreach($maioDeclaracao as $mostrar):
$maioMensal5 = $mostrar['maio'];
endforeach;

$junhoDeclaracao = $mensal->EXE_QUERY("SELECT count(id_declaracao) as junho FROM tb_emissao_declaracao
WHERE month(data_emissao) = 6 ");
foreach($junhoDeclaracao as $mostrar):
$junhoMensal6 = $mostrar['junho'];
endforeach;

$julhoDeclaracao = $mensal->EXE_QUERY("SELECT count(id_declaracao) as julho FROM tb_emissao_declaracao
WHERE month(data_emissao) = 7 ");
foreach($julhoDeclaracao as $mostrar):
$julhoMensal7 = $mostrar['julho'];
endforeach;

$agostoDeclaracao = $mensal->EXE_QUERY("SELECT count(id_declaracao) as agosto FROM tb_emissao_declaracao
WHERE month(data_emissao) = 8 ");
foreach($agostoDeclaracao as $mostrar):
$agostoMensal8 = $mostrar['agosto'];
endforeach;

$setembroDeclaracao = $mensal->EXE_QUERY("SELECT count(id_declaracao) as setembro FROM tb_emissao_declaracao
WHERE month(data_emissao) = 9 ");
foreach($setembroDeclaracao as $mostrar):
$setembroMensal9 = $mostrar['setembro'];
endforeach;

$outubroDeclaracao = $mensal->EXE_QUERY("SELECT count(id_declaracao) as outubro FROM tb_emissao_declaracao
WHERE month(data_emissao) = 10 ");
foreach($outubroDeclaracao as $mostrar):
$outubroMensal10 = $mostrar['outubro'];
endforeach;

$novembroDeclaracao = $mensal->EXE_QUERY("SELECT count(id_declaracao) as novembro FROM tb_emissao_declaracao
WHERE month(data_emissao) = 11 ");
foreach($novembroDeclaracao as $mostrar):
$novembroMensal11 = $mostrar['novembro'];
endforeach;

$dezembroDeclaracao = $mensal->EXE_QUERY("SELECT count(id_declaracao) as dezembro FROM tb_emissao_declaracao
WHERE month(data_emissao) = 12 ");
foreach($dezembroDeclaracao as $mostrar):
$dezembroMensal12 = $mostrar['dezembro'];
endforeach;

$dataDeclaracao[] = (int)$janeiroMensal1;
$dataDeclaracao[] = (int)$fevereiroMensal2;
$dataDeclaracao[] = (int)$marcoMensal3;
$dataDeclaracao[] = (int)$abrilMensal4;
$dataDeclaracao[] = (int)$maioMensal5;
$dataDeclaracao[] = (int)$junhoMensal6;
$dataDeclaracao[] = (int)$julhoMensal7;
$dataDeclaracao[] = (int)$agostoMensal8;
$dataDeclaracao[] = (int)$setembroMensal9;
$dataDeclaracao[] = (int)$outubroMensal10;
$dataDeclaracao[] = (int)$novembroMensal11;
$dataDeclaracao[] = (int)$dezembroMensal12;

