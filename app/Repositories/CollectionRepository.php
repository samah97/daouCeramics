<?php

namespace App\Repositories;

use App\Models\Collection;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class CollectionRepository.
 */
class CollectionRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Collection::class;
    }

    public function getMenuCollections(){
        return $this->where('show_menu',1)->get();
    }

/*    public function getChildCollections(){
        return $this->model->childCollections;
    }*/
}
