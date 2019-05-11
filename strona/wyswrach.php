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
    <link rel="stylesheet" type="text/css" href="../style.css" />
	<script src="../jquery.js"></script>
	<script src="../bootstrap.min.js"></script>
  </head>
<body>
<div class="container">
	<div class="jumbotron">
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Super drzwi</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Strona główna <span class="sr-only">(current)</span></a></li>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Klienci<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="wyswkl.php">Przeglądaj klientów</a></li>
            <li class="divider"></li>
            <li><a href="dodkl.php">Dodaj nowego klienta</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Rachunki<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="wyswrach.php">Przeglądaj rachunki</a></li>
            <li class="divider"></li>
            <li><a href="dodrach.php">Wystaw nowy rachunek</a></li>
          </ul>
        </li>
		   <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Produkty<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="wyswpr.php">Przeglądaj produkty</a></li>
            <li class="divider"></li>
            <li><a href="dodprod.php">Dodaj nowy produkt</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="wyloguj.php">Wyloguj</a></li>
      </ul>
    </div>
  </div>
</nav>
</div>
<div class="panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">Lista rachunków</h3>
  </div>
  <div class="panel-body">
	Na tej stronie można przeglądać wcześniej wystawione rachunki.
  </div>
  </div>
  <table class='table table-striped table-hover '>
    <thead>
    <tr>
      <th>#</th>
      <th>Data</th>
      <th>Klient</th>
      <th>Opcje</th>
    </tr>
  </thead>
  <tbody>
<?php
mysql_connect('localhost','root','') or die('Błąd połączenia z bazą danych '.mysql_error);
mysql_select_db('rachunek') or die ('Błąd wyboru bazy danych '.mysql_error);
mysql_query('SET NAMES \'utf8\'');
$zapytanie="SELECT rachunki.id, rachunki.data_wystaw, klienci.nazwa FROM rachunki, klienci WHERE rachunki.id_klienta=klienci.id";
$rezultat=mysql_query($zapytanie);
$i=1;
while($row=mysql_fetch_assoc($rezultat)){
$id=$row['id'];
echo "

    <tr>
      <td>".$i."</td>
      <td>".$row['data_wystaw']."</td>
      <td>".$row['nazwa']."</td>
	  <td><a href='szczegrach.php?nid=$id'><button class='btn btn-primary'>Szczegóły</button></a>
	  <a href='edrach.php?nid=$id'><button class='btn btn-warning'>Edytuj</button></a></td>
    </tr>

";
$i++;
}
?>
</tbody>
</table>

<div class="panel panel-default" style="clear:both; bottom:0px;">
  <div class="panel-body">
    Michał Cywka 3IT
  </div>
</div>
</div>

</body>
</html>