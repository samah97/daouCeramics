<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Repositories\CollectionRepository;
use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;


class BaseController extends Controller
{

    protected $showNavbar = true;

    private $collectionRepository;

    public function __construct()
    {
        if($this->showNavbar){
            $this->collectionRepository = App::make('App\Repositories\CollectionRepository');
            /*$collections = Collection::all();*/

            $menuCollections = $this->collectionRepository->getMenuCollections();
            /*foreach($menuCollections as $collection){
                $childs = $collection->childCollections;
                $e = 10;
            }*/
            /*$child = $menuCollections->childCollections;na*/
            View::share('menuCollections',$menuCollections);
        }
        View::share('showNavbar',$this->showNavbar);
    }

    public function sendResponse($data, $message = "",$success = true)
    {
        $response = [
            'success' => $success,
            'data' => $data,
        ];
        if ($message != "") {
            $response += ['message' => $message];
        }

        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 400)
    {
        $response = [
            'success' => 'false',
            'message' => $error,
        ];

        if (!empty($errorMessages)) {
            $response['errors'] = $errorMessages;
        }

        return response()->json($response, $code);
    }

    public function sendErrorException(Exception $exception)
    {
        $exceptionCode = $exception->getCode();
        if ($exceptionCode == 0) {
            $exceptionCode = 500;
        }
        //return $this->sendError($exception->getMessage(),$exception,500);
        return $this->sendError('Something went wrong.', [], 500);
    }
}
