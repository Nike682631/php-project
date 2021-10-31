<?php
namespace App\Http\Controllers;
use App\User;
use App\Notifications\MessageNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Nahid\Talk\Facades\Talk;
use Notification;

class MessageController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('talk');

		View::composer('partials.peoplelist', function($view) {
			Talk::setAuthUserId(Auth::user()->id);

			$threads = Talk::threads();
			$view->with(compact('threads'));
		});
	}

	public function newChat($recipient_id) {
		$conversation = Talk::sendMessageByUserId($recipient_id, 'Hello, introduce yourself');

		return redirect()->route('message.read', $recipient_id);
	}

	public function chatHistory($id)
	{
		$conversations = Talk::getMessagesAllByUserId($id, 0, 50);
		$user = '';
		$messages = [];
		if(!$conversations) {
			$user = User::find($id);
		} else {
			$user = $conversations->withUser;
			$messages = $conversations->messages;
		}
		if (count($messages) > 0) {
			$messages = $messages->sortBy('id');
		}
		$recipient = User::find($id);

		foreach ($messages as $message) {
			if ($message->is_seen <= 0 && $message->sender->id != Auth::user()->id) Talk::makeSeen($message->id);			
		}

		return view('messages.conversations', compact('messages', 'user', 'recipient'));
	}
	public function ajaxSendMessage(Request $request)
	{
		if ($request->ajax()) {
			$rules = [
				'message-data'=>'required',
				'_id'=>'required'
			];
			$this->validate($request, $rules);
			$body = $request->input('message-data');
			$userId = $request->input('_id');
			if ($message = Talk::sendMessageByUserId($userId, $body)) {
				$html = view('ajax.newMessageHtml', compact('message'))->render();
				return response()->json(['status'=>'success', 'html'=>$html], 200);
			}
			
		}
	}
	public function ajaxDeleteMessage(Request $request, $id)
	{
		if ($request->ajax()) {
			if(Talk::deleteMessage($id)) {
				return response()->json(['status'=>'success'], 200);
			}
			return response()->json(['status'=>'errors', 'msg'=>'something went wrong'], 401);
		}
	}
	public function tests()
	{
		dd(Talk::channel());
	}
}