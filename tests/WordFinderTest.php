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

}
 ?>
