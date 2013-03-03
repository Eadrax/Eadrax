<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Eadrax\Core\Usecase\Project\Edit;

use Eadrax\Core\Data;
use Eadrax\Core\Exception;

class Proposal extends Data\Project
{
    private $repository;

    public function __construct(Data\Project $project, Repository $repository)
    {
        $this->id = $project->id;
        $this->name = $project->name;
        $this->summary = $project->summary;
        $this->description = $project->description;
        $this->website = $project->website;
        $this->last_updated = time();

        $this->repository = $repository;
    }

    public function verify_ownership(Author $author)
    {
        $previous_author = $this->repository->get_author($this);
        if ($author->id !== $previous_author->id)
            throw new Exception\Authorisation('You cannot edit a project you do not own.');
    }

    public function update()
    {
        $this->repository->update($this);
    }
}
