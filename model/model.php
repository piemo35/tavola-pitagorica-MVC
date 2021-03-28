<?php

class Modello{

    private $limite;
    private $matrice;
    private $FILENAME;


    public function __construct(){
        $this->limite = 10;
        $this->matrice = $this->crea_matrice($this->limite);
        $this->FILENAME = "tavola_periodica";
    }


    public function crea_matrice($limite){  //	SCRIVE LA TAVOLA PITAGORICA SOTTOFORMA DI MATRICE

		for($riga=1; $riga <= $limite; $riga++) {
			for($colonna=1;$colonna<=$limite;$colonna++) {
				$valore= $riga * $colonna;
				$matrice[$riga-1][$colonna-1]=$valore;
			}
		}
		return $matrice;
	}


	public function stampa(){  //	STAMPA LA MATRICE PASSATA COME PARAMETRO
		echo '<div style="float:left; width:48%">';
        echo '<h1 align="center">Tavola pitagorica</h1>';
		echo '<table align="center" border=1 cellpadding=5>';

		for($i=0; $i < $this->limite; $i++) {
			echo '<tr>';

			for($j=0;$j<$this->limite;$j++) {
				echo '<td>';
				echo $this->matrice[$i][$j];
				echo '</td>';
			}
			echo '</tr>';
		}
		echo '</table>';
		echo '</div>';

	}

	
	public function tabella_file(){  //SCRIVE LA TAVOLA PITAGORICA SU UN FILE

		touch($this->FILENAME);
		chmod($this->FILENAME, 0777);

		$fp = fopen($this->FILENAME, "w");


        for($i=0; $i < $this->limite; $i++) {
            for($j=0;$j<$this->limite;$j++) {
                fprintf($fp, $this->matrice[$i][$j]);
            }
            fprintf($fp, "\n");
        }

		fclose($fp);
	}


	public function primaria_x(){ // SOSTITUISCE I VALORI ELLA DIAGONALE PRIMARIA CON UNA "X"
			for($i=0; $i < $this->limite; $i++) {
				for($j=0;$j<$this->limite;$j++) {
					if($i==$j) $this->matrice[$i][$j]="X";
				}
			}
	}


	public function secondaria_x(){ // SOSTITUISCE I VALORI DELLA DIAGONALE SECONDARIA CON UNA "X"
		$x=0;
		$z=9;
		for($i=0; $i < $this->limite; $i++) {
            for($j=0; $j < $this->limite; $j++) {
				if($j == $z && $i == $x){	
					$this->matrice[$i][$j] = "X";
					--$z;
					$x++;
				}
            }
		}
    }


	public function righe_pari_5(){ //INCREMENTA LE RIGHE PARI DI 5
		for($riga=1; $riga <= $this->limite; $riga++) {
            for($colonna=1;$colonna<=$this->limite;$colonna++) {
				if($riga%2 == 0)	$this->matrice[$riga-1][$colonna-1] += 5;
			}
		}
	}


	public function colonne_dispari_7(){ //DECREMENTA LE COLONNE DISPARI DI 7
		for($riga=1; $riga <= $this->limite; $riga++) {
            for($colonna=1;$colonna<=$this->limite;$colonna++) {
				if($colonna%2 != 0)		$this->matrice[$riga-1][$colonna-1] -= 7;
			}
		}
	}


	public function somma_primaria(){ //SOMMA I VALORI DELLA DIAGONALE PRIMARIA
		$somma = 0;
		for($riga=1; $riga <= $this->limite; $riga++) {
            for($colonna=1;$colonna<=$this->limite;$colonna++) {
				if($riga == $colonna) $somma += $this->matrice[$riga-1][$colonna-1];
            }
         }
		return $somma;
    }


    public function somma_righe(){ //AGGIUNGE UNA COLONNA CONTENENTE LE SOMME DEI VALORI DI OGNI RIGA
		$somma = 0;
		$limite = ($this->limite + 1);
	
		echo '<div style="float:left; width:48%">';
		echo '<h1 align="center">Somma dei valori di ogni riga</h1>';
		echo '<table align="center" border=1 cellpadding=5>';

		for($riga=1; $riga <= $limite; $riga++){
        	if($riga < $limite) echo '<tr>';
        	else	break;

        	for($colonna=1; $colonna <= $limite; $colonna++) {
        		if ($colonna == $limite){
        			echo '<td>';
        			echo $somma;
        			echo '</td>';
        			$somma = 0;
        		}else{
        			$somma = $somma + $this->matrice[$riga-1][$colonna-1];
        			echo '<td>';
        			echo $this->matrice[$riga-1][$colonna-1];
        			echo '</td>';
        		}
        	}
        	if($riga < $limite) echo '</tr>';
    	}
    	echo '</table>';
		echo '</div>';
	}


	public function somma_colonne(){ //AGGIUNGE UNA RIGA CONTENENTE LE SOMME DEI VALORI DI OGNI COLONNA

		for($i=0; $i < $this->limite; $i++)	$somma[$i]=0;
		
		for($colonna = 0; $colonna<$this->limite; $colonna++) {
			for($riga = 0; $riga<$this->limite; $riga++)	$somma[$colonna] = $somma[$colonna] + $this->matrice[$riga][$colonna];
		}
	
		echo '<div style="float:left; width:48%">';
		echo '<h1 align="center">Somma dei valori d ogni colonna</h1>';
		echo '<table align="center" border=1 cellpadding=5>';
		for($i=0; $i < $this->limite; $i++) {
			echo '<tr>';
        
			for($j=0; $j<$this->limite; $j++) {
				echo '<td>'; 
				echo $this->matrice[$i][$j];
				echo '</td>';
			}
			echo '</tr>';
		}
		
		echo'<tr>';
			for($i=0; $i<$this->limite; $i++) {
				echo '<td>';
				echo $somma[$i];
				echo '</td>';
			}
		
		echo '</table>';
		echo '</div>';   		
	}


	public function inverti_primaria() { //INVERTE I VALORI DELLA DIAGONALE PRIMARIA
		$j=10;

		for($i=0;$i<10;$i++) {
			$this->matrice[$i][$i]=$j*$j;
			--$j;
		}
	}


	public function inverti_righe(){ //INVERTE I VALORI DI OGNI RIGA

		for($riga=1; $riga <= $this->limite; $riga++) {
        $x=10;
            for($colonna=1;$colonna<=$this->limite;$colonna++) {
				$this->matrice[$riga-1][$colonna-1] = $riga*$x;
				$x -= 1;
            }
		}
	}


	public function inverti_colonne(){ //INVERTE I VALORI DI OGNI COLONNA

		for($colonna = 1; $colonna <= $this->limite; $colonna++){
			$x=1;
            for($riga = 10; $riga > 0; --$riga){
             $this->matrice[$riga-1][$colonna-1] = $colonna*$x;
             $x++;
            }
		}
	}
		
}

