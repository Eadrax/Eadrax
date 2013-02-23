<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Eadrax\Core\Usecase\Project\Edit;

use Eadrax\Core\Data;

class Proposal extends Data\Project
{
    /**
     * Sets up role dependencies
     *
     * @return void
     */
    public function __construct(Data\Project $data_project, Repository $repository)
    {
        foreach ($data_project as $property => $value)
        {
            $this->$property = $value;
        }

        $this->repository = $repository;
    }

    /**
     * Updates the current project
     *
     * @return void
     */
    public function update()
    {
        $this->repository->update_project($this);
    }
}