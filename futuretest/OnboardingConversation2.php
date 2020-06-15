<?php

use BotMan\BotMan\Messages\Conversations\Conversation;

class OnboardingConversation2 extends Conversation
{

    protected $firstname;
    protected $d;
    public function askFirstname()
    {
        $this->ask('Hi, what is your name?', function($answer) {
            $firstName = $answer->getText();
        
            $this->say('Nice to meet you '.$firstName);
            $this->askD();
        });
    }

       
     
      
  public function askD()
  {$conn = mysqli_connect("localhost","root","","u459976464_shop");
    $current_date=date("Y-m-d");
    $strtotime=strtotime($current_date);
    $last_year=strtotime("-1 year",$strtotime);
    $ss=date("Y-m-d",$last_year);
    
    $lastmonth = date("Y-m-d", strtotime("-30 days"));
     //echo $lastmonth;
    //On 2019-08-19, this resulted in 2019-08-12
    
    $strtotimes=strtotime($lastmonth);
    $last_years=strtotime("-1 year",$strtotimes);
    
    $sss=date("Y-m-d",$last_years);
    
    $sqlQuery = "SELECT t.item_name, AVG(t.price) as price
    FROM demand t
    Group by t.item_name
    ORDER BY t.date DESC
    LIMIT 1";
    
    $result=mysqli_query($conn,$sqlQuery);
    $rows=mysqli_fetch_array($result);
    $k=$rows[0];
    $K2=$rows[1];
    $this->say("The MOST DEMAND PRODUCT AND IT PRICE IS".$k.$K2);
        
      
          
}

    public function run()
    {
        $this->askFirstname();
     
    }
}
