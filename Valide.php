<?php

    require_once(dirname(__FILE__).'/global.php');
    use Memory\Entity\Partie;
    $daopartie = $entityManager->getRepository(Memory\Entity\Partie::class);
    
    $nombreCoups = $_POST['nombreCoups'];
    $idJoueur = $_POST['idJoueur'];
    $temps = $_POST['chrono'];

    /* SI validation du bouton Recommencer */
    if (isset($_POST['restart']))
    {
        header('Location: Partie.php?id=' . $idJoueur); // redirection pour actualiser la page
    }
    else /* SINON traitement de la partie finie */
    {
        $partie = new \Memory\Entity\Partie();
        $partie->setNbCoups($nombreCoups);
        $partie->setTemps($temps);
        $partie->setIdJoueur($idJoueur);
        $entityManager->persist($partie);
        $entityManager->flush();
        
        header('Location: Partie.php?id=' . $idJoueur);
    }
    
    
?>