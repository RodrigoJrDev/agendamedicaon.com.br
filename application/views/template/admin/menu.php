		<nav id="sidebar" class="">
			<div class="menu-bar">
				<div class="menu">
					<ul class="menu-links">
						<li>
							<a href="<?= base_url(); ?>" title="Home">
								<i class="fa-solid fa-house"></i> Home
							</a>
						</li>
						<li>
							<a href="<?= base_url(); ?>Administracao" title="Administração">
								<i class="fa-solid fa-user-tie"></i> Administração
							</a>
						</li>
						<div class="dropdown">
							<button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
								<i class="fa-solid fa-building"></i> Gerenciar Empresas
							</button>
							<ul class="dropdown-menu">
								<li><a class="dropdown-item" href="<?= base_url(); ?>GerenciarEmpresas/" title="Visualizar todas empresas">Visualizar todas empresas</a></li>
								<li><a class="dropdown-item" href="<?= base_url(); ?>GerenciarEmpresas/" title="Cadastrar uma nova empresa">Cadastrar uma nova empresa</a></li>
								<li><a class="dropdown-item" href="<?= base_url(); ?>GerenciarEmpresas/" title="Cadastrar funcionários">Cadastrar funcionários</a></li>
								<li><a class="dropdown-item" href="<?= base_url(); ?>GerenciarEmpresas/" title="Cadastrar admins de empresas">Cadastrar admins de empresas</a></li>
							</ul>
						</div>
						<li>
							<a href="<?= base_url(); ?>Arquivos" title="Arquivos">
								<i class="fa-solid fa-file-zipper"></i> Arquivos
							</a>
						</li>
						<li>
							<a href="<?= base_url(); ?>Auditoria" title="Auditoria">
								<i class="fa-solid fa-clock-rotate-left"></i> Auditoria
							</a>
						</li>
						<li>
							<a href="<?= base_url(); ?>Sistema" title="Sistema">
							<i class="fa-solid fa-gears"></i>  Sistema
							</a>
						</li>
						<li>
							<a href="<?= base_url(); ?>Login/logout" title="Deslogar">
								<i class="fa-solid fa-power-off"></i> Deslogar
							</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
