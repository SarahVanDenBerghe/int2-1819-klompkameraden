<article class="header header--cart">
    <div class="container">
        <h1 class="title">Tickets</h1>
        
        <?php if (!empty($_SESSION['cart'])) { ?>
            <ol class="cart__breadcrumb">
                <li id="cart__breadcrumb--active">Overzicht</li>
                <li>Gegevens</li>
                <li>Betaling</li>
                <li>Bevestiging</li>
            </ol>   
        <?php }?>
    </div>
</article>

<div class="container">
    <?php
    if (empty($_SESSION['cart'])) { ?>
    <div class="cart__error">
        <p>Oeps!</p>
        <p>Het ziet er naar uit dat er nog geen tickets in je winkelmandje zitten. <br>Neem een kijkje naar onze evenementen.</p>
        <a href="index.php?page=events" class="button">Bekijk evenementen</a>
    </div>
<?php } else { ?>

    <form action="index.php?page=cart" method="post" class="form--cart" id="cartform">
        <?php
            $total = 0;
            foreach($_SESSION['cart'] as $item) {
            $itemTotal = $item['ticket']['price'] * $item['quantity'];
            $total += $itemTotal;
        ?>
        <section class="cart__item">
            <img src="assets/img/events/<?php echo $item['ticket']['image'];?>.png" alt="<?php echo $item['ticket']['image'];?>" width="40">
            <div class="item__info">
                <h3><?php echo $item['ticket']['name'];?></h3>
                <p><?php echo strftime("%A %e %B", strtotime($item['ticket']['date'])); ?></p>
            </div>
            <label class="label-quantity">Aantal
                <input class="quantity input-form" type="number" size="2" min="0" name="quantity[<?php echo $item['ticket']['id'];?>]" value="<?php echo $item['quantity'];?>" class="replace" />
            </label>
            <p class="item__price">
                <?php if($item['ticket']['price'] > 0) :?>
                    &euro; <?php echo $itemTotal;?>
                    <?php else :?>
                    <?php echo 'Gratis'; ?>
                <?php endif; ?> 
            </p>
            <button type="submit" class="remove-from-cart" name="remove" value="<?php echo $item['ticket']['id'];?>"><span class="hidden">Verwijderen</span></button>
        </section>
        <?php }
        ?>
        
        <button type="submit" id="update-cart" name="action" value="update">Bijwerken</button>

        <div class="cart__buttons cart__buttons--summary">
            <a href="index.php?page=events" class="button">&lt; Bekijk meer evenementen</a>
            <p><span class="cart__totaal">Totaal:</span> &euro; <?php echo $total;?></p>
            <a href="index.php?page=checkout" class="button button--red">Bestellen &gt;</a>
        </div>
    </form>

    <?php }?>


</div>