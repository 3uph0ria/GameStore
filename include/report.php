<div class="col">

    <h3 class="text-center font-weight-bold py-4">Отчеты</h3>

    <div class="shadow">
				<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
				<script type="text/javascript" src="/js/popper.min.js"></script>
				<script type="text/javascript" src="/js/bootstrap.min.js"></script>
				<script type="text/javascript" src="/js/mdb.min.js"></script>

        <div class="row p-4">
						<div class="row d-flex justify-content-center mt-2">
								<h3 class="text-center py-5">Отчет по продажам за неделю</h3>
								<div class="mb-4 col-md-11">
									<canvas id="lineChart"></canvas>
								</div>
								<?$CountSales = $Database->SelectCountSales();?>
								<script type="text/javascript">
									var ctxL = document.getElementById("lineChart").getContext('2d');
									var myLineChart = new Chart(ctxL, {
											type: 'line',
											data: {
													labels: [
															<?for($j = 0; $j < 7; $j++):?>
															<?
															$_monthsList = array(
																	"-01-" => "января",
																	"-02-" => "февраля",
																	"-03-" => "марта",
																	"-04-" => "апреля",
																	"-05-" => "мая",
																	"-06-" => "июня",
																	"-07-" => "июля",
																	"-08-" => "августа",
																	"-09-" => "сентября",
																	"-10-" => "октября",
																	"-11-" => "ноября",
																	"-12-" => "декабря"
															);

															$_mD = date("-m-", strtotime($CountSales[$j]['DATE(`date`)'])); //для замены
															$currentDate = str_replace($_mD, " " . $_monthsList[$_mD] . " ", $CountSales[$j]['DATE(`date`)']);
															$date = explode(' ', $currentDate);
															?>
															<?if($j != 6):?>
															"<?=$date[2]. ' '. $date[1]?>",
															<?else:?>
															"<?=$date[2]. ' '. $date[1]?>"
															<?endif;?>
															<?endfor;?>
													],
													datasets: [{
															label: "Продажи (шт)",
															data: [
																	<?for($j = 0; $j < 7; $j++):?>
																	<?if($j != 6):?>
																	<?if($CountSales[$j]):?>
																	<?=htmlspecialchars(round($CountSales[$j]['COUNT(sales.id)'], 1))?>,
																	<?else:?>
																	0,
																	<?endif;?>
																	<?else:?>
																	<?if($CountSales[$j]):?>
																	<?=htmlspecialchars(round($CountSales[$j]['COUNT(sales.id)'], 1))?>
																	<?else:?>
																	0
																	<?endif;?>
																	<?endif;?>
																	<?endfor;?>
															],
															backgroundColor: [
																	'rgba(105, 0, 132, .2)',
															],
															borderColor: [
																	'rgba(200, 99, 132, .7)',
															],
															borderWidth: 2
													},
                              {
                                  label: "Прибыль (руб.)",
                                  data: [
                                      <?for($j = 0; $j < 7; $j++):?>
                                      <?if($j != 6):?>
                                      <?if($CountSales[$j]):?>
                                      <?=htmlspecialchars(round($CountSales[$j]['SUM(games.cost)'], 1))?>,
                                      <?else:?>
                                      0,
                                      <?endif;?>
                                      <?else:?>
                                      <?if($CountSales[$j]):?>
                                      <?=htmlspecialchars(round($CountSales[$j]['SUM(games.cost)'], 1))?>
                                      <?else:?>
                                      0
                                      <?endif;?>
                                      <?endif;?>
                                      <?endfor;?>
                                  ],
                                  backgroundColor: [
                                      'rgba(0, 137, 132, .2)',
                                  ],
                                  borderColor: [
                                      'rgba(0, 10, 130, .7)',
                                  ],
                                  borderWidth: 2
                              }
													]
											},
											options: {
													responsive: true
											}
									});
							</script>
						</div>
				</div>
				<div class="row p-4">
						<div class="row d-flex justify-content-center mt-2">
								<h3 class="text-center py-5">Отчет продаж по определенным товарам за неделю</h3>
								<div class="mb-4 col-md-11">
									<canvas id="labelChart"></canvas>
								</div>
								<?$GameSales = $Database->SelectGameSales();?>
								<script type="text/javascript">
									var ctxD = document.getElementById("labelChart").getContext('2d');
									var myLineChart = new Chart(ctxD, {
											plugins: [ChartDataLabels],
											type: 'pie',
											data: {
													labels: [
															<?for($j = 0; $j < count($GameSales); $j++):?>
															<?if($j + 1 != count($GameSales)):?>
															"<?=htmlspecialchars($GameSales[$j]['name'])?>",
															<?else:?>
															"<?=htmlspecialchars($GameSales[$j]['name'])?>"
															<?endif;?>
															<?endfor;?>
													],
													datasets: [{
															data: [
																	<?for($j = 0; $j < count($GameSales); $j++):?>
																	<?if($j + 1 != count($GameSales)):?>
																	<?=htmlspecialchars($GameSales[$j]['COUNT(sales.id)'])?>,
																	<?else:?>
																	<?=htmlspecialchars($GameSales[$j]['COUNT(sales.id)'])?>
																	<?endif;?>
																	<?endfor;?>
															],

															backgroundColor: [
																	<?for($j = 0; $j < count($GameSales); $j++):?>
																	<?
																	$rgb[$j]['r'] = $r = rand(0, 235);
																	$rgb[$j]['g'] = $g = rand(20, 235);
																	$rgb[$j]['b'] = $b = rand(20, 235);
																	?>
																	<?if($j + 1 != count($GameSales)):?>
																	'rgba(<?=$rgb[$j]['r']?>,<?=$rgb[$j]['g']?>,<?=$rgb[$j]['b']?>, .6)',
																	<?else:?>
																	'rgba(<?=$rgb[$j]['r']?>,<?=$rgb[$j]['g']?>,<?=$rgb[$j]['b']?>, .6)'
																	<?endif;?>
																	<?endfor;?>
															],
															hoverBackgroundColor: [
																	<?for($j = 0; $j < count($GameSales); $j++):?>
																	<?
																	$rgb[$j]['g'] -= 20;
																	$rgb[$j]['b'] -= 20;
																	?>
																	<?if($j + 1 != count($GameSales)):?>
																	'rgba(<?=$rgb[$j]['r']?>,<?=$rgb[$j]['g']?>,<?=$rgb[$j]['b']?>, .7)',
																	<?else:?>
																	'rgba(<?=$rgb[$j]['r']?>,<?=$rgb[$j]['g']?>,<?=$rgb[$j]['b']?>, .7)'
																	<?endif;?>
																	<?endfor;?>
															],
															borderColor: [
																	<?for($j = 0; $j < count($GameSales); $j++):?>
																	<?if($j + 1 != count($GameSales)):?>
																	'rgba(<?=$rgb[$j]['r']?>,<?=$rgb[$j]['g']?>,<?=$rgb[$j]['b']?>, .7)',
																	<?else:?>
																	'rgba(<?=$rgb[$j]['r']?>,<?=$rgb[$j]['g']?>,<?=$rgb[$j]['b']?>, .7)'
																	<?endif;?>
																	<?endfor;?>
															],
															borderWidth: 2
													}]
											},
											options: {
													responsive: true,
													legend: {
															position: 'right',
															labels: {
																	padding: 20,
																	boxWidth: 10
															}
													},
													plugins: {
															datalabels: {
																	formatter: (value, ctx) => {
																			let sum = 0;
																			let dataArr = ctx.chart.data.datasets[0].data;
																			dataArr.map(data => {
																					sum += data;
																			});
																			let percentage = (value * 100 / sum).toFixed(2) + "%";
																			return percentage;
																	},
																	color: 'white',
																	labels: {
																			title: {
																					font: {
																							size: '12'
																					}
																			}
																	}
															}
													}
											}
									});

							</script>
						</div>
				</div>
				<div class="row p-4">
						<div class="row d-flex justify-content-center mt-2">
								<h3 class="text-center py-5">Отчет по товарам на складе</h3>
								<div class="mb-4 col-md-11">
									<canvas id="horizontalBar"></canvas>
								</div>
								<script type="text/javascript">
										<? $AmountGames = $Database->SelectAmountGames(); ?>
										new Chart(document.getElementById("horizontalBar"), {
												"type": "horizontalBar",
												"data": {
														"labels": [
																<?for($j = 0; $j < count($AmountGames); $j++):?>
																<?if($j + 1 != count($AmountGames)):?>
																"<?=htmlspecialchars($AmountGames[$j]['name'])?>",
																<?else:?>
																"<?=htmlspecialchars($AmountGames[$j]['name'])?>"
																<?endif;?>
																<?endfor;?>
														],
														"datasets": [{
																"label": "Товара на складе (шт.)",
																"data": [
																		<?for($j = 0; $j < count($AmountGames); $j++):?>
																		<?if($j + 1 != count($AmountGames)):?>
																		<?=htmlspecialchars(round($AmountGames[$j]['amount'], 2))?>,
																		<?else:?>
																		<?=htmlspecialchars(round($AmountGames[$j]['amount'], 2))?>
																		<?endif;?>
																		<?endfor;?>
																],
																"fill": false,
																"backgroundColor": [
																		<?for($j = 0; $j < count($AmountGames); $j++):?>
																		<?
																		$rgb[$j]['r'] = $r = rand(0, 235);
																		$rgb[$j]['g'] = $g = rand(20, 235);
																		$rgb[$j]['b'] = $b = rand(20, 235);
																		?>
																		<?if($j + 1 != count($AmountGames)):?>
																		'rgba(<?=$rgb[$j]['r']?>,<?=$rgb[$j]['g']?>,<?=$rgb[$j]['b']?>, .6)',
																		<?else:?>
																		'rgba(<?=$rgb[$j]['r']?>,<?=$rgb[$j]['g']?>,<?=$rgb[$j]['b']?>, .6)'
																		<?endif;?>
																		<?endfor;?>
																],
																"hoverBackgroundColor": [
																		<?for($j = 0; $j < count($AmountGames); $j++):?>
																		<?
																		$rgb[$j]['g'] -= 20;
																		$rgb[$j]['b'] -= 20;
																		?>
																		<?if($j + 1 != count($AmountGames)):?>
																		'rgba(<?=$rgb[$j]['r']?>,<?=$rgb[$j]['g']?>,<?=$rgb[$j]['b']?>, .7)',
																		<?else:?>
																		'rgba(<?=$rgb[$j]['r']?>,<?=$rgb[$j]['g']?>,<?=$rgb[$j]['b']?>, .7)'
																		<?endif;?>
																		<?endfor;?>
																],
																"borderColor": [
																		<?for($j = 0; $j < count($AmountGames); $j++):?>
																		<?if($j + 1 != count($AmountGames)):?>
																		'rgba(<?=$rgb[$j]['r']?>,<?=$rgb[$j]['g']?>,<?=$rgb[$j]['b']?>, .7)',
																		<?else:?>
																		'rgba(<?=$rgb[$j]['r']?>,<?=$rgb[$j]['g']?>,<?=$rgb[$j]['b']?>, .7)'
																		<?endif;?>
																		<?endfor;?>
																],
																"borderWidth": 2
														}]
												},
												"options": {
														"scales": {
																"xAxes": [{
																		"ticks": {
																				"beginAtZero": true
																		}
																}]
														}
												}
										});
								</script>
						</div>
				</div>
    </div>
</div>