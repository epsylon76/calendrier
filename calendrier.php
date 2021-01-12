<?php
//quel mois et quelle année afficher

if(isset($_GET['annee'])){$annee = $_GET['annee'];}else{$annee = date('Y');}
if(isset($_GET['mois'])){$mois = $_GET['mois'];}else{$mois = date('m');}
if($mois==0){$mois=12;$annee=($annee-1);}
if($mois==13){$mois=1;$annee=($annee+1);}

echo 'mois : '.$mois.'<br>';
echo 'annee : '.$annee.'<br>';



//quel jour démarre le mois ?
$firstdayofmonth = new dateTime('01-'.$mois.'-'.$annee);
$numdayfirstdayofmonth = $firstdayofmonth->format('N');
$numlastdayofmonth = $firstdayofmonth->format('t');
$restant = 7 - $numdayfirstdayofmonth;

echo 'jour de la semaine du premier jour : '.$numdayfirstdayofmonth.'<br>';
echo 'numero dernier jour mois : '.$numlastdayofmonth;
//on doit donc afficher x cases et ensuite afficher le $restant

?>
<div style="width:300px">
  <div style="text-align:center">
    <a href="?mois=<?php echo ($mois-1); ?>&annee=<?php echo $annee; ?>"> << </a> <?php echo $mois; ?> <a href="?mois=<?php echo ($mois+1); ?>&annee=<?php echo $annee; ?>"> >></a>
  </div>
  <div style="text-align:center">
    <a href="?mois=<?php echo $mois; ?>&annee=<?php echo ($annee-1); ?>"> << </a> <?php echo $annee; ?> <a href="?mois=<?php echo $mois; ?>&annee=<?php echo ($annee+1); ?>"> >></a>
  </div>

  <table class="table_calendrier" style="margin:0 auto;">
    <tr>
      <td>Lun</td><td>Mar</td><td>Mer</td><td>Jeu</td><td>Ven</td><td>Sam</td><td>Dim</td>
    </tr>
    <tr> <!--premiere ligne -->
      <?php
       for ($i = 1; $i <= $numlastdayofmonth; $i++) {
                                            //on copie le compteur pour ajouter un zéro
                                            $j = $i;
                                            str_pad($j, 2, '0', STR_PAD_LEFT);
                                            $current = $annee . '-' . $mois . '-' . $j;
                                            if ($curseur == 8) {
                                                $curseur = 1;
                                                echo '<tr>';
                                            }


                                            echo '<td class="jour_on';
                                            if($current == $today){ echo ' jour_today ';}
                                            echo '">';
                                            echo $i;
                                            echo '</td>';


                                            if ($curseur == 7) {
                                                echo '</tr>';
                                            }
                                            $curseur++;
                                        }

      //fermer le tableau
      for($i=$curseur; $i<=7; $i++){
        echo '<td>';
        echo 'X';
        echo '</td>';
      }
      echo '</tr></table>';

      ?>




    </div>
