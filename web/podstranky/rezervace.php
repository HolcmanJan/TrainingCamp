<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="style.css" type="text/css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<?php
$hotel = new \Hotel\Hotel( " ", 0 );
//načítání objektu typu Hotel z textového souboru
$filePath = getcwd() . DIRECTORY_SEPARATOR . "hotelSave.txt";
if ( file_exists( $filePath ) ) {
	$objData = file_get_contents( $filePath );
	$obj     = unserialize( $objData );
	if ( ! empty( $obj ) ) {
		$hotel->set_nazev( $obj->nazev );
		$hotel->set_pocet_pokoju( $obj->pocetPokoju );
		$hotel->set_seznam_navstevniku( $obj->seznamNavstevniku );
		$hotel->set_seznam_pokoju( $obj->seznamPokoju );
		$hotel->set_seznam_zamestnancu( $obj->seznamZamestnancu );
		$hotel->set_seznam_recenzi($obj->seznamRecenzi);
	} else {
		$hotel = new \Hotel\Hotel( "Hotel Hans", "30" );
	}
}
?>
<p></p>
<h1>Rezervace</h1>
<!-- Trigger the modal with a button -->
<p></p>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Přidat zákazníka
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Přidat zákazníka</h4>
            </div>
            <div class="modal-body">
                <form method="post">
                    <table>
                        <tr>
                            <td><label for="jmenoID">Jméno:</label></td>
                            <td><input name="jmeno" type="text" id="jmenoID"></td>
                        </tr>
                        <tr>
                            <td><label for="prijmeniID">Příjmení:</label></td>
                            <td><input name="prijmeni" type="text" id="prijmeniID"></td>
                        </tr>
                        <tr>
                            <td><label for="cisloObcankyID">Číslo občanky:</label></td>
                            <td><input name="cisloObcanky" type="number" id="cisloObcankyID"></td>
                        </tr>
                        <tr>
                            <td><label for="telefoniCisloID">Telefoní číslo:</label></td>
                            <td><input name="telefoniCislo" type="number" id="telefoniCislID"></td>
                        </tr>
                        <tr>
                            <td><label for="typZakaznikaID">Typ zákazníka:</label></td>
                            <td>
                                <select name="typZakaznika" id="typZakaznikaID">
                                    <option value="novy">Nový</option>
                                    <option value="bezny">Běžný</option>
                                    <option value="VIP">VIP</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="pridat" class="btn btn-default"></td>
                        </tr>
                    </table>
                </form>
				<?php
				if ( isset( $_POST['jmeno'] ) && isset( $_POST['prijmeni'] ) && isset( $_POST['cisloObcanky'] )
				     && isset( $_POST['typZakaznika'] ) && isset( $_POST['telefoniCislo'] ) ) {
					$hotel->pridejZakaznika( $_POST["jmeno"], $_POST["prijmeni"], 0, $_POST["cisloObcanky"],
                        $_POST["telefoniCislo"], $_POST["typZakaznika"] );
				}

				?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Zavřít</button>
            </div>
        </div>

    </div>
</div>

<p></p>
<table>
    <form method="post">
        <tr>
            <td><label for="zakaznikID">Zákazník</label></td>
            <td>
                <select name="zakaznik" id="zakaznikID">
					<?php
					try {
						for ( $i = 0; $i < count( $hotel->get_seznam_navstevniku() ); $i ++ ) {
							$jmeno = $hotel->seznamNavstevniku[ $i ];
							echo "<option value=$i>$jmeno</option>";
						}
					} catch ( exception ) {
					}
					?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="pokojID">Číslo pokoje</label></td>
            <td>
                <select name="pokoj" id="pokojID">
					<?php
					if ( $hotel->seznamPokoju == null ) {
						for ( $i = 0; $i < $hotel->pocetPokoju; $i ++ ) {
							$randomCislo = random_int( 1, 3 );
							if ( $randomCislo = 1 ) {
								$typPokoje = "dvouluzkovy";
							} elseif ( $randomCislo = 2 ) {
								$typPokoje = "trojluzkovy";
							} else {
								$typPokoje = "apartman";
							}

							$pokoj                 = new \Hotel\Pokoj( $i, 0, 500 + 50 * $i, true, false, $typPokoje );
							$hotel->seznamPokoju[] = $pokoj;
						}
					}

					try {
						for ( $i = 1; $i <= $hotel->pocetPokoju; $i ++ ) {
							$key = $i - 1;
							echo "<option value=$key>$i</option>";
						}
					} catch ( exception ) {
					}

					?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="rezervaceOdID">Rezervace od: </label></td>
            <td><input name="rezervaceOd" type="date" id="rezervaceOdID"></td>
        </tr>
        <tr>
            <td><label for="rezervaceDoID">Rezervace do: </label></td>
            <td><input name="rezervaceDo" type="date" id="rezervaceDoID"></td>
        </tr>
        <tr>
            <td><input type="submit" name="submit" value="rezervovat" class="btn btn-default"></td>
        </tr>
		<?php

		if ( isset( $_POST['submit'] ) ) {
			if ( isset( $_POST['pokoj'] ) && isset( $_POST['rezervaceOd'] ) && isset( $_POST['rezervaceDo'] ) && isset( $_POST['zakaznik'] ) ) {
				if ( ( $hotel->seznamPokoju[ $_POST['pokoj'] ]->get_rezervace_od() <= $_POST['rezervaceOd'] &&
				       $hotel->seznamPokoju[ $_POST['pokoj'] ]->get_rezervace_do() >= $_POST['rezervaceOd'] ) ||
				     ( $hotel->seznamPokoju[ $_POST['pokoj'] ]->get_rezervace_od() <= $_POST['rezervaceDo'] &&
				       $hotel->seznamPokoju[ $_POST['pokoj'] ]->get_rezervace_do() >= $_POST['rezervaceDo'] )
				) {
					echo 'tento termín již je zabraný';
				} else {
					$hotel->seznamPokoju[ $_POST['pokoj'] ]->set_rezervace_od( $_POST['rezervaceOd'] );
					$hotel->seznamPokoju[ $_POST['pokoj'] ]->set_rezervace_do( $_POST['rezervaceDo'] );
					$hotel->seznamPokoju[ $_POST['pokoj'] ]->set_pokoj_je_obsazeny( true );
					$hotel->seznamPokoju[ $_POST['pokoj'] ]->set_pocet_ubytovanych( 1 );

					$hotel->seznamNavstevniku[ $_POST['zakaznik'] ]->set_cislo_pokoje( $_POST['pokoj'] + 1 );
				}
			}
		}
		?>
    </form>
</table>

<?php
$objData  = serialize( $hotel );
$filePath = getcwd() . DIRECTORY_SEPARATOR . "hotelSave.txt";
if ( is_writable( $filePath ) ) {
	$fp = fopen( $filePath, 'w' );
	fwrite( $fp, $objData );
	fclose( $fp );
}
?>
