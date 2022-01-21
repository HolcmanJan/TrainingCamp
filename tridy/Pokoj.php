<?php
namespace Hotel;

class Pokoj {
	private $cisloPokoje;
	private $cenaZaNoc;
	private $pokojJeUklizeny;
	private $pokojJeObsazeny;
	private $typPokoje;
	protected $rezervaceOd = null;
	protected $rezervaceDo = null;

	public function __construct( int $cisloPokoje, float $cenaZaNoc, bool $pokojJeUklizeny, bool $pokojJeObsazeny, String $typPokoje ) {
		$this->cisloPokoje      = $cisloPokoje;
		$this->cenaZaNoc        = $cenaZaNoc;
		$this->pokojJeUklizeny  = $pokojJeUklizeny;
		$this->pokojJeObsazeny  = $pokojJeObsazeny;
		$this->typPokoje        = $typPokoje;
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
	 * @return int
	 */
	public function get_pocet_ubytovanych() {
		return $this->pocetUbytovanych;
	}

	/**
	 * @param int $pocetUbytovanych
	 */
	public function set_pocet_ubytovanych( $pocetUbytovanych ): void {
		$this->pocetUbytovanych = $pocetUbytovanych;
	}

	/**
	 * @return float
	 */
	public function get_cena_za_noc() {
		return $this->cenaZaNoc;
	}

	/**
	 * @param float $cenaZaNoc
	 */
	public function set_cena_za_noc( $cenaZaNoc ): void {
		$this->cenaZaNoc = $cenaZaNoc;
	}

	/**
	 * @return bool
	 */
	public function get_pokoj_je_uklizeny() {
		return $this->pokojJeUklizeny;
	}

	/**
	 * @param bool $pokojJeUklizeny
	 */
	public function set_pokoj_je_uklizeny( $pokojJeUklizeny ): void {
		$this->pokojJeUklizeny = $pokojJeUklizeny;
	}

	/**
	 * @return bool
	 */
	public function get_pokoj_je_obsazeny() {
		return $this->pokojJeObsazeny;
	}

	/**
	 * @param bool $pokojJeObsazeny
	 */
	public function set_pokoj_je_obsazeny( $pokojJeObsazeny ): void {
		$this->pokojJeObsazeny = $pokojJeObsazeny;
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




}