<?php

namespace spec\Eadrax\Core\Usecase\Project;

use PHPSpec2\ObjectBehavior;

class Delete extends ObjectBehavior
{
    /**
     * @param Eadrax\Core\Data\Project $project
     * @param Eadrax\Core\Usecase\Project\Delete\Repository $project_delete
     * @param Eadrax\Core\Tool\Auth $auth
     */
    function let($project, $project_delete, $auth)
    {
        $data = array(
            'project' => $project
        );
        $repositories = array(
            'project_delete' => $project_delete
        );
        $tools = array(
            'auth' => $auth
        );
        $this->beConstructedWith($data, $repositories, $tools);
    }

    function it_should_be_initializable()
    {
        $this->shouldHaveType('Eadrax\Core\Usecase\Project\Delete');
    }

    function it_fetches_the_interactor()
    {
        $this->fetch()->shouldHaveType('Eadrax\Core\Usecase\Project\Delete\Interactor');
    }
}
