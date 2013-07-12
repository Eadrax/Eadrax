<?php

namespace spec\Eadrax\Core\Usecase\Project;

use PHPSpec2\ObjectBehavior;

class Untrack extends ObjectBehavior
{
    /**
     * @param Eadrax\Core\Data\Project $project
     * @param Eadrax\Core\Usecase\Project\Untrack\Repository $project_untrack
     * @param Eadrax\Core\Usecase\User\Untrack\Repository $user_untrack
     * @param Eadrax\Core\Tool\Authenticator $authenticator
     */
    function let($project, $project_untrack, $user_untrack, $authenticator)
    {
        $data = array(
            'project' => $project
        );

        $repositories = array(
            'project_untrack' => $project_untrack,
            'user_untrack' => $user_untrack
        );

        $tools = array(
            'authenticator' => $authenticator
        );

        $this->beConstructedWith($data, $repositories, $tools);
    }

    function it_should_be_initializable()
    {
        $this->shouldHaveType('Eadrax\Core\Usecase\Project\Untrack');
    }

    function it_fetches_the_interactor()
    {
        $this->fetch()->shouldHaveType('Eadrax\Core\Usecase\Project\Untrack\Interactor');
    }

    function it_can_run_the_user_untrack_usecase()
    {
        $this->get_user_untrack()->fetch()->shouldHaveType('Eadrax\Core\Usecase\User\Untrack\Interactor');
    }
}
