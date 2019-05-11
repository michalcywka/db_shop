<?php session_start();
if($_SESSION['zalogowany']!==1)
{
header("Location: ../blad.php");
}
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="../../style.css" />
	<script src="../../jquery.js"></script>
	<script src="../../bootstrap.min.js"></script>
  </head>
<body>
<div class="container">
<div class="jumbotron">
	<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Kreator dodawania rachunków</h3>
  </div>
  <div class="panel-body">
	Wybierz produkty, które nabył.
  </div>
  </div>
  </div>
   <table class='table table-striped table-hover '>
    <thead>
    <tr>
      <th>#</th>
      <th>Nazwa produktu</th>
      <th>Ilość w magazynie</th>
      <th>Cena netto</th>
	  <th>Kliknij aby dodać produkt</th>
    </tr>
  </thead>
  <tbody>
  <form method="POST">
<?php
$pid=$_GET['pid'];
mysql_connect('localhost','root','') or die('Błąd połączenia z bazą danych '.mysql_error);
mysql_select_db('rachunek') or die ('Błąd wyboru bazy danych '.mysql_error);
mysql_query('SET NAMES \'utf8\'');
$zapytanie="SELECT * FROM produkty WHERE 1";
$rezultat=mysql_query($zapytanie);
$i=1;
while($row=mysql_fetch_assoc($rezultat)){
$id=$row['id'];
echo "


    <tr>
      <td>".$i."</td>
      <td>".$row['nazwa']."</td>
      <td>".$row['ilosc']."</td>
      <td>".$row['cena']." zł</td>
	  <td><button class='btn btn-primary' onclick='dodaj($id)'>Dodaj do rachunku</button></td>
    </tr>
";
$i++;
}

?>
</form>
</tbody>
</table>
<?php var_dump($_GET); ?>
 </div>
 </body>
 </html>