<?php

namespace spec\Eadrax\Core\Usecase\User\Login;

use PhpSpec\ObjectBehavior;

class InteractorSpec extends ObjectBehavior
{
    /**
     * @param Eadrax\Core\Usecase\User\Login\Guest $guest
     */
    function let($guest)
    {
        $this->beConstructedWith($guest);
    }

    function it_should_be_initializable()
    {
        $this->shouldHaveType('Eadrax\Core\Usecase\User\Login\Interactor');
    }

    function it_should_run_the_interaction_chain($guest)
    {
        $guest->id = 'user_id';
        $guest->authorise()->shouldBeCalled();
        $guest->validate()->shouldBeCalled();
        $guest->login()->shouldBeCalled();
        $this->interact()->shouldReturn('user_id');
    }
}
