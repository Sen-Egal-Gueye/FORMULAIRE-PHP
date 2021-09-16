<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
            background-color: olivedrab;
        }

        h1 {
            font-family: cursive, arial;
            color : white;
        }

        legend {
            color: black;
            text-shadow: 2px 1px 2px white;
        }

        td {
            color: white ;
            text-shadow: 2px 1px 2px black
        }

        h3{
            color: red;
            font-family: cursive, arial;
        }

        h4{
            color: greenyellow;
            font-family: cursive, arial;
        }

        span {
            font-family: cursive, arial;
            font-weight: bold;
            color : white;
        }

        a {
            text-decoration: none;
            color: black;
        }

    </style>

</head>
<body>

    

    <center>

        <h1><u>PAGE FORMULAIRE PERSO</u></h1>

        <form action="" method="post">

        
            <fieldset style="width: 30%">
            <legend>CONTACT</legend>

                <table>

                    <tr>
                        <td align="right"> <label for="nom">NOM :</label> </td>
                        <td> <input type="text" name="nom" id="nom" value="<?= isset($_POST['nom']) ? $_POST['nom'] : ''; ?>"> </td>
                    </tr>

                    <tr>
                        <td align="right"> <label for="prenom">PRENOM :</label> </td>
                        <td> <input type="text" name="prenom" value="<?php if(isset($_POST['prenom'])) echo $_POST['prenom']; ?>" > </td>
                    </tr>

                    <tr>
                        <td align="right"> <label for="age">AGE :</label> </td>
                        <td> <input type="text" name="age" id="age" value="<?php if(isset($_POST['age'])) echo $_POST['age']; ?>"> </td>
                        
                    </tr>

                    <tr>
                        <td align="right"> <label for="email">EMAIL :</label> </td>
                        <td> <input type="text" name="email" id="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"> </td>
                        
                    </tr>

                    <tr>
                        <td align="right"> <label for="adresse" >ADRESSE :</label> </td>
                        <td> <textarea name="adresse" id="adresse" cols="30" rows="5" placeholder="Veuillez tapez votre message" value="<?php if(isset($_POST['adresse']) )  echo $_POST['adresse']; ?>"></textarea> </td>
                    </tr>

                    <tr>
                        <td align="right"> <input type="submit" value="Valider" name="envoi"> </td> 
                        <td align="right"> <button>  <a href="Formulaire version Amelioree.php">Reset</a>  </button>  </td> <br><br>
                    </tr>

                </table>
            
            </fieldset>

        </form>

    
        <?php 


            /* ----Bouton envoie----- */
            if (isset($_POST['envoi'])) {

                /* ----------------------Prenon--------------------- */ 
                if ( isset($_POST['prenom']) && !empty($_POST['prenom']) &&     
                    /* -------------------Nom----------------- */
                        isset($_POST['nom']) && !empty($_POST['nom']) &&         
                        /* -------------------Age----------------- */ 
                        isset($_POST['age']) && !empty($_POST['age']) && is_numeric($_POST['age']) && $_POST['age'] > 0  &&
                        /* -------------------Email------------------- */  
                        isset($_POST['email']) && !empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL ) &&  
                        /* ----------------------Adresse------------------ */
                        isset($_POST['adresse']) && !empty($_POST['adresse']) 
                    ) {

                            
                            $prenom = $_POST['prenom'];
                            
                            $nom = $_POST['nom'];

                            /* TEST DE VERIFICATIONS POUR AGE VALIDE */
                            if ( is_numeric($_POST['age']) &&  $_POST['age'] > 0 ) {

                            $age = $_POST['age'];

                            }      

                            /* TEST DE VERIFICATIONS POUR EMAIL VALIDE */
                            if ( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {

                                $email = $_POST['email'];
                            }
                        
                            $adresse = $_POST['adresse'];        

                            echo  " <h4> FORMULAIRE BIEN ENVOYE !</h4>";

                            echo " <b> <u>Infos</u> <b> : <br><br> Bonjour <span>$prenom $nom</span> <br><br>
                            Vous avez <span>$age</span> ans <br><br> Votre email est : <span>$email</span> <br><br> 
                            vous habitez : <span>$adresse</span> ! ";

                    }

                    else {
                        echo " <h3> FORMULAIRE NON ENVOYE <br> VEUILLEZ BIEN REMPLIR TOUS LES CHAMPS </h3> ";
                    } 
                    
                } 

        
            var_dump($_POST);
            


        ?>

        </center>   


</body>
</html>