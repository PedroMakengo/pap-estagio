<?php

  $parametros = [
    ":id" => $_GET['id'
  ]];

  $aprovado = new Model();
  $contAprovado = $aprovado->EXE_QUERY("SELECT count(id_atribuir_tarefa) as aprovado FROM tb_atribuir_tarefa WHERE id_aluno=:id AND estado_tarefa=1", $parametros);
  foreach($contAprovado as $mostrar):
    $contAprovadoContador = $mostrar['aprovado'];
  endforeach;

  $processando = $aprovado->EXE_QUERY("SELECT count(id_atribuir_tarefa) as processo FROM tb_atribuir_tarefa WHERE id_aluno=:id AND estado_tarefa=0", $parametros);
  foreach($processando as $mostrar):
    $contProcessadorContador = $mostrar['processo'];
  endforeach;

  $contarRelatorio = $aprovado->EXE_QUERY("SELECT count(id_relatorio) as contador FROM tb_relatorio_estagio WHERE id_aluno=:id", $parametros);
  foreach($contarRelatorio as $mostrar):
    $contarTodosDados = $mostrar['contador'];
  endforeach;

  $dataAtividade[] = (int)$contAprovadoContador;
  $dataAtividade[] = (int)$contProcessadorContador;
  $dataAtividade[] = (int)$contarTodosDados;


?>
