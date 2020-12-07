<!DOCTYPE html>
<html class="no-js"  lang="en">

	<head>
		
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		

		
		<link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet">

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet" >

		
		<title>Semanario</title>

		<!-- favicon img  "{{ asset('assets_week/logo/favicon.png')}}"-->
		<link rel="shortcut icon" type="image/icon" href="https://img.icons8.com/fluent/48/000000/overtime.png">

		<link rel="stylesheet" href="{{ asset('assets_week/css/font-awesome.min.css') }}" >

		
		<link rel="stylesheet" href="{{ asset('assets_week/css/animate.css') }}">

		<link rel="stylesheet" href="{{ asset('assets_week/css/hover-min.css') }}">

		<link rel="stylesheet"  href="{{ asset('assets_week/css/datepicker.css') }}">

        <link rel="stylesheet" href="{{ asset('assets_week/css/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets_week/css/owl.theme.default.min.css') }}">

        <link rel="stylesheet" href="{{ asset('assets_week/css/jquery-ui.min.css') }}">

		<link rel="stylesheet" href="{{ asset('assets_week/css/bootstrap.min.css') }}">

		<link rel="stylesheet" href="{{ asset('assets_week/css/bootsnav.css') }}">

		<link rel="stylesheet" href="{{ asset('assets_week/css/style.css') }}">

		<link rel="stylesheet" href="{{ asset('assets_week/css/responsive.css') }}">
	</head>

	<body>

		<!-- main-menu Start -->
		<header class="top-area">
			<div class="header-area">
				<div class="container">
					<div class="row">
						<div class="col-sm-2">
							<div class="logo">
								<a href="#">
									Bon<span>Apetit</span>
								</a>
							</div><!-- /.logo-->
						</div><!-- /.col-->
						<div class="col-sm-10">
							<div class="main-menu">

								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
										<i class="fa fa-bars"></i>
									</button><!-- / button-->
								</div><!-- /.navbar-header-->
								<div class="collapse navbar-collapse">
									<ul class="nav navbar-nav navbar-right">
										<li class="smooth-menu"> <a class="dropdown-toggle " data-toggle="dropdown" aria-expanded="false" href="#">Plato Especial </a>
											<div class="dropdown-menu" style="background-color: #222222;">
												<a class="dropdown-item "style="width: 100%;" href="{{action('PlateController@create')}}">Registrar</a>
												<a class="dropdown-item "  style="width: 100%;" href="{{action('PlateController@index')}}">Lista</a></div>
										</li>
										<li class="smooth-menu"><a href="{{ action('CompPlateController@index') }}">Componente Plato Ejecutivo</a></li>
										<li class="smooth-menu"><a href="{{ action('DayController@index') }}">Semanario Plato Especial</a></li>

										<!--/.project-btn-->
									</ul>
								</div><!-- /.navbar-collapse -->
							</div><!-- /.main-menu-->
						</div><!-- /.col-->
					</div><!-- /.row -->
					<div class="home-border"></div><!-- /.home-border-->
				</div><!-- /.container-->
			</div><!-- /.header-area -->

		</header><!-- /.top-area-->
		<!-- main-menu End -->


		<!--about-us start -->
		<section id="home" class="about-us">
			<div class="container">
				<div class="about-us-content">
					<div class="row">
						<div class="col-sm-12">
							<div class="single-about-us">
								<div class="about-us-txt">
									<h2>
										Semanario de los Componentes del menú

									</h2>

								</div><!--/.about-us-txt-->
							</div><!--/.single-about-us-->
						</div><!--/.col-->
						<div class="col-sm-0">
							<div class="single-about-us">

							</div><!--/.single-about-us-->
						</div><!--/.col-->
					</div><!--/.row-->
				</div><!--/.about-us-content-->
			</div><!--/.container-->
			
		</section><!--/.about-us-->
		<!--about-us end -->

		
		<form action="/day" method="POST">
			<input type="hidden" name="_token" value="{{ csrf_token() }}"></input>
		<!--travel-box start-->
		<section  class="travel-box">
        	<div class="container">
				
        		<div class="row">
        			<div class="col-md-12">
        				<div class="single-travel-boxes">
        					<div id="desc-tabs" class="desc-tabs">
								@if(count($errors)>0)
                    

		<ul>
			@foreach($errors->all() as $error)
			<div class="notification alert alert-danger" role="alert">
			
				<li>{{$error}}</li>
				</div>
			@endforeach
		</ul>
		
	@endif

								<ul id="daySel" class="nav nav-tabs" role="tablist">

									<li role="presentation">
									 	<a href="#sunday" aria-controls="sunday" role="tab" data-toggle="tab">
									 		<i ><img src="https://img.icons8.com/metro/26/000000/sunday.png"/></i>
									 		Dia Correspondiente
									 	</a>
									</li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content">
                                   
											
											<p>seleccione la fecha a publicar: <input type="date" id="dateDay" name="date" onchange="dayweek()"></p>
											<script type="text/javascript">
												dateDay.min = new Date().toISOString().split("T")[0];
											</script>

											<div role="tabpanel" class="tab-pane active fade in" id="monday">
												<div class="tab-para">

													<div class="row">
														<div class="col-lg-6 col-md-6 col-sm-6" style="border: 2px solid black;">
															<div class="single-tab-select-box">

																<h2>Sopas</h2>

																<div class="travel-select-icon">
																	
																	<select id="secsoup" class="form-control " >
																		@foreach($soups as $soup)
																		
																		
																			<option value="{{$soup->id}}">{{$soup->name}}</option>    
															
																		@endforeach
												

																	</select><!-- /.select-->
																
																	<button type="button" onclick="aggsoup()"><img src="https://img.icons8.com/nolan/64/plus.png"/></button>
																</div><!-- /.travel-select-icon -->


															</div><!--/.single-tab-select-box-->
														</div><!--/.col-->


														<div class="col-lg-6 col-md-6 col-sm-6" style="border: 2px solid black;">
															<div class="single-tab-select-box">

																<h2>Carnes</h2>

																<div class="travel-select-icon">
																	<select id='secmeat'name='secmeat'class="form-control ">
																
																		@foreach($meats as $meat)
																		
																		
																		<option value="{{$meat->id}}">{{$meat->name}}</option>    
														
																		@endforeach
																	</select><!-- /.select-->
																
																	<button type="button" onclick="aggmeat()"><img src="https://img.icons8.com/nolan/64/plus.png"/></button>
																</div><!-- /.travel-select-icon -->


															</div><!--/.single-tab-select-box-->
														</div><!--/.col-->

														</div>



													<div class="row">
														<div class="col-lg-6 col-md-6 col-sm-6" style="border: 2px solid black;">
															<div class="single-tab-select-box">

																<h2>Principios</h2>

																<div class="travel-select-icon">
																	
																	<select id='secprinciple'name='secprinciple'c class="form-control ">

																		@foreach($principles as $principle)
																		
																		
																		<option value="{{$principle->id}}">{{$principle->name}}</option>    
														
																	@endforeach
		ff
																	</select><!-- /.select-->
																
																	<button type="button" onclick="aggprinciple()"><img src="https://img.icons8.com/nolan/64/plus.png"/></button>

																</div><!-- /.travel-select-icon -->


															</div><!--/.single-tab-select-box-->
														</div><!--/.col-->

														<div class="col-lg-6 col-md-6 col-sm-6"style="border: 2px solid black;" >
															<div class="single-tab-select-box">

																<h2>Bebidas</h2>

																<div class="travel-select-icon">
																	
																	<select id='secbeverage'name='secbeverage'class="form-control ">

																		@foreach($beverages as $beverage)
																		
																		
																		<option value="{{$beverage->id}}">{{$beverage->name}}</option>    
														
																	@endforeach

																	</select><!-- /.select-->
																
																	<button type="button" onclick="aggbeverage()"><img src="https://img.icons8.com/nolan/64/plus.png"/></button>
																</div><!-- /.travel-select-icon -->


															</div><!--/.single-tab-select-box-->
														</div><!--/.col-->


													</div><!--/.row-->
													<div class="row">
														<div class="clo-sm-7">
															<div class="about-btn travel-mrt-0 pull-right">
																<button type="submit"  class="about-view travel-btn">
																	Guardar
																</button><!--/.travel-btn-->
										
													</div><!--/.about-btn-->
												</div><!--/.col-->
											</div>

										</div><!--/.tab-para-->

									</div><!--/.tabpannel-->
								</div><!--/.tab content-->
							</div><!--/.desc-tabs-->
        				</div><!--/.single-travel-box-->
        			</div><!--/.col-->
        		</div><!--/.row-->
        	</div><!--/.container-->

        </section><!--/.travel-box-->
		<!--travel-box end-->


		<!--packages start-->
		<section id="pack" class="packages">
			<div class="container">
				<div class="gallary-header text-center">
					<h2>
						Componentes del Menú
					</h2>
					<p id=" parDay">

						componentes del menú listos para ofertar el dia  ...
					</p>
				</div><!--/.gallery-header-->

				<div class="packages-content">
					<div id="liscomp" class="row">

						<div class="col-md-3 col-sm-6">
							<div class="single-package-item">
								<img src="https://elgourmet.s3.amazonaws.com/recetas/cover/sopa-_k1VoM4cvUxpZ0SWRX2a5trJ86mwhjl.png" alt="package-place">
								<div class="single-package-item-txt">
									<h3>Sopas<span class="pull-right"></span></h3>
									<div class="packages-para">
										<ul id="lstsoup" >


                						</ul>


									</div><!--/.packages-para-->

								</div><!--/.single-package-item-txt-->
							</div><!--/.single-package-item-->

						</div><!--/.col-->

						<div class="col-md-3 col-sm-6">
							<div class="single-package-item">
								<img src="https://asset-americas.unileversolutions.com/content/dam/unilever/knorr_world/colombia/general_image/all/all/1636-1199952-almuerzo-casero-delicioso2-1212742.png" alt="package-place">
								<div class="single-package-item-txt">
									<h3>Principos<span class="pull-right"></span></h3>
									<div class="packages-para">
										<ul id="lstprinciple" >


                						</ul>
									</div><!--/.packages-para-->


								</div><!--/.single-package-item-txt-->
							</div><!--/.single-package-item-->

						</div><!--/.col-->

						<div class="col-md-3 col-sm-6">
							<div class="single-package-item">
								<img src="https://cdn2.cocinadelirante.com/sites/default/files/images/2019/04/como-sauvizar-carnes.jpg" alt="package-place">
								<div class="single-package-item-txt">
									<h3>Carnes <span class="pull-right"></span></h3>
									<div class="packages-para">
										<ul id="lstmeat" >


                						</ul>


									</div><!--/.packages-para-->


								</div><!--/.single-package-item-txt-->
							</div><!--/.single-package-item-->

						</div><!--/.col-->

						<div class="col-md-3 col-sm-6">
							<div class="single-package-item">
								<img src="https://cdn.kiwilimon.com/recetaimagen/30632/34260.jpg" alt="package-place">
								<div class="single-package-item-txt">
									<h3>Bebidas <span class="pull-right"></span></h3>
									<div class="packages-para">
										<ul id="lstbeverage" >


                						</ul>
									</div><!--/.packages-para-->

								</div><!--/.single-package-item-txt-->
							</div><!--/.single-package-item-->

						</div><!--/.col-->




					


					</div><!--/.row-->
				</div><!--/.packages-content-->
			</div><!--/.container-->

		</section><!--/.packages-->
		<!--packages end-->


	</form>








		<!-- footer-copyright start -->
		<footer  class="footer-copyright">
			<div class="container">
				<div class="footer-content">
					<div class="row">

						<div class="col-sm-3">
							<div class="single-footer-item">
								<div class="footer-logo">
									<a href="#">
										Bon<span>Apetit</span>
									</a>
									<p>
										best travel agency
									</p>
								</div>
							</div><!--/.single-footer-item-->
						</div><!--/.col-->

						<div class="col-sm-3">
							<div class="single-footer-item">
								<h2>link</h2>
								<div class="single-footer-txt">
									<p><a href="#">home</a></p>
									<p><a href="#">destination</a></p>
									<p><a href="#">spacial packages</a></p>
									<p><a href="#">special offers</a></p>
									<p><a href="#">blog</a></p>
									<p><a href="#">contacts</a></p>
								</div><!--/.single-footer-txt-->
							</div><!--/.single-footer-item-->

						</div><!--/.col-->

						<div class="col-sm-3">
							<div class="single-footer-item">
								<h2>popular destination</h2>
								<div class="single-footer-txt">
									<p><a href="#">china</a></p>
									<p><a href="#">venezuela</a></p>
									<p><a href="#">brazil</a></p>
									<p><a href="#">australia</a></p>
									<p><a href="#">london</a></p>
								</div><!--/.single-footer-txt-->
							</div><!--/.single-footer-item-->
						</div><!--/.col-->

						<div class="col-sm-3">
							<div class="single-footer-item text-center">
								<h2 class="text-left">contacts</h2>
								<div class="single-footer-txt text-left">
									<p>+1 (300) 1234 6543</p>
									<p class="foot-email"><a href="#">info@tnest.com</a></p>
									<p>North Warnner Park 336/A</p>
									<p>Newyork, USA</p>
								</div><!--/.single-footer-txt-->
							</div><!--/.single-footer-item-->
						</div><!--/.col-->

					</div><!--/.row-->

				</div><!--/.footer-content-->
				<hr>
				<div class="foot-icons ">
					<ul class="footer-social-links list-inline list-unstyled">
		                <li><a href="#" target="_blank" class="foot-icon-bg-1"><i class="fa fa-facebook"></i></a></li>
		                <li><a href="#" target="_blank" class="foot-icon-bg-2"><i class="fa fa-twitter"></i></a></li>
		                <li><a href="#" target="_blank" class="foot-icon-bg-3"><i class="fa fa-instagram"></i></a></li>
		        	</ul>
		        	<p>&copy; 2017 <a href="https://www.themesine.com">ThemeSINE</a>. All Right Reserved</p>

		        </div><!--/.foot-icons-->
				<div id="scroll-Top">
					<i class="fa fa-angle-double-up return-to-top" id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
				</div><!--/.scroll-Top-->
			</div><!-- /.container-->

		</footer><!-- /.footer-copyright-->
		<!-- footer-copyright end -->




		<script src="{{ asset('assets_week/js/jquery.js') }}"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->

		<!--modernizr.min.js-->
		<script  src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>


		<!--bootstrap.min.js-->
		<script  src="{{ asset('assets_week/js/bootstrap.min.js') }}"></script>

		<!-- bootsnav js -->
		<script src="{{ asset('assets_week/js/bootsnav.js') }}"></script>

		<!-- jquery.filterizr.min.js -->
		<script src="{{ asset('assets_week/js/jquery.filterizr.min.js') }}"></script>

		<script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

		<!--jquery-ui.min.js-->
        <script src="{{ asset('assets_week/js/jquery-ui.min.js') }}"></script>

        <!-- counter js -->
		<script src="{{ asset('assets_week/js/jquery.counterup.min.js') }}"></script>
		<script src="{{ asset('assets_week/js/waypoints.min.js') }}"></script>

		<!--owl.carousel.js-->
        <script  src="{{ asset('assets_week/js/owl.carousel.min.js') }}"></script>

        <!-- jquery.sticky.js -->
		<script src="{{ asset('assets_week/js/jquery.sticky.js') }}"></script>

        <!--datepicker.js-->
        <script  src="{{ asset('assets_week/js/datepicker.js') }}"></script>

		<!--Custom JS-->
		<script src="{{ asset('assets_week/js/custom.js') }}"></script>
		<!--procesoSemanario JS-->
		<script src="{{ asset('assets_week/js/procesoSemanario.js') }}"></script>


	</body>

</html>
