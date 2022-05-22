
<?php
        include '../../source/Config.php';
        include '../../source/Model.php';
        include '../assets/mpdf-6.1/mpdf.php';

		// Instanciando
        $parametros = [":id" => $_GET['id']];
		$usuario = new Model();
		$sql = $usuario->EXE_QUERY("SELECT * FROM tb_emissao_declaracao
        INNER JOIN tb_aluno ON tb_emissao_declaracao.id_aluno=tb_aluno.id_aluno
        INNER JOIN tb_candidatura_vaga ON tb_aluno.id_aluno=tb_candidatura_vaga.id_aluno
         WHERE tb_aluno.id_aluno=:id AND tb_candidatura_vaga.estado_candidatura=1", $parametros);

         foreach($sql as $mostrarNomeEmpresa):
            $id_vaga = $mostrarNomeEmpresa['id_vaga_estagio'];
         endforeach;

         $parametros = [
             ":idVaga" => $id_vaga
         ];

         $buscandoEmpresaComVaga = new Model();
         $nomeEmpresa = $buscandoEmpresaComVaga->EXE_QUERY("SELECT * FROM tb_vaga_estagio
         INNER JOIN tb_empresa ON tb_vaga_estagio.id_empresa=tb_empresa.id_empresa
         WHERE tb_vaga_estagio.id_vaga_estagio=:idVaga", $parametros);

         foreach($nomeEmpresa as $mostrar):
            $nomeEmpresaBuscado = $mostrar['nome_empresa'];
         endforeach;

		$html = "
	    	<html>
                <head>
                    <style type='text/css'>
                        .nav-header {text-align: center;}
                        .nav-header img {width: 20% !important}

                        p {font-size: 1.2rem; margin-top: 5rem; line-height: 2rem}
                    </style>
			      </head>
		      	<body>
                <div class='container'>
                    <div class='row'>
                        <div class='nav-header'>
                            <img src='../assets/insignia_angola.jpg' style='width: 20% !important' />
                            <h2 class='text-center h5 mk-title'>Republica de Angola</h2>
                            <h2 class='text-center h5 mk-title'>Declaração de Efeito de Estágio</h2>
                        </div>

                    </div>
                    <div class='body-mk mt-4'>
                         <div class='table'>
				";
				foreach ($sql as $mostrar) :
					$html = $html ."
                    <p>Declara-se que o estudante com o nome <strong>{$mostrar['nome']}</strong> com o número de Bilhete <strong>{$mostrar['numero_processo']}</strong>,
                        fez o pedido da declaração para fim de estágio curricular na empresa <strong>{$nomeEmpresaBuscado}</strong> correspondente a 3 meses de estágio
                        válido até durante o cumprimento deste acordo.
                    </p>

                    <p>Durante o período de estágio o estudante terá de efetuar todos os seus deveres como estagiário e no final receber
                    uma nota que será anexada ao seu certificado.
                    </p>
					";
                endforeach;
                $html = $html."
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


