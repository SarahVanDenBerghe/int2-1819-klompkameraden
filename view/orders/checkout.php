<article class="header header--cart">
    <div class="container">
        <h1 class="title">Tickets</h1>
            <ol class="cart__breadcrumb">
                <li>Overzicht</li>
                <li id="cart__breadcrumb--active">Gegevens</li>
                <li>Betaling</li>
                <li>Bevestiging</li>
            </ol>   
    </div>
</article>

<div class="container container--cart">
    <aside class="content">
        <h2 class="content__title">Overzicht</h2>
        <ul class="cart__overzicht">
            <?php
                $total = 0;
                foreach($_SESSION['cart'] as $item) {
                    $itemTotal = $item['ticket']['price'] * $item['quantity'];
                    $total += $itemTotal;
            ?>
                <li>
                    <span><?php echo $item['quantity'];?> x</span>
                    <?php echo $item['ticket']['name'];?>
                </li>
            <?php }?>
            
            <li class="item__price cart__totaal">
                Totaal: &euro; <?php echo $total;?>
            </li>
        </ul>
    </aside>
    <div>
        <form method="post" action="index.php?page=checkout" class="form form--checkout">
            <input type="hidden" name="action" value="checkoutOrder">
            <input type="hidden" name="page" value="confirmation">
            <section class="content">
                <h2 class="content__title">Persoonlijke gegevens</h2>
                    <div class="cart__gegevens">
                        <label class="label label__checkout--name" for="firstname">Naam
                            <input class="input-form input" id="firstname" name="firstname" type="text" placeholder="Voornaam" required>
                            <span class="error"><?php if(!empty($errorsOrder['firstname'])){ echo $errorsOrder['firstname'];} ?></span>
                        </label>
                        <label class="label label__checkout--surname" for="lastname">Familienaam
                            <input class="input-form input" id="lastname" name="lastname" type="text" placeholder="Familienaam" required>
                            <span class="error"><?php if(!empty($errorsOrder['lastname'])){ echo $errorsOrder['lastname'];} ?></span>
                        </label>
                        <label class="label label__checkout--mail" for="email">E-mail
                            <input class="input-form input" id="email" name="email" type="email" placeholder="E-mailadres" required>
                            <span class="error"><?php if(!empty($errorsOrder['email'])){ echo $errorsOrder['email'];} ?></span>
                        </label>
                        <label class="label label__checkout--street" for="street">Straat
                            <input class="input-form input" id="street" name="street" type="text" placeholder="Straatnaam" required>
                            <span class="error"><?php if(!empty($errorsOrder['street'])){ echo $errorsOrder['street'];} ?></span>
                        </label>
                        <label class="label label__checkout--nr" for="number">Huisnr.
                            <input class="input-form input" id="number" name="number" type="number" placeholder="Nr." required>
                            <span class="error"><?php if(!empty($errorsOrder['number'])){ echo $errorsOrder['number'];} ?></span>
                        </label>
                        <label class="label label__checkout--city" for="city">Stad
                            <input class="input-form input" id="city" name="city" type="text" placeholder="Stadsnaam" required>
                            <span class="error"><?php if(!empty($errorsOrder['city'])){ echo $errorsOrder['city'];} ?></span>
                        </label>
                        <label class="label label__checkout--postalcode" for="postalcode">Postcode
                            <input class="input-form input" id="postalcode" name="postalcode" type="number" placeholder="Postcode" required>
                            <span class="error"><?php if(!empty($errorsOrder['postalcode'])){ echo $errorsOrder['postalcode'];} ?></span>
                        </label>
                    </div>  
            </section>

            <section class="content">
                <h2 class="content__title">Betalingsmethode</h2>
                <div class="cart__payment">
                    <input id="paypal" type="radio" name="payment" value="paypal" class="hidden input-payment" checked required>
                    <label for="paypal" class="label-paypal"><span class="hidden">Paypal</span></label>
                    <input id="maestro" type="radio" name="payment" value="maestro" class="hidden input-payment">
                    <label for="maestro" class="label-maestro"><span class="hidden">Maestro</span></label>
                    <input id="visa" type="radio" name="payment" value="visa" class="hidden input-payment">
                    <label for="visa" class="label-visa"><span class="hidden">Visa</span></label>
                    <input id="bancontact" type="radio" name="payment" value="bancontact" class="hidden input-payment">
                    <label for="bancontact" class="label-bancontact"><span class="hidden">Bancontact</span></label>  
                </div>
            </section>
            <div class="cart__buttons cart__buttons--checkout">
                <a href="index.php?page=cart" class="button">&lt; Terug</a>
                <input type="submit" class="button button--red" value="Betalen &gt;">
            </div>
            <span class="error error-summary"></span>
        </form>
    </div>
</div>