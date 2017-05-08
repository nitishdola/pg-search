<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB, Validator, Redirect, Auth, Crypt;
use App\Feedback;
class FeedbacksController extends Controller
{
    public function addFeedback() {
    	return view('pages.add_feedback');
    }

    public function postFeedback(Request $request) {
    	$validator = Validator::make($data = $request->all(), Feedback::$rules);
        if ($validator->fails()) return  Redirect::back()->withErrors($validator)->withInput();

        $feedback_message = $class = '';
        if(Feedback::create( $data )) {
        	$feedback_message .= 'Feedback submitted successfully !';
        	$class   .= 'alert-success';
        }else{
        	$feedback_message .= 'Feedback submission failed !';
        	$class   .= 'alert-danger';
        }
        return Redirect::route('user.after_submit')->with(['feedback_message'=> $feedback_message, 'alert-class' => $class]);
    }

    public function afterSubmit() {
    	return view('pages.after_submit');
    }

    public function view() {
        $results = Feedback::orderBy('created_at', 'DESC')->paginate(50);
        return view('admin.feedbacks.view', compact('results'));
    }
}
