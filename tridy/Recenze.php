<?php

namespace Hotel;

class Recenze {
	private $hodnoceni;
	private $autor;
	private $text;

	/**
	 * @param $hodnoceni
	 * @param $autor
	 * @param $text
	 */
	public function __construct( $hodnoceni, $autor, $text ) {
		$this->hodnoceni = $hodnoceni;
		$this->autor     = $autor;
		$this->text      = $text;
	}

	/**
	 * @return int
	 */
	public function get_hodnoceni() {
		return $this->hodnoceni;
	}

	/**
	 * @param int $hodnoceni
	 */
	public function set_hodnoceni( $hodnoceni ): void {
		$this->hodnoceni = $hodnoceni;
	}

	/**
	 * @return String
	 */
	public function get_autor() {
		return $this->autor;
	}

	/**
	 * @param String $autor
	 */
	public function set_autor( $autor ): void {
		$this->autor = $autor;
	}

	/**
	 * @return String
	 */
	public function get_text() {
		return $this->text;
	}

	/**
	 * @param String $text
	 */
	public function set_text( $text ): void {
		$this->text = $text;
	}


}