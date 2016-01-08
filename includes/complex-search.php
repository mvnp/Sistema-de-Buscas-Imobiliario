<?php require("includes/busca_site.php"); ?>
<form id="busca-implacavel" method="POST" action="<?php echo MYSITE; ?>/busca/1" enctype="application/x-www-form-urlencoded">	
	<div class="full bgcinza-claro search-imovel" style="padding-bottom:30px">
		<div class="container">
			<div id="buscas-imovel" class="row">
					<div class="col-md-12 padd0">
							<div class="row row-interno cod-ajuste-responsivo">
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
										<option value="" <?php echo (($_SESSION['cidade'] == "") ? 'selected="selected"' : ""); ?>>Cidade</option>
										<?php foreach ($cidades as $key => $value) { ?>
											<option value="<?php echo $value; ?>"  <?php echo ( ( ($_SESSION['cidade'] == $value && $value != null) || ($value == "Porto Alegre") ) ? 'selected="selected"' : ""); ?>><?php echo utf8_decode($value); ?></option>
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
<?php
if(isset($_SESSION['bairro'])){ ?>
    <input type="text" class="form-control" name="bairro" id="bairro" placeholder="Bairros" value="<?php echo $_SESSION['bairro']; ?>" data-toggle="modal" data-target="#modalBairros" data-whatever="@getbootstrap">
<?php } else { ?>
	<input type="text" name="bairro" id="bairro" class="form-control" placeholder="Bairros" data-toggle="modal" data-target="#modalBairros" data-whatever="@getbootstrap">
<?php } ?>
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
								<?php
								if(isset($_SESSION['codigo'])){ ?>
									<input type="text" name="codigo" value="<?php echo $_SESSION['codigo']; ?>" class="form-control" placeholder="Código">									    
								<?php } else { ?>
									<input type="text" name="codigo" value="" class="form-control" placeholder="Código">
								<?php } ?>										
								</div>																			
							</div>
						</div>		
					</div>
					<div class="row branco">
						<div class="col-md-12 montserrat azul-fonce fs-18">
							<div class="row">
								<div class="col-md-3 arrays-ajuste ajuste-fonte-fino">
									<div class="row">
										<div class="col-md-5 col-sm-5 col-xs-5" style="padding-top:8px">Dormitórios</div>
										<div class="col-md-7 col-sm-7 col-xs-7">
											<div id="checkboxes" class="checkboxes ajuste-checkboxes floatright">
												<input id="dorm1" class="hidden drm" type="checkbox" name="dorms[]" value="1" <?php echo ((in_array('1', $dormitorios)) ? "checked='checked'" : ""); ?>>
												<label for="dorm1" class="montserrat fs-16">1</label>										
												<input id="dorm2" class="hidden drm" type="checkbox" name="dorms[]" value="2" <?php echo ((in_array('2', $dormitorios)) ? "checked='checked'" : ""); ?>>
												<label for="dorm2" class="montserrat fs-16">2</label>										
												<input id="dorm3" class="hidden drm" type="checkbox" name="dorms[]" value="3" <?php echo ((in_array('3', $dormitorios)) ? "checked='checked'" : ""); ?>>
												<label for="dorm3" class="montserrat fs-16">3+</label>
											</div>
										</div>
									</div>
								</div>								
								<div class="col-md-3 ajuste-fonte-fino">
									<div class="row">
										<div class="col-md-5 col-sm-5 col-xs-5 ajuste-vagas ajuste-vagas-2">Vagas</div>
										<div class="col-md-7 col-sm-7 col-xs-7 ajuste-alinhamento">
											<div id="checkboxes" class="checkboxes ajuste-checkboxes floatright">
												<input id="vaga1" class="hidden drm" type="checkbox" name="vagas[]" value="1" <?php echo ((in_array('1', $garagens)) ? "checked='checked'" : ""); ?>>
												<label for="vaga1" class="montserrat fs-16">1</label>										
												<input id="vaga2" class="hidden drm" type="checkbox" name="vagas[]" value="2" <?php echo ((in_array('2', $garagens)) ? "checked='checked'" : ""); ?>>
												<label for="vaga2" class="montserrat fs-16">2</label>										
												<input id="vaga3" class="hidden drm" type="checkbox" name="vagas[]" value="3" <?php echo ((in_array('3', $garagens)) ? "checked='checked'" : ""); ?>>
												<label for="vaga3" class="montserrat fs-16">3+</label>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="row">
										<div class="col-md-8"></div>
										<div class="col-md-4">
											<input type="submit" name="busca-implacavel" value="Buscar" class="ajuste-submit-responsivo btn btn-success btn-block nobradius montserrat fs-16" style="height:39px">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>