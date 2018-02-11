<?php

    namespace Memory\Entity;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Entity
     * @ORM\Table(name="Image")
     */
    class Image 
    {
        /**
         * @ORM\ID
         * @ORM\GeneratedValue
         * @ORM\Column(type="integer")
         */
        private $idImage;

        /**
         * @ORM\Column(name="chemin",type="string")
         */
        private $chemin;

        public function getIdImage()
        {
            return $this->idImage;
        }

        public function getChemin()
        {
            return $this->chemin;
        }
        public function setChemin($chemin)
        {
            return $this->chemin = $chemin;
        }
    }
