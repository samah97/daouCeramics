<?php

namespace App\Http\Controllers;

use App\CommonValues;
use App\Http\Requests\NewsletterRequest;
use App\Models\Newsletter;
use App\Repositories\BannerRepository;
use App\Repositories\CollectionRepository;
use App\Repositories\NewsletterRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends BaseController
{
    private $collectionRepository;
    private $newsletterRepository;

    public function __construct(CollectionRepository $collectionRepository,NewsletterRepository $newsletterRepository)
    {
        $this->collectionRepository = $collectionRepository;
        $this->newsletterRepository = $newsletterRepository;
        parent::__construct();
    }

    public function index(){
        $bannerImages = Storage::disk('public')->files('banners');
        $collections = $this->collectionRepository->all();
        return view('home',compact('bannerImages','collections'));
    }

    public function newsletter(NewsletterRequest $request){
/*        $validator = Validator::make($request->all(),[
            'email'=>'email:rfc,dns|unique:newsletters'
        ]);
        if($validator->fails()){
            Alert::error('', $validator->errors());
            return redirect(route('home'));
        }*/

        $newsLetterData = [
            'email'=>$request->get('email'),
            'status'=> CommonValues::STATUS_ACTIVE,
            'created_at' => Carbon::now()
        ];
        $this->newsletterRepository->create($newsLetterData);

        Alert::success('', __('titles.newsletter_success'));
        return redirect(route('home'));
    }
}
