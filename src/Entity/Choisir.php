<?php

    namespace Memory\Entity;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="Choisir")
     */
    class Choisir 
    {
        /**
         * @ORM\ID
         * @ORM\Column(type="integer")
         */
        private $numImage;

        /**
         * @ORM\ID
         * @ORM\Column(type="integer")
         */
        private $numPartie;

        public function getNumImage()
        {
            return $this->numImage;
        }
        public function setNumImage($numImage)
        {
            return $this->numImage = $numImage;
        }
        
        public function getNumPartie()
        {
            return $this->numPartie;
        }
        public function setNumPartie($numPartie)
        {
            return $this->numPartie = $numPartie;
        }
    }