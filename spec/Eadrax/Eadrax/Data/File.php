<?php

namespace spec\Eadrax\Eadrax\Data;

require_once 'spec/Eadrax/Eadrax/Data/Core.php';

use PHPSpec2\ObjectBehavior;

class File extends ObjectBehavior
{
    use Core;

    function it_should_be_initializable()
    {
        $this->shouldHaveType('Eadrax\Eadrax\Data\File');
    }

    function it_should_have_a_name_attribute()
    {
        $this->set_name('foo');
        $this->get_name()->shouldBe('foo');
    }

    function it_should_have_an_extension_attribute()
    {
        $this->set_extension('foo');
        $this->get_extension()->shouldBe('foo');
    }

    function it_should_have_a_mimetype_attribute()
    {
        $this->set_mimetype('foo');
        $this->get_mimetype()->shouldBe('foo');
    }

    function it_should_have_a_filesize_attribute()
    {
        $this->set_filesize(42);
        $this->get_filesize()->shouldBe(42);
        $this->set_filesize('foo');
        $this->get_filesize()->shouldBe(0);
        $this->set_filesize(3.14);
        $this->get_filesize()->shouldBe(3);
    }
}
