<div class="container shadow">
    <nav aria-label="breadcrumb" class="py-3">
				<ol class="breadcrumb m-0">
						<li class="breadcrumb-item"><a href="/">Главная</a></li>
						<li class="breadcrumb-item d-flex align-items-center">
								<i class="fas fa-fw fa-chevron-right mr-2"></i>
								<a href="/catalog/">Каталог</a>
						</li>
						<li class="breadcrumb-item active d-flex align-items-center">
								<i class="fas fa-fw fa-chevron-right mr-2"></i>
								<a href="#">
										<?=htmlspecialchars($game['name'])?>
								</a>
						</li>
				</ol>
    </nav>
    <div class="row">
        <div class="col-lg-12 p-0">
          <div class="d-block w-100 carousel-img" alt="First slide" style="background-image: url(<?=htmlspecialchars($game['img'])?>);"></div>
        </div>
    </div>
    <div class="row">
				<div class="col-lg-12 p-4">
						<div class="d-flex">
								<div class="col-lg-8">
										<h4 class="font-weight-bold"><?=htmlspecialchars($game['name'])?></h4>
										<h5 class=""><?=htmlspecialchars($game['cost'])?>руб</h5>
								</div>
								<div class="col-lg-4">
										<div class="row justify-content-end">
												<a href="/basket/methods.php?id=<?=htmlspecialchars($game['id'])?>&method=add" class="btn btn-success m-2">В корзину</a>
												<a href="/payment/index.php?id=<?=htmlspecialchars($game['id'])?>" class="btn btn-primary m-2">Купить</a>
										</div>
								</div>
						</div>
						<div class="py-4">
								<div class="col-lg-12 p-0">
										<table class="table">
												<tbody>
														<tr>
																<th scope="row">Активация</th>
																<td><?=htmlspecialchars($game['activation'])?></td>
														</tr>
														<tr>
																<th scope="row">Платформа</th>
																<td><?=htmlspecialchars($game['platform'])?></td>
														</tr>
														<tr>
																<th scope="row">Регион</th>
																<td><?=htmlspecialchars($game['region'])?></td>
														</tr>
														<tr>
																<th scope="row">Категория</th>
																<td><?=htmlspecialchars($game['category'])?></td>
														</tr>
														<tr>
																<th scope="row">Тип товара</th>
																<td><?=htmlspecialchars($game['activation_type'])?></td>
														</tr>
														<tr>
																<th scope="row">Наличие</th>
																<td><?=htmlspecialchars($game['amount'])?></td>
														</tr>
												</tbody>
										</table>
								</div>
								<div class="col-lg-12">
										<p><?=htmlspecialchars($game['description'])?></p>
								</div>
						</div>
				</div>
    </div>
</div>