<?php
/**
 * Created by PhpStorm.
 * User: Benjamin Ellis
 * Date: 07-12-14
 * Time: 17:43
 */

namespace HAF\WebsiteBundle\Controller;


use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\Tools\Pagination\Paginator;
use HAF\WebsiteBundle\Helper\PaginationHelper;
use HAF\WebsiteBundle\WebsiteNotification;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Walva\HafBundle\Entity\Article;
use Symfony\Component\HttpFoundation\Session\Session;
use Walva\HafBundle\Entity\ArticleRepository;
use Walva\HafBundle\Entity\Tag;
use Walva\HafBundle\Entity\TagRepository;

/**
 * Class TagController
 * @package HAF\WebsiteBundle
 * @Route("/tag", name="HAF_website_public_tag")
 */
class TagController extends Controller
{


    /**
     * @Route("/{name}", name="HAF_website_public_tag_show_article_by_tag")
     */
    public function showArticlesWithTags($name, $page = 1)
    {
        try {
            $locale = $this->get('request_stack')->getCurrentRequest()->getLocale();
            $doctrine = $this->getDoctrine();
            /** @var TagRepository $repository */
            $tagRepository = $doctrine->getManager()->getRepository('WalvaHafBundle:Tag');
            /** @var ArticleRepository $repository */
            $repository = $doctrine->getManager()->getRepository('WalvaHafBundle:Article');
            $tag = $tagRepository->findByName($name, $locale);

            $maxPerPage = 10;

            $entities = [];
            $query = null;
            switch ($locale) {
                case Tag::LANGUAGE_FR:
                    $query = $repository->getArticleByTag($tag->getId(), $locale, true);
                    break;
                case Tag::LANGUAGE_NL:
                    $query = $repository->getArticleByTag($tag->getId(), $locale, true);
                    break;
            }
            $entities = new Paginator($query);

            return $this->render("@HAFWebsite/Public/article_list.html.twig", [
                'entities' => $entities,
                'pagination' => PaginationHelper::createPaginatorViewVars(
                    $entities,
                    $page,
                    'HAF_website_public_tag_show_article_by_tag',
                    $maxPerPage
                ),
            ]);
        } catch (EntityNotFoundException $e) {
            $this->addTagNotFoundNotification($name);
            return $this->redirect($this->generateUrl('walva_haf_homepage'));
        } catch (\Exception $e) {
        }

    }

    protected function addTagNotFoundNotification($tagName)
    {
        $flashbag = $this->get("session")->getFlashBag();
        $message = $this->get('translator')->trans('tag.not_found');
        $message = sprintf($message, $tagName);
        $flashbag->add(WebsiteNotification::ERROR, $message);
    }

}