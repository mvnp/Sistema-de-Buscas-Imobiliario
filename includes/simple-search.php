	<?php require("includes/busca_site.php"); ?>	
	<form id="busca-implacavel" method="POST" action="<?php echo MYSITE; ?>/busca/1" enctype="application/x-www-form-urlencoded">
		<div class="full bgazul-fonce search-imovel">
			<div class="container">
				<div id="buscas-imovel" class="row">
					<div class="col-md-12 padd0">
						<div class="row row-interno" style="margin: 40px 0 30px 0!important; color:#fff">
							<div class="col-md-2 first-field-search">
								<select name="tipo" class="form-control">
									<option value="" <?php echo (($_SESSION['tipo'] == "") ? 'selected="selected"' : ""); ?>>Tipo</option>
									<?php foreach ($cat as $tipo => $valor) { ?>
										<option value="<?php echo $valor; ?>" <?php echo (($_SESSION['tipo'] == $valor) ? 'selected="selected"' : ""); ?>><?php echo $valor; ?></option>
									<?php } ?>											
								</select>
							</div>
							<div class="col-md-2 second-field-search">
								<select name="cidade" class="form-control" required>
									<option value="">Cidade</option>
									<?php foreach ($cidades as $key => $value) { ?>
										<option value="<?php echo $value; ?>" <?php echo ( ( ($_SESSION['cidade'] == $value && $value != null) || ($value == "Porto Alegre") ) ? 'selected="selected"' : ""); ?>><?php echo utf8_decode($value); ?></option>
									<?php } ?>
								</select>	
							</div>	
							<div class="col-md-2 third-field-search">
								<select name="bairro" class="form-control">
									<option value="">Bairros</option>
										<?php foreach ($qartie as $qtier => $q) { ?>
											<option value="<?php echo $q; ?>" <?php echo (($_SESSION['bairro'] == $q) ? 'selected="selected"' : ""); ?>><?php echo $q; ?></option>
										<?php } ?>
								</select>	
							</div>
							<!-- div class="col-md-2 third-field-search">
							<?php /*
							if(isset($_SESSION['bairro'])){ ?>
							    <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairros" value="<?php echo $_SESSION['bairro']; ?>" data-toggle="modal" data-target="#modalBairros" data-whatever="@getbootstrap">
							<?php } else { ?>
								<input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairros" data-toggle="modal" data-target="#modalBairros" data-whatever="@getbootstrap">
							<?php } */ ?>
							</div -->						
							<div class="col-md-2 fourth-field-search">
								<select name="valorminimo" class="form-control">
									<option value="">Valor de</option>
									<option value="300000" <?php echo (($valorminimo == '300000') ? 'selected="selected"' : ""); ?>>R$ 300.000,00</option>
									<option value="400000" <?php echo (($valorminimo == '400000') ? 'selected="selected"' : ""); ?>>R$ 400.000,00</option>
									<option value="500000" <?php echo (($valorminimo == '500000') ? 'selected="selected"' : ""); ?>>R$ 500.000,00</option>
									<option value="600000" <?php echo (($valorminimo == '600000') ? 'selected="selected"' : ""); ?>>R$ 600.000,00</option>
									<option value="700000" <?php echo (($valorminimo == '700000') ? 'selected="selected"' : ""); ?>>R$ 700.000,00</option>
									<option value="800000" <?php echo (($valorminimo == '800000') ? 'selected="selected"' : ""); ?>>R$ 800.000,00</option>
									<option value="900000" <?php echo (($valorminimo == '900000') ? 'selected="selected"' : ""); ?>>R$ 900.000,00</option>
									<option value="1000000" <?php echo (($valorminimo == '1000000') ? 'selected="selected"' : ""); ?>>R$ 1.000.000,00</option>
									<option value="1500000" <?php echo (($valorminimo == '1500000') ? 'selected="selected"' : ""); ?>>R$ 1.500.000,00</option>
									<option value="2000000" <?php echo (($valorminimo == '2000000') ? 'selected="selected"' : ""); ?>>+R$ 2.000.000,00</option>
								</select>	
							</div>	
							<div class="col-md-2 fifth-field-search">
								<select name="valormaximo" class="form-control">
									<option value="">Valor até</option>
									<option value="300000" <?php echo (($valormaximo == '300000') ? 'selected="selected"' : ""); ?>>R$ 300.000,00</option>
									<option value="400000" <?php echo (($valormaximo == '400000') ? 'selected="selected"' : ""); ?>>R$ 400.000,00</option>
									<option value="500000" <?php echo (($valormaximo == '500000') ? 'selected="selected"' : ""); ?>>R$ 500.000,00</option>
									<option value="600000" <?php echo (($valormaximo == '600000') ? 'selected="selected"' : ""); ?>>R$ 600.000,00</option>
									<option value="700000" <?php echo (($valormaximo == '700000') ? 'selected="selected"' : ""); ?>>R$ 700.000,00</option>
									<option value="800000" <?php echo (($valormaximo == '800000') ? 'selected="selected"' : ""); ?>>R$ 800.000,00</option>
									<option value="900000" <?php echo (($valormaximo == '900000') ? 'selected="selected"' : ""); ?>>R$ 900.000,00</option>
									<option value="1000000" <?php echo (($valormaximo == '1000000') ? 'selected="selected"' : ""); ?>>R$ 1.000.000,00</option>
									<option value="1500000" <?php echo (($valormaximo == '1500000') ? 'selected="selected"' : ""); ?>>R$ 1.500.000,00</option>
									<option value="10000000" <?php echo (($valormaximo == '10000000') ? 'selected="selected"' : ""); ?>>+R$ 2.000.000,00</option>
								</select>	
							</div>	
							<div class="col-md-2">
								<input type="submit" name="busca-implacavel" class="btn btn-success btn-block nobradius montserrat fs-16" value="Buscar" style="height:39px">
							</div>																			
							</div>
						</div>		
					</div>
					<div class="row branco">
						<div class="col-md-12 montserrat branco fs-18">
							<p style="margin:0 0 20px">
								<a class="montserrat azul-claro fs-16" href="<?php echo MYSITE; ?>/busca">
									Busca avançada e por código
								</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>