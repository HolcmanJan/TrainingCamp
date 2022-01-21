<?php
namespace Hotel;

class Zamestnanec extends Osoba {

	protected $pozice;
	protected $nadrizeny;
	protected $odpracovanoHodin = 0;
	protected $plat = 0;

	/**
	 * Zamestnance constructor.
	 *
	 * @param String $pozice
	 * @param String $nadrizeny
	 * @param String $jmeno
	 * @param String $prijmeni
	 * @param float $cisloObcanky
	 */
	public function __construct( $poziceVPoli, $jmeno, $prijmeni, $cisloObcanky, $telefoniCislo, $pozice, $nadrizeny ) {
		parent::__construct($poziceVPoli ,$jmeno, $prijmeni, $cisloObcanky, $telefoniCislo );
		$this->pozice = $pozice;
		$this->nadrizeny = $nadrizeny;
	}

	/**
	 * @return String
	 */
	public function get_pozice() {
		return $this->pozice;
	}

	/**
	 * @param String $pozice
	 */
	public function set_pozice( $pozice ): void {
		$this->pozice = $pozice;
	}

	/**
	 * @return String
	 */
	public function get_nadrizeny() {
		return $this->nadrizeny;
	}

	/**
	 * @param String $nadrizeny
	 */
	public function set_nadrizeny( $nadrizeny ): void {
		$this->nadrizeny = $nadrizeny;
	}

	/**
	 * @return float
	 */
	public function get_odpracovano_hodin() {
		return $this->odpracovanoHodin;
	}

	/**
	 * @param float $odpracovanoHodin
	 */
	public function set_odpracovano_hodin( $odpracovanoHodin ): void {
		$this->odpracovanoHodin = $odpracovanoHodin;
	}

	/**
	 * @return float
	 */
	public function get_plat() {
		return $this->plat;
	}

	/**
	 * @param float $plat
	 */
	public function set_plat( $plat ): void {
		$this->plat = $plat;
	}


}