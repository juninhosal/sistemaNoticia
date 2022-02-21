<form id="FormEnviar" method="post" action="<?= site_url('Noticia/cadastrar')?>">

</form>

<div class="row" data-aos="fade-up">
	<div class="col-lg-3 stretch-card grid-margin">
		<div class="card">
			<div class="card-body">
				<h2>Category</h2>
				<ul class="vertical-menu">
					<?php foreach ($categoria AS $item){ ?>
						<li><a href="<?= site_url("PortalNoticia/NoticiaCategoria") . $item['idCategoria'] ?>"><?= $item['nomeCategoria'] ?></a></li>
					<?php }?>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-lg-9 stretch-card grid-margin">
		<div class="card">
			<div class="card-body" style="text-align: center; padding-left: 250px">
				<div class="row">
					<?php foreach ($noticiaCategoria AS $noticias){ ?>
						<div class="col-sm-8  grid-margin" >
							<h2 class="mb-2 font-weight-600">
								<?= $noticias['nome'] ?>
							</h2>
							<p class="mb-0">
								<?= substr($noticias['descricao'],0,245)  ?>
							</p>
							<hr/>
						</div>
					<?php }?>
				</div>
			</div>
		</div>
	</div>
</div>
