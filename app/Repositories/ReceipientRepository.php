<?php

namespace App\Repositories;

use App\Helpers\CustomLog;
use App\Models\Receipient;
use Carbon\Carbon;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ReceipientRepository.
 */
class ReceipientRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Receipient::class;
    }

    public function create(array $options = [])
    {
        try{
            $options['created_at'] = Carbon::now()->toDateTimeString();
            $options['created_by'] = auth(app('VoyagerGuard'))->id();
            return parent::create($options);
        }catch (\Exception $exception){
            CustomLog::getInstance("There was an error creating receipt:".$exception->getMessage());
        }
    }
}
