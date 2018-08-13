<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Repositories\Eloquent\Bill\BillRepositoryInterface;
use App\Repositories\Eloquent\Demand\DemandRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class BillController extends Controller
{
    protected $billRepo;
    protected $demandRepo;
    public function __construct(BillRepositoryInterface $billRepository, DemandRepositoryInterface $demandRepository)
    {
        $this->demandRepo = $demandRepository;
        $this->billRepo = $billRepository;
    }

    public function postAdd(Request $request, $demandId)
    {
//        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
//        $beautymail->send('admin.email.index', [], function($message) use ($request)
//        {
////            $email = $request->get('email');
//            $message
//                ->from('donotreply@sharingplace.com')
//                ->to('doanpham94nd@gmail.com', 'Howdy buddy!')
//                ->subject('Test Mail!');
//        });
//        Mail::send('admin.email.index', function($message){
//            $message->to('yaphetsss.94@gmail.com', 'Visitor')->subject('Visitor Feedback!');
//        });
//        Session::flash('flash_message', 'Send message successfully!');
        Mail::to('yaphetsss.94@gmail.com')->send(new OrderShipped());
        return Redirect::back();
    }
}
