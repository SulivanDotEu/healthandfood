<?php
/**
 * Created by PhpStorm.
 * User: Benjamin Ellis
 * Date: 07-12-14
 * Time: 19:42
 */

namespace HAF\WebsiteBundle\Helper;

use Doctrine\ORM\Tools\Pagination\Paginator;

class PaginationHelper
{
    /**
     * @param Paginator $paginator
     * @param int       $currentPage
     * @param string    $routeName
     * @param int       $limit
     * @param array     $routeParams
     *
     * @return array
     */
    public static function createPaginatorViewVars(Paginator $paginator, $currentPage, $routeName, $limit = 20, array $routeParams = [])
    {
        $pagination = array(
            'page'          => $currentPage,
            'route'         => $routeName,
            'pages_count'   => ceil($paginator->count() / $limit),
            'route_params'  => $routeParams
        );

        return $pagination;
    }
}
