<div class="container">
  	<h3 class="text-center font-weight-bold pt-4">Каталог игры</h3>
    <div class="col-lg-12 py-4">
        <div class="row">
            <?
            $games = $Database->SelectGames();
            for($i = 0; $i < count($games); $i++):
           		  if($games[$i]['amount'] > 0):
                ?>
                <div class="col-lg-4 col-md-6 mb-4 animate__animated animate__fadeInUp">
                    <div class="card h-100 shadow">
												<div class="w-100 card-img" style="background-image: url(<?=htmlspecialchars($games[$i]['img'])?>);"></div>
												<div class="card-body">
														<h4 class="card-title">
																<a href="/game/index.php?id=<?=htmlspecialchars($games[$i]['id'])?>"><?=htmlspecialchars($games[$i]['name'])?></a>
														</h4>
														<p><?=htmlspecialchars(mb_substr(mb_strtolower($games[$i]['description'], 'utf-8'), 0, 100))?>...</p>
													</div>
													<div class="card-footer">
															<h5><i class="fas fa-fw fa-tags mr-2"></i><?=htmlspecialchars($games[$i]['cost'])?>руб</h5>
													</div>
											</div>
                </div>
								<?endif;?>
            <?endfor;?>
        </div>
    </div>
</div>