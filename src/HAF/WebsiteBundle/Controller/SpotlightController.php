<?php
/**
 * Created by PhpStorm.
 * User: Benjamin Ellis
 * Date: 18-01-15
 * Time: 18:15
 */

namespace HAF\WebsiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Walva\HafBundle\Entity\SpotlightRepository;


/**
 * Class SpotlightController
 * @package HAF\WebsiteBundle\Controller
 */
class SpotlightController extends Controller{

    public function getSpotlightItemsAction(Request $request){
//        return new Response("aa");
        $locale = $request->getLocale();
        $repo = $this->getDoctrine()->getManager()->getRepository("WalvaHafBundle:Spotlight");
        /** @var $repo SpotlightRepository */
        $entities = $repo->getSpotlightedEntities($locale);
//        $entities = [];
        return $this->render('@HAFWebsite/Public/spotlight.html.twig', array(
            'entities' => $entities
        ));
    }
}

