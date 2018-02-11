<?php

    namespace Memory\Entity;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="Partie")
     */
    class Partie 
    {
        /**
         * @ORM\ID
         * @ORM\GeneratedValue
         * @ORM\Column(type="integer")
         */
        private $idPartie;

        /**
         * @ORM\Column(name="nbCoups",type="integer")
         */
        private $nbCoups;
        
        /**
         * @ORM\Column(name="temps",type="integer")
         */
        private $temps;
        
        /**
         * @ORM\Column(name="idJoueur",type="integer")
         */
        private $idJoueur;

        public function getIdPartie()
        {
            return $this->idPartie;
        }

        public function getNbCoups()
        {
            return $this->nbCoups;
        }
        public function setNbCoups($nbCoups)
        {
            return $this->nbCoups = $nbCoups;
        }
        
        public function getTemps()
        {
            return $this->temps;
        }
        public function setTemps($temps)
        {
            return $this->temps = $temps;
        }
        
        public function getIdJoueur()
        {
            return $this->idJoueur;
        }
        public function setIdJoueur($idJoueur)
        {
            return $this->idJoueur = $idJoueur;
        }
    }
