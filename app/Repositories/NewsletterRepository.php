<?php

namespace App\Repositories;

use App\Models\Newsletter;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class NewsletterRepository.
 */
class NewsletterRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Newsletter::class;
    }



}
