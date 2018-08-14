 <?php 

$search_value=$_POST["search"];


$Predmeti=$_POST['Predmeti'];
 if ($Predmeti=='maths') {
     header("Location:Maths.php");
 }elseif ($Predmeti=='physics') {
       header("Location:Physics.php");
 }elseif ($Predmeti=='comp') {
        header("Location:Informatika.php");
 }else{
       header("Location:FullSearch.php");
 }











  ?>