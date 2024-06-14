</main>
<footer id="footer">
	<div class="footer-top">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 footer-contact">
					<h3>Agenda Médica ON</h3>
					<p>
						Avenida Paulista, 1000 <br>
						São Paulo, SP 01310-100<br>
						Brasil <br><br>
						<strong>Telefone:</strong> +55 11 1234 5678<br>
						<strong>Email:</strong> contato@agendamedicaon.com.br<br>
					</p>
				</div>

				<div class="col-lg-2 col-md-6 footer-links">
					<h4>Links Úteis</h4>
					<ul>
						<li><i class="fa-solid fa-chevron-right"></i> <a href="#hero">Home</a></li>
						<li><i class="fa-solid fa-chevron-right"></i> <a href="#about">Sobre nós</a></li>
						<li><i class="fa-solid fa-chevron-right"></i> <a href="#services">Serviços</a></li>
						<li><i class="fa-solid fa-chevron-right"></i> <a href="#terms">Termos de serviço</a></li>
						<li><i class="fa-solid fa-chevron-right"></i> <a href="#privacy">Política de privacidade</a></li>
					</ul>
				</div>

				<div class="col-lg-3 col-md-6 footer-links">
					<h4>Nossos Serviços</h4>
					<ul>
						<li><i class="fa-solid fa-chevron-right"></i> <a href="#">Agendamento de Consultas</a></li>
						<li><i class="fa-solid fa-chevron-right"></i> <a href="#">Gestão de Pacientes</a></li>
						<li><i class="fa-solid fa-chevron-right"></i> <a href="#">Telemedicina</a></li>
						<li><i class="fa-solid fa-chevron-right"></i> <a href="#">Consultoria Médica</a></li>
						<li><i class="fa-solid fa-chevron-right"></i> <a href="#">Relatórios Médicos</a></li>
					</ul>
				</div>

				<div class="col-lg-4 col-md-6 footer-newsletter">
					<h4>Inscreva-se em Nossa Newsletter</h4>
					<p>Receba atualizações e novidades sobre nossos serviços diretamente em seu e-mail.</p>
					<form action="" method="post">
						<input type="email" name="email"><input type="submit" value="Inscrever-se">
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="container d-md-flex py-4">
		<div class="me-md-auto text-center text-md-start">
			<div class="copyright">
				&copy; Copyright <strong><span>Agenda Médica ON</span></strong>. Todos os Direitos Reservados
			</div>
			<div class="credits">
				Desenvolvido pelo grupo Rodrigo, Gabriel e Adson da Faculdade FIAP
			</div>
		</div>
		<div class="social-links text-center text-md-right pt-3 pt-md-0">
			<a href="#" class="twitter"><i class="fa-brands fa-twitter"></i></a>
			<a href="#" class="facebook"><i class="fa-brands fa-facebook"></i></a>
			<a href="#" class="instagram"><i class="fa-brands fa-instagram"></i></a>
			<a href="#" class="google-plus"><i class="fa-brands fa-skype"></i></a>
			<a href="#" class="linkedin"><i class="fa-brands fa-linkedin"></i></a>
		</div>
	</div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/purecounter/1.1.3/purecounter.min.js"></script>

<script>
	$(document).ready(function() {
		$('.galelry-lightbox').on('click', function(event) {
			event.preventDefault();
			var src = $(this).attr('href');
			var lightbox = '<div class="lightbox">' +
				'<div class="lightbox-content">' +
				'<img src="' + src + '" alt="">' +
				'<span class="lightbox-close">&times;</span>' +
				'</div>' +
				'</div>';

			$('body').append(lightbox);

			$('.lightbox-close').on('click', function() {
				$('.lightbox').remove();
			});

			$('.lightbox').on('click', function(event) {
				if ($(event.target).is('.lightbox')) {
					$('.lightbox').remove();
				}
			});
		});
	});
</script>

</body>

</html>
