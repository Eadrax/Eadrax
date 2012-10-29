<?php

namespace spec\Eadrax\Eadrax\Exception;

use PHPSpec2\ObjectBehavior;

class Authorisation extends ObjectBehavior
{
    function it_should_be_initializable()
    {
        $this->shouldHaveType('Eadrax\Eadrax\Exception\Authorisation');
    }

    function it_is_an_exception()
    {
        $this->shouldHaveType('Exception');
    }
}
