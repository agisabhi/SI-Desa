<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Sign in - Progressus Bootstrap template</title>

	<link rel="shortcut icon" href="<?=base_url();?>assets/Progressus/assets/images/kab.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="<?=base_url();?>assets/Progressus/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=base_url();?>assets/Progressus/assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="<?=base_url();?>assets/Progressus/assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="<?=base_url();?>assets/Progressus/assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="<?=base_url();?>welcome"><img src="<?=base_url();?>assets/Progressus/assets/images/logoedit.png" alt="Progressus HTML5 template"></a>
                
			</div>
			<div class="navbar-collapse collapse">
                
				<ul class="nav navbar-nav pull-right">
					<li><a href="<?=base_url();?>welcome">Home</a></li>
					
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Cari Pengajuan <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="<?=base_url();?>welcome/cari_lahir">Surat Keterangan Kelahiran</a></li>
							<li class="active"><a href="#">Surat Keterangan Kematian</a></li>
							<li class="active"><a href="#">Surat Keterangan Pindah Datang</a></li>
						</ul>
					</li>
				</ul>
                
			</div><!--/.nav-collapse -->
            
		</div>
	</div> 
	<!-- /.navbar -->

	<header><br><br><br><br><br><br></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="<?=base_url();?>welcome">Home</a></li>
			<li class="active">Cari Surat </li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Cari Pengajuan Surat</h1>
				</header>
				
				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
							<h3 class="thin text-center">Cari Data Pengajuan Surat </h3>
							<div><?= $this->session->flashdata('message'); ?></div>
                            <div>
							<hr>
							
							
							
							<form action="<?=base_url();?>welcome/hasil_lahir" method="post">
								<div class="top-margin">
									<label>ID Pelayanan<span class="text-danger"></span></label>
									<input type="text" class="form-control" name="no_surat_lahir" placeholder="Masukkan ID Pelayanan">
								</div>
								<br>
								<div class="row">
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" name="submit" type="submit">Cari</button>
									</div>
								</div>
							</form>
						</div>
					</div>

				</div>
				
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
	

	<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">
					
					<div class="col-md-3 widget">
						<h3 class="widget-title">Contact</h3>
						<div class="widget-body">
							<p>+234 23 9873237<br>
								<a href="mailto:#">some.email@somewhere.com</a><br>
								<br>
								234 Hidden Pond Road, Ashland City, TN 37015
							</p>	
						</div>
					</div>

					<div class="col-md-3 widget">
						<h3 class="widget-title">Follow me</h3>
						<div class="widget-body">
							<p class="follow-me-icons clearfix">
								<a href=""><i class="fa fa-twitter fa-2"></i></a>
								<a href=""><i class="fa fa-dribbble fa-2"></i></a>
								<a href=""><i class="fa fa-github fa-2"></i></a>
								<a href=""><i class="fa fa-facebook fa-2"></i></a>
							</p>	
						</div>
					</div>

					<div class="col-md-6 widget">
						<h3 class="widget-title">Text widget</h3>
						<div class="widget-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam architecto voluptatem amet fugiat nesciunt placeat provident cumque accusamus itaque voluptate modi quidem dolore optio velit hic iusto vero praesentium repellat commodi ad id expedita cupiditate repellendus possimus unde?</p>
							<p>Eius consequatur nihil quibusdam! Laborum, rerum, quis, inventore ipsa autem repellat provident assumenda labore soluta minima alias temporibus facere distinctio quas adipisci nam sunt explicabo officia tenetur at ea quos doloribus dolorum voluptate reprehenderit architecto sint libero illo et hic.</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">
					
					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="#">Home</a> | 
								<a href="about.html">About</a> |
								<a href="sidebar-right.html">Sidebar</a> |
								<a href="contact.html">Contact</a> |
								<b><a href="signup.html">Sign up</a></b>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2022, Devi Metria Dora
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>
	</footer>	
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="<?=base_url();?>assets/Progressus/assets/js/headroom.min.js"></script>
	<script src="<?=base_url();?>assets/Progressus/assets/js/jQuery.headroom.min.js"></script>
	<script src="<?=base_url();?>assets/Progressus/assets/js/template.js"></script>
</body>
</html>