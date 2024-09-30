<?php
namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function sendEmail(Request $request)
    {
        $message = Message::create([
            'user_id' => Auth::id(),
            'sender' => $request->sender,
            'subject' => $request->subject,
            'message_text' => $request->message_text,
            'message_status' => 'sent',
            'no_mk' => $request->no_mk,
            'create_by' => Auth::user()->name,
        ]);

        return redirect()->back()->with('success', 'Email berhasil dikirim!');
    }

    public function inbox()
    {
        $messages = Message::where('user_id', Auth::id())->get();
        return view('massage.inbox', compact('messages'));
    }

    public function readMessage($id)
    {
        $message = Message::find($id);
        return view('massage.read', compact('message'));
    }

    public function replyMessage(Request $request, $id)
    {
        $message = Message::find($id);

        $reply = Message::create([
            'user_id' => Auth::id(),
            'sender' => $request->sender,
            'message_reference' => $message->message_id,
            'subject' => 'Re: ' . $message->subject,
            'message_text' => $request->message_text,
            'message_status' => 'sent',
            'no_mk' => $message->no_mk,
            'create_by' => Auth::user()->name,
        ]);

        return redirect()->back()->with('success', 'Balasan berhasil dikirim!');
    }
}
