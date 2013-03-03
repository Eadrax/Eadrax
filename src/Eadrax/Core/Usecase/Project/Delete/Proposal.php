<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Eadrax\Core\Usecase\Project\Delete;

use Eadrax\Core\Data;
use Eadrax\Core\Exception;

class Proposal extends Data\Project
{
    public function __construct(Data\Project $project, Repository $repository)
    {
        $this->id = $project->id;
        $this->repository = $repository;
    }

    public function verify_ownership(Data\User $user)
    {
        $owner = $this->repository->get_owner($this);
        if ($user->id !== $owner->id)
            throw new Exception\Authorisation('You cannot delete a project you do not own.');
    }

    public function delete()
    {
        $this->repository->delete($this);
    }
}
