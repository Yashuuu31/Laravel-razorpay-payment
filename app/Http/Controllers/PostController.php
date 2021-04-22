<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Facade\FlareClient\Api;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){

        return view('post.index');
    }
    
    public function payment(Request $request){
        $input = $request->all();
        $api = new Api(env('RAZOR_KEY'), env('RAZOR_SECRET'));
        
        $payment = $api->payment->fetch($request->razorpay_payment_id);

        if(count($input)  && !empty($input['razorpay_payment_id'])) {
            try {

                $payment->capture(array('amount'=>$payment['amount']));

            } catch (\Exception $e) {
                return  $e->getMessage();
                session()->put('error',$e->getMessage());
                return redirect()->back();
            }
        }

        return response()->json(['success' => 'Payment successful']);
    }
}
