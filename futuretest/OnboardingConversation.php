<?php

use BotMan\BotMan\Messages\Conversations\Conversation;

class OnboardingConversation extends Conversation
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
  {
      $this->ask("tell your plant disease as said by our ai plant identifier",function($ans){
      $d=$ans->getText();
        if($d=="potato early blight")
        {
            $k = "Avoid overhead irrigation and allow for sufficient aeration between plants the foliage to dry as quick as possible";
        }
        elseif(($d=="potato late blight")|| ($d=="tomato late blight"))
        {
            $k = "Destroy all tomato and potato debris after harvest,Water in early morning hours or use soaker hoses";
        }
        elseif($d=="tomato mosaic virus")
        {
            $k = "Spot treat with least toxic,natural pest control products such as safer soap,bon-neem and diatomaceous earth";
        }
        elseif($d=="tomato yellow leaf curl virus")
        {
            $k = "transplant should be treated with capture(bifenthrin) or venom(dinotefuran)";
        }
        elseif($d=="tomato early blight")
        {
            $k = "Make sure to disinfect your pruning sheares(one part bleach to four parts water) after each cut";
        }
      else
      {
          $k="will be added soon";
      }

      
        $this->say("Your remedy is ".$k);
           }); 
}

    public function run()
    {
        $this->askFirstname();
     
    }
}
