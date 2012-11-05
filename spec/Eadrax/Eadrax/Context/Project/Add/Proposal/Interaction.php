<?php

namespace spec\Eadrax\Eadrax\Context\Project\Add\Proposal;

trait Interaction
{
    function it_sets_author_from_the_passed_data_user_then_validates($entity_validation)
    {
        $data_user = new \Eadrax\Eadrax\Data\User();

        $entity_validation->setup(array(
            'name' => $this->get_name(),
            'summary' => $this->get_summary()
        ))->shouldBeCalled();
        $entity_validation->rule('name', 'not_empty')->shouldBeCalled();
        $entity_validation->rule('summary', 'not_empty')->shouldBeCalled();
        $entity_validation->check()->shouldBeCalled()->willReturn(FALSE);
        $entity_validation->errors()->shouldBeCalled()->willReturn(array('foo'));

        $this->shouldThrow('\Eadrax\Eadrax\Exception\Validation')->duringAssign_author($data_user);
        $this->get_author()->shouldBe($data_user);
    }

    function it_submits_to_the_repository_if_project_has_valid_information($repository, $entity_validation)
    {
        $entity_validation->check()->shouldBeCalled()->willReturn(TRUE);
        $repository->add_project($this)->shouldBeCalled()->willReturn('foo');
        $this->validate_information()->shouldReturn('foo');
    }
}
