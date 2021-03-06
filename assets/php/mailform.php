<?php

	/*
	 *	       __          __                __            
	 *	  ____/ /__ _   __/ /_  ____  ____  / /__ _________
	 *	 / __  / _ \ | / / __ \/ __ \/ __ \/ //_// ___/_  /
	 *	/ /_/ /  __/ |/ / /_/ / /_/ / /_/ / ,< _/ /__  / /_
	 *	\__,_/\___/|___/_.___/\____/\____/_/|_(_)___/ /___/
	 *                                                   
	 *                                                           
	 *      TUTORIÁLY  <>  DISKUZE  <>  KOMUNITA  <>  SOFTWARE
	 * 
	 *	Tento zdrojový kód je součástí tutoriálů na programátorské 
	 *	sociální síti WWW.DEVBOOK.CZ	
	 *	
	 *	Kód můžete upravovat jak chcete, jen zmiňte odkaz 
	 *	na www.devbook.cz :-) 
	 */

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
        <title>Kontaktní formulář</title>
    </head>
    <body>
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
        
    </body>
</html>