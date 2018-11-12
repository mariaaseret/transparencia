<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teste";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 



$file = fopen("ex.csv", "r");
$a =process_csv($file); //todas as linhas do documento

//var_dump(process_csv($file));

$fp = file('ex.csv');
echo '<br/>';
echo count($fp);
echo '<br/>';
$linhas =count($fp); //quantas linhas tem o documento


/*recursive_show_array($a);
function recursive_show_array($arr)
{
     foreach($arr as $value)
     {
          if(is_array($value))
          {
               recursive_show_array($value);
          }
          else
          {
               echo $value;
          }
     }
}*/


$contador = 0;
$conteudo[][] =0; //iniciando array de nomes
$auxNome  = ($linhas*4)-2; // auxiliar para o array de nomes
$mudou = ($linhas*4)-3; //auxiliar para o array de todos os valores
$auxValor = ($linhas*4)-27; //auxiliar para o array de todos os valores



//percorre o array processado pela funcao process_csv e insere somente os nomes dos candidatos em uma array sepada, comparando os valores individualmente.
//insere tb o valor gasto de cada um deles em uma array 
foreach ($a as $row)
{
    foreach($row as $i => $a)
    {
    	$contador++;
    	if((($linhas*4)-$contador) == $auxNome ){
    		print_r($contador);
    		if(sizeof($conteudo[0]) <= 25){ //verifica se contem os 25 vereadores
    			$conteudo[0][] = $a;
    		}else{
				if (!in_array($a, $conteudo[0])){ //se passar de 25
			    $conteudo[0][] = $a;
			    echo 'encontrou nome igual';
				}
    		}
		$auxNome  = $auxNome -84;
		$mudou = $mudou - 8;
    	}
    	if((($linhas*4)-$contador) == $auxValor){
    		$conteudo[2][] = $a;
			$auxValor = $auxValor - 84;
    	}
    	if((($linhas*4)-$contador) == $mudou){
    		$conteudo[1][] = $a;
			$mudou = $mudou - 4;
    	}
    	

    }
}





//seleciona somente os valores relacionados aos débitos de cada vereador.
//e armazena no $conteudo[2][]




echo '<pre>'; print_r($conteudo); echo '</pre>';

//organiza todo o documento e coloca em um array duplo, cada linha com quatro colunas.
function process_csv($file) {
    $file = fopen("ex.csv", "r");
    $data = array();
	$cont=0;
    while (!feof($file)) {
        $csvdata = fgetcsv($file);
        $csvdata = array_map("utf8_encode", $csvdata); //added
        $data[] = explode(';', $csvdata[0]);

    }
    //print_r(array_values($data[0]));
    fclose($file);
    return $data;
}









?>