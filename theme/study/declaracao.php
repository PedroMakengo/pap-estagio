
<?php
  include '../../source/database/Config.php';
  include '../../source/database/Model.php';
  include '../assets/mpdf-6.1/mpdf.php';
		// Instanciando
		// $usuario = new Model();
		// $sql = $usuario->EXE_QUERY("SELECT * FROM estudante_table");

		$html = "
	    	<html>
            <head>
              <style type='text/css'>

              </style>
			      </head>
		      	<body>
                <div class='container'>
                    <div class='row'>
                        <div class='nav-header'>
                            <h2 class='text-center h5 mk-title'>Declaração</h2>
                        </div>
                    </div>
                    <div class='body-mk mt-4'>
                         <div class='table'>
                            <table>
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

 ?>


