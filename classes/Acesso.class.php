<?php 

/**
 * Constantes de acesso ao Webservice VistaSoft
 * Podemos extender Abstract mas não instanciar
 */
abstract class Acesso 
{
	protected $vskey = 'c9fdd79584fb8d369a6a579af1a8f681';
	protected $vsimovel = 'imovel';
	protected $vsimoveis = 'imoveis';
	protected $vsdetalhes = 'detalhes';
	protected $vslistar = 'listar';
	protected $vsconteudo = 'listarConteudo';
}