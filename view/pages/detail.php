<article class="detail">
    <img class="detail__image" src="assets/img/events/<?php echo $event['image']; ?>.png" alt="<?php echo $event['image']; ?>" width="85">
    <div class="detail__text">
        <a class="detail__return" href="index.php?page=events#filter">Keer terug naar overzicht</a>
        <h1 class="title title--detail"><?php echo $event['name'] ?></h1>
        <p class="text--bold detail__slug"><?php echo $event['slug'] ?></p>
        <p><?php echo $event['info'] ?></p>
        <form method="post" action="index.php?page=cart" class="form-detail">
            <input type="hidden" name="event_id" value="<?php echo $event['id'];?>" />
            <label class="quantity-label" for="quantity"><span class="hidden">Aantal</span>
                <input class="quantity quantity-input" id="quantity" type="number" size="2" min="1" max="10" name="quantity" value="1" />
            </label>
            <button class="button" type="submit" name="action" value="add">In winkelmand</button>
        </form>
        <?php if (!empty($_SESSION['add'])): ?>
            <div class="info info--add"><?php echo $_SESSION['add']; ?></div>
        <?php endif; ?>
    </div>
        <div class="detail__background">
    </div>
    <dl class="detail__practical">
        <dt class="text--bold detail__icon detail__icon--price">Prijs</dt>
        <dd>€ <?php echo $event['price'] ?> per persoon</dd>
        <dt class="text--bold detail__icon detail__icon--time">Tijdstip</dt>
        <dd><?php echo $event['time'] ?></dd>
        <dt class="text--bold detail__icon detail__icon--location">Locatie</dt>
        <dd><?php echo $event['location'] ?></dd>
        <dt class="text--bold hidden">Voorwaarden</dt>
        <dd class="detail__icon detail__icon--info"><?php echo $event['requirements'] ?></dd>
    </dl>
</article>