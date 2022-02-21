<div class="row">
	<div class="col-lg-12 col-sm-12 col-md-12">
		<button type="button" class="btn btn-success btn-sm" style="float: right;margin-right: 1.5%"
				onclick="location.href='<?= site_url('Noticia/cadastrarNoticia'); ?>'">
			Novo
		</button>
	</div>
</div>
<BR/>
<div class="table-responsive">
	<table id="example1" class="table table-bordered table-striped" style="text-align: center">
		<thead>
			<tr>
				<th>Código</th>
				<th>Nome</th>
				<th>Descrição</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody style="text-align: center">
			<?php foreach ($dadosTabela AS $dados){ ?>
				<tr>
					<td style="width: 50px">
						<?= $dados['idNoticia'] ?>
					</td>
					<td>
						<?= $dados['nome'] ?>
					</td>
					<td style="width: 450px">
						<?= $dados['descricao']?>
					</td>
					<td>
						<div style="display: inline-block">
							<a href="<?= site_url('Noticia/cadastrarNoticia/'.$dados['idNoticia']) ?>" type="button" class="btn btn-warning btn-sm editar" >
								<i class="fa fa-paint-brush" aria-hidden="true"></i></a>
						</div>
						<div style="display: inline-block">
							<a href="<?= site_url('Noticia/deletarNoticia/'.$dados['idNoticia']) ?>" type="button" class="btn btn-danger btn-sm excluir" >
								<i class="fa fa-trash" aria-hidden="true"></i></a>
						</div>
					</td>
				</tr>
			<?php }?>
			</tbody>
	</table>
</div>
<script>
	$(function () {
		$("#example1").DataTable({
			"paging": true,
			"lengthChange": true,
			"searching": true,
			"ordering": false,
			"info": true,
			"autoWidth": true,
			"responsive": true,
			"language": {
				"sEmptyTable": "Nenhum registro encontrado",
				"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
				"sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
				"sInfoFiltered": "(Filtrados de _MAX_ registros)",
				"sInfoPostFix": "",
				"sInfoThousands": ".",
				"sLengthMenu": "_MENU_ resultados por página",
				"sLoadingRecords": "Carregando...",
				"sProcessing": "Processando...",
				"sZeroRecords": "Nenhum registro encontrado",
				"sSearch": "Pesquisar",
				"oPaginate": {
					"sNext": "Próximo",
					"sPrevious": "Anterior",
					"sFirst": "Primeiro",
					"sLast": "Último"
				},
				"oAria": {
					"sSortAscending": ": Ordenar colunas de forma ascendente",
					"sSortDescending": ": Ordenar colunas de forma descendente"
				},
				"select": {
					"rows": {
						"_": "Selecionado %d linhas",
						"0": "Nenhuma linha selecionada",
						"1": "Selecionado 1 linha"
					}
				},
				"buttons": {
					"copy": "Copiar",
					"csv": "CSV",
					"excel": "Execel",
					"pdf": "PDF",
					"print": "Imprimir",
					"colvis": "Ocultar coluna"
				}
			},
			"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
		}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>

