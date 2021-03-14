<?php

class Modello{
	
	public function tavola($limite){ //STAMPA LA TAVOLA PERIODICA ORIGINALE
		echo '<div style="float:left; width:48%">';
		echo '<h1 align="center">Tavola pitagorica</h1>';
		echo '<table align="center" border=1 cellpadding=5>';
		for($riga=1; $riga <= $limite; $riga++)
		{
			echo '<tr>';
			for($colonna=1;$colonna<=$limite;$colonna++)
            {
                $valore= $riga * $colonna;
                echo '<td>';
                echo $valore;
                echo '</td>';
            }
            echo '</tr>';
		}
		echo '</table>';
		echo '</div>';
	}
	
	public function stampa($matrice,$limite){  //	STAMPA LA MATRICE PASSATA COME PARAMETRO
		echo '<div style="float:left; width:48%">';
		echo '<table align="center" border=1 cellpadding=5>';
			for($i=0; $i < $limite; $i++)
			{
				echo '<tr>';
        
				for($j=0;$j<$limite;$j++)
				{
					echo '<td>'; 
					echo $matrice[$i][$j];
					echo '</td>';
				}
			echo '</tr>';
			}
		echo '</table>';
		echo '</div>';
	}
	
	public function crea_matrice($limite){  //	SCRIVE LA TAVOLA PITAGORICA SOTTOFORMA DI MATRICE
		
			for($riga=1; $riga <= $limite; $riga++)
			{        
				for($colonna=1;$colonna<=$limite;$colonna++)
				{
					$valore= $riga * $colonna;
					$matrice[$riga-1][$colonna-1]=$valore;
					//$matrice[$riga-1][$colonna-1];
				}
			}
			return $matrice;
	}
	
	public function tabella_file(){ //SCRIVE LA TAVOLA PITAGORICA SU UN FILE
		
	$tavola = "tavola_periodica";
			touch($tavola);
			chmod($tavola, 0777);

	$fp=fopen($tavola,"w");
	$limite=10;

	for($riga=1; $riga <= $limite; $riga++) {
		for ($colonna = 1; $colonna <= $limite; $colonna++) {
			$valore = $riga * $colonna;
			fprintf($fp, $valore);
		}
		fprintf($fp, "\n");
	}
	fclose($fp);
	
	}

	public function primaria_x($matrice,$limite) // SOSTITUISCE I VALORI ELLA DIAGONALE PRIMARIA CON UNA "X"
		{
			for($i=0; $i < $limite; $i++)
			{
				for($j=0;$j<$limite;$j++)
				{
					if($i==$j){
						$matrice[$i][$j]="X";
					}
				}
			}
		return $matrice;
		}
	
	public function secondaria_x($matrice,$limite) // SOSTITUISCE I VALORI DELLA DIAGONALE SECONDARIA CON UNA "X"
		{
		$x=0;
		$z=9;
		for($i=0; $i < $limite; $i++)
		{
            for($j=0; $j < $limite; $j++)
            {
				if($j == $z && $i == $x){	
					$matrice[$i][$j] = "X";
					--$z;
					$x++;
				}
            }
		}
		return $matrice;
		}
		
	public function righe_pari_5($matrice,$limite) //INCREMENTA LE RIGHE PARI DI 5
		{

		for($riga=1; $riga <= $limite; $riga++)
		{
            for($colonna=1;$colonna<=$limite;$colonna++)
            {
				if($riga%2 == 0){
					$matrice[$riga-1][$colonna-1] = $matrice[$riga-1][$colonna-1] + 5;
				}
			}
		}
			return $matrice;
		}
		
	public function colonne_dispari_7($matrice,$limite) //DECREMENTA LE COLONNE DISPARI DI 7
		{

		for($riga=1; $riga <= $limite; $riga++)
		{
            for($colonna=1;$colonna<=$limite;$colonna++)
            {
				if($colonna%2 != 0){
					$matrice[$riga-1][$colonna-1] = $matrice[$riga-1][$colonna-1] - 7;
				}
			}
		}
			return $matrice;
		}
		
	public function somma_primaria($matrice,$limite) //SOMMA I VALORI DELLA DIAGONALE PRIMARIA
	{
		$somma = 0;
		for($riga=1; $riga <= $limite; $riga++)
		{
            for($colonna=1;$colonna<=$limite;$colonna++)
            {
				if($riga == $colonna){
					$somma = $somma+$matrice[$riga-1][$colonna-1];
				}
            }
         }
		return $somma;
    }
    
    public function somma_righe($matrice) //AGGIUNGE UNA COLONNA CONTENENTE LE SOMME DEI VALORI DI OGNI RIGA
    {
    	
	$limite=11;

	$somma = 0;
	
	echo '<div style="float:left; width:48%">';
	echo '<h1 align="center">Somma dei valori di ogni riga</h1>';
	echo '<table align="center" border=1 cellpadding=5>';

	for($riga=1; $riga <= $limite; $riga++)
    {
      
        if($riga < 11){
			echo '<tr>';
			}else{
				break;
				} 

            for($colonna=1;$colonna<=$limite;$colonna++)
            {
				if ($colonna == 11){
					
					echo '<td>'; 
					echo $somma; 
					echo '</td>';
					$somma=0;
					
				}else{
                $somma = $somma+$matrice[$riga-1][$colonna-1];
                echo '<td>'; 
                echo $matrice[$riga-1][$colonna-1]; 
                echo '</td>';
            }}
        if($riga < 11){echo '</tr>';} 
    }
    echo '</table>';
	echo '</div>';
	}
	
	public function somma_colonne($matrice,$limite) //AGGIUNGE UNA RIGA CONTENENTE LE SOMME DEI VALORI DI OGNI COLONNA
	{
		$limite=10;
		for($i=0; $i<$limite; $i++)
		{
				$somma[$i]=0;
		}
		
	for($colonna = 0; $colonna<$limite; $colonna++)
	{
			for($riga = 0; $riga<$limite; $riga++)
			{
					$somma[$colonna] = $somma[$colonna] + $matrice[$riga][$colonna];
			}
	}
	
	echo '<div style="float:left; width:48%">';
	echo '<h1 align="center">Somma dei valori d ogni colonna</h1>';
	echo '<table align="center" border=1 cellpadding=5>';
		for($i=0; $i < $limite; $i++)
		{
			echo '<tr>';
        
			for($j=0; $j<$limite; $j++)
			{
				echo '<td>'; 
				echo $matrice[$i][$j];
				echo '</td>';
			}
			echo '</tr>';
		}
		
		echo'<tr>';
			for($i=0; $i<$limite; $i++)
			{
				echo '<td>';
				echo $somma[$i];
				echo '</td>';
			}
		
		echo '</table>';
		echo '</div>';   		
	}
	
	public function inverti_primaria($matrice,$limite) //INVERTE I VALORI DELLA DIAGONALE PRIMARIA
	{
	$j=10;

		for($i=0;$i<10;$i++)
		{	
			$matrice[$i][$i]=$j*$j;
			--$j;
		}
		return $matrice;
	}
	
	public function inverti_righe($matrice,$limite) //INVERTE I VALORI DI OGNI RIGA
	{
	
		for($riga=1; $riga <= $limite; $riga++)
		{
        $x=10;
            for($colonna=1;$colonna<=$limite;$colonna++)
            {
				$matrice[$riga-1][$colonna-1]=$riga*$x;
				$x=$x-1;
            }
		}
		return $matrice;
	}
	
	public function inverti_colonne($matrice,$limite) //INVERTE I VALORI DI OGNI COLONNA
	{		
		for($colonna=1; $colonna <= $limite; $colonna++)
		{
			$x=1;
            for($riga=10; $riga > 0; --$riga)
            {
             $matrice[$riga-1][$colonna-1]=$colonna*$x;
             $x++;
            }
		}
		return $matrice;
	}
		
}
?>
