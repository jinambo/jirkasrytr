<?php


    mb_internal_encoding("UTF-8");

    $hlaska = '';
    if ($_POST) // V poli _POST něco je, odeslal se formulář
    {
        if (isset($_POST['jmeno']) && $_POST['jmeno'] &&
			isset($_POST['email']) && $_POST['email'] &&
			isset($_POST['zprava']) && $_POST['zprava'] &&
			isset($_POST['rok']) && $_POST['rok'] == date('Y'))
        {
            $hlavicka = 'From:' . $_POST['email'];
            $hlavicka .= "\nMIME-Version: 1.0\n";
            $hlavicka .= "Content-Type: text/html; charset=\"utf-8\"\n";
            $adresa = 'vas@email.cz';
            $predmet = 'Nová zpráva z mailformu';
            $uspech = mb_send_mail($adresa, $predmet, $_POST['zprava'], $hlavicka);
            if ($uspech)
            {
                $hlaska = 'Email byl úspěšně odeslán, brzy vám odpovíme.';
            }
            else
                $hlaska = 'Email se nepodařilo odeslat. Zkontrolujte adresu.';
        }
        else
            $hlaska = 'Formulář není správně vyplněný!';
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="assets/img/fav.png">

        <title>Jiří Šrytr</title>

        <link href="assets/css/bootstrap.css" rel="stylesheet">


        <link href="assets/css/main.css" rel="stylesheet">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="assets/css/fontik-awesome.min.css">
        <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/modernizr.custom.js"></script>
      <script src="assets/php/mailform.php"></script>


        <link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=EB+Garamond' rel='stylesheet' type='text/css'>
    </head>


    <body>
      <body data-spy="scroll" data-offset="0" data-target="#theMenu">

    	<!-- Menu -->
    <table>
    	<div class="menu">
    <a class="smoothScroll" href="#home"><i class="fa fa-home"><p>DOMŮ</p></i></a>
    <a class="smoothScroll" href="#about"><i class="fa fa-user" aria-hidden="true"><p>O MNĚ</p></i></a>
    <a class="smoothScroll" href="#kontakt"><i class="fa fa-envelope" aria-hidden="true"><p>KONTAKT</p></i></a>

    </div>
    </table>

    <section id="home" name="home"></section>
  	<div id="hlava">
  		<div class="container">
  			<div class="logo">
  			<img src="assets/img/logo.png">
  			</div>
  			<br>
  			<div class="row">

  				<br>
      <div class="media">
          <table>
              <a target="_blank" href="https://www.facebook.com/jinambo.srytr"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
          </table>

          <table>
            <a target="_blank"href="https://www.instagram.com/jirsry/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          </table>

      </div>


  				<br>
  				<br>
  				<div class="col-lg-6 col-lg-offset-3">
  				</div>
  			</div>
  		</div><!-- /container -->
  	</div><!-- /hlava -->

        <p>Můžete mě kontaktovat pomocí formuláře níže.</p>

        <?php
            if ($hlaska)
                echo('<p>' . $hlaska . '</p>');
        ?>

        <form method="POST">
            <table>
            	<tr>
            		<td>Vaše jméno</td>
            		<td><input name="jmeno" type="text" /></td>
            	</tr>
            	<tr>
            		<td>Váš email</td>
            		<td><input name="email" type="email" /></td>
            	</tr>
				<tr>
            		<td>Aktuální rok</td>
            		<td><input name="rok" type="number" /></td>
            	</tr>
        	</table>
        	<textarea name="zprava"></textarea><br />

            <input type="submit" value="Odeslat" />
        </form>

        <div class="zapati">
        <table align="center">
        <tr><td>
        <p>©2017 by Šrytr</p>
        </tr></td>
        </table>
        </div>




        	<script src="assets/js/classie.js"></script>
            <script src="assets/js/bootstrap.min.js"></script>
            <script src="assets/js/smoothscroll.js"></script>
        	<script src="assets/js/main.js"></script>
        </body>
        </html>
