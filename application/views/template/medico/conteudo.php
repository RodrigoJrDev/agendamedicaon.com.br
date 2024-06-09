		<div class="content">
			<div id="breadcrumb">
				<nav class="mb-2" aria-label="breadcrumb">
					<ol class="breadcrumb mb-0">
						<?php foreach ($breadcrumb as $key => $value) { ?>
							<?php if (end($breadcrumb) === $value) { ?>
								<li class="breadcrumb-item active" aria-current="page">
									<?= $value['nome'] ?>
								</li>
							<?php } else { ?>
								<li class="breadcrumb-item">
									<a href="<?= $value['link'] ?>"><?= $value['nome'] ?></a>
								</li>
							<?php } ?>
						<?php } ?>
					</ol>
				</nav>
			</div>
			<div class="container-flu">
				<div class="row-fluid">
					<div class="span12">
						<?php if ($var = $this->session->flashdata('success')) : ?><script>
								swal("Sucesso!", "<?= str_replace('"', '', $var); ?>", "success");
							</script><?php endif; ?>
						<?php if ($var = $this->session->flashdata('error')) : ?><script>
								swal("Falha!", "<?= str_replace('"', '', $var); ?>", "error");
							</script><?php endif; ?>
						<?php if (isset($view)) {
							echo $this->load->view($view, null, true);
						} ?>
					</div>
				</div>
