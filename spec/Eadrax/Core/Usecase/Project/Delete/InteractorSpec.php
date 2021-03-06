<?php

namespace spec\Eadrax\Core\Usecase\Project\Delete;

use PhpSpec\ObjectBehavior;

class InteractorSpec extends ObjectBehavior
{
    /**
     * @param Eadrax\Core\Usecase\Project\Delete\Author $author
     * @param Eadrax\Core\Usecase\Project\Delete\Proposal $proposal
     */
    function let($author, $proposal)
    {
        $this->beConstructedWith($author, $proposal);
    }

    function it_should_be_initializable()
    {
        $this->shouldHaveType('Eadrax\Core\Usecase\Project\Delete\Interactor');
    }

    function it_carries_out_the_interaction_chain($author, $proposal)
    {
        $author->authorise()->shouldBeCalled();
        $proposal->authorise()->shouldBeCalled();
        $proposal->delete()->shouldBeCalled();
        $this->interact();
    }
}
