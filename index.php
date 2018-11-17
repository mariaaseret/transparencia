<style type="text/css">

input[type=text] {
	padding:5px; 
	border:2px solid #ccc; 
	-webkit-border-radius: 5px;
	border-radius: 5px;
}

input[type=text]:focus {
	border-color:#333;
}

input[type=submit] {
	padding:5px 15px; 
	background:#ccc; 
	border:0 none;
	cursor:pointer;
	-webkit-border-radius: 5px;
	border-radius: 5px; 
}
</style>

<?php
header('Content-type: text/html; charset=utf-8');
header('Content-Type: text/html; charset=iso-8859-15');
//exibe o contador diretamente do banco

/*$conn = new mysqli('192.168.10.12', 'crashfix', 'd&U2Opi#=2a8', 'crashfix') 
or die ('Cannot connect to db');*/

$conn = new mysqli('mysql.sites.ufsc.br', 'gptrans', 'f7dwjoCj', 'gptrans') 
or die ('Cannot connect to db');


?>


<!DOCTYPE html>
<html>
<head>
	<title>Tanspar&ecircncia</title>
	<link rel="shortcut icon" href="http://graficoportaltransparencia.ufsc.br/m.png" type="image/x-icon" >
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta charset="utf-8">
	<script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

</head>



<body >



	<table style="width: 100%;">
		<p style="font-family: arial; font-size: 20px;"><b>Balancete dos Vereadores da cidade de Florian&oacutepolis</b></p>
		<tbody>
			
			<tr>
				<td>

					<p style="font-family: arial; font-size: 13px;"><b>Selecione o vereador e o ano desejado:</b></p>
					<?php




					(isset($_POST["submit"])) ? $anoSelecionado = $_POST["SelecaoAno"] : $anoSelecionado=2014;
					(isset($_POST["submit"])) ? $vereadorSelecionado = $_POST["SelecaoVereador"] : $vereadorSelecionado=1;


					$pesquisaVereador = $conn->query("select * from vereadores order by nomeVereador;");

					$idVereador =0;
					echo "<form  method='post'>";
					echo "<select name='SelecaoVereador'>";

					while (($row = $pesquisaVereador->fetch_assoc())) {
						unset($idVereador);
						$idVereador = $row['idVereadores'];
						$nomeVereador = $row['nomeVereador'];
						//echo '<option value="'.$idVereador.'">'.$nomeVereador.'</option>'; 
						?>
						<option <?php if ($vereadorSelecionado == $idVereador ) echo 'selected' ; ?> value=<?php echo $idVereador; ?>><?php 
						echo $nomeVereador;?></option>
						<?php
					}
					echo "</select>";
					?>
					

					<form  method="post">
						<select id="SelecaoAno" name="SelecaoAno">
							<option <?php if ($anoSelecionado == "2014" ) echo 'selected' ; ?> value="2014">2014</option>
							<option <?php if ($anoSelecionado == "2015" ) echo 'selected' ; ?> value="2015">2015</option>
							<option <?php if ($anoSelecionado == "2016" ) echo 'selected' ; ?> value="2016">2016</option>
							<option <?php if ($anoSelecionado == "2017" ) echo 'selected' ; ?> value="2017">2017</option>
							<option <?php if ($anoSelecionado == "2018" ) echo 'selected' ; ?> value="2018">2018</option>
						</select>
						<input type="submit" name="submit" value="Selecionar"/>
					</form>
					<?
					if(isset($_POST['submit'])) {
						$anoSelecionado = $_POST['SelecaoAno'];
						$vereadorSelecionado =$_POST['SelecaoVereador'];
                }// VARIAVEL SELECIONADA



                //PARA O GRÁFICO 1 -  LINHA MENSAL POR VEREADOR

                //JANEIRO
                $qGastoJan="SELECT valDebito from debitos where Vereadores_idVereadores = '$vereadorSelecionado' and ano = '$anoSelecionado' and mes=1;";
                $qGastoJan=mysqli_query($conn,$qGastoJan);
                if($qGastoJan)
                {
                	while($row=mysqli_fetch_assoc($qGastoJan))
                	{
                		$janeiro = $row['valDebito'];
                	}     
                }

                //FEVEREIRO
                $qGastoFev="SELECT valDebito from debitos where Vereadores_idVereadores = '$vereadorSelecionado' and ano = '$anoSelecionado' and mes=2;";
                $qGastoFev=mysqli_query($conn,$qGastoFev);
                if($qGastoFev)
                {
                	while($row=mysqli_fetch_assoc($qGastoFev))
                	{
                		$fevereiro = $row['valDebito'];
                	}     
                }

 				//MARCO
                $qGastoMar="SELECT valDebito from debitos where Vereadores_idVereadores = '$vereadorSelecionado' and ano = '$anoSelecionado' and mes=3;";
                $qGastoMar=mysqli_query($conn,$qGastoMar);
                if($qGastoMar)
                {
                	while($row=mysqli_fetch_assoc($qGastoMar))
                	{
                		$marco = $row['valDebito'];
                	}     
                }

				//ABRIL
                $qGastoAbr="SELECT valDebito from debitos where Vereadores_idVereadores = '$vereadorSelecionado' and ano = '$anoSelecionado' and mes=4;";
                $qGastoAbr=mysqli_query($conn,$qGastoAbr);
                if($qGastoAbr)
                {
                	while($row=mysqli_fetch_assoc($qGastoAbr))
                	{
                		$abril = $row['valDebito'];
                	}     
                }

                //MAIO
                $qGastoMai="SELECT valDebito from debitos where Vereadores_idVereadores = '$vereadorSelecionado' and ano = '$anoSelecionado' and mes=5;";
                $qGastoMai=mysqli_query($conn,$qGastoMai);
                if($qGastoMai)
                {
                	while($row=mysqli_fetch_assoc($qGastoMai))
                	{
                		$maio = $row['valDebito'];
                	}     
                }


                //JUNHO
                $qGastoJun="SELECT valDebito from debitos where Vereadores_idVereadores = '$vereadorSelecionado' and ano = '$anoSelecionado' and mes=6;";
                $qGastoJun=mysqli_query($conn,$qGastoJun);
                if($qGastoJun)
                {
                	while($row=mysqli_fetch_assoc($qGastoJun))
                	{
                		$junho = $row['valDebito'];
                	}     
                }

                
                //JULHO
                $qGastoJul="SELECT valDebito from debitos where Vereadores_idVereadores = '$vereadorSelecionado' and ano = '$anoSelecionado' and mes=7;";
                $qGastoJul=mysqli_query($conn,$qGastoJul);
                if($qGastoJul)
                {
                	while($row=mysqli_fetch_assoc($qGastoJul))
                	{
                		$julho = $row['valDebito'];
                	}     
                }


                //AGOSTO
                $qGastoAgo="SELECT valDebito from debitos where Vereadores_idVereadores = '$vereadorSelecionado' and ano = '$anoSelecionado' and mes=8;";
                $qGastoAgo=mysqli_query($conn,$qGastoAgo);
                if($qGastoAgo)
                {
                	while($row=mysqli_fetch_assoc($qGastoAgo))
                	{
                		$agosto = $row['valDebito'];
                	}     
                }

                
                //SETEMBRO
                $qGastoSet="SELECT valDebito from debitos where Vereadores_idVereadores = '$vereadorSelecionado' and ano = '$anoSelecionado' and mes=9;";
                $qGastoSet=mysqli_query($conn,$qGastoSet);
                if($qGastoSet)
                {
                	while($row=mysqli_fetch_assoc($qGastoSet))
                	{
                		$setembro = $row['valDebito'];
                	}     
                }


                //OUTUBRO
                $qGastoOut="SELECT valDebito from debitos where Vereadores_idVereadores = '$vereadorSelecionado' and ano = '$anoSelecionado' and mes=10;";
                $qGastoOut=mysqli_query($conn,$qGastoOut);
                if($qGastoOut)
                {
                	while($row=mysqli_fetch_assoc($qGastoOut))
                	{
                		$outubro = $row['valDebito'];
                	}     
                }


                //NOVEMBRO
                $qGastoNov="SELECT valDebito from debitos where Vereadores_idVereadores = '$vereadorSelecionado' and ano = '$anoSelecionado' and mes=11;";
                $qGastoNov=mysqli_query($conn,$qGastoNov);
                if($qGastoNov)
                {
                	while($row=mysqli_fetch_assoc($qGastoNov))
                	{
                		$novembro = $row['valDebito'];
                	}     
                }


                //DEZEMBRO
                $qGastoDez="SELECT valDebito from debitos where Vereadores_idVereadores = '$vereadorSelecionado' and ano = '$anoSelecionado' and mes=12;";
                $qGastoDez=mysqli_query($conn,$qGastoDez);
                if($qGastoDez)
                {
                	while($row=mysqli_fetch_assoc($qGastoDez))
                	{
                		$dezembro = $row['valDebito'];
                	}     
                }

                
                
                //PARA O GRÁFICO ANUAL - BARRAS

                //2014
                $qGasto2014="SELECT Vereadores_idVereadores, SUM(valDebito) AS 'total' FROM debitos  where ano = 2014 and Vereadores_idVereadores = '$vereadorSelecionado' GROUP BY Vereadores_idVereadores;";
                $qGasto2014=mysqli_query($conn,$qGasto2014);
                if($qGasto2014)
                {
                	while($row=mysqli_fetch_assoc($qGasto2014))
                	{
                		$ano2014 = $row['total'];
                	}     
                }

                
                //2015
                $qGasto2015="SELECT Vereadores_idVereadores, SUM(valDebito) AS 'total' FROM debitos  where ano = 2015 and Vereadores_idVereadores = '$vereadorSelecionado' GROUP BY Vereadores_idVereadores;";
                $qGasto2015=mysqli_query($conn,$qGasto2015);
                if($qGasto2015)
                {
                	while($row=mysqli_fetch_assoc($qGasto2015))
                	{
                		$ano2015 = $row['total'];
                	}     
                }


                //2016
                $qGasto2016="SELECT Vereadores_idVereadores, SUM(valDebito) AS 'total' FROM debitos  where ano = 2016 and Vereadores_idVereadores = '$vereadorSelecionado' GROUP BY Vereadores_idVereadores;";
                $qGasto2016=mysqli_query($conn,$qGasto2016);
                if($qGasto2016)
                {
                	while($row=mysqli_fetch_assoc($qGasto2016))
                	{
                		$ano2016 = $row['total'];
                	}     
                }

                //2017
                $qGasto2017="SELECT Vereadores_idVereadores, SUM(valDebito) AS 'total' FROM debitos  where ano = 2017 and Vereadores_idVereadores = '$vereadorSelecionado' GROUP BY Vereadores_idVereadores;";
                $qGasto2017=mysqli_query($conn,$qGasto2017);
                if($qGasto2017)
                {
                	while($row=mysqli_fetch_assoc($qGasto2017))
                	{
                		$ano2017 = $row['total'];
                	}     
                }


                //2018
                $qGasto2018="SELECT Vereadores_idVereadores, SUM(valDebito) AS 'total' FROM debitos  where ano = 2018 and Vereadores_idVereadores = '$vereadorSelecionado' GROUP BY Vereadores_idVereadores;";
                $qGasto2018=mysqli_query($conn,$qGasto2018);
                if($qGasto2018)
                {
                	while($row=mysqli_fetch_assoc($qGasto2018))
                	{
                		$ano2018 = $row['total'];
                	}     
                }


                //TABELA DE RANKING DOS 5 MAIORES GASTOS

                $qGastoRanking="SELECT Vereadores_idVereadores, SUM(valDebito) AS 'total' FROM debitos  where ano ='$anoSelecionado'  GROUP BY Vereadores_idVereadores  ORDER BY total DESC LIMIT 5;";
                $qGastoRanking=mysqli_query($conn,$qGastoRanking);

                if($qGastoRanking)
                {
                	while($row=mysqli_fetch_assoc($qGastoRanking))
                	{
                		$ranking[] = $row['total'];
                		$rankingNome[] =  $row['Vereadores_idVereadores'];

                	}     
                }
                $id0=$rankingNome[0];
                $id1=$rankingNome[1];
                $id2=$rankingNome[2];
                $id3=$rankingNome[3];
                $id4=$rankingNome[4];
                $valor0=$ranking[0];
                $valor1=$ranking[1];
                $valor2=$ranking[2];
                $valor3=$ranking[3];
                $valor4=$ranking[4];

                //nomes para o ranking

				//PRIMEIRO NOME DO RANKING
                $qNomes0="SELECT nomeVereador from vereadores where idVereadores = '$id0';";
                $qNomes0=mysqli_query($conn,$qNomes0);

                if($qNomes0)
                {
                	while($row=mysqli_fetch_assoc($qNomes0))
                	{
                		$nome0 = $row['nomeVereador'];
                	}     
                }

				//SEGUNDO NOME DO RANKING
                $qNomes1="SELECT nomeVereador from vereadores where idVereadores = '$id1';";
                $qNomes1=mysqli_query($conn,$qNomes1);

                if($qNomes1)
                {
                	while($row=mysqli_fetch_assoc($qNomes1))
                	{
                		$nome1 = $row['nomeVereador'];
                	}     
                }


				//TERCEIRO NOME DO RANKING
                $qNomes2="SELECT nomeVereador from vereadores where idVereadores = '$id2';";
                $qNomes2=mysqli_query($conn,$qNomes2);

                if($qNomes2)
                {
                	while($row=mysqli_fetch_assoc($qNomes2))
                	{
                		$nome2 = $row['nomeVereador'];
                	}     
                }

                //QUARTO NOME DO RANKING
                $qNomes3="SELECT nomeVereador from vereadores where idVereadores = '$id3';";
                $qNomes3=mysqli_query($conn,$qNomes3);

                if($qNomes2)
                {
                	while($row=mysqli_fetch_assoc($qNomes3))
                	{
                		$nome3 = $row['nomeVereador'];
                	}     
                }

				//QUINTO NOME DO RANKING
                $qNomes4="SELECT nomeVereador from vereadores where idVereadores = '$id4';";
                $qNomes4=mysqli_query($conn,$qNomes4);

                if($qNomes4)
                {
                	while($row=mysqli_fetch_assoc($qNomes4))
                	{
                		$nome4 = $row['nomeVereador'];
                	}     
                }

				//print da array de ranking do ano selecionado
				//print_r(array_values ($ranking));
				//print_r(array_values ($rankingNome));

				//CASO OS VALORES MENSAIS NÃO EXISTAM NO BANCO, PREENCHO COM ZERO PARA O GRAFICO SER MONTADO.
                if($janeiro == null){
                	$janeiro = 0;
                }
                if($fevereiro == null){
                	$fevereiro = 0;
                }
                if($marco == null){
                	$marco = 0;
                }
                if($abril == null){
                	$abril = 0;
                }
                if($maio == null){
                	$maio = 0;
                }
                if($junho == null){
                	$junho = 0;
                }

                if($julho == null){
                	$julho = 0;
                }

                if($agosto == null){
                	$agosto = 0;
                }
                if($setembro == null){
                	$setembro = 0;
                }
                if($outubro == null){
                	$outubro = 0;
                }
                if($novembro == null){
                	$novembro = 0;
                }
                if($dezembro == null){
                	$dezembro = 0;
                }

				//GRÁFICO DE PIZZA ONDE REPRESENTA-SE O MONTANTE ANUAL DO VEREADOR SELECIONADO RELACIONADO COM A SOMA DE TODOS OS OUTROS VEREADORES.
				// soma total dos gastos do ano excluindo o vereador selecionado
                $qMontanteAnual="SELECT SUM(valDebito) AS montante from debitos where Vereadores_idVereadores != '$vereadorSelecionado' and ano = '$anoSelecionado';";
                $qMontanteAnual=mysqli_query($conn,$qMontanteAnual);

                if($qMontanteAnual)
                {
                	while($row=mysqli_fetch_assoc($qMontanteAnual))
                	{
                		$montanteAnual = $row['montante'];
                	}     
                }
               	// soma total dos gastos do ano SEM excluir o vereador selecionado
                $qMontanteTotalAnual="SELECT SUM(valDebito) AS montante from debitos where ano = '$anoSelecionado';";
                $qMontanteTotalAnual=mysqli_query($conn,$qMontanteAnual);

                if($qMontanteAnual)
                {
                	while($row=mysqli_fetch_assoc($qMontanteAnual))
                	{
                		$montanteTotalAnual = $row['montante'];
                	}     
                }
                //soma de gastos do vereador selecionado no ano selecionado
                $qGastoIndivisual="SELECT Vereadores_idVereadores, SUM(valDebito) AS 'total' FROM debitos  where ano = '$anoSelecionado' and Vereadores_idVereadores = '$vereadorSelecionado' GROUP BY Vereadores_idVereadores;";
                $qGastoIndivisual=mysqli_query($conn,$qGastoIndivisual);
                if($qGastoIndivisual)
                {
                	while($row=mysqli_fetch_assoc($qGastoIndivisual))
                	{
                		$gastoIndividual = $row['total'];
                	}     
                }

                $porcentagemTotal = (($montanteAnual * 100)/$montanteTotalAnual);
                $porcentagemIndivudual = (($gastoIndividual * 100)/$montanteTotalAnual);
                if($porcentagemTotal == null){
                	$porcentagemTotal = 0;
                }
                if($porcentagemIndivudual == null){
                	$porcentagemIndivudual = 0;
                }

                //Nome do vereador selecionado

                $qNomeSelecao="SELECT nomeVereador from vereadores where idVereadores  = '$vereadorSelecionado';";
                $qNomeSelecao=mysqli_query($conn,$qNomeSelecao);
                if($qNomeSelecao)
                {
                	while($row=mysqli_fetch_assoc($qNomeSelecao))
                	{
                		$nomeSelecao = $row['nomeVereador'];
                	}     
                }


                //Para o gráfico geral de gastos de todos os vereadores. --LOOPING com variável variável 
                for($i =1; $i < 46; $i++){
                        ${qVereador . $i} ="SELECT sum(valDebito) as total from debitos where ano = '$anoSelecionado' and Vereadores_idVereadores = $i;";
                        ${qVereador . $i}=mysqli_query($conn,${qVereador . $i});
                        if(${qVereador . $i})
                        {
                                while($row=mysqli_fetch_assoc(${qVereador . $i}))
                                {
                                        ${vereador . $i} = $row['total'];
                                }     
                        }
                }
                for($i =1; $i < 46; $i++){
                        ${qNomeVereador . $i} ="SELECT nomeVereador from vereadores where idVereadores = $i;";
                        ${qNomeVereador . $i}=mysqli_query($conn,${qNomeVereador . $i});
                        if(${qNomeVereador . $i})
                        {
                                while($row=mysqli_fetch_assoc(${qNomeVereador . $i}))
                                {
                                        ${nomeVereador . $i} = $row['nomeVereador'];
                                }     
                        }
                }


                //gráfico de gastos especificados
                if($anoSelecionado == 2018)
                {
                     $qEspecifico1="SELECT sum(passagem) as soma from totais where Vereadores_idVereadores  = '$vereadorSelecionado' and ano = 2018;";
                     $qEspecifico1=mysqli_query($conn,$qEspecifico1);
                     if($qEspecifico1)
                     {
                        while($row=mysqli_fetch_assoc($qEspecifico1))
                        {
                                $passagem = $row['soma'];
                        }     
                }
                $qEspecifico2="SELECT sum(telefone_fixo) as soma from totais where Vereadores_idVereadores  = '$vereadorSelecionado' and ano = 2018;";
                $qEspecifico2=mysqli_query($conn,$qEspecifico2);
                if($qEspecifico2)
                {
                        while($row=mysqli_fetch_assoc($qEspecifico2))
                        {
                                $telefone_fixo = $row['soma'];
                        }     
                }
                $qEspecifico3="SELECT sum(xerox) as soma from totais where Vereadores_idVereadores  = '$vereadorSelecionado' and ano = 2018;";
                $qEspecifico3=mysqli_query($conn,$qEspecifico3);
                if($qEspecifico3)
                {
                        while($row=mysqli_fetch_assoc($qEspecifico3))
                        {
                                $xerox = $row['soma'];
                        }     
                }
                $qEspecifico4="SELECT sum(material_expediente) as soma from totais where Vereadores_idVereadores  = '$vereadorSelecionado' and ano = 2018;";
                $qEspecifico4=mysqli_query($conn,$qEspecifico4);
                if($qEspecifico4)
                {
                        while($row=mysqli_fetch_assoc($qEspecifico4))
                        {
                                $material_expediente = $row['soma'];
                        }     
                }
                $qEspecifico5="SELECT sum(diarias) as soma from totais where Vereadores_idVereadores  = '$vereadorSelecionado' and ano = 2018;";
                $qEspecifico5=mysqli_query($conn,$qEspecifico5);
                if($qEspecifico5)
                {
                        while($row=mysqli_fetch_assoc($qEspecifico5))
                        {
                                $diarias = $row['soma'];
                        }     
                }
                $qEspecifico6="SELECT sum(outros) as soma from totais where Vereadores_idVereadores  = '$vereadorSelecionado' and ano = 2018;";
                $qEspecifico6=mysqli_query($conn,$qEspecifico6);
                if($qEspecifico6)
                {
                        while($row=mysqli_fetch_assoc($qEspecifico6))
                        {
                                $outros = $row['soma'];
                        }     
                }
                $qEspecifico7="SELECT sum(selos) as soma from totais where Vereadores_idVereadores  = '$vereadorSelecionado' and ano = 2018;";
                $qEspecifico7=mysqli_query($conn,$qEspecifico7);
                if($qEspecifico7)
                {
                        while($row=mysqli_fetch_assoc($qEspecifico7))
                        {
                                $selos = $row['soma'];
                        }     
                }
                $qEspecifico8="SELECT sum(servicos) as soma from totais where Vereadores_idVereadores  = '$vereadorSelecionado' and ano = 2018;";
                $qEspecifico8=mysqli_query($conn,$qEspecifico8);
                if($qEspecifico8)
                {
                        while($row=mysqli_fetch_assoc($qEspecifico8))
                        {
                                $servicos = $row['soma'];
                        }     
                }
                $qEspecifico9="SELECT sum(telefone) as soma from totais where Vereadores_idVereadores  = '$vereadorSelecionado' and ano = 2018;";
                $qEspecifico9=mysqli_query($conn,$qEspecifico9);
                if($qEspecifico9)
                {
                        while($row=mysqli_fetch_assoc($qEspecifico9))
                        {
                                $telefone = $row['soma'];
                        }     
                }
                $qEspecifico10="SELECT sum(cursos) as soma from totais where Vereadores_idVereadores  = '$vereadorSelecionado' and ano = 2018;";
                $qEspecifico10=mysqli_query($conn,$qEspecifico10);
                if($qEspecifico10)
                {
                        while($row=mysqli_fetch_assoc($qEspecifico10))
                        {
                                $cursos = $row['soma'];
                        }     
                }
                $qEspecifico11="SELECT sum(carimbos) as soma from totais where Vereadores_idVereadores  = '$vereadorSelecionado' and ano = 2018;";
                $qEspecifico11=mysqli_query($conn,$qEspecifico11);
                if($qEspecifico11)
                {
                        while($row=mysqli_fetch_assoc($qEspecifico11))
                        {
                                $carimbos = $row['soma'];
                        }     
                }
                $qEspecifico12="SELECT sum(jornal) as soma from totais where Vereadores_idVereadores  = '$vereadorSelecionado' and ano = 2018;";
                $qEspecifico12=mysqli_query($conn,$qEspecifico12);
                if($qEspecifico12)
                {
                        while($row=mysqli_fetch_assoc($qEspecifico12))
                        {
                                $jornal = $row['soma'];
                        }     
                }
                  $qEspecifico14="SELECT sum(correio) as soma from totais where Vereadores_idVereadores  = '$vereadorSelecionado' and ano = 2018;";
                $qEspecifico14=mysqli_query($conn,$qEspecifico14);
                if($qEspecifico14)
                {
                        while($row=mysqli_fetch_assoc($qEspecifico14))
                        {
                                $correio = $row['soma'];
                        }     
                }

        }




        $values = [];

    //pushing some variables to the array so we can output something in this example.
        array_push($values, array("mes" => "JAN", "newbalance" => $janeiro));
        array_push($values, array("mes" => "FEV", "newbalance" => $fevereiro));
        array_push($values, array("mes" => "MAR", "newbalance" => $marco));
        array_push($values, array("mes" => "ABR", "newbalance" => $abril));
        array_push($values, array("mes" => "MAI", "newbalance" => $maio));
        array_push($values, array("mes" => "JUN", "newbalance" => $junho));
        array_push($values, array("mes" => "JUL", "newbalance" => $julho));
        array_push($values, array("mes" => "AGO", "newbalance" => $agosto));
        array_push($values, array("mes" => "SET", "newbalance" => $setembro));
        array_push($values, array("mes" => "OUT", "newbalance" => $outubro));
        array_push($values, array("mes" => "NOV", "newbalance" => $novembro));
        array_push($values, array("mes" => "DEZ", "newbalance" => $dezembro));


    //counting the length of the array
        $countArrayLength = count($values);

        ?>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script type="text/javascript">
         google.load("visualization", "1", {packages:["corechart"]});
         google.setOnLoadCallback(drawChart);

         function drawChart() {

          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Mes');
          data.addColumn('number', 'Gasto');                        					

          data.addRows([

           <?php
           for($i=0;$i<$countArrayLength;$i++){
            echo "['" . $values[$i]['mes'] . "'," . $values[$i]['newbalance'] . "],";
    } 
    ?>
    ]);

          var options = {
           title: 'Gastos de <?php echo $anoSelecionado;?>',
           curveType: 'function',
           legend: { position: 'bottom' }, 
           interpolateNulls: true,
           colors: ['#0040FF']
   };

   var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
   chart.draw(data, options);
}
</script>

<div id="curve_chart" style="width: 850px; height: 300px"></div>




</td>
<td>

     <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
       var data = google.visualization.arrayToDataTable([
        ["Ano", "Gasto em reais", { role: "style" } ],
        ["2014", <?php echo $ano2014; ?>, "#00008B"],
        ["2015", <?php echo $ano2015; ?>, "#0000CD"],
        ["2016", <?php echo $ano2016; ?>, "#0000CD"],
        ["2017", <?php echo $ano2017; ?>, "#0000FF"],
        ["2018", <?php echo $ano2018; ?>, "color: #1E90FF"]
        ]);

       var view = new google.visualization.DataView(data);
       view.setColumns([0, 1,
        { calc: "stringify",
        sourceColumn: 1,
        type: "string",
        role: "annotation" },
        2]);

       var options = {
        title: "Resumo dos gastos de todos os anos",
        width: 500,
        height: 350,
        bar: {groupWidth: "70%"},
        legend: { position: "none" },
};
var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
chart.draw(view, options);
}
</script>
<div id="barchart_values" style="width: 500px; height: 300px; margin-bottom: 50px;"></div>
</td>
</tr>
<tr>
 <td><div style="margin-top: 20px"> </div></td>
 <td><div style="margin-top: 20px"> </div></td>
</tr>
<tr>
 <td>



  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
   google.charts.load("current", {packages:["corechart"]});
   google.charts.setOnLoadCallback(drawChart);
   function drawChart() {
    var data = google.visualization.arrayToDataTable([
     ['Vereador', 'Soma anual em reais'],
     ['<?php echo $nomeSelecao;?>', <?php echo $gastoIndividual; ?>],
     ['Montante', <?php echo $montanteAnual; ?>]
     ]);

    var options = {
     title: 'Porcentagem que o Vereador representa no montante de gastos anuais',
     pieHole: 0.4,
     slices: {
      0: { color: '0040FF' },
      1: { color: 'add8e6' }
}
};

var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
chart.draw(data, options);
}
</script>
</head>

<div id="donutchart" style="width: 900px; height: 500px;"></div>



</td>
<td>
 <p style="font-family: arial; font-size: 13px;"><b>Ranking de gastos de <?php echo $anoSelecionado; ?></b></p>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 <script type="text/javascript">
  google.charts.load('current', {'packages':['table']});
  google.charts.setOnLoadCallback(drawTable);

  function drawTable() {
   var data = new google.visualization.DataTable();
   data.addColumn('string', '');
   data.addColumn('string', 'Vereador');
   data.addColumn('number', 'Soma anual em reais');
   data.addRows([
    ['1','<?php echo $nome0; ?>',  <?php echo $valor0; ?>],
    ['2','<?php echo $nome1; ?>',   <?php echo $valor1; ?>],
    ['3','<?php echo $nome2; ?>', <?php echo $valor2; ?>],
    ['4','<?php echo $nome3; ?>',   <?php echo $valor3; ?>],
    ['5','<?php echo $nome4; ?>',   <?php echo $valor4; ?>]
    ]);

   var table = new google.visualization.Table(document.getElementById('table_div'));

   table.draw(data, {showRowNumber: false, width: '100%', height: '100%'});
}
</script>
</head>

<div id="table_div"></div>

</td>

</tr>
<?php 
if ($anoSelecionado != 2018){
?>
<tr>
 <td>

         <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ["Vereador", "Gastos de <?php echo $anoSelecionado;?> em reais", { role: "style" } ],
                ["<?php echo $nomeVereador1;?>", <?php echo $vereador1;?>, "#00008B"],
                ["<?php echo $nomeVereador2;?>", <?php echo $vereador2;?>, "#0000CD"],
                ["<?php echo $nomeVereador3;?>", <?php echo $vereador3;?>, "#0000FF"],
                ["<?php echo $nomeVereador4;?>", <?php echo $vereador4;?>, "#1E90FF"],
                ["<?php echo $nomeVereador5;?>", <?php echo $vereador5;?>, "#2ECCFA"],
                ["<?php echo $nomeVereador6;?>", <?php echo $vereador6;?>, "#00008B"],
                ["<?php echo $nomeVereador7;?>", <?php echo $vereador7;?>, "#0000CD"],
                ["<?php echo $nomeVereador8;?>", <?php echo $vereador8;?>, "#0000FF"],
                ["<?php echo $nomeVereador9;?>", <?php echo $vereador9;?>, "#1E90FF"],
                ["<?php echo $nomeVereador10;?>", <?php echo $vereador10;?>, "#2ECCFA"],
                ["<?php echo $nomeVereador11;?>", <?php echo $vereador11;?>, "#00008B"],
                ["<?php echo $nomeVereador12;?>", <?php echo $vereador12;?>, "#0000CD"],
                ["<?php echo $nomeVereador13;?>", <?php echo $vereador13;?>, "#0000FF"],
                ["<?php echo $nomeVereador14;?>", <?php echo $vereador14;?>, "#1E90FF"],
                ["<?php echo $nomeVereador15;?>", <?php echo $vereador15;?>, "#2ECCFA"],
                ["<?php echo $nomeVereador16;?>", <?php echo $vereador16;?>, "#00008B"],
                ["<?php echo $nomeVereador17;?>", <?php echo $vereador17;?>, "#0000CD"],
                ["<?php echo $nomeVereador18;?>", <?php echo $vereador18;?>, "#0000FF"],
                ["<?php echo $nomeVereador19;?>", <?php echo $vereador19;?>, "#1E90FF"],
                ["<?php echo $nomeVereador20;?>", <?php echo $vereador20;?>, "#2ECCFA"],
                ["<?php echo $nomeVereador21;?>", <?php echo $vereador21;?>, "#00008B"],
                ["<?php echo $nomeVereador22;?>", <?php echo $vereador22;?>, "#0000CD"],
                ["<?php echo $nomeVereador23;?>", <?php echo $vereador23;?>, "#0000FF"],
                ["<?php echo $nomeVereador24;?>", <?php echo $vereador24;?>, "#1E90FF"],
                ["<?php echo $nomeVereador25;?>", <?php echo $vereador25;?>, "#2ECCFA"],
                ["<?php echo $nomeVereador26;?>", <?php echo $vereador26;?>, "#00008B"],
                ["<?php echo $nomeVereador27;?>", <?php echo $vereador27;?>, "#0000CD"],
                ["<?php echo $nomeVereador28;?>", <?php echo $vereador28;?>, "#0000FF"],
                ["<?php echo $nomeVereador29;?>", <?php echo $vereador29;?>, "#1E90FF"],
                ["<?php echo $nomeVereador30;?>", <?php echo $vereador30;?>, "#2ECCFA"],
                ["<?php echo $nomeVereador31;?>", <?php echo $vereador31;?>, "#00008B"],
                ["<?php echo $nomeVereador32;?>", <?php echo $vereador32;?>, "#0000CD"],
                ["<?php echo $nomeVereador33;?>", <?php echo $vereador33;?>, "#0000FF"],
                ["<?php echo $nomeVereador34;?>", <?php echo $vereador34;?>, "#1E90FF"],
                ["<?php echo $nomeVereador35;?>", <?php echo $vereador35;?>, "#2ECCFA"],
                ["<?php echo $nomeVereador36;?>", <?php echo $vereador36;?>, "#00008B"],
                ["<?php echo $nomeVereador37;?>", <?php echo $vereador37;?>, "#0000CD"],
                ["<?php echo $nomeVereador38;?>", <?php echo $vereador38;?>, "#0000FF"],
                ["<?php echo $nomeVereador39;?>", <?php echo $vereador39;?>, "#1E90FF"],
                ["<?php echo $nomeVereador40;?>", <?php echo $vereador40;?>, "#2ECCFA"],
                ["<?php echo $nomeVereador41;?>", <?php echo $vereador41;?>, "#00008B"],
                ["<?php echo $nomeVereador42;?>", <?php echo $vereador42;?>, "#0000CD"],
                ["<?php echo $nomeVereador43;?>", <?php echo $vereador43;?>, "#0000FF"],
                ["<?php echo $nomeVereador44;?>", <?php echo $vereador44;?>, "1E90FF"],
                ["<?php echo $nomeVereador45;?>", <?php echo $vereador45;?>, "#2ECCFA"]

                ]);

var view = new google.visualization.DataView(data);
view.setColumns([0, 1,
       { calc: "stringify",
       sourceColumn: 1,
       type: "string",
       role: "annotation" },
       2]);

var options = {
        title: "Gastos (em reais) totais de <?php echo $anoSelecionado;?> comparando todos os vereadores",
        width: 1500,
        height: 600,
        bar: {groupWidth: "80%"},
        legend: { position: "none" },
        vAxis: {
            textStyle:{color: '#FFF'}
    }
};
var chart = new google.visualization.BarChart(document.getElementById("barchart_values2"));
chart.draw(view, options);
}
</script>
<div id="barchart_values2" style="width: 800px; height: 600px;"></div>


</td>

</tr>
<?php
}else{
 
 ?>

<tr>
 <td>

         <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
              var data = google.visualization.arrayToDataTable([
                ["Vereador", "Gastos de <?php echo $anoSelecionado;?> em reais", { role: "style" } ],
                ["<?php echo $nomeVereador1;?>", <?php echo $vereador1;?>, "#00008B"],
                ["<?php echo $nomeVereador2;?>", <?php echo $vereador2;?>, "#0000CD"],
                ["<?php echo $nomeVereador3;?>", <?php echo $vereador3;?>, "#0000FF"],
                ["<?php echo $nomeVereador4;?>", <?php echo $vereador4;?>, "#1E90FF"],
                ["<?php echo $nomeVereador5;?>", <?php echo $vereador5;?>, "#2ECCFA"],
                ["<?php echo $nomeVereador6;?>", <?php echo $vereador6;?>, "#00008B"],
                ["<?php echo $nomeVereador7;?>", <?php echo $vereador7;?>, "#0000CD"],
                ["<?php echo $nomeVereador8;?>", <?php echo $vereador8;?>, "#0000FF"],
                ["<?php echo $nomeVereador9;?>", <?php echo $vereador9;?>, "#1E90FF"],
                ["<?php echo $nomeVereador10;?>", <?php echo $vereador10;?>, "#2ECCFA"],
                ["<?php echo $nomeVereador11;?>", <?php echo $vereador11;?>, "#00008B"],
                ["<?php echo $nomeVereador12;?>", <?php echo $vereador12;?>, "#0000CD"],
                ["<?php echo $nomeVereador13;?>", <?php echo $vereador13;?>, "#0000FF"],
                ["<?php echo $nomeVereador14;?>", <?php echo $vereador14;?>, "#1E90FF"],
                ["<?php echo $nomeVereador15;?>", <?php echo $vereador15;?>, "#2ECCFA"],
                ["<?php echo $nomeVereador16;?>", <?php echo $vereador16;?>, "#00008B"],
                ["<?php echo $nomeVereador17;?>", <?php echo $vereador17;?>, "#0000CD"],
                ["<?php echo $nomeVereador18;?>", <?php echo $vereador18;?>, "#0000FF"],
                ["<?php echo $nomeVereador19;?>", <?php echo $vereador19;?>, "#1E90FF"],
                ["<?php echo $nomeVereador20;?>", <?php echo $vereador20;?>, "#2ECCFA"],
                ["<?php echo $nomeVereador21;?>", <?php echo $vereador21;?>, "#00008B"],
                ["<?php echo $nomeVereador22;?>", <?php echo $vereador22;?>, "#0000CD"],
                ["<?php echo $nomeVereador23;?>", <?php echo $vereador23;?>, "#0000FF"],
                ["<?php echo $nomeVereador24;?>", <?php echo $vereador24;?>, "#1E90FF"],
                ["<?php echo $nomeVereador25;?>", <?php echo $vereador25;?>, "#2ECCFA"],
                ["<?php echo $nomeVereador26;?>", <?php echo $vereador26;?>, "#00008B"],
                ["<?php echo $nomeVereador27;?>", <?php echo $vereador27;?>, "#0000CD"],
                ["<?php echo $nomeVereador28;?>", <?php echo $vereador28;?>, "#0000FF"],
                ["<?php echo $nomeVereador29;?>", <?php echo $vereador29;?>, "#1E90FF"],
                ["<?php echo $nomeVereador30;?>", <?php echo $vereador30;?>, "#2ECCFA"],
                ["<?php echo $nomeVereador31;?>", <?php echo $vereador31;?>, "#00008B"],
                ["<?php echo $nomeVereador32;?>", <?php echo $vereador32;?>, "#0000CD"],
                ["<?php echo $nomeVereador33;?>", <?php echo $vereador33;?>, "#0000FF"],
                ["<?php echo $nomeVereador34;?>", <?php echo $vereador34;?>, "#1E90FF"],
                ["<?php echo $nomeVereador35;?>", <?php echo $vereador35;?>, "#2ECCFA"],
                ["<?php echo $nomeVereador36;?>", <?php echo $vereador36;?>, "#00008B"],
                ["<?php echo $nomeVereador37;?>", <?php echo $vereador37;?>, "#0000CD"],
                ["<?php echo $nomeVereador38;?>", <?php echo $vereador38;?>, "#0000FF"],
                ["<?php echo $nomeVereador39;?>", <?php echo $vereador39;?>, "#1E90FF"],
                ["<?php echo $nomeVereador40;?>", <?php echo $vereador40;?>, "#2ECCFA"],
                ["<?php echo $nomeVereador41;?>", <?php echo $vereador41;?>, "#00008B"],
                ["<?php echo $nomeVereador42;?>", <?php echo $vereador42;?>, "#0000CD"],
                ["<?php echo $nomeVereador43;?>", <?php echo $vereador43;?>, "#0000FF"],
                ["<?php echo $nomeVereador44;?>", <?php echo $vereador44;?>, "#1E90FF"],
                ["<?php echo $nomeVereador45;?>", <?php echo $vereador45;?>, "#2ECCFA"]

                ]);

var view = new google.visualization.DataView(data);
view.setColumns([0, 1,
       { calc: "stringify",
       sourceColumn: 1,
       type: "string",
       role: "annotation" },
       2]);

var options = {
        title: "Gastos totais de <?php echo $anoSelecionado;?> comparando todos os vereadores",
        width: 800,
        height: 600,
        bar: {groupWidth: "80%"},
        legend: { position: "none" },
        vAxis: {
            textStyle:{color: '#FFF'}
    }
};
var chart = new google.visualization.BarChart(document.getElementById("barchart_values2"));
chart.draw(view, options);
}
</script>
<div id="barchart_values2" style="width: 750px; height: 600px;"></div>


</td>
<td>
     

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Gasto", "Valor em reais", { role: "style" } ],
        ["Passagem", <?php echo $passagem;?>, "#1E90FF"],
        ["Telefone fixo", <?php echo $telefone_fixo;?>, "#00008B"],
        ["Xerox", <?php echo $xerox;?>, "#0000CC"],
        ["Correio", <?php echo $correio;?>, "#0000CD"],
        ["Material do Expediente", <?php echo $material_expediente;?>, "#0000FE"],
        ["Diárias", <?php echo $diarias;?>, "#0000FF"],
        ["Outros", <?php echo $outros;?>, "#1E90FF"],
        ["Selos", <?php echo $selos;?>, "#2ECCFA"],
        ["Servi&ccedilos", <?php echo $servicos;?>, "#00008B"],
        ["Telefone", <?php echo $telefone;?>, "#0000CC"],
        ["Cursos", <?php echo $cursos;?>, "#0000CD"],
        ["Carimbos", <?php echo $carimbos;?>, "#0000FE"],
        ["Jornal", <?php echo $jornal;?>, "#0000FF"]
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);

      var options = {
        title: "Gastos (em reais) anuais especificados",
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
        hAxis: {
            textStyle:{color: '#FFF'}
    },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
      chart.draw(view, options);
  }
  </script>
<div id="columnchart_values" style="width: 450px; height: 300px;"></div>

</td>

</tr>

<?php } ?>

</tbody>
</table>
<p style="font-family: arial; font-size: 10px;"><b>Dados retirados do <a href="http://www.cmf.sc.gov.br/transparencia/" style="color:#0040FF; text-decoration: none;" target="_blank" >site </a>do portal da transpar&ecircncia da cidade de Florian&oacutepolis.</b></p>
<hr>
</body>

</html>
<?php
//select para ranking
//SELECT Vereadores_idVereadores from(SELECT Vereadores_idVereadores,  SUM(valDebito) AS 'total' , ROW_NUMBER() OVER (ORDER BY SUM(valDebito) desc) AS 'nlinha' FROM debitos  where ano = 2018 GROUP BY Vereadores_idVereadores ORDER BY total DESC ) as ss where Vereadores_idVereadores = 13;

?>