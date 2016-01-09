<?php

/**
 * Definindo constantes do sistema
 * @var Constantes
*/
setlocale(LC_TIME, 'pt_BR.UTF-8');
setlocale(LC_MONETARY, 'pt_BR.UTF-8');
define('MYSITE', 'http://' . $_SERVER["HTTP_HOST"]) . '/';
define('HOMEPAGE', 'http://' . $_SERVER["HTTP_HOST"] . '/home');
define('PI_CSS', 'http://' . $_SERVER["HTTP_HOST"] . '/assets/css/');
define('PI_JS', 'http://' . $_SERVER["HTTP_HOST"] . '/assets/js/');
define('PI_IMG', 'http://' . $_SERVER["HTTP_HOST"] . '/assets/images/');

/**
 * Função para verificar o script que está sendo executado
 * @var [type]
 */
$im = explode("/", $_SERVER['SCRIPT_NAME']);

/**
 * Redirecionando url principal do site
 * @return [type] [description]
*/
function redirect()
{
	$myinit = 'http://' . $_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI'];
	$init 	= array(
		         'http://new.pier36imoveis.com.br', 
	         	 'http://new.pier36imoveis.com.br/', 
	         	 'http://new.pier36imoveis.com.br/index', 
	         	 'http://new.pier36imoveis.com.br/index.php', 
	          );

	if(in_array($myinit, $init))
	{
		echo '<script>location.href="/home";</script>';
	}
}
redirect();

function redirectBusca()
{
	$myinit = 'http://' . $_SERVER["HTTP_HOST"].$_SERVER['REQUEST_URI'];
	$init 	= array(
		         'http://new.pier36imoveis.com.br/busca',
		         'http://new.pier36imoveis.com.br/busca/',
	          );

	if(in_array($myinit, $init))
	{
		echo '<script>location.href="/busca/1";</script>';
	}
}
redirectBusca();

function converter_preco($valor)
{
	$valor = (int)$valor;
	return money_format('%n', $valor);
}

/**
 * Carregando as classes com Autoload::loader
 */
Autoload::loader(['Acesso', 
	              'Cidades', 
	              'Bairros', 
	              'Categorias', 
	              'Imoveis', 
	              'Imovel', 
	              'Imoveis', 
	              'UrlAmigavel', 
	              'Title', 
	              'FotoImovel', 
	              'ResultadoBusca',
	              'Infraestrutura', 
	              'Caracteristicas', 
	              'Semelhantes']);


/**
 * Instanciando objetos para trabalhar com dados
 * @var Imoveis
*/
$imoveis	= new Imoveis;
$imovel		= new Imovel;
$url 		= new UrlAmigavel;
$title		= new Title;
$allfotos	= new FotoImovel;

/**
 * Implementação de imóveis na index home page
 * @var Imoveis
*/
$index		= $imoveis->qtde_imoveis($imoveis->key, $imoveis->tipo, $imoveis->param, 1, 12);
$atual		= $index['pagina'];
$tpages		= $index['paginas'];
$imppage	= $index['quantidade'];
$timov		= $index['total'];

/**
 * Pegando o ID do imóvel ao acessar uma página de imóvel
 * @var [type]
 */
$id 		= $imovel->get_ID();

/**
 * Definindo configurações para receber o titulo da página
 * @var [type]
*/
$pagetitle	= $title->escreve($id, $title->key, $title->tipo, $title->param);

/**
 * Armazenando todas as características de um imóvel
 * @var [type]
*/
$carac		= $imovel->listar_imovel($id);

/**
 * Obtendo as Cidades do Webservice
 * @var Cidades
 */
$cidades 	= new Cidades;
$cidades = $cidades->mostrar_cidades();

/**
 * Obtendo os Bairros do Webservice
 * @var [type]
 */
$cartie 	= new Bairros;
$qartie = $cartie->mostrar_bairros();

/**
 * Obtendo os Categorias de Imóveis do Webservice
 * @var [type]
 */
$categoria  = new Categorias;
$cat = $categoria->mostrar_categorias();

/**
 * Trecho responsável por mostrar Features do Imóvel
 * @var [type]
 */
if($im[1] == 'imovel.php') :
	$imofeatures	= new Caracteristicas;
	$imofeatures	= $imofeatures->mostrar_carac($id);
	$imofeatures	= $imofeatures['Caracteristicas'];
endif;

/**
 * Trecho responsável por mostrar Features do Condomínio
 * @var Infraestrutura
 */
if($im[1] == 'imovel.php') :
	$condfeatures	= new Infraestrutura;
	$condfeatures	= $condfeatures->mostrar_carac($id);
	$condfeatures	= $condfeatures['InfraEstrutura'];
endif;


/**
 * Recolhendo imóveis similares para mostrar no site
 * @var Semelhantes
 */
if($im[1] == 'imovel.php') :
	$obj 		= new Semelhantes;
	$features 	= $obj->features($id);
	$similar 	= $obj->resemblant();
endif;