<?php

// src/Sdz/BlogBundle/Entity/Image.php

namespace Walva\HafBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="images")
 * @ORM\Entity(repositoryClass="Walva\HafBundle\Entity\ImageRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Image {
    
    public function __toString() {
        return "".$this->getId();
    }

        /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt;

    /**
     * @Assert\File(maxSize="500k")
     */
    private $file;
    private $tempFilename;

    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function preUpload() {
// Si jamais il n'y a pas de fichier (champ facultatif)
        if (null === $this->file) {
            return;
        }
// Le nom du fichier est son id, on doit juste stocker Ã©galement son extension
        $this->url = $this->file->guessExtension();
// Et on gÃ©nÃ¨re l'attribut alt de la balise <img>, Ã  la valeur du nom du fichier sur le PC de l'internaute
        $this->alt = $this->file->getClientOriginalName();
    }

    /**
     * @ORM\PostPersist()
     * @ORM\PostUpdate()
     */
    public function upload() {
// Si jamais il n'y a pas de fichier (champ facultatif)
        if (null === $this->file) {
            return;
        }
// Si on avait un ancien fichier, on le supprime
        if (null !== $this->tempFilename) {
            $oldFile = $this->getUploadRootDir() . '/' . $this->id . '.' . $this->tempFilename;
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }
// On dÃ©place le fichier envoyÃ© dans le rÃ©pertoire de notre choix
        $this->file->move(
                $this->getUploadRootDir(), // Le rÃ©pertoire de destination
                $this->id . '.' . $this->url // Le nom du fichier Ã  crÃ©er, ici "id.extension"
        );
    }

    /**
     * @ORM\PreRemove()
     */
    public function preRemoveUpload() {
// On sauvegarde temporairement le nom du fichier car il dÃ©pend de l'id
        $this->tempFilename = $this->getUploadRootDir() . '/' . $this->id . '.' . $this->url;
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload() {
// En PostRemove, on n'a pas accÃ¨s Ã  l'id, on utilise notre nom sauvegardÃ©
        if (file_exists($this->tempFilename)) {
// On supprime le fichier
            unlink($this->tempFilename);
        }
    }

    public function getUploadDir() {
// On retourne le chemin relatif vers l'image pour un navigateur
        return 'uploads/img';
    }

    protected function getUploadRootDir() {
// On retourne le chemin absolu vers l'image pour notre code PHP
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    public function getWebPath() {
        return $this->getUploadDir() . '/' . $this->getId() . '.' . $this->getUrl();
    }

    /**
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param string $url
     * @return Image
     */
    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    /**
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     * @param string $alt
     * @return Image
     */
    public function setAlt($alt) {
        $this->alt = $alt;
        return $this;
    }

    /**
     * @return string
     */
    public function getAlt() {
        return $this->alt;
    }

    public function setFile($file) {
        $this->file = $file;
// On vÃ©rifie si on avait dÃ©jÃ  un fichier pour cette entitÃ©
        if (null !== $this->url) {
// On sauvegarde l'extension du fichier pour le supprimer plus tard
            $this->tempFilename = $this->url;
// On rÃ©initialise les valeurs des attributs url et alt
            $this->url = null;
            $this->alt = null;
        }
    }

    public function getFile() {
        return $this->file;
    }

}

?>