<?php
/**
 * Unit test suite for HTML_Common2 class
 *
 * @author  Alexey Borzov <avb@php.net>
 * @version $Id$
 */

if (!defined('PHPUnit2_MAIN_METHOD')) {
    define('PHPUnit2_MAIN_METHOD', 'this is getting ridiculous');
}

require_once 'PHPUnit2/Framework/TestCase.php';
require_once 'HTML/Common2.php';

// HTML_Common2 cannot be instantiated due to abstract toHtml()
class HTML_Common2_Concrete extends HTML_Common2
{
    public function toHtml()
    {
        return '';
    }
}

class HTML_Common2_Test extends PHPUnit2_Framework_TestCase
{
    public function testUnknownOptionIsNull()
    {
        $this->assertNull(HTML_Common2::getOption('foobar'));
    }

    public function testAnyOptionAllowed()
    {
        HTML_Common2::setOption('foobar', 'baz');
        $this->assertEquals('baz', HTML_Common2::getOption('foobar'));
    }

    public function testConstructorSetsDefaultAttributes()
    {
        $obj = new HTML_Common2_Concrete();
        $this->assertEquals(array(), $obj->getAttributes());
        $obj = new HTML_Common2_Concrete(array('foo' => 'bar'));
        $this->assertEquals(array('foo' => 'bar'), $obj->getAttributes());
    }

    public function testUnknownAttributeIsNull()
    {
        $obj = new HTML_Common2_Concrete();
        $this->assertNull($obj->getAttribute('foobar'));
    }

    public function testAttributeNamesAreLowercased()
    {
        $obj = new HTML_Common2_Concrete();
        $obj->setAttributes(array('BAZ' => 'quux'));
        $obj->setAttribute('Foo', 'bar');
        $obj->mergeAttributes(array('XyZZy' => 'xyzzy value'));

        $this->assertEquals('bar', $obj->getAttribute('FOO'));

        $obj->removeAttribute('fOO');
        $this->assertEquals(
            array('baz' => 'quux', 'xyzzy' => 'xyzzy value'), 
            $obj->getAttributes()
        );
    }

    public function testDefaultIndentLevelIsZero()
    {
        $obj = new HTML_Common2_Concrete();
        $this->assertEquals(0, $obj->getIndentLevel());
    }

    public function testIndentLevelIsNonnegative()
    {
        $obj = new HTML_Common2_Concrete();
        $obj->setIndentLevel(-1);
        $this->assertEquals(0, $obj->getIndentLevel());
        $obj->setIndentLevel(1);
        $this->assertEquals(1, $obj->getIndentLevel());
    }

    public function testDefaultCommentIsNull()
    {
        $obj = new HTML_Common2_Concrete();
        $this->assertNull($obj->getComment());
    }

    public function testAttributesAsStringAccepted()
    {
        $obj = new HTML_Common2_Concrete('multiple  style= "height: 2em;" class=\'foo\' width=100% ');
        $this->assertEquals(
            array('multiple' => 'multiple', 'style' => 'height: 2em;', 
                  'class' => 'foo', 'width' => '100%'), 
            $obj->getAttributes()
        );
    }

    public function testNonXhtmlAttributesTransformed()
    {
        $obj = new HTML_Common2_Concrete(array('multiple'));
        $obj->setAttribute('selected');
        $obj->mergeAttributes('checked nowrap');
        $this->assertEquals(
            array('multiple' => 'multiple', 'selected' => 'selected', 
                  'checked' => 'checked', 'nowrap' => 'nowrap'),
            $obj->getAttributes()
        );
    }

    public function testWellFormedXhtmlGenerated()
    {
        $obj = new HTML_Common2_Concrete(array('foo' => 'bar&"baz"', 'quux' => 'xyz\'zy'));
        $this->assertEquals(
            ' foo="bar&amp;&quot;baz&quot;" quux="xyz&#039;zy"',
            $obj->getAttributes(true)
        );
    }
}

require_once 'PHPUnit2/Framework/TestSuite.php';
require_once 'PHPUnit2/TextUI/TestRunner.php';

$suite  = new PHPUnit2_Framework_TestSuite('HTML_Common2_Test');
$result = PHPUnit2_TextUI_TestRunner::run($suite);
?>
