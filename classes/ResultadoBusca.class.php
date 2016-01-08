<?php

class ResultadoBusca extends Acesso
{
	public function mostrar($search_tipo = null, $search_bairro = null, $search_cid = null, $search_dorms = null, $search_vagas = null, $pagina = null, $valores = null)
	{
		$pagina = $pagina;

		$dados = array(
			'fields' => array(
				'ImoCodigo', 'ValorVenda', 'FotoDestaque', 'Cidade', 
				'Categoria', 'Bairro', 'Vagas', 'Dormitorios', 'AreaTotal'
			)
		);

		((!empty($pagina))? 
			array($dados['paginacao']['pagina'] = intval($pagina), $dados['paginacao']['quantidade'] = 18) :			
			array($dados['paginacao']['pagina'] = 1, $dados['paginacao']['quantidade'] = 18)
		);	

		((!empty($valores))? $dados['filter']['ValorVenda'] = $valores : '');
		((!empty($search_dorms))? $dados['filter']['Dormitorios'] = $search_dorms : '');
		((!empty($search_vagas))? $dados['filter']['Vagas'] = $search_vagas : '');
		((!empty($search_tipo))? $dados['filter']['Categoria'] = array($search_tipo) : '');
		((!empty($search_bairro))? $dados['filter']['Bairro'] = array($search_bairro) : '');
		((!empty($search_cid))? $dados['filter']['Cidade'] = array($search_cid) : '');

		$postFields  = json_encode($dados);
		$url       	 = 'http://sandbox-rest.vistahost.com.br/'.$this->vsimoveis.'/'.$this->vslistar.'?key=' . $this->vskey;
		$url        .= '&showtotal=1&pesquisa=' . $postFields;

		$ch = curl_init($url);
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER , array( 'Accept: application/json' ) );
		$result = curl_exec($ch); 
		$result = json_decode($result, true);

		return array(
			'resultado' => $result,
			'pagina' => $result['pagina'],
			'paginas' => $result['paginas'],
			'quantidade' => $result['quantidade'],
			'total' => $result['total'],
			'postFields' => $postFields,
		);
		
	}

}