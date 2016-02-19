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
        $counter = 0;

        if ($this->word == $this->sentence)
        {
            ++$counter;
        }

        return $counter;
    }

} ?>
