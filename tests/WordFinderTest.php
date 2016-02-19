<?php
require_once "src/WordFinder.php";

class  WordFinderTest  extends PHPUnit_Framework_TestCase{

    function test_WordFinder_singlecase()
    {
        //arrange
        $test_WordFinder = new WordFinder("owl", "owl");

        //act
        $result = $test_WordFinder->countWords();

        //assert
        $this->assertEquals(1, $result);
    }

    function test_WordFinder_singlecaseinsensitive()
    {
        //arrange
        $test_WordFinder = new WordFinder("owl", "Owl");

        //act
        $result = $test_WordFinder->countWords();

        //assert
        $this->assertEquals(1, $result);
    }

    function test_WordFinder_nopartial()
    {
        //arrange
        $test_WordFinder = new WordFinder("owl", "howl");

        //act
        $result = $test_WordFinder->countWords();

        //assert
        $this->assertEquals(0, $result);
    }

    function test_WordFinder_sentence()
    {
        //arrange
        $test_WordFinder = new WordFinder("owl", "The great horned owl heard the wolf howl. Owl fact: an owl can turn its head 270 degrees.");

        //act
        $result = $test_WordFinder->countWords();

        //assert
        $this->assertEquals(3, $result);
    }

    function test_WordFinder_sentence_punctuated()
    {
        //arrange
        $test_WordFinder = new WordFinder("owl", "I love an owl: barn owl, horned owl, snowy owl and howl owl!");

        //act
        $result = $test_WordFinder->countWords();

        //assert
        $this->assertEquals(5, $result);

    }


}
 ?>
