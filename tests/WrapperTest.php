<?php
/**
 * Created by PhpStorm.
 * User: Marcos
 * Date: 4/7/15
 * Time: 16:35
 */

require_once dirname(__ROOT__) . '/src/Wrapper.php';

class WrapperTest extends PHPUnit_Framework_TestCase
{
    private $wrapper;

    function setUp()
    {
        $this->wrapper = new Wrapper();
    }

    function testItWrapsAndEmptyString()
    {
        $this->assertEquals('', $this->wrapper->wrap('', 0));
    }

    function testItDoesNotWrapAShortEnoughWord()
    {
        $texttoBeParsed = 'word';
        $maxLineLength = 5;
        $this->assertEquals($texttoBeParsed, $this->wrapper->wrap($texttoBeParsed, $maxLineLength));
    }

    function testItWrapsAWordLongerThanLineLength()
    {
        $texttoBeParsed = 'alongword';
        $maxLineLength = 5;
        $this->assertEquals('along\nword', $this->wrapper->wrap($texttoBeParsed, $maxLineLength));
    }

    function testItWrapsAWordSeveralTimesIfItsTooLong()
    {
        $texttoBeParsed = 'averyverylongword';
        $maxLineLength = 5;
        $this->assertEquals('avery\nveryl\nongwo\nrd', $this->wrapper->wrap($texttoBeParsed, $maxLineLength));
    }

    function testItWrapsTwoWordsWhenSpaceAtTheEndOfLine()
    {
        $textToBeParsed = 'word word';
        $maxLineLength = 5;
        $this->assertEquals('word\nword', $this->wrapper->wrap($textToBeParsed, $maxLineLength));
    }

    function testItWrapsTwoWordsWhenLineEndIsAfterFirstWord()
    {
        $textToBeParsed = 'word word';
        $maxLineLength = 7;
        $this->assertEquals('word\nword', $this->wrapper->wrap($textToBeParsed, $maxLineLength));
    }

    function testItWraps3WordsOn2Lines()
    {
        $textToBeParsed = 'word word word';
        $maxLineLength = 12;
        $this->assertEquals('word word\nword', $this->wrapper->wrap($textToBeParsed, $maxLineLength));
    }

    function testItWraps2WordsAtBoundry() {
        $textToBeParsed = 'word word';
        $maxLineLength = 4;
        $this->assertEquals('word\nword', $this->wrapper->wrap($textToBeParsed, $maxLineLength));
    }

    function testItWrapsTheLongestWordsPosible() {
        $textToBeParsed = 'ThelongestWord made';
        $maxLineLength = 8;
        $this->assertEquals('Thelonge\nstWord\nmade', $this->wrapper->wrap($textToBeParsed, $maxLineLength));
    }

   /* function testWillFail(){
        $this->assertEquals(1,2);
    }*/


} 