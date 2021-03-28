<?php

include_once("model/model.php");

class Controllo
{
	
	private $modello;

	public function __construct(){
		$this->modello = new Modello();
	}
	
	public function invoke(){

	$comando = isset($_REQUEST['nome']) ? $_REQUEST['nome'] : "homepage";

	switch ($comando) {

		case "homepage":
			$this->modello->stampa(); //stampa la tavola periodica nella homepage
			break;

		case "scrivi tabella su file":
			$this->modello->tabella_file(); //scrive la tavola periodica su file di testo
			break;

		case "scrivi tabella su matrice":
			$this->modello->stampa(); //stampa la matrice
			break;

		case "sostituisci valori della diagonale primaria con una X":
			$this->modello->primaria_x();
			$this->modello->stampa(); //
			break;

		case "sostituisci valori della diagonale secondaria con una X":
			$this->modello->secondaria_x();
			$this->modello->stampa();
			break;

		case "incrementa le righe pari di 5":
			$this->modello->righe_pari_5();
			$this->modello->stampa();
			break;

		case "decrementa le clonne dispari di 7":
			$this->modello->colonne_dispari_7();
			$this->modello->stampa();
			break;

		case "somma i valori della diagonale primaria":
			$somma = $this->modello->somma_primaria();
			$this->modello->stampa();
			echo "<h4>La somma dei valori della diagonale primaria equivale a: " . $somma . "</h4>";
			break;

		case "somma i valori di ogni riga":
			$this->modello->somma_righe();
			break;

		case "somma i valori di ogni colonna":
			$this->modello->somma_colonne();
			break;

		case "inverti i valori della diagonale primaria":
			$this->modello->inverti_primaria();
			$this->modello->stampa();
			break;

		case "inverti i valori di ogni riga":
			$this->modello->inverti_righe();
			$this->modello->stampa();
			break;

		case "inverti i valori di ogni colonna":
			$this->modello->inverti_colonne();
			$this->modello->stampa();
			break;

		default:
			echo "Scelta non valida";
			break;
	}

	include ("view/homepage.php");
	}
}


?>
