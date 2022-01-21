<?php

namespace Hotel;

class Osoba {
	protected $jmeno;
	protected $prijmeni;
	protected $cisloObcanky;
	protected $telefoniCislo;
	protected $poziceVPoli;

	/**
	 * Osoba constructor.
	 *
	 * @param int $poziceVPoli
	 * @param String $jmeno
	 * @param String $prijmeni
	 * @param float $cisloObcanky
	 */
	public function __construct( $poziceVPoli, $jmeno, $prijmeni, $cisloObcanky, $telefoniCislo ) {
		$this->jmeno         = $jmeno;
		$this->prijmeni      = $prijmeni;
		$this->cisloObcanky  = $cisloObcanky;
		$this->telefoniCislo = $telefoniCislo;
		$this->poziceVPoli   = $poziceVPoli;
	}

	/**
	 * @return String
	 */
	public function get_jmeno(): string {
		return $this->jmeno;
	}

	/**
	 * @param String $jmeno
	 */
	public function set_jmeno( string $jmeno ): void {
		$this->jmeno = $jmeno;
	}

	/**
	 * @return String
	 */
	public function get_prijmeni(): string {
		return $this->prijmeni;
	}

	/**
	 * @param String $prijmeni
	 */
	public function set_prijmeni( string $prijmeni ): void {
		$this->prijmeni = $prijmeni;
	}

	/**
	 * @return float
	 */
	public function get_cislo_obcanky(): int {
		return $this->cisloObcanky;
	}

	/**
	 * @param float $cisloObcanky
	 */
	public function set_cislo_obcanky( int $cisloObcanky ): void {
		$this->cisloObcanky = $cisloObcanky;
	}

	public function __toString(): string {
		return $this->jmeno . " " . $this->prijmeni;
	}

	/**
	 * @return float
	 */
	public function get_telefoni_cislo() {
		return $this->telefoniCislo;
	}

	/**
	 * @param float $telefoniCislo
	 */
	public function set_telefoni_cislo( $telefoniCislo ): void {
		$this->telefoniCislo = $telefoniCislo;
	}

	/**
	 * @return int
	 */
	public function get_pozice_v_poli(): int {
		return $this->poziceVPoli;
	}

	/**
	 * @param int $poziceVPoli
	 */
	public function set_pozice_v_poli( int $poziceVPoli ): void {
		$this->poziceVPoli = $poziceVPoli;
	}


}