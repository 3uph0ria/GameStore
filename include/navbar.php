<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
		<div class="container">
				<a class="navbar-brand" href="/"><img class="w-50" src="/img/logo.png" alt=""></a>
				<div class="collapse navbar-collapse" id="navbarResponsive">
						<ul class="navbar-nav ml-auto">
								<li class="nav-item<?if($directory == 'home'):?> active<?endif;?>">
										<a class="nav-link" href="/">
												<i class="fas fa-fw fa-home mr-2"></i>Главная
										</a>
								</li>
								<li class="nav-item <?if($directory == 'catalog'):?> active<?endif;?>">
										<a class="nav-link" href="/catalog">
												<i class="fas fa-fw fa-th-large mr-2"></i>Каталог
										</a>
								</li>
								<li class="nav-item <?if($directory == 'support'):?> active<?endif;?>">
										<a class="nav-link" href="/support">
												<i class="fas fa-fw fa-life-ring mr-2"></i>Поддержка
										</a>
								</li>
								<li class="nav-item <?if($directory == 'basket'):?> active<?endif;?>">
										<a class="nav-link" href="/basket">
												<i class="fas fa-fw fa-shopping-basket mr-2"></i>Корзина
												<?if(isset($_SESSION['basket']) && count($_SESSION['basket']) > 0):?>
														<small class="text-muted"><?=count($_SESSION['basket'])?></small>
												<?endif;?>
										</a>
								</li>
						</ul>
				</div>
		</div>
</nav>