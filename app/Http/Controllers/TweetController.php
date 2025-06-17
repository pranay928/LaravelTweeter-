<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tweet;
class TweetController extends Controller
{
     public function tweet(Request $request){

        // dd($request->all());
       $tweet =  $request->validate([
            'tweet' => 'required|max:280' 
        ]);

        $tweets= Tweet::create($tweet);
        $tweets->tweet = $tweet['tweet'];      
        $tweets->save();
        return redirect()->route('indexTweet')->with('success', 'Tweet posted successfully!');
        
     }
      
     public function indexTweet(){
        $tweets = Tweet::all();
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
