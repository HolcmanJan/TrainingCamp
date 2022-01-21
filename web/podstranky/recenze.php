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
		$hotel->set_seznam_recenzi( $obj->seznamRecenzi );
	} else {
		$hotel = new \Hotel\Hotel( "Hotel Hans", "30" );
	}
}
?>

<h2>Vytvoření hodnocení</h2>
<table>
    <form method="post">
        <tr>
            <td><label for="referName">Jméno autora:</label></td>
            <td><input type="text" name="referName" id="referName"></td>
        </tr>
        <tr>
            <td><label for="referHodnoceni">Hodnocení [%]:</label></td>
            <td><input type="number" name="referHodnoceni" id="referHodnoceni" max="100" min="0"></td>
        </tr>
        <tr>
            <td><label for="referText">Recenze:</label></td>
            <td><textarea rows="5" cols="60" name="referText" id="referText"></textarea></td>
        </tr>
        <tr>
            <td><input type="submit" name="referSubmit" value="Odeslat recenzi" class="btn btn-default"></td>
        </tr>

		<?php
		if ( isset( $_POST['referSubmit'] ) && isset( $_POST['referName'] ) && isset( $_POST['referHodnoceni'] )
		     && isset( $_POST['referText'] ) ) {
			$hotel->pridejRecenzi( $_POST['referName'], $_POST['referText'], $_POST['referHodnoceni'] );
		}
		?>
    </form>
</table>
<h2>Poslední recenze</h2>

<table>

    <tr>

        </td>
		<?php
		try {
			if ( count( $hotel->get_seznam_recenzi() ) != 0 ) {
				$recenze = $hotel->seznamRecenzi[ count( $hotel->get_seznam_recenzi() ) - 1 ];
			} else {
				$recenze = new \Hotel\Recenze( 0, '-Prázdný-', '-Prázdný-' );
			}
		} catch ( exception ) {
		}

		?>
        <td>
            <table id="recenzeTable">
                <tr>
                    <td><label>Autor: </label></td>
                    <td>
						<?php
						echo $recenze->get_autor();
						?>
                    </td>
                </tr>
                <tr>
                    <td><label>Hodnocení: </label></td>
                    <td>
                        <?php
                        for ($i = 1; $i < 6; $i++){
                            $vypocet = $recenze->get_hodnoceni() - ($i * 20);
                            if ($vypocet >= 0){
	                            echo '<img src="/../TrainingCampOOP/web/pictures/Star_.svg.png" width="25" height="25">';
                            } else{
                                echo '<img src="/../TrainingCampOOP/web/pictures/1200px-Empty_Star.svg.png" width="25" height="25">';
                            }

                        }
                        ?>

                    </td>
                </tr>
                <tr>
                    <td width="180"><label>slovní hodnocení:</label></td>
                    <td width="700">
						<?php
						echo $recenze->get_text();
						?>
                    </td>
                </tr>

            </table>
        </td>

    </tr>
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
