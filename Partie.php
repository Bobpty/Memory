<!DOCTYPE html>

<html>
    <head>
        <title>TP Doctrine - Memory</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="src/CSS/style.css">
        <link rel="icon" type="image/png" href="src/Images/favicon.png" />
        <script type="text/javascript" src="src/JS/fonctions.js"></script>
    </head>
    <body onload="chargementPartie();">
        
        <?php
            
            require_once(dirname(__FILE__).'/global.php');
            use Memory\Entity\Image;
            use Memory\Entity\Partie;
            use Memory\Entity\Joueur;
            $daoimage = $entityManager->getRepository(Memory\Entity\Image::class);
            $daopartie = $entityManager->getRepository(Memory\Entity\Partie::class);
            $daojoueur = $entityManager->getRepository(Memory\Entity\Joueur::class);
            
            $tableauImages = $daoimage->findAll();
            $tableauParties = $daopartie->findAll();
            $tableauJoueur = $daojoueur->findAll();

            $sql = $entityManager->createQueryBuilder('p');
            $sql->select('p.idPartie', 'p.nbCoups', 'p.temps', 'p.idJoueur')
                ->from(Memory\Entity\Partie::class, 'p')
                ->orderBy('p.nbCoups', 'ASC')
                ->addOrderBy('p.temps',  'ASC')
                ->setMaxResults(10);
            $query = $sql->getQuery();
            $tableauResult = $query->getResult();

            /**
             *  génère 8 cartes aléatoires 
             *  double le tableau dans une variable $tableauMemory
             *  mélange le tableau doublé
             */
            $nbrCartes = 8;
            for ($i = 0; $i <= $nbrCartes; $i++)
            {
                $tableauCartes[$i] = rand(1,14);
                for ($j = 0; $j < $i; $j++)
                {             
                    while ($tableauCartes[$j] == $tableauCartes[$i])
                    {               
                        $tableauCartes[$i] = rand(1,14);               
                        $j = 0;             
                    }           
                }    
            }
            $tableauMemory = array_merge($tableauCartes, $tableauCartes);
            shuffle($tableauMemory);
            
        ?>
        
        <div class="fond_titre">
            <a href="index.php"><img src="src/Images/Titre.png" alt="logo-slogo" class="titre"></a>
        </div>
        
        <form method="POST" action="Valide.php" id="formPartie" name="formPartie">
            <table>
                <tr>
                    <td style="width: 45%; height: 70%;" rowspan="2">
                        <input type="hidden" value="<?php echo $_GET['id']; ?>" name="idJoueur">
                        
                        <?php
                            for($i = 0; $i < count($tableauMemory); $i++)
                            {
                                $carte = $daoimage->findByIdImage($tableauMemory[$i]);
                                $chemin = $carte[0]->getChemin();
                                echo "<img id='carte".$i . "' name='carte' src='src/Images/Dos.png' alt='image' style='width: 100px; height: 180px; margin: 6px;' onclick='selectCarte(" . $carte[0]->getIdImage() . ", \" $chemin \", " . $i . "); compteCoups();'>";
                            }
                        ?>
                        
                    </td>
                    <td class="menu_jeu">
                        <p style="float: left;">
                            Nombre de coups : <input type="number" id="nombreCoups" name="nombreCoups" min="0" value="0" readonly><br>
                            Temps : <input type="text" id="temps" name="temps" style="width: 40px;" readonly>
                            <input type="hidden" name="chrono">
                        </p>
                        <p style="float: right;"> <input type="submit" value="Recommencer" name="restart" class="recommecencer" /> </p>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table border="1" class="tableau_score">
                            <thead>
                                <tr>
                                    <th> Pseudo </th>
                                    <th> Score </th>
                                    <th> Temps </th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                    $compteur = 0; // compteur pour la lecture des données de la requête personnalisée
                                    $minScore = 100; // le score minimum (initialisé à un gros nombre)
                                    $tableauGagnant = array(); // tableau contenant les pseudos des scores minimums
                                    
                                    foreach ($tableauParties as $partie)
                                    {
                                        $idJoueur = $tableauResult[$compteur]['idJoueur']; // récupère l'id du joueur
                                        $joueur = $daojoueur->findByIdJoueur($idJoueur); // récupère le joueur de la partie
                                        $pseudo = $joueur[0]->getPseudo(); // le pseudo du joueur
                                        $score = $tableauResult[$compteur]['nbCoups']; // score de la partie
                                        $temps = $tableauResult[$compteur]['temps'];
                                        $minutes = floor($temps / 60);
                                        $secondes = $temps % 60;

                                        if ($score == $minScore) // le score du joueur = le score minimum
                                        {
                                            array_push($tableauGagnant, $pseudo); // ajout du pseudo dans le tableau
                                        }
                                        elseif ($score < $minScore)
                                        {
                                            $minScore = $score;
                                            $tableauGagnant = array(); // réinitialisation du tableau des meilleurs
                                            array_push($tableauGagnant, $pseudo); // ajout du pseudo dans le tableau
                                        }
                                        
                                        echo "<tr>";
                                            echo "<td>" . $pseudo . "</td>";
                                            echo "<td>" . $score. "</td>";
                                            echo "<td>" . $minutes . " : " . $secondes . "</td>";
                                        echo "</tr>";
                                        
                                        $compteur++;
                                    }
                                ?>

                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>
