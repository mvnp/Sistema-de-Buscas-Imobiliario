<?php if(!isset($_SESSION)){ session_start(); } ?>
<?php require('includes/header-general.php'); ?>
<div class="home">
	<div class="row padding-resultado">
		<div class="col-md-8">
			<img src="assets/images/logo-destaque.png" class="logo-destaque floatleft" alt="">
			<p class="destaque destaque-resultado upper montserrat fs-30 fw-700">
				<span class="title-resultados"><?php echo $registros['total']; ?> <span class="azul-claro">imóveis encontrados</span></span>
			</p>
		</div>
		<div class="col-md-4">
			<div class="row ordenacao">
				<div class="col-md-6 azul-fonce fs-18 fw-700">
					<p class="montserrat ajuste-ordenacao">Ordenação</p>
				</div>
				<div class="col-md-6">
					<select name="ordenacao" id="ordenacao" class="form-control btn-block montserrat nobradius">
						<option value="" class="">Maior valor</option>
						<option value="" class="">Menor valor</option>
						<option value="" class="">Maior área</option>
						<option value="" class="">Menor área</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div id="search-result" class="row hi resultado">
	<?php 
		foreach ($registros['resultado'] as $imoveis) {
			if($imoveis['ImoCodigo'] != "") {
				echo '<div class="col-md-4 col-sm-6 col-xs-12">';
					echo '<div class="imovel rel">';
						echo '<div class="nomeimovel abs full bgazul-fonce">';
							echo '<p class="titleimovel titleimovel-top montserrat fs-16 branco txtcenter">';
								echo '<a href="'.MYSITE.'/imovel/'.$url->friendly_url($imoveis['Categoria'].'-'.$imoveis['Cidade'].'-'.$imoveis['Bairro']).'_'.$imoveis['ImoCodigo'].'" class="branco">'.$imoveis['Bairro'].'</a>';
							echo '</p>';
						echo '</div>';
						echo '<div class="preco-imovel abs bottom">';
							echo '<span class="montserrat fs-16 fw-700">'.converter_preco($imoveis['ValorVenda']).'</span>';
						echo '</div>';
						echo '<a href="'.MYSITE.'/imovel/'.$url->friendly_url($imoveis['Categoria'].'-'.$imoveis['Cidade'].'-'.$imoveis['Bairro']).'_'.$imoveis['ImoCodigo'].'">';
							echo '<img class="imagem-destacada" src="'.$imoveis['FotoDestaque'].'" alt="">';
						echo '</a>';
					echo '</div>';
					echo '<div class="titulo-imovel row">';
						echo '<p class="titleimovel montserrat fs-16 fw-700 azul-fonce txtcenter">';
							echo '<a href="'.MYSITE.'/imovel/'.$url->friendly_url($imoveis['Categoria'].'-'.$imoveis['Cidade'].'-'.$imoveis['Bairro']).'_'.$imoveis['ImoCodigo'].'" class="azul-fonce fw-700">'.$imoveis['Categoria'].' em '.$imoveis['Bairro'].'</a>';
						echo '</p>';				
					echo '</div>';
					echo '<div class="row detalhes-resultado">';
						echo '<div class="col-md-4 col-sm-4 col-xs-4 area">';
							echo '<span class="quantidade montserrat azul-claro fs-16 fw-700">'.round($imoveis['AreaTotal'], 0).'m<sup>2</sup></span>';
						echo '</div>';
						echo '<div class="col-md-4 col-sm-4 col-xs-4 dormitorios">';
							echo '<span class="quantidade montserrat azul-claro fs-16 fw-700">'.$imoveis['Dormitorios'].'</span>';
						echo '</div>';
						echo '<div class="col-md-4 col-sm-4 col-xs-4 col-md-4 garagem">';
							echo '<span class="quantidade montserrat azul-claro fs-16 fw-700">'.$imoveis['Vagas'].'</span>';
						echo '</div>';
					echo '</div><hr class="hr">';
				echo '</div>';
			}
		}
	?>	
	</div>
	<!-- br>postFields: <?php /* echo $registros['postFields']; ?>
	<br>quantidade de imoveis: <?php echo $registros['total']; ?>
	<br>pagina atual: <?php echo $registros['pagina']; ?>
	<br>paginas existentes: <?php echo $registros['paginas']; ?>
	<br>quantidade imóveis por página existentes: <?php echo $registros['quantidade']; */ ?>
	<br -->
	<div class="row footer-pagination floatright">
		<div class="col-md-12">
			<nav class="paginator">
				<ul class="pagination-nav">
					<li class="hidden"><a href="">Anterior</a></li>
					<?php if ($registros['pagina'] == 1) { ?>
						<li class="hidden"><a href="">Página Anterior</a></li>
					<?php } else { ?>
						<li><a href="<?php echo MYSITE; ?>/busca/<?php echo $registros['pagina']-1; ?>">Página Anterior</a></li>
					<?php } ?>
					<?php for ($i = 1; $i <= $registros['paginas']; $i++) { ?>
						<li><a name="pagina" href="<?php echo MYSITE; ?>/busca/<?php echo $i; ?>" value="<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php } ?>
					<?php if ($registros['pagina'] == $registros['paginas']) { ?>
						<li class="hidden"><a href="">Próxima página</a></li>
					<?php } else { ?>
						<li><a href="<?php echo MYSITE; ?>/busca/<?php echo $registros['pagina']+1; ?>">Próxima página</a></li>
					<?php } ?>	
				</ul>
				<label class="pagination-select monserrat" for="paginacao">Selecione uma página para ver os próximos imóveis na Pier36 ...</label>
				<select name="paginacao" class="pagination-select form-control montserrat nobradius"> 
					<option value="" selected="selected">Selecione uma página ...</option> 
					<option value="">1</option> 
					<option value="">2</option> 
					<option value="">3</option> 
					<option value="">4</option> 
					<option value="">5</option> 
					<option value="">6</option> 
					<option value="">7</option> 
				</select> 	
			</nav>

		</div>
	</div>
</div>

<?php require('includes/footer.php'); ?>