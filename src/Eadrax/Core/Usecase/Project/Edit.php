<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Eadrax\Core\Usecase\Project;
use Eadrax\Core\Usecase\Project;
use Eadrax\Core\Usecase\Project\Edit\Interactor;
use Eadrax\Core\Usecase\Project\Edit\Proposal;
use Eadrax\Core\Usecase\Project\Edit\Author;
use Eadrax\Core\Usecase;

class Edit
{
    private $data;
    private $repositories;
    private $tools;

    function __construct(Array $data, Array $repositories, Array $tools)
    {
        $this->data = $data;
        $this->repositories = $repositories;
        $this->tools = $tools;
    }

    public function fetch()
    {
        return new Interactor(
            $this->get_author(),
            $this->get_proposal(),
            $this->get_project_prepare()
        );
    }

    private function get_author()
    {
        return new Author(
            $this->tools['authenticator']
        );
    }

    private function get_proposal()
    {
        return new Proposal(
            $this->data['project'],
            $this->repositories['project_edit'],
            $this->tools['authenticator']
        );
    }

    private function get_project_prepare()
    {
        $project_prepare = new Usecase\Project\Prepare(
            $this->data,
            $this->tools
        );
        return $project_prepare->fetch();
    }
}
