<?php

namespace spec\Eadrax\Core\Usecase\Update\Add;

use PHPSpec2\ObjectBehavior;

class Interactor extends ObjectBehavior
{
    /**
     * @param Eadrax\Core\Usecase\Update\Add\Project $project
     * @param Eadrax\Core\Usecase\Update\Add\Proposal $proposal
     */
    function let($project, $proposal)
    {
        $this->beConstructedWith($project, $proposal);
    }

    function it_should_be_initializable()
    {
        $this->shouldHaveType('Eadrax\Core\Usecase\Update\Add\Interactor');
    }

    function it_carries_out_the_generic_interaction_chain($project, $proposal)
    {
        $project->authorise()->shouldBeCalled();
        $proposal->validate()->shouldBeCalled();
        $proposal->submit()->shouldBeCalled();
        $proposal->get_id()->shouldBeCalled()->willReturn('update_id');
        $this->interact()->shouldReturn('update_id');
    }

    /**
     * @param Eadrax\Core\Usecase\Update\Add\Text $text
     */
    function it_carries_out_the_text_submit_process($project, $text)
    {
        $this->beConstructedWith($project, $text);
        $project->authorise()->shouldBeCalled();
        $text->validate()->shouldBeCalled();
        $text->submit()->shouldBeCalled();
        $text->get_id()->shouldBeCalled()->willReturn('update_id');
        $this->interact()->shouldReturn('update_id');
    }

    /**
     * @param Eadrax\Core\Usecase\Update\Add\Paste $paste
     */
    function it_carries_out_the_paste_submit_process($project, $paste)
    {
        $this->beConstructedWith($project, $paste);
        $project->authorise()->shouldBeCalled();
        $paste->validate()->shouldBeCalled();
        $paste->submit()->shouldBeCalled();
        $paste->get_id()->shouldBeCalled()->willReturn('update_id');
        $this->interact()->shouldReturn('update_id');
    }

    /**
     * @param Eadrax\Core\Usecase\Update\Add\Image $image
     */
    function it_carries_out_the_image_submit_process($project, $image)
    {
        $this->beConstructedWith($project, $image);
        $project->authorise()->shouldBeCalled();
        $image->validate()->shouldBeCalled();
        $image->generate_thumbnail()->shouldBeCalled();
        $image->calculate_dimensions()->shouldBeCalled();
        $image->submit()->shouldBeCalled();
        $image->get_id()->shouldBeCalled()->willReturn('update_id');
        $this->interact()->shouldReturn('update_id');
    }
}
