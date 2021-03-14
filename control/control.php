<?php

include_once("model/model.php");

class Controllo
{
	
	private $modello;
	private $limite = 10;

	public function __construct(){
		$this->modello = new Modello();
	}
	
	public function invoke()
	{
	
	//private $matrice = $this->modello->crea_matrice($this->limite);
	
	//leggo il comando che di default e' homepage
	$comando = isset($_REQUEST['nome']) ? $_REQUEST['nome'] : "homepage";
				
		if($comando == "homepage")
		{
			$this->modello->tavola($this->limite); //stampa la tavola periodica nella homepage
			include ("view/homepage.php");
		}
		
		elseif($comando == "scrivi tabella su file")
		{
			$this->modello->tabella_file(); //scrive la tavola periodica su file di testo

			include ("view/homepage.php");
		}
		
		elseif($comando == "scrivi tabella su matrice")
		{
			$matrice = $this->modello->crea_matrice($this->limite); //carica la matrice
			$this->modello->stampa($matrice,$this->limite); //stampa la matrice
			include ("view/homepage.php");
		}
		
		elseif($comando == "sostituisci valori della diagonale primaria con una X")
		{
			$matrice = $this->modello->crea_matrice($this->limite); //prende la matrice
			$matrice_modificata = $this->modello->primaria_x($matrice,$this->limite); //la modifica 
			$this->modello->stampa($matrice_modificata,$this->limite); //la stampa
			include ("view/homepage.php");
		}
		
		elseif($comando == "sostituisci valori della diagonale secondaria con una X")
		{
			$matrice = $this->modello->crea_matrice($this->limite); //carica la matrice
			$matrice_modificata = $this->modello->secondaria_x($matrice,$this->limite); //modifica la matrice
			$this->modello->stampa($matrice_modificata,$this->limite); //stampa la matrice
			include ("view/homepage.php");
		}
		
		elseif($comando == "incrementa le righe pari di 5")
		{
			$matrice = $this->modello->crea_matrice($this->limite); //carica la matrice
			$matrice_modificata = $this->modello->righe_pari_5($matrice,$this->limite); //modifica la matrice
			$this->modello->stampa($matrice_modificata,$this->limite); //stampa la matrice
			include ("view/homepage.php");
		}
		
		elseif($comando == "decrementa le clonne dispari di 7")
		{
			$matrice = $this->modello->crea_matrice($this->limite); //carica la matrice
			$matrice_modificata = $this->modello->colonne_dispari_7($matrice,$this->limite); //modifica la matrice
			$this->modello->stampa($matrice_modificata,$this->limite); //stampa la matrice
			include ("view/homepage.php");
		}
		
		elseif($comando == "somma i valori della diagonale primaria")
		{
			$matrice = $this->modello->crea_matrice($this->limite); //carica la matrice
			$somma = $this->modello->somma_primaria($matrice,$this->limite); //restituisce la somma
			$this->modello->stampa($matrice,$this->limite);  //stampa la matrice
			echo "<h4>La somma dei valori della diagonale primaria equivale a: " . $somma . "</h4>";
			include ("view/homepage.php");
		}
		
		elseif($comando == "somma i valori di ogni riga")
		{
			$matrice = $this->modello->crea_matrice($this->limite); //carica la matrice
			$this->modello->somma_righe($matrice); //modifica e stampa la matrice
			include ("view/homepage.php");
		}
		
		elseif($comando == "somma i valori di ogni colonna")
		{
			$matrice = $this->modello->crea_matrice($this->limite); //carica la matrice
			$this->modello->somma_colonne($matrice,$this->limite); //modifica e stampa la matrice
			include ("view/homepage.php");
		}
		
		elseif($comando == "inverti i valori della diagonale primaria")
		{
			$matrice = $this->modello->crea_matrice($this->limite); //carica la matrice
			$matrice_modificata = $this->modello->inverti_primaria($matrice,$this->limite); //modifica la matrice
			$this->modello->stampa($matrice_modificata,$this->limite); //stampa la matrice
			include ("view/homepage.php");
		}
		
		elseif($comando == "inverti i valori di ogni riga")
		{
			$matrice = $this->modello->crea_matrice($this->limite); //carica la matrice
			$matrice_modificata = $this->modello->inverti_righe($matrice,$this->limite); //modifica la matrice
			$this->modello->stampa($matrice_modificata,$this->limite); //stampa la matrice
			include ("view/homepage.php");
		}
		
		elseif($comando == "inverti i valori di ogni colonna")
		{
			$matrice = $this->modello->crea_matrice($this->limite); //carica la matrice
			$matrice_modificata = $this->modello->inverti_colonne($matrice,$this->limite); //modifica la matrice
			$this->modello->stampa($matrice_modificata,$this->limite); //stampa la matrice
			include ("view/homepage.php");
		}
	}
}


?>
