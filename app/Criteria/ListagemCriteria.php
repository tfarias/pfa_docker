<?php
namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Class ListagemCriteria.
 *
 * @package namespace App\Criteria;
 */
class ListagemCriteria implements CriteriaInterface
{
    /**
     * @var Request
     */
    private $parans;

    /**
     * ListagemCriteria constructor.
     */
    public function __construct($parans)
    {
        $this->parans = $parans;
    }

    /**
     * Apply criteria in query repository
     *
     * @param string              $model
     * @param RepositoryInterface $repository
     *
     * @return mixed
     */
    public function apply($model, RepositoryInterface $repository)
    {
       $filtro = $model->orderBy('id','DESC');

        
    if(!empty($this->parans["id"])){
    $filtro->where("id",'like','%'.$this->parans["id"].'%');
    }
    if(!empty($this->parans["nome"])){
    $filtro->where("nome",'like','%'.$this->parans["nome"].'%');
    }
    if(!empty($this->parans["descricao"])){
    $filtro->where("descricao",'like','%'.$this->parans["descricao"].'%');
    }

        return $filtro;
    }
}
