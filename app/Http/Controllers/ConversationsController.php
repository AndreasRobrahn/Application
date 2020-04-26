<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Conversation;
use App\Message;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class ConversationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conversations = Conversation::with('lastMessage')->get();
        return response()->json($conversations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $messages = Message::where('conversation_id',$id)
      ->orderBy('created_at','DESC')
      ->get();

      return $messages->toJson();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // return response()->json($request);
        $message = new Message;
        $message->conversation_id = $request->conid;

        if($request->admin)
        {
          $message->direction = 0;
        }
        else {
          $message->direction = 1;
        }

        $message->message = Crypt::encryptString($request->message);
        $message->save();
        // $message->direction = 0;
    }
    public function startConversation(Request $request)
    {
      // $newEncrypter = new \Illuminate\Encryption\Encrypter( $request->key, \Config::get( 'app.cipher' ) );
      // $encrypted = $newEncrypter->encrypt( $plainTextToEncrypt );
      // $decrypted = $newEncrypter->decrypt( $encrypted );

      $conversation = new Conversation;
      $conversation->member1 = $request->user;
      $conversation->key = Hash::make($request->key);

      // $decrypted = $newEncrypter->decrypt( $encrypted );

      $conversation->save();

      $message2 = new Message;
      $message2->conversation_id = $conversation->id;
      $message2->direction = 0;

      // $encrypted = $newEncrypter->encrypt( 'die Konversationsid ist '.$conversation->id. '. Bitte merke sie dir um sie wieder abzufragen' );
      $message2->message = Crypt::encryptString('die Konversationsid ist '.$conversation->id. '. Bitte merke sie dir um sie wieder abzufragen');
      $message2->save();

      $message = new Message;
      $message->conversation_id = $conversation->id;
      $message->direction = 0;
      $message->message = Crypt::encryptString('Hallo '. $request->user);
      $message->save();

      return $conversation->id;

    }
    public function getConversation(Request $request)
    {
      $conversation = Conversation::where('id','=', $request->conid)
      // ->where('key',$request->key)
      ->first();

      if(Hash::check($request->key, $conversation->key))
      {
        return $conversation->id;
      }
      else {
        return 0;
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
