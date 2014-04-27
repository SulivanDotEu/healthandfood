<?php

namespace Walva\VideoBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Source
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Walva\VideoBundle\Entity\SourceRepository")
 */
class Source {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="text", nullable=true)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="audioLanguage", type="string", length=255, nullable=true)
     */
    private $audioLanguage;

    /**
     * @var string
     *
     * @ORM\Column(name="subtitlesLanguage", type="string", length=255, nullable=true)
     */
    private $subtitlesLanguage;

//    /**
//     * @Assert\File(maxSize="800m")
//     */
//    private $file;
    private $tempFilename;

    /**
     * @var AbstractVideo
     * @ORM\ManyToOne(
     *      targetEntity="Walva\VideoBundle\Entity\InternalVideo",
     *      inversedBy="sources")
     */
    private $video;
//
//    /**
//     * @ORM\PrePersist()
//     * @ORM\PreUpdate()
//     */
//    public function preUpload() {
//// Si jamais il n'y a pas de fichier (champ facultatif)
//        if (null === $this->file) {
//            return;
//        }
//// Le nom du fichier est son id, on doit juste stocker Ã©galement son extension
//        $this->path = $this->file->guessExtension();
//// Et on génère l'attribut alt de la balise <img>, Ã  la valeur du nom du fichier sur le PC de l'internaute
//        $this->alt = $this->file->getClientOriginalName();
//    }
//
//    /**
//     * @ORM\PostPersist()
//     * @ORM\PostUpdate()
//     */
//    public function upload() {
//// Si jamais il n'y a pas de fichier (champ facultatif)
//        if (null === $this->file) {
//            return;
//        }
//// Si on avait un ancien fichier, on le supprime
//        if (null !== $this->tempFilename) {
//            $oldFile = $this->getUploadRootDir() . '/' . $this->id . '.' . $this->tempFilename;
//            if (file_exists($oldFile)) {
//                unlink($oldFile);
//            }
//        }
//// On dÃ©place le fichier envoyÃ© dans le rÃ©pertoire de notre choix
//        $this->file->move(
//                $this->getUploadRootDir(), // Le rÃ©pertoire de destination
//                $this->id . '.' . $this->path // Le nom du fichier Ã  crÃ©er, ici "id.extension"
//        );
////    }
//
//    /**
//     * @ORM\PreRemove()
//     */
//    public function preRemoveUpload() {
//// On sauvegarde temporairement le nom du fichier car il dÃ©pend de l'id
//        $this->tempFilename = $this->getUploadRootDir() . '/' . $this->id . '.' . $this->path;
//    }
//
//    /**
//     * @ORM\PostRemove()
//     */
//    public function removeUpload() {
//// En PostRemove, on n'a pas accÃ¨s Ã  l'id, on utilise notre nom sauvegardÃ©
//        if (file_exists($this->tempFilename)) {
//// On supprime le fichier
//            unlink($this->tempFilename);
//        }
//    }

    public function getUploadDir() {
// On retourne le chemin relatif vers l'image pour un navigateur
        return 'uploads/video';
    }

    protected function getUploadRootDir() {
// On retourne le chemin absolu vers l'image pour notre code PHP
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    public function getWebPath() {
        return $this->getUploadDir() . '/' . $this->getId() . '.' . $this->getUrl();
    }
    
    public function getFile() {
        return $this->file;
    }

    public function getTempFilename() {
        return $this->tempFilename;
    }

    public function setFile($file) {
        $this->file = $file;
    }

    public function setTempFilename($tempFilename) {
        $this->tempFilename = $tempFilename;
    }

    
    public function toHtml() {
        //return '<source src="'.$this->getPath().'" type="'.$this->getType().'" >';
        return sprintf('<source src="%s" type="%s" >', $this->getPath(), $this->getType());
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Source
     */
    public function setType($type) {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Source
     */
    public function setPath($path) {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath() {
        return $this->path;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Source
     */
    public function setLanguage($language) {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage() {
        return $this->language;
    }

    /**
     * Set audioLanguage
     *
     * @param string $audioLanguage
     * @return Source
     */
    public function setAudioLanguage($audioLanguage) {
        $this->audioLanguage = $audioLanguage;

        return $this;
    }

    /**
     * Get audioLanguage
     *
     * @return string 
     */
    public function getAudioLanguage() {
        return $this->audioLanguage;
    }

    /**
     * Set subtitlesLanguage
     *
     * @param string $subtitlesLanguage
     * @return Source
     */
    public function setSubtitlesLanguage($subtitlesLanguage) {
        $this->subtitlesLanguage = $subtitlesLanguage;

        return $this;
    }

    /**
     * Get subtitlesLanguage
     *
     * @return string 
     */
    public function getSubtitlesLanguage() {
        return $this->subtitlesLanguage;
    }

    /**
     * Set video
     *
     * @param \Walva\VideoBundle\Entity\InternalVideo $video
     * @return Source
     */
    public function setVideo(\Walva\VideoBundle\Entity\InternalVideo $video = null) {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return \Walva\VideoBundle\Entity\InternalVideo 
     */
    public function getVideo() {
        return $this->video;
    }

}
