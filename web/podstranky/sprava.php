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
		$hotel->set_seznam_recenzi( $obj->seznamRecenzi );
	} else {
		$hotel = new \Hotel\Hotel( "Hotel Hans", "30" );
	}
}
?>
<p></p>
<h1>správa</h1>
<!-- Trigger the modal1 with a button -->
<p></p>
<table>
    <tr>
        <td>
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal1">Správa
                zákazníků
            </button>

            <!-- Modal 1 -->
            <div class="modal fade" id="myModal1" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Správa zákazníků</h4>
                        </div>
                        <div class="modal-body">
                            <form method="post">
                                <table>
                                    <tr>
                                        <td><label for="zakaznik">Jméno zákazníka: </label></td>
                                        <td>
                                            <select name="zakaznik" id="zakaznik">
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

                                        <td><input type="submit" name="detailZakaznika" value="detail osoby"
                                                   class="btn btn-default"></td>

                                    </tr>

                                </table>
                            </form>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Zavřít</button>
                        </div>
                    </div>

                </div>
            </div>
        </td>

		<?php
		$zakaznik = new \Hotel\Zakaznik( 0, '', '', 0, 0, 0, '' );

		if ( isset( $_POST['detailZakaznika'] ) ) {
			$poziceZakaznika = $_POST['zakaznik'];
			$zakaznik        = $hotel->seznamNavstevniku[ $poziceZakaznika ];

		} else {
			$poziceZakaznika = 0;
		}
		?>


        <td>
            <table>
                <tr>
                    <td>
                        <!-- Trigger the modal2 with a button -->
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal2">
                            Správa
                            zaměstnanců
                        </button>

                        <!-- Modal 2 -->
                        <div class="modal fade" id="myModal2" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Správa zaměstnanců</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">
                                            <table>
                                                <tr>
                                                    <td><label for="zamestnanec">Jméno zaměstnance: </label></td>
                                                    <td>
                                                        <select name="zamestnanec" id="zamestnanec">
															<?php
															try {
																for ( $i = 0; $i < count( $hotel->get_seznam_zamestnancu() ); $i ++ ) {
																	$jmeno = $hotel->seznamZamestnancu[ $i ];
																	echo "<option value=$i>$jmeno</option>";
																}
															} catch ( exception ) {
															}
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>

                                                    <td><input type="submit" name="detailZamestnance"
                                                               value="detail osoby"
                                                               class="btn btn-default"></td>

                                                </tr>

                                            </table>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Zavřít
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>

						<?php
						$zamestnanec = new \Hotel\Zamestnanec( 0, '', '', 0, 0, '', '' );

						if ( isset( $_POST['detailZamestnance'] ) ) {
							$poziceZamestnance = $_POST['zamestnanec'];
							$zamestnanec       = $hotel->seznamZamestnancu[ $poziceZamestnance ];

						} else {
							$poziceZamestnance = 0;
						}
						?>
                    </td>
                    <td>
                        <!-- Trigger the modal3 with a button -->
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal3">
                            Přidej zaměstance
                        </button>

                        <!-- Modal3 -->
                        <div class="modal fade" id="myModal3" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Přidej zaměstnance</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">
                                            <table>
                                                <tr>
                                                    <td><label for="jmenoZamestnanecPridatID">Jméno:</label></td>
                                                    <td><input type="text" name="jmenoZamestnancePridat"
                                                               id="jmenoZamestnanecPridatID"></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="prijmeniZamestnanecPridatID">Příjmení:</label></td>
                                                    <td><input type="text" name="prijmeniZamestnanecPridat"
                                                               id="prijmeniZamestnanecPridatID">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label for="cisloObcankyZamestnanecPridatID">Číslo
                                                            občanky:</label></td>
                                                    <td><input type="number" name="cisloObcankyZamestnanecPridat"
                                                               id="cisloObcankyZamestnanecPridatID"></td>
                                                </tr>
                                                <tr>
                                                    <td><label for="telCisloZamestnanecPridatID">Telefoní číslo:</label>
                                                    </td>
                                                    <td><input type="number" name="telCisloZamestnanecPridat"
                                                               id="telCisloZamestnanecPridatID">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label for="poziceZamestnancePridatID">Pozice:</label></td>
                                                    <td>
                                                        <select name="poziceZamestnancePridat"
                                                                id="poziceZamestnancePridatID">
                                                            <option value="uklizecka">Uklízečka</option>
                                                            <option value="udrzbar">Údržbář</option>
                                                            <option value="recepcni">Recepční</option>
                                                            <option value="sef">Šéf</option>
                                                            <option value="kuchar">Kuchař</option>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><label for="nadrizenyPridatID">Nadřízený:</label></td>
                                                    <td>
                                                        <select name="nadrizenyPridat" id="nadrizenyPridatID">
															<?php
															try {
																for ( $i = 0; $i < count( $hotel->get_seznam_zamestnancu() ); $i ++ ) {
																	$jmeno = $hotel->seznamZamestnancu[ $i ];
																	echo "<option value=$i>$jmeno</option>";
																}
																if ( count( $hotel->get_seznam_zamestnancu() ) == 0 ) {
																	echo "<option value = 0>default boss</option>";
																}
															} catch ( exception ) {
															}
															?>
                                                        </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><input type="submit" name="pridejOsobu"
                                                               value="přidej zaměstnance"
                                                               class="btn btn-default"></td>
                                                </tr>
                                            </table>
                                        </form>
										<?php
										if ( isset( $_POST['jmenoZamestnancePridat'] ) && isset( $_POST['prijmeniZamestnanecPridat'] ) &&
										     isset( $_POST['cisloObcankyZamestnanecPridat'] ) && isset( $_POST['telCisloZamestnanecPridat'] ) &&
										     isset( $_POST['poziceZamestnancePridat'] ) ) {
											$hotel->pridejZamestnance( $_POST['jmenoZamestnancePridat'], $_POST['prijmeniZamestnanecPridat'],
												$_POST['cisloObcankyZamestnanecPridat'], $_POST['telCisloZamestnanecPridat'],
												$_POST['poziceZamestnancePridat'], $_POST['nadrizenyPridat'] );
										}
										?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Zavřít
                                        </button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td>


            <form method="post">
                <table>
                    <tr>
                        <td><label for="spravaZakaznikaJmenoID">Jméno zákazníka: </label></td>
                        <td><input id="spravaZakaznikaJmenoID" type="text" name="jmenoZakaznik"
                                   value="<?php if ( $zakaznik != null ) {
							           echo $zakaznik->get_jmeno();
						           } ?>"</td>
                    </tr>
                    <tr>
                        <td><label for="spravaZakaznikaPrijmeniID">Příjmení zákazníka:</label></td>
                        <td><input id="spravaZakaznikaPrijmeniID" type="text" name="prijmeniZakaznik"
                                   value="<?php if ( $zakaznik != null ) {
							           echo $zakaznik->get_prijmeni();
						           } ?>"</td>
                    </tr>
                    <tr>
                        <td><label for="spravaZakaznikaCisloPokojeID">Číslo pokoje:</label></td>
                        <td><input id="spravaZakaznikaCisloPokojeID" type="number" name="cisloPokojeZakaznik"
                                   value="<?php if ( $zakaznik != null ) {
							           echo $zakaznik->get_cislo_pokoje();
						           } ?>"</td>
                    </tr>
                    <tr>
                        <td><label for="spravaZakaznikaTypZakaznikaID">Typ zákazníka:</label></td>
                        <td><select name="typZakaznika" id="typZakaznikaID"
                                    onselect="<?php echo $zakaznik->get_typ_zakaznika() ?>">
                                <option value="novy">Nový</option>
                                <option value="bezny">Běžný</option>
                                <option value="VIP">VIP</option>
                            </select></td>
                    </tr>
                    <tr>
                        <td><label for="spravaZakaznikaCisloObcankyID">Číslo občanky:</label></td>
                        <td><input id="spravaZakaznikaCisloObcankyID" type="number" name="cisloObcankyZakaznik"
                                   value="<?php if ( $zakaznik != null ) {
							           echo $zakaznik->get_cislo_obcanky();
						           } ?>"</td>
                    </tr>
                    <tr>
                        <td><label for="spravaZakaznikaTelefoniCisloID">Telefoní číslo:</label></td>
                        <td><input id="spravaZakaznikaTelefoniCisloID" type="number" name="telefoniCisloZakaznik"
                                   value="<?php if ( $zakaznik != null ) {
							           echo $zakaznik->get_telefoni_cislo();
						           } ?>"</td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submitZakaznikEdit" value="editovat" class="btn btn-default">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="poziceOsobyID">pozice zákazníka v seznamu: </label></td>
                        <td><input type="text" id="poziceOsobyID" readonly="true" name="poziceOsoby"
                                   value="<?php echo $poziceZakaznika ?>"></td>
                    </tr>

                </table>
            </form>
			<?php

			if ( isset( $_POST['submitZakaznikEdit'] ) ) {
				$hotel->upravZakaznika( $_POST['poziceOsoby'], $_POST['jmenoZakaznik'],
					$_POST['prijmeniZakaznik'], $_POST['cisloPokojeZakaznik'],
					$_POST['cisloObcankyZakaznik'], $_POST['telefoniCisloZakaznik'],
					$_POST['typZakaznika'] );

			}
			?>
        </td>
        <td>
            <form method="post">
                <table>
                    <tr>
                        <td><label for="jmenoZamestnanceEditID">Jméno zaměstnance:</label></td>
                        <td><input type="text" name="jmenoZamestnanceEdit" id="jmenoZamestnanceEditID"
                                   value="<?php if ( $zamestnanec != null ) {
							           echo $zamestnanec->get_jmeno();
						           } ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="prijmeniZamestnanceEditID">Příjmení zaměstnance:</label></td>
                        <td><input type="text" name="prijmeniZamestnanceEdit" id="prijmeniZamestnanceEditID"
                                   value="<?php if ( $zamestnanec != null ) {
							           echo $zamestnanec->get_prijmeni();
						           } ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="cisloObcankyZamestnanecEditID">Číslo občanky:</label></td>
                        <td><input type="number" name="cisloObcankyZamestnanecEdit" id="cisloObcankyZamestnanecEditID"
                                   value="<?php if ( $zamestnanec != null ) {
							           echo $zamestnanec->get_cislo_obcanky();
						           } ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="telefoniCisloZamestnanecEditID">Telefoní číslo:</label></td>
                        <td><input type="number" name="telefoniCisloZamestnanecEdit" id="telefoniCisloZamestnanecEditID"
                                   value="<?php if ( $zamestnanec != null ) {
							           echo $zamestnanec->get_telefoni_cislo();
						           } ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="nadrizenyEditID">Nadřízený:</label></td>
                        <td>
                            <select name="nadrizenyEdit" id="nadrizenyEditID">
								<?php
								try {
									for ( $i = 0; $i < count( $hotel->get_seznam_zamestnancu() ); $i ++ ) {
										$jmeno = $hotel->seznamZamestnancu[ $i ];
										echo "<option value=$i>$jmeno</option>";
									}
									if ( count( $hotel->get_seznam_zamestnancu() ) == 0 ) {
										echo "<option value = 0>default boss</option>";
									}
								} catch ( exception ) {
								}
								?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="poziceZamestnanceEditID">Pozice:</label></td>
                        <td>
                            <select name="poziceZamestnanceEdit" id="poziceZamestnanceEditID">
                                <option value="uklizecka">Uklízečka</option>
                                <option value="udrzbar">Údržbář</option>
                                <option value="recepcni">Recepční</option>
                                <option value="sef">Šéf</option>
                                <option value="kuchar">Kuchař</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="hodinovaMzdaEditID">Hodinová mzda:</label></td>
                        <td><input type="number" name="hodinovaMzdaEdit" id="hodinovaMzdaEditID"
                                   value="<?php if ( $zamestnanec != null ) {
							           echo $zamestnanec->get_plat();
						           } ?>"></td>
                    </tr>
                    <tr>
                        <td><label for="odpracovánoEditID">Odpracováno hodin:</label></td>
                        <td><input type="number" name="odpracovánoEdit" id="odpracovánoEditID"
                                   value="<?php if ( $zamestnanec != null ) {
							           echo $zamestnanec->get_odpracovano_hodin();
						           } ?>"></td>
                    </tr>
                    <tr>
                        <td><input type="submit" name="submitZamestnanecEdit" value="editovat" class="btn btn-default">
                        </td>
                    </tr>
                    <tr>
                        <td><label for="poziceZamestnanceVPoliID">pozice zaměstnance v seznamu:</label></td>
                        <td><input type="number" name="poziceZamestnanceVPoli" id="poziceZamestnanceVPoliID"
                                   readonly="true" value="<?php echo $poziceZamestnance ?>"></td>
                    </tr>
                </table>
            </form>

			<?php

			if ( isset( $_POST['submitZamestnanecEdit'] ) ) {
				$hotel->upravZamestnance( $_POST['poziceZamestnanceVPoli'], $_POST['jmenoZamestnanceEdit'],
					$_POST['prijmeniZamestnanceEdit'], $_POST['cisloObcankyZamestnanecEdit'],
					$_POST['telefoniCisloZamestnanecEdit'], $_POST['poziceZamestnanceEdit'], $_POST['nadrizenyEdit'],
					$_POST['odpracovánoEdit'], $_POST['hodinovaMzdaEdit'] );
			}
			?>

        </td>
    </tr>
</table>

<?php
$objData = serialize( $hotel );
$filePath = getcwd() . DIRECTORY_SEPARATOR . "hotelSave.txt";
if ( is_writable( $filePath ) ) {
	$fp = fopen( $filePath, 'w' );
	fwrite( $fp, $objData );
	fclose( $fp );
}
?>
