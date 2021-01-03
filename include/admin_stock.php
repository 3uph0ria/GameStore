<div class="col">
    <h3 class="text-center font-weight-bold py-4">Блок акции</h3>
    <div class="shadow">
        <div class="row p-4">
						<?if($_SESSION['alert']):?>
								<div class="alert alert-success alert-dismissible fade show w-100" role="alert">
										<?=
										$_SESSION['alert'];
										unset($_SESSION['alert']);
										?>
								</div>
						<?endif;?>
						<?
						$games = $Database->SelectGames();
						$stock = $Database->SelectStock();
						?>
						<form action="action_stock.php" method="post">
								<div class="form-group py-2">
										<label class="mt-4" for="description">Текст акции</label>
										<div class="input-group">
												<input name="description" type="text" class="form-control" id="description" value="<?=htmlspecialchars($stock['description'])?>" required autofocus />
										</div>
										<label class="mt-4" for="img">Фоновое изображение</label>
										<div class="input-group">
												<input name="img" type="text" class="form-control" id="img" value="<?=htmlspecialchars($stock['img'])?>" required autofocus />
										</div>
										<label class="mt-4" class="mt-3">Игра</label>
										<div class="input-group">
												<select class="browser-default custom-select" name="id_game">
													<?foreach($games as $game):?>
														<option <?if($game['id'] == $stock['id_game']):?>selected<?endif;?>><?=htmlspecialchars($game['id']) . ' (' . htmlspecialchars($game['name']). ')'?></option>
                          <?endforeach;?>
												</select>
										</div>
								</div>
								<div class="text-center mt-4 d-flex justify-content-center">
										<?if($user['add_data'] == 0):?>
											<button type="button" class="btn btn-primary btn-block btn-rounded z-depth-1a" data-toggle="tooltip" data-placement="top" title="Недостаточно прав" style="width: 40%;height: 50px;border-radius: 34px">Добавить</button>
										<?else:?>
											<button type="submit" class="btn btn-primary btn-block btn-rounded z-depth-1a" style="width: 40%;height: 50px;border-radius: 34px">Сохранить</button>
										<?endif;?>
								</div>
						</form>
				</div>
    </div>
</div>