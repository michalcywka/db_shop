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
<?php ob_start() ?>
 <form class="form-horizontal" method="POST">
  <fieldset>
    <legend>Formularz dodawania nowych klientów</legend>
    <div class="form-group">
      <label class="col-lg-2 control-label">Nazwa firmy</label>
      <div class="col-lg-10">
        <input class="form-control" name="fnf" placeholder="Nazwa firmy" type="text">
      </div>
    </div>
	    <div class="form-group">
      <label  class="col-lg-2 control-label">Adres</label>
      <div class="col-lg-10">
        <input class="form-control" name="fadr" placeholder="Adres" type="text">
      </div>
    </div>
	    <div class="form-group">
      <label   class="col-lg-2 control-label">Miejscowość</label>
      <div class="col-lg-10">
        <input name="fmie"class="form-control" placeholder="Miejscowość" type="text">
      </div>
    </div>
	    <div class="form-group">
      <label  class="col-lg-2 control-label">Kod pocztowy</label>
      <div class="col-lg-10">
        <input name="fpcz" class="form-control" placeholder="Kod pocztowy" type="text">
      </div>
    </div>
	    <div class="form-group">
      <label  class="col-lg-2 control-label">Numer NIP</label>
      <div class="col-lg-10">
        <input name="fnip" class="form-control" placeholder="NIP" type="number">
      </div>
    </div>
	    <div class="form-group">
      <label  class="col-lg-2 control-label">Adres poczty elektronicznej</label>
      <div class="col-lg-10">
        <input name="femail" class="form-control" placeholder="E-mail" type="text">
      </div>
    </div>
	    <div class="form-group">
      <label  class="col-lg-2 control-label">Telefon kontaktowy</label>
      <div class="col-lg-10">
        <input name="fnr" class="form-control" placeholder="Numer telefonu" type="number">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset"  class="btn btn-default">Wyczyść</button>
        <button type="submit" name="dodaj" class="btn btn-primary">Zatwierdź</button>
      </div>
    </div>
  </fieldset>
</form>
<?php
if(isSet($_POST['dodaj'])){
$nn=$_POST['fnf'];
$nad=$_POST['fadr'];
$nm=$_POST['fmie'];
$nk=$_POST['fpcz'];
$nnip=$_POST['fnip'];
$nmail=$_POST['femail'];
$ntel=$_POST['fnr'];
mysql_connect('localhost','root','') or die('Błąd połączenia z bazą danych '.mysql_error);
mysql_select_db('rachunek') or die ('Błąd wyboru bazy danych '.mysql_error);
mysql_query('SET NAMES \'utf8\'');
$zapytanie="INSERT INTO klienci(nazwa, adres, miejsc, kod_pcz, nip, email, tel) VALUES ('$nn','$nad','$nm','$nk','$nnip','$nmail','$ntel')";
mysql_query($zapytanie);
ob_end_clean();
echo'
<div class="panel panel-success">
  <div class="panel-heading">
    <h3 class="panel-title">Sukces!</h3>
  </div>
  <div class="panel-body">
    Dodano nowego klienta.
  </div>
</div>
';
}
?>
<div class="panel panel-default" style="position:absolute; bottom:0px;">
  <div class="panel-body">
    Michał Cywka 3IT
  </div>
</div>
</div>
</body>
</html>