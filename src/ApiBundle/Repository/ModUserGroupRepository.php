<?php

namespace ApiBundle\Repository;

/**
 * ModUserGroupRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ModUserGroupRepository extends \Doctrine\ORM\EntityRepository
{
    public function getGroup(){
        $dql = "SELECT u.id, u.name FROM ApiBundle:ModUserGroup u";
        return $this -> getEntityManager()
            -> createQuery($dql)
            -> getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
    }
    public function getUserGroupList($param){
        $dql = "SELECT ug.id, ug.name FROM ApiBundle:ModUserGroup ug ";

        if($param['query'] !=null){
            $dql = $dql." WHERE ug.".$param['qtype']." ='".$param['query']."'";
        }
        $dql = $dql. "ORDER BY  ug.".$param['sortname']." ".$param['sortorder'];
        return $this -> getEntityManager()
            -> createQuery($dql)
            -> setMaxResults($param['rp'])
            -> setFirstResult($param['offset'])
            -> getResult();

    }
}
