<?php
/**
 * Created by PhpStorm.
 * User: Benjamin
 * Date: 24-03-15
 * Time: 21:31
 */

namespace HAF\WebsiteBundle\Controller;

use HAF\CalendarBundle\Repository\EventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller as Controller;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EventController
 * @package HAF\WebsiteBundle\Controller
 * @Route("/event")
 */
class EventController extends Controller
{

    /**
     * @Route(name="public_event")
     */
    public function indexAction(){
        /** @var EventRepository $repository */
        $repository = $this->_getRepository();
        $queryBuilder = $this->getDoctrine()->getManager()->getRepository('HAFCalendarBundle:Event')->createQueryBuilder('event');
        $queryBuilder->leftJoin('event.descriptions', 'descriptions')
            ->where('descriptions.language = :language')
            ->orderBy('event.dateStart', "DESC");
        $queryBuilder->setParameter('language', $this->_getLocale());
        $query = $queryBuilder->getQuery();
        $entities = $query->getResult();

        return $this->render("@HAFWebsite/Public/event_list.html.twig", [
            'entities' => $entities,
        ]);

    }

    /**
     * @return \HAF\CalendarBundle\Repository\EventRepository
     */
    protected function _getRepository(){
        return $this->get('doctrine')->getManager()->getRepository('HAFCalendarBundle:Event');
    }

    protected function _getLocale()
    {
        return $this->get('request_stack')->getCurrentRequest()->getLocale();
    }

}