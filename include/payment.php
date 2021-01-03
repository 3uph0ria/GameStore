<div class="container shadow">
    <nav aria-label="breadcrumb" class="py-3">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item d-flex align-items-center"> <i class="fas fa-fw fa-chevron-right mr-2"></i> <a href="/catalog/">Каталог</a> </li>
            <li class="breadcrumb-item d-flex align-items-center"> <i class="fas fa-fw fa-chevron-right mr-2"></i>
                <a href="/game/index.php?id=<?=htmlspecialchars($game['id'])?>">
                    <?=htmlspecialchars($game['name'])?>
                </a>
            </li>
            <li class="breadcrumb-item active d-flex align-items-center"> <i class="fas fa-fw fa-chevron-right mr-2"></i> <a href="#">Оплата</a>
						</li>
        </ol>
    </nav>
    <h3 class="text-center font-weight-bold pb-4">Ваш заказ</h3>
    <div class="row d-flex p-4">
        <div class="col-lg-4 p-0">
            <div class="d-block w-100 payment-img" alt="First slide" style="background-image: url(<?=htmlspecialchars($game['img'])?>);border-radius: 15px"></div>
        </div>
        <div class="col">
            <h3 class="text-center"><?=htmlspecialchars($game['name'])?></h3>
            <form role="form" action="action_payment.php" method="post">
                <div class="form-group py-2">
                    <label for="email"> Ваш адрес электронной почты </label>
                    <div class="input-group">
                        <input name="gameId" type="text" class="form-control" id="gameId" value="<?=htmlspecialchars($game['id'])?>" style="display: none" />
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
                    <button class="btn btn-primary" type="submit"> Оплатить
                        <?=htmlspecialchars($game['cost'])?>руб </button>
                </div>
            </form>
            <p class="py-4 text-center">После оплаты товар моментально придёт на вашу почту, и вы сможете насладиться игрой, приятного вечера!</p>
            <?if(isset($_SESSION['alert'])):?>
								<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
										<?
											echo $_SESSION['alert'];
											unset($_SESSION['alert']);
										?>
								</div>
            <?endif;?>
        </div>
    </div>
</div>