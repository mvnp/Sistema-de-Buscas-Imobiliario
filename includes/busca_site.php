<?php

/**
 * Páginação
 * @var [type]
 */
$_SESSION['pagina'] = $_GET['pagina'];
$pagina = $_SESSION['pagina'];

if(isset($_POST['busca-implacavel'])) {

	if( isset( $_POST['tipo'] ) ) {
		$_SESSION['tipo'] 	= $_POST['tipo'];
		$categoria			= $_SESSION['tipo'];
		$categoria			= utf8_encode(utf8_decode($categoria));
		$categoria			= trim(str_replace(" ", "+", $categoria));	
	}

	if( isset( $_POST['bairro'] ) ) {
		$_SESSION['bairro'] = $_POST['bairro'];
		$bairro 			= $_SESSION['bairro'];
		$bairro 			= utf8_encode(utf8_decode($bairro));
		$bairro 			= trim(str_replace(" ", "+", $bairro));
	}	

	if( isset( $_POST['cidade'] ) ) {
		$_SESSION['cidade'] = $_POST['cidade'];
		$cidade 			= $_SESSION['cidade'];
		$cidade 			= utf8_encode(utf8_decode($cidade));
		$cidade 			= trim(str_replace(" ", "+", $cidade));
	}

	if( isset( $_POST['dorms'] ) ) {
		$_SESSION['dorms'] = $_POST['dorms'];
		$search_dorms = $_SESSION['dorms'];

		if(
		   !in_array(1, $search_dorms) && 
		   !in_array(2, $search_dorms) &&
		   !in_array(3, $search_dorms)
		   ){
			$dormitorios = array();
		}		
		else if(
			in_array(1, $search_dorms) && 
		   !in_array(2, $search_dorms) &&
		   !in_array(3, $search_dorms)
		   ){
			$dormitorios = array(1);
		}
		else if (
		   !in_array(1, $search_dorms) && 
		    in_array(2, $search_dorms) &&
		   !in_array(3, $search_dorms)
		   ){
			$dormitorios = array(2);
		}		
		else if (
		   !in_array(1, $search_dorms) && 
		   !in_array(2, $search_dorms) &&
		   in_array(3, $search_dorms)
		   ){
			$dormitorios = array(3, 4, 5, 6, 7, 8, 9, 10);
		}		
		else if (
			in_array(1, $search_dorms) && 
		    in_array(2, $search_dorms) &&
		   !in_array(3, $search_dorms)
		   ){
			$dormitorios = array(1, 2);
		}				
		else if (
			in_array(1, $search_dorms) && 
		    !in_array(2, $search_dorms) &&
		    in_array(3, $search_dorms)
		   ){
			$dormitorios = array(1, 3, 4, 5, 6, 7, 8, 9, 10);
		}		
		else if (
			!in_array(1, $search_dorms) && 
		    in_array(2, $search_dorms) &&
		    in_array(3, $search_dorms)
		   ){
			$dormitorios = array(2, 3, 4, 5, 6, 7, 8, 9, 10);
		}
		else if (
			in_array(1, $search_dorms) && 
		    in_array(2, $search_dorms) &&
		    in_array(3, $search_dorms)
		   ){
			$dormitorios = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
		}	
	}

	if( isset( $_POST['vagas'] ) ) {
		$_SESSION['vagas'] = $_POST['vagas'];
		$search_vagas = $_SESSION['vagas'];

		if(
		   !in_array(1, $search_vagas) && 
		   !in_array(2, $search_vagas) &&
		   !in_array(3, $search_vagas)
		   ){
			$garagens = array();
		}		
		else if(
			in_array(1, $search_vagas) && 
		   !in_array(2, $search_vagas) &&
		   !in_array(3, $search_vagas)
		   ){
			$garagens = array(intval(1));
		}
		else if (
		   !in_array(1, $search_vagas) && 
		    in_array(2, $search_vagas) &&
		   !in_array(3, $search_vagas)
		   ){
			$garagens = array(2);
		}		
		else if (
		   !in_array(1, $search_vagas) && 
		   !in_array(2, $search_vagas) &&
		   in_array(3, $search_vagas)
		   ){
			$garagens = array(3, 4, 5, 6, 7, 8, 9, 10);
		}		
		else if (
			in_array(1, $search_vagas) && 
		    in_array(2, $search_vagas) &&
		   !in_array(3, $search_vagas)
		   ){
			$garagens = array(1, 2);
		}				
		else if (
			in_array(1, $search_vagas) && 
		    !in_array(2, $search_vagas) &&
		    in_array(3, $search_vagas)
		   ){
			$garagens = array(1, 3, 4, 5, 6, 7, 8, 9, 10);
		}		
		else if (
			!in_array(1, $search_vagas) && 
		    in_array(2, $search_vagas) &&
		    in_array(3, $search_vagas)
		   ){
			$garagens = array(2, 3, 4, 5, 6, 7, 8, 9, 10);
		}
		else if (
			in_array(1, $search_vagas) && 
		    in_array(2, $search_vagas) &&
		    in_array(3, $search_vagas)
		   ){
			$garagens = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
		}		
	}

	if( isset( $_POST['valorminimo'] ) ) {
		$_SESSION['valorminimo'] 	= $_POST['valorminimo'];
		$search_vlrmin 				= intval($_SESSION['valorminimo']);

		if($search_vlrmin == "") $search_vlrmin = intval(0);
	}

	if( isset( $_POST['valormaximo'] ) ) {
		$_SESSION['valormaximo'] 	= $_POST['valormaximo'];
		$search_vlrmax 				= intval($_SESSION['valormaximo']);

		if($search_vlrmax == "") $search_vlrmax = intval(100000000);
	}

	$valores = array($search_vlrmin, $search_vlrmax);

	if( isset( $_POST['codigo'] ) ) $_SESSION['codigo'] = $_POST['codigo'];

} else {

	/**
	 * Enviando dados de categoria, bairro e cidade para a busca
	 * @var [type]
	 */
	$categoria = str_replace(" ", "+", $_SESSION['tipo']);
	$bairro = str_replace(" ", "+", $_SESSION['bairro']);
	$cidade = str_replace(" ", "+", $_SESSION['cidade']);

	/**
	 * Enviando valor minimo e maximo sem $_POST[]
	 */
	$_SESSION['valorminimo'] 	= intval(0);
	$search_vlrmin 				= $_SESSION['valorminimo'];
	$_SESSION['valormaximo'] 	= intval(100000000);
	$search_vlrmax 				= $_SESSION['valormaximo'];
	$valores 					= array($search_vlrmin, $search_vlrmax);

	/**
	 * Enviando a quantidade de dormitórios sem $_POST[]
	 */
	$search_dorms = $_SESSION['dorms'];

	if($search_dorms != null) :

		if(
		   !in_array(1, $search_dorms) && 
		   !in_array(2, $search_dorms) &&
		   !in_array(3, $search_dorms)
		   ){
			$dormitorios = array();
		}		
		else if(
			in_array(1, $search_dorms) && 
		   !in_array(2, $search_dorms) &&
		   !in_array(3, $search_dorms)
		   ){
			$dormitorios = array(1);
		}
		else if (
		   !in_array(1, $search_dorms) && 
		    in_array(2, $search_dorms) &&
		   !in_array(3, $search_dorms)
		   ){
			$dormitorios = array(2);
		}		
		else if (
		   !in_array(1, $search_dorms) && 
		   !in_array(2, $search_dorms) &&
		   in_array(3, $search_dorms)
		   ){
			$dormitorios = array(3, 4, 5, 6, 7, 8, 9, 10);
		}		
		else if (
			in_array(1, $search_dorms) && 
		    in_array(2, $search_dorms) &&
		   !in_array(3, $search_dorms)
		   ){
			$dormitorios = array(1, 2);
		}				
		else if (
			in_array(1, $search_dorms) && 
		    !in_array(2, $search_dorms) &&
		    in_array(3, $search_dorms)
		   ){
			$dormitorios = array(1, 3, 4, 5, 6, 7, 8, 9, 10);
		}		
		else if (
			!in_array(1, $search_dorms) && 
		    in_array(2, $search_dorms) &&
		    in_array(3, $search_dorms)
		   ){
			$dormitorios = array(2, 3, 4, 5, 6, 7, 8, 9, 10);
		}
		else if (
			in_array(1, $search_dorms) && 
		    in_array(2, $search_dorms) &&
		    in_array(3, $search_dorms)
		   ){
			$dormitorios = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
		}

	endif;

	/**
	 * Enviando a quantidade de garagens sem $_POST[]
	 */
	$search_vagas = $_SESSION['vagas'];

	if($search_vagas != null) :

		if(
		   !in_array(1, $search_vagas) && 
		   !in_array(2, $search_vagas) &&
		   !in_array(3, $search_vagas)
		   ){
			$garagens = array();
		}		
		else if(
			in_array(1, $search_vagas) && 
		   !in_array(2, $search_vagas) &&
		   !in_array(3, $search_vagas)
		   ){
			$garagens = array(intval(1));
		}
		else if (
		   !in_array(1, $search_vagas) && 
		    in_array(2, $search_vagas) &&
		   !in_array(3, $search_vagas)
		   ){
			$garagens = array(2);
		}		
		else if (
		   !in_array(1, $search_vagas) && 
		   !in_array(2, $search_vagas) &&
		   in_array(3, $search_vagas)
		   ){
			$garagens = array(3, 4, 5, 6, 7, 8, 9, 10);
		}		
		else if (
			in_array(1, $search_vagas) && 
		    in_array(2, $search_vagas) &&
		   !in_array(3, $search_vagas)
		   ){
			$garagens = array(1, 2);
		}				
		else if (
			in_array(1, $search_vagas) && 
		    !in_array(2, $search_vagas) &&
		    in_array(3, $search_vagas)
		   ){
			$garagens = array(1, 3, 4, 5, 6, 7, 8, 9, 10);
		}		
		else if (
			!in_array(1, $search_vagas) && 
		    in_array(2, $search_vagas) &&
		    in_array(3, $search_vagas)
		   ){
			$garagens = array(2, 3, 4, 5, 6, 7, 8, 9, 10);
		}
		else if (
			in_array(1, $search_vagas) && 
		    in_array(2, $search_vagas) &&
		    in_array(3, $search_vagas)
		   ){
			$garagens = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
		}

	endif;

}

/**
 * Montando a busca com os campos recebidos com/sem $_POST[]
 * @var ResultadoBusca
 */
$dataBusca  	= new ResultadoBusca;
$registros  	= $dataBusca->mostrar($categoria, $bairro, $cidade, $dormitorios, $garagens, $pagina, $valores);

/**
 * Criando $_SESSION de todas as variáveis da busca
 * @var [type]
 */
$categoria 		= isset( $_SESSION['tipo'] ) 		? $_SESSION['tipo'] 			: array();
$cidade			= isset( $_SESSION['cidade'] ) 		? $_SESSION['cidade'] 			: array();
$bairro 		= isset( $_SESSION['bairro'] ) 		? $_SESSION['bairro'] 			: array();
$dormitorios	= isset( $_SESSION['dorms'] ) 		? $_SESSION['dorms'] 			: array();
$garagens		= isset( $_SESSION['vagas'] ) 		? $_SESSION['vagas'] 			: array();
$codigo			= isset( $_SESSION['codigo'] ) 		? $_SESSION['codigo'] 			: '';
$valorminimo 	= isset( $_SESSION['valorminimo'] ) ? $_SESSION['valorminimo'] 		: intval(0);
$valormaximo 	= isset( $_SESSION['valormaximo'] ) ? $_SESSION['valormaximo'] 		: intval(100000000);

########################################################################################################
########################################################################################################
########################################################################################################