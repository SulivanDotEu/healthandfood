<?php

namespace Walva\HafBundle\Entity;

use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;

/**
 * TagRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TagRepository extends EntityRepository
{

    public function findAllOrderByLanguage($language = Tag::LANGUAGE_FR)
    {
        $em = $this->getEntityManager();
        $builder = $em->createQueryBuilder();
        $builder
            ->select('tag')
            ->from('WalvaHafBundle:Tag', 'tag');


        switch ($language) {
            case Tag::LANGUAGE_FR:
                $builder->orderBy('tag.contenuFr', 'ASC');
                break;
            case Tag::LANGUAGE_NL:
                $builder->orderBy('tag.contenuNl', 'ASC');
                break;
        }

        return $builder->getQuery()->execute();
    }

    /**
     * @param $name
     * @param $locale
     * @return Tag
     */
    public function findByName($name, $locale)
    {
        $queryBuilder = $this->getEntityManager()->createQueryBuilder();
        $queryBuilder
            ->select('tag')
            ->from('WalvaHafBundle:Tag', 'tag');
        switch ($locale) {
            case Tag::LANGUAGE_FR:
                $queryBuilder->where('tag.contenuFr = :name');
                break;
            case Tag::LANGUAGE_NL:
                $queryBuilder->where('tag.contenuNl = :name');
                break;
        }
        $queryBuilder->setParameter('name', $name);
        $query = $queryBuilder->getQuery();
        $result = $query->execute();

        if (count($result) == 0) {
            throw new EntityNotFoundException();
        }

        return $result[0];
    }


}