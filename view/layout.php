<!DOCTYPE html>
<html lang="nl">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" type="image/png" href="assets/img/icons/logo.png"/>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">
  <title>Klomp Kameraden</title>
</head>
<body>
    <nav class="menu">
        <ul class="menu__items">
            <li class="menu__item menu__item--left">
                <a class="menu__link" href="index.php?page=home">Klomp Kameraden</a>
            </li>
            <li class="menu__right__wrapper">
                <ul class="menu__main">
                    <li class="menu__item">
                        <a class="menu__link <?php if($currentPage == 'index'){ echo 'menu__link--active';} ?>" href="index.php?page=home">Home</a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link <?php if($currentPage == 'events'){ echo 'menu__link--active';} ?>" href="index.php?page=events">Evenementen</a>
                    </li>
                    <li class="menu__item">
                        <a class="menu__link <?php if($currentPage == 'story'){ echo 'menu__link--active';} ?>" href="index.php?page=story">Ons verhaal</a>
                    </li>
                </ul>
            <li class="menu__item menu__item--right">
                <a class="menu__link 
                <?php
                    if (!empty($_SESSION['cart'])) {
                    echo 'cart--filled';}else{echo 'cart--empty';}?>
                " href="index.php?page=cart">
                    <span>Winkelmand</span>
                </a>
            </li>
        </ul>
    </nav>

    <main>
      <?php echo $content; ?>
    </main>

    <footer class="footer" id="footer">
       <article class="contact">
        <div class="contact__form">
            <h2 class="content__title content__title--contact">Contact</h2>
            <form method="post" action="index.php?page=<?php $_GET['page'] ?>" class="form form--footer" id="contact--form">
                <input type="hidden" name="action" value="sendMessage">
                <input type="hidden" name="page" value="<?php echo $currentPage ?>"> 
                <label class="label" for="firstnamecontact">Naam  
                    <input class="input input-form" id="firstnamecontact" name="firstname" type="text" placeholder="Voornaam" required>
                    <span class="error"><?php if(!empty($errorsContact['firstname'])){ echo $errorsContact['firstname'];} ?></span>  
                </label>
                <label class="label" for="lastnamecontact">Familienaam
                    <input class="input input-form" id="lastnamecontact" name="lastname" type="text" placeholder="Naam" required>
                    <span class="error"><?php if(!empty($errorsContact['lastname'])){ echo $errorsContact['lastname'];} ?></span>
                </label>
                <label class="label label--fw" for="subject">Onderwerp
                    <input class="input input-form" id="subject" name="subject" type="text" placeholder="Onderwerp" required>
                    <span class="error"><?php if(!empty($errorsContact['topic'])){ echo $errorsContact['topic'];} ?></span>
                </label>
                <label class="label label--fw" for="emailcontact">E-mail
                    <input class="input input-form" id="emailcontact" name="email" type="email" placeholder="E-mail" required>
                    <span class="error"><?php if(!empty($errorsContact['email'])){ echo $errorsContact['email'];} ?></span>
                </label>
                <label class="label label--fw" for="message">Bericht
                    <textarea cols="50" rows="4" id="message" name="message" placeholder="Schrijf hier jouw bericht." required></textarea>
                    <span class="error"><?php if(!empty($errorsContact['message'])){ echo $errorsContact['message'];} ?></span>
                </label>
                <input type="submit" class="button button--red">

                <?php if (!empty($_SESSION['info'])): ?>
                    <div class="info info--contact"><?php echo $_SESSION['info']; ?></div>
                <?php endif; ?>

            </form>
        </div>
        <img class="contact__image" src="assets/img/illustrations/contact.png" alt="" width="365" height="940">
        <div class="contact__info">
            <dl>
                <dt class="text--bold">Tel:</dt>
                <dd>+32 12 34 5678</dd>
                <dt class="text--bold">E-mail:</dt>
                <dd>help@klomkaperaden.be</dd>
            </dl>
            <address>
                <span class="text--bold">Adres:</span><br>
                Klompstraat 2019,<br>
                9000 Gent<br>
                België
            </address>
        </div>
    </article>

    <div class="footer__socials container">
        <div class="footer__socialmedia">
            <a href="https://www.facebook.com/" target="_blank" class="socialmedia__icon icon__fb"><span class="hidden">Facebook</span></a>
            <a href="https://www.twitter.com/" target="_blank" class="socialmedia__icon icon__twitter"><span class="hidden">Twitter</span></a>
            <a href="https://www.instagram.com/" target="_blank" class="socialmedia__icon icon__instagram"><span class="hidden">Instagram</span></a>
        </div>
        <p>Volg ons en deel jouw creaties via <span class="text--bold text--green">#KlompKameraden</span></p>
        <hr>
        <p>&copy; 2019, Klomp Kameraden by Sarah Van Den Berghe</p>
    </div>

    </footer>

    <script src="js/validate.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
