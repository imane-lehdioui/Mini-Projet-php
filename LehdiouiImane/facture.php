<?php

$produit=$_POST["produits"];


$produits=array(
  "montre"=>array(
         "prix"=>1700,
         "description"=>"Montre Cluse hommes - Vigoureux Dark Grey CW0101503006,Disponible dans plusieurs coloris.<br> cette montre Cluse pour hommes a ici opté pour un look monochrome! Habillée d'un ténébreux gris anthracite jusqu'au coeur du cadran soleillé, elle nous envoûte par son allure masculine et branchée. Afin d'indiquer l'heure avec style et clarté, les aiguilles et index ont quant à eux revêtu un lumineux doré.",
           "image"=> "montre.jpg",
           "quantite"=>56),


  "telephone"=>array(
         "prix"=>5000,
         "description"=>"Le Samsung Galaxy S10 est le flagship de Samsung pour 2019. Il est équipé d'un SoC Samsung Exynos 9820 gravé en 8 nm, d'un triple capteur et d'un nouvel écran sans bord avec la caméra logée dans une bulle.",
          "image"=> "GalaxyS6.png", 
           "quantite"=>56),
           
         

  "bracelet"=>array(
         "prix"=>400,"description"=>"Bracelet Fossil hommes - Caravan JF03438040.<br>
      Figurant sur la liste des accessoires incontournables de chez Fossil, ce bracelet pour hommes en impose par son style un brin rock'n'roll! Composé de multiples lanières en cuir dans lesquelles des perles en acier sont incrustées, il ne manquera pas de se faire remarquer à notre poignet.",
      "image"=> "bracelet.jpg",
      "quantite"=>56),
);

$age=array(
  "0-9"=>20,
  "11-19"=>10,
  "20-29"=>5,
  "+30"=>0);
$ageparametre=$_POST["age"];
$pourcentagereduction= $age[$ageparametre];
// echo $produits[$produit]["description"];
// echo $produits[$produit]["prix"];
// echo $produits[$produit]["quantite"];
// echo$produits["image"][$produit];





?>

<HTML>
<HEAD>
    <TITLE>Cellules d'un tableau</TITLE>
 
<BODY>

  <h1>Facture de <?php 
                 $nom=$_POST["nom"];
                 echo " $nom";
                 $prenom=$_POST["prenom"];
                 echo " $prenom";
                ?></h1>
  <table border="0" cellpadding="5" cellspacing="0" width="100%">
   <tr>
    <td align="right" valign="top">


       <?php 
       $monimage= $produits[$produit]["image"];
       echo "<img src='$monimage' width='200' height='253'>"; 
       ?>

    </td>
    <td valign="top">
      <h2>Description</h2>
      <p> <?php echo $produits[$produit]["description"];?></p></td>
      
   </tr>

   <tr>

   </tr>
   <td></td>
   <td>
         <TABLE border="2" width="600">
        <TR>
            <TH width="310">Pu
            <TH width="310">Quantite
            <TH width="140">PrixHors taxe

        <TR>
            <TD> <?php echo $produits[$produit]["prix"]; ?>
            <TD>
                <?php 
                 $quantite=$_POST["quantite"];
                 echo " $quantite";
                ?>
            <TD> <?php
                  $prixHT= $quantite*$produits[$produit]["prix"];
                  echo $prixHT;
                 
                  

                 ?>
        <TR>
            <TD>
            <TD> <?php echo "Reduction Age($pourcentagereduction%)";?>
            <TD> <?php $reductionage=$prixHT*$pourcentagereduction/100;
                  echo $reductionage;

                ?>
        <TR>
            <TD>
            <TD>Reduction Cash(2%)
            <TD> <?php 
                 if(isset($_POST["paimentcash"]))
                 {

                    $reductioncash=$prixHT*2/100;
                    echo $reductioncash;
                  
                 }else {
                     $reductioncash=0;
                      echo $reductioncash;}


            

                ?>
        <TR>
            <TD>
            <TD>Livraison
            <TD> <?php
                  if (isset($_POST["livraisonD"]))
                   {
                     $prixlivraison=100;
                     echo $prixlivraison;
                   }
                   else {
                    $prixlivraison=0;
                    echo $prixlivraison;
                   }
                  ?>

        <TR>
            <TD>
            <TD>TVA 20%
            <TD><?php
                 $tva=$prixHT*20/100;
                 echo $tva; 
                 ?>

        <TR>
            <TD>
            <TD>Prix TTC
            <TD><?php
                 $prixttc=$prixHT-($reductionage+ $reductioncash)+$prixlivraison+$tva;
                 echo $prixttc;
                 ?>


</td>

    </TABLE>
    
  </tr>
</table>







