<div class="w-100 p-0 m-0 animate__animated animate__fadeInDown">

    <div class="">

        <div class="col-lg-12 p-0">

          	<? $games = $Database->SelectGamesMini();?>
            <div id="carouselExampleIndicators" class="carousel slide pt-4" data-ride="carousel">
                <ol class="carousel-indicators">
                    <? for($i = 0; $i < 3; $i++):?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?=$i?>" class="<?if($i == 0):?>active<?endif;?>"></li>
                    <?endfor;?>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <? for($i = 0; $i < 3; $i++):?>
                      <div class="carousel-item <?if($i == 0):?>active<?endif;?>">
                        <a href="/game/index.php?id=<?=$games[$i]['id']?>">
                          <div class="d-block w-100 carousel-img" alt="First slide" style="background-image: url(<?=htmlspecialchars($games[$i]['img'])?>);"></div>
                        </a>
                      </div>
                    <?endfor;?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Назад</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Далее</span>
                </a>
            </div>

        </div>

    </div>

</div>