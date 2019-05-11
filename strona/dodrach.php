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
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">Super drzwi</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Strona główna</a></li>
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
    <h3 class="panel-title">Kreator dodawania rachunków</h3>
  </div>
  <div class="panel-body">
	Poniżej znajduje się dane sprzedawcy. Jeżeli chcesz wystawić rachunek z tymi danymi wciśnij przycisk 'Wystaw rachunek'.
  </div>
  </div>
<?php
mysql_connect('localhost','root','') or die('Błąd połączenia z bazą danych '.mysql_error);
mysql_select_db('rachunek') or die ('Błąd wyboru bazy danych '.mysql_error);
mysql_query('SET NAMES \'utf8\'');
$zapytanie = "SELECT * FROM klienci WHERE id=1";
$rezultat=mysql_query($zapytanie);
$row=mysql_fetch_assoc($rezultat);
?>
<blockquote>
 <small>Sprzedawca:</small>
  <p><?php echo $row['nazwa']."<br>".
  $row['adres'].", ".$row['kod_pcz']." ".$row['miejsc']."<br>
  NIP:".$row['nip']
  ; ?></p>
</blockquote>

<a href='rach/d1.php'><button class='btn btn-primary'>Wystaw rachunek</button></a>

<div class="panel panel-default" style="position:absolute; bottom:0px;">


  <div class="panel-body">
    Michał Cywka 3IT
  </div>
</div>
</div>
</body>
</html>