<?php

namespace spec\Eadrax\Eadrax\Context\User\Login\Guest;

trait Interaction
{
    function it_throws_an_authorisation_error_if_logged_in($entity_auth)
    {
        $entity_auth->logged_in()->willReturn(TRUE);
        $this->shouldThrow('\Eadrax\Eadrax\Exception\Authorisation')->duringAuthorise_login();
    }

    function it_proceeds_to_validate_information_if_not_logged_in($entity_auth, $entity_validation)
    {
        $entity_auth->logged_in()->willReturn(FALSE);

        $entity_validation->setup(array(
            'username' => 'username'
        ))->shouldBeCalled();
        $entity_validation->rule('username', 'not_empty')->shouldBeCalled();
        $entity_validation->callback('username', array($this, 'is_existing_account'), array($this->username, $this->password))->shouldBeCalled();

        $entity_validation->check()->willReturn(FALSE);
        $entity_validation->errors()->willReturn(array(
            'foo' => 'bar'
        ));

        $this->shouldThrow('\Eadrax\Eadrax\Exception\Validation')->duringAuthorise_login();
    }

    function it_proceeds_to_login_if_validation_succeeds($entity_auth, $entity_validation)
    {
        $entity_validation->check()->willReturn(TRUE);

        $entity_auth->login($this->username, $this->password)->shouldBeCalled()->willReturn('foo');
        $this->validate_information()->shouldReturn('foo');
    }

    function it_checks_the_repository_for_existing_accounts($repository)
    {
        $repository->is_existing_account('foo', 'bar')->shouldBeCalled()->willReturn(TRUE);
        $this->is_existing_account('foo', 'bar')->shouldBe(TRUE);
    }
}