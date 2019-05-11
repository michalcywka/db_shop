<?php 
session_start();
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" />
	<script src="jquery.js"></script>
	<script src="bootstrap.min.js"></script>

  </head>
<body>
<div class="container">
<div class="margintop">
</div>
<form class="form-horizontal col-lg-offset-2" method="POST">
  <fieldset>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-3 control-label">Użytkownik</label>
      <div class="col-lg-3">
        <input name="uzyt" class="form-control" id="inputEmail" placeholder="Nazwa użytkownika" type="text">
      </div>
    </div>
    <div class="form-group">
      <label for="inputPassword" class="col-lg-3 control-label">Hasło</label>
      <div class="col-lg-3">
        <input name="haslo" class="form-control" id="inputPassword" placeholder="Hasło użytkownika" type="password">
    </div>
	</div>
		<div class="form-group">
		</div>
      <div class="col-lg-12 col-lg-offset-2">
        <button type="reset" class="btn btn-default">Wyczyść</button>
        <button type="submit" class="btn btn-primary" name="zaloguj">Zaloguj</button>
      </div>
	  </div>
  </fieldset>
</form>
</div>

<?php
mysql_connect('localhost','root','') or die('Błąd połączenia z bazą danych '.mysql_error);
mysql_select_db('rachunek') or die ('Błąd wyboru bazy danych '.mysql_error);
if(isSet($_POST['zaloguj'])){
$login1=$_POST['uzyt'];
$pass1=$_POST['haslo'];
$zapytanie=mysql_query("SELECT COUNT(*) FROM uzytkownicy WHERE login='$login1' AND pass='$pass1'");
$rezultat=mysql_fetch_array($zapytanie);
if($rezultat[0]==0){
echo "
<div class='col-lg-offset-5 col-lg-3 alert alert-dismissible alert-danger'>
  <button type='button' class='close' data-dismiss='alert'>×</button>
  <strong>Błąd!</strong> Zła nazwa użytkownika lub hasło.
</div>
";
}
else
{
$_SESSION['zalogowany']=1;
header("Location: strona/index.php");
}
}
?>
</body>
</html>