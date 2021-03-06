<?php

namespace spec\Eadrax\Core\Usecase\Project\Prepare;

use PhpSpec\ObjectBehavior;

class InteractorSpec extends ObjectBehavior
{
    /**
     * @param Eadrax\Core\Usecase\Project\Prepare\Proposal $proposal
     */
    function let($proposal)
    {
        $this->beConstructedWith($proposal);
    }

    function it_should_be_initializable()
    {
        $this->shouldHaveType('Eadrax\Core\Usecase\Project\Prepare\Interactor');
    }

    function it_runs_the_interaction_chain($proposal)
    {
        $proposal->validate()->shouldBeCalled();
        $this->interact();
    }
}
