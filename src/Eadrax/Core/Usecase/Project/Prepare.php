<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Eadrax\Core\Usecase\Project;

use Eadrax\Core\Usecase\Project\Prepare\Interactor;
use Eadrax\Core\Usecase\Project\Prepare\Proposal;
use Eadrax\Core\Data;

class Prepare
{
    private $data;
    private $tools;

    public function __construct($data, $tools)
    {
        $this->data = $data;
        $this->tools = $tools;
    }

    public function fetch()
    {
        return new Interactor(
            $this->get_proposal()
        );
    }

    private function get_proposal()
    {
        return new Proposal(
            $this->get_project(),
            $this->tools['validation']
        );
    }

    private function get_project()
    {
        $project = new Data\Project;
        foreach ($this->data as $property => $value)
        {
            $project->$property = $value;
        }
        return $project;
    }
}
