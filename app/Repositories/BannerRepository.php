<?php

namespace App\Repositories;

use App\Models\Banner;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class BannerRepository.
 */
class BannerRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Banner::class;
    }
}
