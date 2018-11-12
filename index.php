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
                		data.addColumn('number', 'Vereador');                        					

                		data.addRows([

                			<?php
                			for($i=0;$i<$countArrayLength;$i++){
                				echo "['" . $values[$i]['mes'] . "'," . $values[$i]['newbalance'] . "],";
                			} 
                			?>
                			]);

                		var options = {
                			title: 'Gastos do ano selecionado',
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
            				["Ano", "Gasto", { role: "style" } ],
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
        					['Vereador', 'Soma anual'],
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
        	<p style="font-family: arial; font-size: 13px;"><b>Ranking de gastos do ano selecionado</b></p>
        	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        	<script type="text/javascript">
        		google.charts.load('current', {'packages':['table']});
        		google.charts.setOnLoadCallback(drawTable);

        		function drawTable() {
        			var data = new google.visualization.DataTable();
        			data.addColumn('string', '');
        			data.addColumn('string', 'Vereador');
        			data.addColumn('number', 'Soma anual');
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