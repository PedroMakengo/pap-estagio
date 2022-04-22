<?php
		include '../assets/mpdf-6.1/mpdf.php';

    switch ($_GET['id']):
      case 'candidatura':
         // Instanciando
          // $usuario = new Model();
          // $sql = $usuario->EXE_QUERY("SELECT * FROM estudante_table");

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

                          table {width: 100%; }
                          table thead {background: red;}
                          table thead tr {background: rgb(24, 179, 240) !important}
                          .table thead th {padding: 10px; background: rgb(24, 179, 240); font-weight: 100 }
                          .table td {padding: 10px; background: #f2f2f2; font-weight: 100; color: black; }
                      </style>
                  </head>
                  <body>
                      <div class='container'>
                          <div class='row'>
                              <div class='nav-header'>
                                  <h2 class='text-center h5 mk-title'>REPÚBLICA DE ANGOLA</h2>
                                  <h2 class='text-center h5 mk-title'>MINISTÉRIO DA EDUCAÇÃO</h2>
                                  <p class='mt-2'>Relatório de candidaturas</p>
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
                                              <th style='color: white'>Data da candidatura</th>
                                          </tr>
                                      </thead>
                                      <tbody>
              ";
              foreach ($sql as $mostrar) :
                $html = $html ."
                                          <tr>
                                              <td>{$mostrar["id_estudante"] }</td>
                                              <td>{$mostrar["nome_estudante"] }</td>
                                              <td>{$mostrar["data_nascimento"] }</td>
                                              <td>{$mostrar["sexo_estudante"] }</td>
                                              <td>{$mostrar["data_matricula"] }</td>
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

      default:
        break;
    endswitch;
 ?>


