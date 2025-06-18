<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
use Illuminate\Support\Facades\Auth;

class TweetController extends Controller
{
   public function tweet(Request $request)
   {
      $request->validate([
         'tweet' => 'required|max:280',
      ]);

      $tweet = new Tweet();
      $tweet->tweet = $request->tweet;
      $tweet->userId = Auth::id();
      $tweet->save();

      return redirect()->route('indexTweet')->with('success', 'Tweet posted successfully!');
   }

   //wrong code 
   // public function tweet(Request $request)
   // {


   //    $userId = Auth::user()->id;
   //    $tweet =  $request->validate([
   //       'tweet' => 'required|max:280'
   //    ]);

   //    $tweets = Tweet::create($tweet);
   //    $tweets->tweet = $tweet['tweet'];
   //    $tweets->userId = $userId;
   //    $tweets->save();
   //    return redirect()->route('indexTweet')->with('success', 'Tweet posted successfully!');
   // }


   public function indexTweet(){
        $tweets = Tweet::where('userId',Auth::id())->get();
        return view('tweets', compact('tweets'));
     }

     public function deleteTweet($id){
        $tweet =Tweet::findOrFail($id);
        $tweet->delete();
        return redirect()->route('indexTweet')->with('success', 'Tweet deleted successfully!');
     }

     public function updateTweet(Request $request, $id){
          $tweet=$request->validate([
            'tweet' => 'required|max:280'
          ]);
            $tweetToUpdate = Tweet::findOrFail($id);
            $tweetToUpdate->tweet = $tweet['tweet'];
            $tweetToUpdate->update();
            return redirect()->route('indexTweet')->with('success', 'Tweet updated successfully!');
         
     }

        
        


}
