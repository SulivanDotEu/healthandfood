<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Walva\VideoBundle\Util;

/**
 * Description of VideoFinder
 *
 * @author Benjamin Ellis
 */
class VideoFinder {

//put your code here

    public function getVideoInDir($dir) {
        $array = array();
        if ($handle = opendir($dir)) {

            /* This is the correct way to loop over the directory. */
            while (false !== ($entry = readdir($handle))) {
                if (is_dir($dir.$entry)){
                    continue;
                }
                $array[$entry]= $entry;
            }
        }
        return $array;
    }

    public function getAllVideosHosted() {
//die(realpath('.').'/video');
        return $this->getVideoInDir(realpath('.') . '/video');
    }

}
