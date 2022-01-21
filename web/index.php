<!Doctype html>

<html lang="cs-cz">
<head>
    <link rel="stylesheet" href="style.css" type="text/css"/>
    <meta charset="utf-8"/>
    <title>Správa hotelu</title>
</head>

<body>
<header>
    <div id="logo">
        <h1>Hotel<span>HANS</span></h1>
        <small>TrainingCamp</small>
    </div>
    <nav>
        <ul>
            <li><a href="index.php?stranka=homepage">Homepage</a></li>
            <li><a href="index.php?stranka=rezervace">Rezervace</a></li>
            <li><a href="index.php?stranka=sprava">Správa</a></li>
            <li><a href="index.php?stranka=recenze">Recenze</a></li>
            <li><a class="kontakt-tlacitko" href="index.php?stranka=kontakt">Kontakt</a></li>
        </ul>
    </nav>
</header>

<article>
    <div id="centrovac">
        <header>
            <h1>O mně</h1>
        </header>
        <section>
			<?php

            use Hotel\Pokoj;
            use Hotel\Hotel;
			use Hotel\Zakaznik;
			use Hotel\Osoba;
			use Hotel\Zamestnanec;

			require __DIR__ . '/../vendor/autoload.php';
			require_once( '../vendor/autoload.php' );

			if ( isset( $_GET['stranka'] ) ) {
				$stranka = $_GET['stranka'];
			} else {
				$stranka = 'homepage';
			}
			if ( preg_match( '/^[a-z0-9]+$/', $stranka ) ) {
				$vlozeno = include( 'podstranky/' . $stranka . '.php' );
				if ( ! $vlozeno ) {
					echo( 'Podstránka nenalezena' );
				}
			} else {
				echo( 'Neplatný parametr.' );
			}

			?>
        </section>
        <div class="cistic"></div>
    </div>
</article>

<footer>
    Vytvořil &copy;HANS 2022
</footer>
</body>

</html>