<div class="col-lg-12 col-sm-12 col-md-12" style="margin-top:2%; text-align: center">
		<a class="btn btn-danger btn-sm" style="margin-left: 85px; float: right"
		   href="<?= site_url('Categoria'); ?>">Voltar</a>
</div>
<div style="padding-top: 50px"></div>
<form id="FormEnviar" method="post" action="<?= site_url('Categoria/cadastrar') ?>">
	<?php if(!empty($retorno['retorno'])){ ?>
		<div class="box-body">
			<div class="container">
				<div class="table-responsive">
					<table id="tabela">
						<tbody class="row">
						<tr style="display: none">
							<td>
								<div class="col-md-10 col-xs-10 col-lg-10">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Categoria" name="categoria[]"
											   style="width: 850px; margin-top: 2%"/>
									</div>
								</div>
							</td>
							<td>
								<div class="col-lg-2 col-sm-2 col-md-2">
									<button type="button"
											class="btn btn-danger btn-sm remove"><i class="fa fa-trash" aria-hidden="true"></i></button>
								</div>
							</td>
						</tr>
						<?php $i = 0;
						foreach ($retorno['retorno'] as $dados){ $i += 1?>
							<tr>
								<td>
									<div class="col-md-10 col-xs-10 col-lg-10">
										<div class="form-group">
											<input type="text" class="form-control" placeholder="Categoria" name="categoria[]" value="<?= $dados['nomeCategoria'] ?>"
												   style="width: 850px; margin-top: 2%"/>
										</div>
									</div>
								</td>
								<td>
									<?php if($i == 1){ ?>
										<div class="col-lg-2 col-sm-2 col-md-2">
											<button type="button" id="plus"
													class="btn btn-success btn-sm "><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
										</div>
									<?php }else{?>
										<div class="col-lg-2 col-sm-2 col-md-2">
											<button type="button"
													class="btn btn-danger btn-sm remove"><i class="fa fa-trash" aria-hidden="true"></i></button>
										</div>
									<?php } ?>

								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<?php }else{ ?>
		<div class="box-body">
			<div class="container">
				<div class="table-responsive">
					<table id="tabela">
						<tbody class="row">
						<tr style="display: none">
							<td>
								<div class="col-md-10 col-xs-10 col-lg-10">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Categoria" name="categoria[]" maxlength="250"
											   style="width: 850px; margin-top: 2%"/>
									</div>
								</div>
							</td>
							<td>
								<div class="col-lg-2 col-sm-2 col-md-2">
									<button type="button"
											class="btn btn-danger btn-sm remove"><i class="fa fa-trash" aria-hidden="true"></i></button>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-10 col-xs-10 col-lg-10">
									<div class="form-group">
										<input type="text" class="form-control" placeholder="Categoria" name="categoria[]" maxlength="250"
											   style="width: 850px; margin-top: 2%"/>
									</div>
								</div>
							</td>
							<td>
								<div class="col-lg-2 col-sm-2 col-md-2">
									<button type="button" id="plus"
											class="btn btn-success btn-sm "><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
								</div>
							</td>
						</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	<?php } ?>
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
