<?php
class WordFinder {

    private $word;
    private $sentence;

    function __construct ($inputWord, $inputSentence)
    {
        $this->word = $inputWord;
        $this->sentence = $inputSentence;
    }

    function getWord()
    {
        return $this->word;
    }

    function setWord($newWord)
    {
        $this->word = $newWord;
    }

    function getSentence()
    {
        return $this->Sentence;
    }

    function setSentence($newSentence)
    {
        $this->sentence = $newSentence;
    }

    function countWords()
    {
        //refactored to a single line of code.
        return preg_match_all("/\b($this->word)\b/i", $this->sentence, $matched);

        //// THIS IS THE FIRST WAY I DID IT BECAUSE IT MADE FOR MORE SPEC TESTING
        // $counter = 0;
        // $downCaseSentence = strtolower($this->sentence);
        // $sentenceAsWords = explode(" ", $downCaseSentence);
        //
        // foreach($sentenceAsWords as $wordInSentence){
        // if ($this->word == $wordInSentence)
        //     {
        //         ++$counter;
        //     }
        // }
        // return $counter;
    }

    function countWordsPluralOK()
    {
        //additional feature to kind of find plurals.
        return preg_match_all("/\b($this->word+?)(s\b|\b)/i", $this->sentence, $matched);
    }

    ////Attempt at highlighting and styling words
    // function styleSentence($plural)
    // {
    //     if($plural == "nope")
    //     {
    //         $styledSentence = preg_replace("/\b($this->word)\b/i", "<span class='theWord'>$this->word</span>", $this->sentence);
    //
    //         return $styledSentence;
    //     } else
    //     {
    //         $styledSentence = preg_replace("/\b($this->word+?)(s\b|\b)/i", "<span class='theWord'>$this->word</span>", $this->sentence);
    //
    //         return $styledSentence;
    //     }
    // }

    function styleSentence2($plural)
    {
        if($plural == "yes")
        {
            $foundPattern = preg_split("/\b($this->word+?)(s\b|\b)/i", $this->sentence, 0, PREG_SPLIT_DELIM_CAPTURE);
        }
        else 
        {
            $foundPattern = preg_split("/\b($this->word\b)/i", $this->sentence, 0, PREG_SPLIT_DELIM_CAPTURE);
        }

        $styledPattern = array();
        foreach($foundPattern as $found)
        {
            if (strtolower($found) == strtolower($this->word))
            {
                array_push($styledPattern,"<span class='theWord'>$found</span>");
            } else{
                array_push($styledPattern, $found);
            }
        }

        return implode($styledPattern);
    }
} ?>
