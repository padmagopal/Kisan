<?php

use BotMan\BotMan\Messages\Conversations\Conversation;

class OnboardingConversation3 extends Conversation
{

    protected $firstname;
   
    public function askFirstname()
    {
        $this->ask('Hi, what is your name?', function($answer) {
            $firstName = $answer->getText();
        
            $this->say('Nice to meet you '.$firstName);
            $this->askD();
        });
    }

       
     
      
  public function askD()
  
   {
       $conn = mysqli_connect("localhost","root","","u459976464_shop");
    $current_date=date('Y-m-d', strtotime(' +1 day'));
    $strtotime=strtotime($current_date);
    $last_year=strtotime("-1 year",$strtotime);
    $ss=date("Y-m-d",$last_year);
    
    $sqlQuery = "SELECT weather,soil FROM demand2 where date ='".$ss."' ORDER BY weather";
    
    $result = mysqli_query($conn,$sqlQuery);
    $rows=mysqli_fetch_array($result);
    $k=$rows[0];
    $K2=$rows[1];
    if($k2>80)
    {
        $ks="more chance of rainfall";

    }
    if($k<80)
    {
        $ks="less chance of rainfall";
    }
    $this->say("weather and rainfall is ".$k.$Ks);
        
      
          
}

    public function run()
    {
        $this->askFirstname();
     
    }
}
