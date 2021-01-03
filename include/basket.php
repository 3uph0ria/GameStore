<div class="container shadow">
    <nav aria-label="breadcrumb" class="py-3">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item d-flex align-items-center active">
                <i class="fas fa-fw fa-chevron-right mr-2"></i>
                <a href="#">Корзина</a>
            </li>
        </ol>
    </nav>
    <div class="row">
        <?
        if($_SESSION['basket']):
            $allCount = 0;
            $allCost = 0;
            foreach($_SESSION['basket'] as $games):
                if($games):
                $game = $Database->SelectGame($games);
                $allCount++;
                $allCost += $game['cost'];
                ?>
									<div class="col-lg-4 col-md-6 mb-4 animate__animated animate__fadeInUp">
										<div class="card h-100 shadow">
												<div class="w-100 card-img" style="background-image: url(<?=htmlspecialchars($game['img'])?>);"></div>
												<div class="card-body">
														<h4 class="card-title">
																<a href="/game/index.php?id=<?=htmlspecialchars($game['id'])?>"><?=htmlspecialchars($game['name'])?></a>
														</h4>
														<p><?=htmlspecialchars(mb_substr(mb_strtolower($game['description'], 'utf-8'), 0, 100))?>...</p>
												</div>
												<div class="card-footer">
														<div class="col">
																<div class="row d-flex justify-content-start">
																		<a href="/game/index.php?id=<?=htmlspecialchars($game['id'])?>" class="btn btn-success m-2">К товару</a>
																		<a href="/basket/methods.php?id=<?=htmlspecialchars($game['id'])?>&method=delete&index=<?=key($_SESSION['basket'])?>" class="btn btn-primary m-2">Удалить</a>
																</div>
														</div>
												</div>
										</div>
								</div>
                <?endif;?>
            <?endforeach;?>
						<div class="col-lg-12">
								<h3 class="text-center font-weight-bold pb-4">Игр к оплате: <?=$allCount?></h3>
								<form role="form" action="action_payment_basket.php" method="post">
										<div class="form-group py-2">
												<label for="email">Ваш адрес электронной почты</label>
												<div class="input-group">
														<input name="email" type="email" class="form-control" id="email" required autofocus />
												</div>
										</div>
										<div class="form-group py-2">
												<div class="row p-4">
														<?for($i = 1; $i < 4; $i++):?>
																<div class="form-check form-check-inline col-lg-4 m-0">
																	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
																	<div class="ml-1 payment-pay-img" style="background-image: url('/img/payment/<?=$i?>.png');"></div>
																</div>
														<?endfor;?>
												</div>
												<div class="row p-4">
														<?for($i = 4; $i < 7; $i++):?>
																<div class="form-check form-check-inline col-lg-4 m-0">
																		<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
																		<div class="ml-1 payment-pay-img" style="height: 50px;background-image: url('/img/payment/<?=$i?>.png');"></div>
																</div>
														<?endfor;?>
												</div>
												<div class="row p-4">
														<?for($i = 7; $i < 10; $i++):?>
																<div class="form-check form-check-inline col-lg-4 m-0">
																		<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
																		<div class="ml-1 payment-pay-img" style="height: 50px;background-image: url('/img/payment/<?=$i?>.png');"></div>
																</div>
														<?endfor;?>
												</div>
										</div>
										<div class="row d-flex justify-content-center py-2">
												<button class="btn btn-primary" type="submit">Оплатить <?=$allCost?>руб</button>
										</div>
								</form>
								<p class="py-4 text-center">После оплаты товар моментально придёт на вашу почту, и вы сможете насладиться игрой, приятного вечера!</p>
						</div>
        		<?else:?>
            <div class="col-lg-12 p-4">
                <div class="d-flex">
                    <div class="col-lg-12">
                        <h4 class="font-weight-bold text-center">Вы еще нечего не добавили в корзину</h4>
                    </div>
                </div>
            </div>
        <?endif;?>
    </div>
</div>