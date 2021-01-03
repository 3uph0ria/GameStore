<?$stock = $Database->SelectStock();?>
<div class="pt-4" style="
    background-image: url(<?=$stock['img']?>);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;">
    <div class="container">
      	<h3 class="text-center font-weight-bold"><?=$stock['description']?></h3>
        <div class="col-lg-12 py-4">
            <div class="row d-flex justify-content-center">
                <?$game = $Database->SelectGame($stock['id_game']);?>
								<div class="col-lg-4 col-md-6 mb-4 animate__animated animate__fadeInUp">
										<div class="card h-100 shadow stock">
												<div class="w-100 card-img" style="background-image: url(<?=$game['img']?>);"></div>
												<div class="card-body">
														<h4 class="card-title">
																<a href="/game/index.php?id=<?=htmlspecialchars($game['id'])?>"><?=htmlspecialchars($game['name'])?></a>
														</h4>
														<p><?=htmlspecialchars(mb_substr(mb_strtolower($game['description'], 'utf-8'), 0, 100))?>...</p>
												</div>
												<div class="card-footer">
														<h5><i class="fas fa-fw fa-tags mr-2"></i><?=htmlspecialchars($game['cost'])?>руб</h5>
												</div>
										</div>
								</div>
            </div>
						<div class="row d-flex justify-content-center">
							<a class="btn btn-primary" href="/game/index.php?id=<?=htmlspecialchars($game['id'])?>">Заказать</a>
						</div>
        </div>
    </div>
</div>