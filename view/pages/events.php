<div class="container">
    <article class="header header--events">
        <h1 class="title">Evenementen</h1>
        <p>Benieuwd wat er op de agenda staat? Bekijk onze geplande evenementen. Wil je meedoen aan een evenement maar heb je zelf geen klompen? Geen nood, <span class="text--bold">voor bepaalde activiteiten bieden wij zelf klompen aan.</span>
        Boek je tickets tijdig om een plaatsje te reserveren! Ook voor gratis evenementen zijn <span class="text--bold">plaatsen beperkt.</span></p>
    </article>

    <article class="content content--run">
        <div class="run__illustration"></div>
        <div class="run__info">
            <span class="run__info--top">Zo 15/09 | €15 per persoon</span>
            <h2 class="content__title">Obstacle run</h2>
            <p>Het is zo ver! Onze jaarlijkse Obstacle Run staat voor de deur. 
                Stel je klompen op de proef tijdens dit 5 km lange parcours, door modder, water, zand en tal van andere hindernissen. 
                <span class="text--bold">Zet je beste beentje voor en bewijs dat jij dé beste klompen bezit. </span>
                Deze uitdaging vraagt immers om stevige en comfortabele klompen. 
                Zullen jouw klompen deze uitdaging overleven?
            </p>
            <div class="info__buttons">
                <a href="index.php?page=detail&amp;id=1" class="button">Tickets & Info</a>
                <div class="socialmedia">
                    <p>Deel</p>
                    <div class="socialmedia__icons">
                        <a href="www.facebook.com" target="_blank" class="socialmedia__icon icon__fb"><span class="hidden">Facebook</span></a>
                        <a href="www.twitter.com" target="_blank" class="socialmedia__icon icon__twitter"><span class="hidden">Twitter</span></a>
                    </div>
                </div>
            </div>
        </div>
    </article>

    <article class="content filter__wrapper">
    <h2 class="content__title">Kalender</h2>
    <form action="index.php?page=events" method="get" class="filter-form" id="filter">  
        <input type="hidden" name="page" value="events">

        <div class="filter__category">      
            <p class="filter__title">Evenement:</p>
            <?php foreach($types as $type): ?>
                <label for="<?php echo $type['type'] ?>" class="filter__label">
                    <input class="filter__input" type="checkbox" 
                    id="<?php echo $type['type'] ?>" 
                    name="types[]" 
                    value="<?php echo $type['id'] ?>"
                    <?php if(!empty($_GET['types']) && in_array($type['id'], $_GET['types'])) echo 'checked';?>
                    >
                    <span class="checkbox__mark"></span>
                    <span><?php echo $type['type'] ?></span>
                </label>
            <?php endforeach; ?>
        </div>
        <div class="filter__category">
            <p class="filter__title">Prijs:</p>
            <label for="all" class="filter__label">
                <input class="filter__input" type="radio" value="all" id="all" name="price"
                <?php if(!empty($_GET['price'])){ if($_GET['price'] == 'all'){ echo 'checked'; }}?> checked>
                <span class="radiobutton__mark"></span>
                Alles
            </label>
            <label for="gratis" class="filter__label">
                <input class="filter__input" type="radio" value="gratis" id="gratis" name="price"
                <?php if(!empty($_GET['price'])){ if($_GET['price'] == 'gratis'){ echo 'checked'; }}?>>
                <span class="radiobutton__mark"></span>
                Gratis
            </label>
            <label for="betalend" class="filter__label">
                <input class="filter__input" type="radio" value="betalend" id="betalend" name="price"
                <?php if(!empty($_GET['price'])){ if($_GET['price'] == 'betalend'){ echo 'checked'; }}?>>
                <span class="radiobutton__mark"></span>
                Betalend
            </label>
        </div>
        <input type="submit" class="filter__submit button" value="filter">
    </form>
    <span class="error error--filter"><?php if(!empty($_SESSION['error'])){ echo $_SESSION['error'];} ?></span>
    <section class="content content--events">
        <?php foreach($events as $event): ?>
            <section class="event">
                <div class="event__info">
                    <span class="event__date"><?php echo strftime("%a %e/%m", strtotime($event['date'])); ?></span>
                    <div class="event__social">
                        <a href="www.facebook.com" target="_blank" class="socialmedia__icon icon__fb"><span class="hidden">Facebook</span></a>
                        <a href="www.twitter.com" target="_blank" class="socialmedia__icon icon__twitter"><span class="hidden">Twitter</span></a>
                    </div>
                </div>
                <div class="event__image__wrapper">
                    <img src="assets/img/events/<?php echo $event['image']; ?>.png" alt="<?php echo $event['image']; ?>" width="80">
                </div>
                <div class="event__text">
                    <h3><?php echo $event['name']; ?></h3>
                    <p><?php echo $event['slug']; ?></p>
                </div>
                <div class="event__ticket">
                    <p>
                        <?php if($event['price'] > 0) :?>
                            € <?php echo $event['price']; ?> per persoon
                            <?php else :?>
                            <?php echo 'Gratis'; ?>
                        <?php endif; ?>  
                    </p>
                    <a class="button button--ticket" href="index.php?page=detail&amp;id=<?php echo $event['id'] ?>">Tickets & Info</a>
                </div>
            </section>
        <?php endforeach; ?>
</section>
</article>
</div>