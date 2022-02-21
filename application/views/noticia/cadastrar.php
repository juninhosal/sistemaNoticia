<div class="col-lg-12 col-sm-12 col-md-12" style="margin-top:2%; text-align: center">
		<a class="btn btn-danger btn-sm" style="margin-left: 85px; float: right"
		   href="<?= site_url('Noticia'); ?>">Voltar</a>
</div>
<div style="padding-top: 50px"></div>
<?php if(empty($dadosNoticia)){ ?>
<form id="FormEnviar" method="post" action="<?= site_url('Noticia/cadastrar')?>">
<?php } else { ?>
<form id="FormEnviar" method="post" action="<?= site_url('Noticia/cadastrar/') . $dadosNoticia[0]['idNoticia'] ?>">
	<?php }?>
		<div class="box-body row">
			<div class="container">
				<div class="table-responsive">
					<div class="col-md-6 col-xs-6 col-lg-6">
						<label>Nome</label>
						<div class="form-group">
							<input type="text" class="form-control" placeholder="Nome" name="nome" value="<?= !empty($dadosNoticia[0]['nome']) ? $dadosNoticia[0]['nome'] : null ?>"  maxlength="250"/>
						</div>
					</div>
					<div class="col-md-6 col-xs-6 col-lg-6">
						<label>Categoria</label>
						<div class="form-group" style="width: 250px; margin-top: 2%">
							<select class="form-control select2" name="categoria">
								<option selected="selected"
										value="">Selecionar</option>
								<?php
								foreach((!empty($dadosSelect) ? $dadosSelect : array()) AS $value) {
									?>
									<option value="<?= $value['idCategoria'] ?>" <?= (!empty($dadosNoticia[0]['idCategoria']) ? $dadosNoticia[0]['idCategoria'] : null == $value['idCategoria']) ? 'selected' : null;?>><?= $value['nomeCategoria'] ?></option>
									<?php
								}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-12 col-xs-12 col-lg-12">
						<label>Descrição</label>
						<textarea class="form-control" rows="3" placeholder="Descrição" name="descricao"><?= !empty($dadosNoticia[0]['descricao']) ? $dadosNoticia[0]['descricao'] : null ?></textarea>
					</div>

				</div>
			</div>
		</div>
		<div class="col-lg-12 col-sm-12 col-md-12" style="margin-top:2%; text-align: center">
			<button type="button" class="btn btn-success btn-sm" onclick="confirmar()">salvar</button>
		</div>
</form>

<script>

	function confirmar(){
		Swal.fire({
			icon: 'info',
			title: 'Cadastrar Categoria',
			text: 'Você deseja salvar o cadasto?',
			showCancelButton: true,
			showConfirmButton: true,
			confirmButtonText: 'Salvar',
			cancelButtonText: 'Cancelar',
			confirmButtonColor: '#43A047',
			cancelButtonColor: '#d33'
		}).then((result) => {
			if(result.value === true){
				$('#FormEnviar').submit();
			}
		});
	}


	function deletaLinha(item){

		var tr = $(item).closest('tr');
		tr.fadeOut(400, function(){
			tr.remove();
		});
		return false;
	}

	function onClikRemove(){
		$('.remove').off('click');
		$('.remove').on('click', function(){
			deletaLinha($(this));
		});
	}

	onClikRemove();

	$('#plus').off('click');
	$("#plus").on("click", function(){
		//seletor do body da table
		var $tbody = $("#tabela > tbody");
		//clona a primeira tr
		var $tr = $tbody.children("tr:first").clone();
		$($tr).attr('style', '');
		//limpa todos os tds da tr
		$tr.each(function(){
			$(this).find("input").val("");
		});
		//adiciona a tr clonada ao body
		$tbody.append($tr);
		onClikRemove();
	});
</script>
