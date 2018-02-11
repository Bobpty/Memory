<?php

    require_once(dirname(__FILE__).'/global.php');
    use Memory\Entity\Joueur;
    $daojoueur = $entityManager->getRepository(Memory\Entity\Joueur::class);

    $tableauJoueur = $daojoueur->findAll();
                
    /* si enregistrement d'un nouveau joueur */
    if (isset($_POST['enregistrer']) && (!empty($_POST['pseudo'])))
    {
        $verif = FALSE;
        $pseudo = $_POST['pseudo'];

        /* cherche si le pseudo existe */
        foreach ($tableauJoueur as $joueur)
        {
            if ($pseudo == $joueur->getPseudo())
            {
                $verif = TRUE;
                header('Location: index.php?erreur');
            }
        }

        /* si le pseudo n'a pas été trouvé */
        if (!$verif)
        {
            $nouveauJoueur = new Joueur();
            $nouveauJoueur->setPseudo($pseudo);
            $entityManager->persist($nouveauJoueur);
            $entityManager->flush();
            header('Location: index.php');
        }
    }
    
    /* si la partie commence */
    elseif (isset ($_POST['debut']))
    {
        $idChallengeur = $_POST['selectJoueur'];
        header("Location: Partie.php?id=" . $idChallengeur);
    }
    else
    {
        echo "Une erreur est survenue. Pour retourner à l'écran d'accueil, cliquer <a href='index.php'>là</a>";
    }