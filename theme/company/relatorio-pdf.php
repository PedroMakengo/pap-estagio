<?php

    include '../../source/Config.php';
    include '../../source/Model.php';
    include '../assets/mpdf-6.1/mpdf.php';

    switch ($_GET['ver']):
      case 'vagasEmpresa':
         // Instanciando
          // $usuario = new Model();
          // $sql = $usuario->EXE_QUERY("SELECT * FROM tb_candidatura_vaga INNER JOIN tb_aluno ON tb_candidatura_vaga.id_aluno=tb_aluno.id_aluno");

          $html = "
                <html>
                  <head>
                      <style type='text/css'>
                          body {margin: 0 auto;padding: 0px;font-weight: 100 !important;}
                          .container {margin: 100px auto !important;}
                          .nav-header {margin: 0px auto;text-align: center;}
                          .mk-title {font-weight: 100;font-size: 18px;}
                          .mk-title-lg {font-weight: 100;font-size: 18px}

                          table { width: 100%; border-spacing: 0 0.5rem; }
                          table th {
                            background: #1f6feb;
                            font-weight: 400;
                            padding: 1rem 2rem;
                            text-align: left;
                            line-height: 1.5rem;
                          }
                          table td {
                            padding: 1rem 2rem;
                            border: 0;
                            background: #f7f7f7;
                            color: #000 !important;
                          }
                      </style>
                  </head>
                  <body>
                      <div class='container'>
                          <div class='row'>
                              <div class='nav-header'>
                                  <h2 class='text-center h5 mk-title'>REPÚBLICA DE ANGOLA</h2>
                                  <h2 class='text-center h5 mk-title'>MINISTÉRIO DA EDUCAÇÃO</h2>
                                  <p class='mt-2'>Relatório de Vagas</p>
                              </div>
                          </div>
                          <div class='body-mk mt-4'>
                              <div class='table'>
                                  <table>
                                      <thead>
                                          <tr>
                                              <th style='color: white'>Id</th>
                                              <th style='color: white'>Nome Completo</th>
                                              <th style='color: white'>Genero</th>
                                              <th style='color: white'>Contacto</th>
                                              <th style='color: white'>Data</th>
                                          </tr>
                                      </thead>
                                      <tbody>
              ";
              foreach ($sql as $mostrar) :
                $html = $html ."
                                          <tr>
                                              <td>{$mostrar["id_candidatura"] }</td>
                                              <td>{$mostrar["nome"] }</td>
                                              <td>{$mostrar["sexo"]}</td>
                                              <td>{$mostrar["contacto"] }</td>
                                              <td>{$mostrar["data_registro_candidatura"] }</td>
                                          </tr>
                ";
                      endforeach;
                      $html = $html."
                                      </tbody>
                                  </table>
                              </div>
                          </div>
              </div>
              ";

          $multa = "index.php";
          $mpdf = new mPDF();
          $mpdf->SetDisplayMode("fullpage");
          $mpdf->WriteHTML($html);
          $mpdf->Output($multa, 'I');
          exit();
      break;
      case 'estagiarios':
          // Instanciando
          $parametros = [":id" => $_GET['id']];
          $usuario = new Model();
          $sql = $usuario->EXE_QUERY("SELECT * FROM tb_candidatura_vaga
          INNER JOIN tb_vaga_estagio ON tb_candidatura_vaga.id_vaga_estagio=tb_vaga_estagio.id_vaga_estagio
          WHERE tb_vaga_estagio.id_empresa=:id AND estado_candidatura=1", $parametros);

          $html = "
                <html>
                  <head>
                      <style type='text/css'>
                          body {margin: 0 auto;padding: 0px;font-weight: 100 !important;}
                          .container {margin: 100px auto !important;}
                          .nav-header {margin: 0px auto;text-align: center;}
                          .mk-title {font-weight: 100;font-size: 18px;}
                          .mk-title-lg {font-weight: 100;font-size: 18px}
                          img {width: 80px;height: 80px}


                          table { width: 100%; border-spacing: 0 0.5rem; }
                          table th {
                            background: #1f6feb;
                            font-weight: 400;
                            padding: 1rem 2rem;
                            text-align: left;
                            line-height: 1.5rem;
                          }
                          table td {
                            padding: 1rem 2rem;
                            border: 0;
                            background: #f7f7f7;
                            color: #000 !important;
                          }
                      </style>
                  </head>
                  <body>
                      <div class='container'>
                          <div class='row'>
                              <div class='nav-header'>
                                  <h2 class='text-center h5 mk-title'>REPÚBLICA DE ANGOLA</h2>
                                  <h2 class='text-center h5 mk-title'>MINISTÉRIO DA EDUCAÇÃO</h2>
                                  <p class='mt-2'>Relatório de Estagiários</p>
                              </div>
                          </div>
                          <div class='body-mk mt-4'>
                              <div class='table'>
                                  <table>
                                      <thead>
                                          <tr>
                                              <th style='color: white'>Id</th>
                                              <th style='color: white'>Nome Completo</th>
                                              <th style='color: white'>Genero</th>
                                              <th style='color: white'>Telefone</th>
                                              <th style='color: white'>Bilhete</th>
                                          </tr>
                                      </thead>
                                      <tbody>
              ";
              foreach ($sql as $mostrar) :
                $html = $html ."
                                          <tr>
                                              <td>{$mostrar["id_aluno"] }</td>
                                              <td>{$mostrar["nome"] }</td>
                                              <td>{$mostrar["sexo"] }</td>
                                              <td>{$mostrar["contacto"] }</td>
                                              <td>{$mostrar["numero_processo"] }</td>
                                          </tr>
                ";
                      endforeach;
                      $html = $html."
                                      </tbody>
                                  </table>
                              </div>
                          </div>
              </div>
              ";

          $multa = "index.php";
          $mpdf = new mPDF();
          $mpdf->SetDisplayMode("fullpage");
          $mpdf->WriteHTML($html);
          $mpdf->Output($multa, 'I');
          exit();
      default:
        break;
    endswitch;
 ?>


