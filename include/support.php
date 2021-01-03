<div class="container">

    <h3 class="font-weight-bold text-center pt-4">Популярные вопросы</h3>

    <div class="row py-4">

        <div class="col-lg-12 p-0">

            <div class="bg-white">
								<div class="accordion" id="accordionExample">
										<div class="card">
												<div class="card-header" id="headingOne">
														<h5 class="mb-0">
																<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
																	Если игра мне не понравится, могу ли я вернуть свои деньги?
																</button>
														</h5>
												</div>

												<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
														<div class="card-body">
																Это не представляется возможным. Товар, приобретенный покупателем, не подлежит возврату или обмену в случае, если товар был получен.
														</div>
												</div>
										</div>
										<div class="card">
												<div class="card-header" id="headingTwo">
														<h5 class="mb-0">
																<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
																	Какими способами я могу оплатить товар?
																</button>
														</h5>
												</div>
												<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
														<div class="card-body">
															Нажмите на кнопку "Добавить в корзину" на странице любого из представленных товаров и увидите полный список доступных способов оплаты.
														</div>
												</div>
										</div>
										<div class="card">
												<div class="card-header" id="headingThree">
														<h5 class="mb-0">
															<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
																	Что делать, если игра вылетает, зависает или не запускается?
															</button>
														</h5>
												</div>
												<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
														<div class="card-body">
															Магазин не несет ответственности за возможные технические неполадки с игрой, и максимум что мы можем порекомендовать в данной ситуации — переустановить или обновить драйвера на аппаратную часть компьютера, снизить графические настройки в игре, проверить компьютер на наличие вирусов / майнеров, завершить лишние процессы из диспетчера задач, переустановить ОС, а также проверить - не перегреваются ли какие-либо составные части компьютера.

															Если ничего из перечисленного не решает Вашу проблему, то необходимо искать решение на форумах, в интернете или обращаться в поддержку разработчика продукта за получением официального ответа.
														</div>
												</div>
										</div>
								</div>
            </div>

        </div>

    </div>

		<h3 class="font-weight-bold text-center">Не нашли ответ на вопрос?</h3>
		<h3 class="font-weight-bold text-center">задайте его в тех-поддержку</h3>

		<div class="row shadow py-4">

				<div class="col-lg-12">

						<form  action="action_mail.php" method="post">
								<div class="form-group">
										<label for="subject">Тема сообщения</label>
										<input type="text" class="form-control" id="subject" aria-describedby="subject" name="subject" maxlength="100" required>
								</div>
								<div class="form-group">
										<label for="message">Сообщение (обязательно укажите контакты для связи)</label>
										<textarea class="w-100" name="message" id="message" rows="10"></textarea>
								</div>
								<?if(isset($_SESSION['mail']) && $_SESSION['mail']== 'mail'):?>
										<div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
											Вы уже отправили сообщение в тех-поддержку, скоро мы с вами свяжемся.
										</div>
								<?else:?>
										<div class="row d-flex justify-content-center">
											<button type="submit" class="btn btn-primary">Отправить</button>
										</div>
								<?endif;?>
						</form>

				</div>

		</div>

</div>