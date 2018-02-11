<?php

    namespace Memory\Entity;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="Joueur")
     */
    class Joueur
    {
        /**
         * @ORM\ID
         * @ORM\GeneratedValue
         * @ORM\Column(type="integer")
         */
        private $idJoueur;

        /**
         * @ORM\Column(name="pseudo",type="string")
         */
        private $pseudo;

        public function getIdJoueur()
        {
            return $this->idJoueur;
        }

        public function getPseudo()
        {
            return $this->pseudo;
        }
        public function setPseudo($pseudo)
        {
            return $this->pseudo = $pseudo;
        }
    }
