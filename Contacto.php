<?php include_once 'php/Header.php' ;?>

		<section class="page">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
	          <ol class="breadcrumb">
	          	<li><a href="index.php">Inicio</a></li>
	            <li class="active">Contactos</li>
	          </ol>
						<h1 class="page-title">Contacto</h1>
						<p class="page-subtitle">Dinos tu duda</p>
						<div class="line thin"></div>
						<div class="page-description">
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<h3>Contacto</h3>
									<p>
Siempre tratamos de estar cerca de nuestros colegiados y nuestros beneficiarios, por eso estamos en tu barrio y te acesoramos con cuarquier duda o mal entendido, siempre cuidadon tu salud.									</p>
									<p>
										Telefono: <span class="bold"><?php echo $Telefono; ?></span> <br>
										Email: <span class="bold"><?php echo $Email; ?></span>
										<br>
										<br>
                                        Diag. Alte. Brown nº 1267 (Adrogué)<br>
                                        Almirante Brown, Buenos Aires (1846)
									</p>
								</div>
								<div class="col-md-6 col-sm-6">
									<form class="row contact" id="contact-form">
										<div class="col-md-6">
											<div class="form-group">
												<label>Nombre <span class="required"></span></label>
												<input type="text" class="form-control" name="name" required="">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Email <span class="required"></span></label>
												<input type="text" class="form-control" name="email" required="">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label>Asunto</label>
												<input type="text" class="form-control" name="subject">
											</div>
										</div>
										<div class="col-md-12">
											<div class="form-group">
												<label>Su mensaje... <span class="required"></span></label>
												<textarea class="form-control" name="message" required=""></textarea>
											</div>
										</div>
										<div class="col-md-12">
											<button class="btn btn-primary">Enviar</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3276.289125462024!2d-58.3802401!3d-34.7986672!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcd33f3cbbe9b1%3A0x69ed203fb4e86c36!2sDiagonal+Almte+Brown+1267%2C+Adrogu%C3%A9%2C+Buenos+Aires!5e0!3m2!1sen!2sar!4v1545780049821" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
		</section>

		<!-- Start footer -->
<?php include 'php/footer.php'	;?>
		<!-- End Footer -->

		<!-- JS -->
		<script src="js/jquery.js"></script>
		<script src="js/jquery.migrate.js"></script>
		<script src="scripts/bootstrap/bootstrap.min.js"></script>
		<script>var $target_end=$(".best-of-the-week");</script>
		<script src="scripts/jquery-number/jquery.number.min.js"></script>
		<script src="scripts/owlcarousel/dist/owl.carousel.min.js"></script>
		<script src="scripts/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
		<script src="scripts/easescroll/jquery.easeScroll.js"></script>
		<script src="scripts/sweetalert/dist/sweetalert.min.js"></script>
		<script src="scripts/toast/jquery.toast.min.js"></script>
		<script src="js/e-magz.js"></script>
	</body>
</html>