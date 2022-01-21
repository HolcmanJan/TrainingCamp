<?php

namespace Hotel;

class Hotel {
	public $pocetPokoju;
	/** @var Pokoj[] */
	public $seznamPokoju = [];
	/** @var Zakaznik[] */
	public $seznamNavstevniku = [];
	/** @var Zamestnanec[] */
	public $seznamZamestnancu = [];
	/** @var Recenze[] */
	public $seznamRecenzi = [];
	public $nazev;

	public function __construct( $nazev, $pocetPokoju ) {
		$this->nazev       = $nazev;
		$this->pocetPokoju = $pocetPokoju;
	}

	public function pridejZakaznika(
		string $jmeno, string $prijmeni, int $cisloPokoje, float $cisloObcanky,
		float $telefoniCislo, string $typZakaznika
	) {
		$poziceVPoli               = count( $this->seznamNavstevniku ) - 1;
		$zakaznik                  = new Zakaznik( $poziceVPoli, $jmeno, $prijmeni, $cisloPokoje, $cisloObcanky, $telefoniCislo, $typZakaznika );
		$this->seznamNavstevniku[] = $zakaznik;
	}

	public function upravZakaznika(
		int $poziceZakaznika, string $jmeno, string $prijmeni, int $cisloPokoje,
		float $cisloObcanky, float $telefoniCislo, string $typZakaznika
	) {
		$this->seznamNavstevniku[ $poziceZakaznika ]->set_jmeno( $jmeno );
		$this->seznamNavstevniku[ $poziceZakaznika ]->set_prijmeni( $prijmeni );
		$this->seznamNavstevniku[ $poziceZakaznika ]->set_cislo_pokoje( $cisloPokoje );
		$this->seznamNavstevniku[ $poziceZakaznika ]->set_cislo_obcanky( $cisloObcanky );
		$this->seznamNavstevniku[ $poziceZakaznika ]->set_telefoni_cislo( $telefoniCislo );
		$this->seznamNavstevniku[ $poziceZakaznika ]->set_typ_zakaznika( $typZakaznika );
	}

	public function pridejZamestnance(
		string $jmeno, string $prijmeni, float $cisloObcanky, float $telefoniCislo,
		string $pozice, string $nadrizeny
	) {
		$poziceVPoli               = count( $this->seznamZamestnancu ) - 1;
		$zamestnanec               = new Zamestnanec( $poziceVPoli, $jmeno, $prijmeni, $cisloObcanky, $telefoniCislo, $pozice, $nadrizeny );
		$this->seznamZamestnancu[] = $zamestnanec;
	}

	public function upravZamestnance(
		int $poziceZamestnance, string $jmeno, string $prijmeni, float $cisloObcanky, float $telefoniCislo,
		string $pozice, string $nadrizeny, float $odpracovanoHodin, float $plat
	) {
		$this->seznamZamestnancu[ $poziceZamestnance ]->set_jmeno( $jmeno );
		$this->seznamZamestnancu[ $poziceZamestnance ]->set_prijmeni( $prijmeni );
		$this->seznamZamestnancu[ $poziceZamestnance ]->set_cislo_obcanky( $cisloObcanky );
		$this->seznamZamestnancu[ $poziceZamestnance ]->set_telefoni_cislo( $telefoniCislo );
		$this->seznamZamestnancu[ $poziceZamestnance ]->set_pozice( $pozice );
		$this->seznamZamestnancu[ $poziceZamestnance ]->set_nadrizeny( $nadrizeny );
		$this->seznamZamestnancu[ $poziceZamestnance ]->set_odpracovano_hodin( $odpracovanoHodin );
		$this->seznamZamestnancu[ $poziceZamestnance ]->set_plat( $plat );
	}

	public function pridejRecenzi( string $autor, string $text, int $hodnoceni ) {
		$recenze               = new Recenze( $hodnoceni, $autor, $text );
		$this->seznamRecenzi[] = $recenze;
	}

	/**
	 * @return int
	 */
	public function get_pocet_pokoju() {
		return $this->pocetPokoju;
	}

	/**
	 * @param int $pocetPokoju
	 */
	public function set_pocet_pokoju( $pocetPokoju ): void {
		$this->pocetPokoju = $pocetPokoju;
	}

	/**
	 * @return array
	 */
	public function get_seznam_pokoju(): array {
		return $this->seznamPokoju;
	}

	/**
	 * @param array $seznamPokoju
	 */
	public function set_seznam_pokoju( array $seznamPokoju ): void {
		$this->seznamPokoju = $seznamPokoju;
	}

	/**
	 * @return Zakaznik[]
	 */
	public function get_seznam_navstevniku(): array {
		return $this->seznamNavstevniku;
	}

	public function vypisNavstevnikaZPole( int $pozice ) {
		return $this->seznamNavstevniku[ $pozice ];
	}

	/**
	 * @param Zakaznik[] $seznamNavstevniku
	 */
	public function set_seznam_navstevniku( array $seznamNavstevniku ): void {
		$this->seznamNavstevniku = $seznamNavstevniku;
	}

	/**
	 * @return Zamestnanec[]
	 */
	public function get_seznam_zamestnancu(): array {
		return $this->seznamZamestnancu;
	}

	/**
	 * @param Zamestnanec[] $seznamZamestnancu
	 */
	public function set_seznam_zamestnancu( array $seznamZamestnancu ): void {
		$this->seznamZamestnancu = $seznamZamestnancu;
	}

	/**
	 * @return String
	 */
	public function get_nazev() {
		return $this->nazev;
	}

	/**
	 * @param String $nazev
	 */
	public function set_nazev( $nazev ): void {
		$this->nazev = $nazev;
	}

	/**
	 * @return DateTime
	 */
	public function get_rezervace_od() {
		return $this->rezervaceOd;
	}

	/**
	 * @param DateTime $rezervaceOd
	 */
	public function set_rezervace_od( $rezervaceOd ): void {
		$this->rezervaceOd = $rezervaceOd;
	}

	/**
	 * @return DateTime
	 */
	public function get_rezervace_do() {
		return $this->rezervaceDo;
	}

	/**
	 * @param DateTime $rezervaceDo
	 */
	public function set_rezervace_do( $rezervaceDo ): void {
		$this->rezervaceDo = $rezervaceDo;
	}

	/**
	 * @return Recenze[]
	 */
	public function get_seznam_recenzi(): array {
		return $this->seznamRecenzi;
	}

	/**
	 * @param Recenze[] $seznamRecenzi
	 */
	public function set_seznam_recenzi( array $seznamRecenzi ): void {
		$this->seznamRecenzi = $seznamRecenzi;
	}
}