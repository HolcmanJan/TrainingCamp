<?php
namespace Hotel;

class Zakaznik extends Osoba{
	protected $cisloPokoje;
	protected $typZakaznika;


	/**
	 * Zakaznik constructor.
	 *
	 * @param int $poziceVPoli
	 * @param int $cisloPokoje
	 * @param String $jmeno
	 * @param String $prijmeni
	 * @param float $cisloObcanky
	 * @param float $telefoniCislo
	 */
	public function __construct($poziceVPoli, $jmeno, $prijmeni, $cisloPokoje,  $cisloObcanky, $telefoniCislo, $typZakaznika ) {
		parent::__construct($poziceVPoli, $jmeno, $prijmeni, $cisloObcanky, $telefoniCislo);
		$this->cisloPokoje    = $cisloPokoje;
		$this->typZakaznika = $typZakaznika;
	}

	/**
	 * @return int
	 */
	public function get_cislo_pokoje() {
		return $this->cisloPokoje;
	}

	/**
	 * @param int $cisloPokoje
	 */
	public function set_cislo_pokoje( $cisloPokoje ): void {
		$this->cisloPokoje = $cisloPokoje;
	}

	/**
	 * @return String
	 */
	public function get_typ_zakaznika() {
		return $this->typZakaznika;
	}

	/**
	 * @param String $typZakaznika
	 */
	public function set_typ_zakaznika( $typZakaznika ): void {
		$this->typZakaznika = $typZakaznika;
	}




}