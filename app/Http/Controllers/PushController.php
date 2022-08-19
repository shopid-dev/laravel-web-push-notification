<?php

namespace App\Http\Controllers;

use App\Models\push;
use Illuminate\Http\Request;
use Minishlink\WebPush\WebPush;
use Minishlink\WebPush\Subscription;

class PushController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function send(Request $req , push $push)
    {
      
        $webPush = new WebPush([
            "VAPID" => [
                "subject" => "http://localhost",
                "publicKey" => "BOe-nXH6N-PPLs-Zy-QwO9oexlhOkMmDGosJmL9FbhpxLJF9DB1WlDH8uhtSOv_rPaBBtIf8p83OhrqZof6OZco",
                "privateKey" => "y_sN7mSmP6pPTHNZfbyEuLEx06J5TLE1r6-KXe1NIRQ"
            ]
        ]);

        $subscription = Subscription::create(json_decode($push->pushdata,true));


        $response = $webPush->sendOneNotification($subscription,

          json_encode(["title"=>"new notif","body"=>$req->text,"url"=>$req->url])

        );



        if ($response->isSuccess()) {
            echo "ok";
       } else {
           $response->getReason();
       }
       

    }

    public function index()
    {
        return view("admin",["pushes"=>push::latest()->limit(10)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) {
        push::create([
                "pushdata"=>$request->push
            ]);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\push  $push
     * @return \Illuminate\Http\Response
     */
    public function show(push $push)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\push  $push
     * @return \Illuminate\Http\Response
     */
    public function edit(push $push)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\push  $push
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, push $push)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\push  $push
     * @return \Illuminate\Http\Response
     */
    public function destroy(push $push)
    {
        //
    }
}
