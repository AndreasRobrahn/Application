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

        $message->username = $request->username;

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
      $conversation->profile_id = $request->profileid;
      $conversation->customer_id = $request->customerid;
      // $conversation->key = Hash::make($request->key);

      // $decrypted = $newEncrypter->decrypt( $encrypted );

      $conversation->save();


      $message = new Message;
      $message->conversation_id = $conversation->id;
      $message->direction = 0;
      $message->message = Crypt::encryptString($request->message);
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
    public function getUsers()
    {
      $chatters = \DB::table('user_in_conversation')
      ->select('username','motto','avatarimg')
      ->get();

      // dd($chatters);
      return response()->json($chatters);
    }

    public function joinChat(Request $request)
    {
      $filename =null;

      $validated = $request->validate([
        'username' => 'required',
      ]);

      if($file = request()->file('image'))
       {

         $filename = time().'.'.$file->getClientOriginalExtension();
         $file->move(public_path('ConImg'), $filename);
         // $image->type = "Memo";
         // $image->url = $filename;
         // $image->memo_id = $memo->id;
         // $image->save();
       }

      if(\DB::table('user_in_conversation')->where('username',$request->username)->exists())
      {
        return "Fehler User existiert";
      }
      else {
        \DB::table('user_in_conversation')->insert([

          'username' => $request->username,
          'motto' => $request->motto,
          'avatarimg' => $filename,

          ]);

          return 2;
      }

    }
    public function logoutChat(Request $request)
    {
      $deletedUser = \DB::table('user_in_conversation')
      ->where('username', $request->username)
      ->delete();

      if($deletedUser)
      {
        return 0;
      }
      else {
        return 1;
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
