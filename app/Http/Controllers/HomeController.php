<?php

namespace App\Http\Controllers;

use App\CommonValues;
use App\Helpers\CustomLog;
use App\Http\Requests\NewsletterRequest;
use App\Mail\MailSender;
use App\Models\Newsletter;
use App\Repositories\BannerRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\CollectionRepository;
use App\Repositories\NewsletterRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends BaseController
{
    private $collectionRepository;
    private $newsletterRepository;
    private $categoryRepository;

    public function __construct(CollectionRepository $collectionRepository,NewsletterRepository $newsletterRepository,
        CategoryRepository $categoryRepository)
    {
        $this->collectionRepository = $collectionRepository;
        $this->newsletterRepository = $newsletterRepository;
        $this->categoryRepository = $categoryRepository;
        parent::__construct();
    }

    public function index(Request $request){
        Mail::to('samah_daou@hotmail.com')->send(new MailSender());
        if( count(Mail::failures()) > 0 ){
            CustomLog::getInstance()->info("error mail");
        }else{
            CustomLog::getInstance()->info(" mail sent");
        }
        $bannerImages = Storage::disk('public')->files('banners');
        $collections = $this->collectionRepository->all();
        $category = $this->categoryRepository->where('show_home_page',1)->get()->first();

        return view('home',compact('bannerImages','collections','category'));
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
