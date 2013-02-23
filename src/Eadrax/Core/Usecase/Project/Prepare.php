<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Eadrax\Core\Usecase\Project;

use Eadrax\Core\Usecase\Project\Prepare\Proposal;
use Eadrax\Core\Usecase\Project\Prepare\Icon;
use Eadrax\Core\Usecase\Project\Prepare\Repository;
use Eadrax\Core\Usecase\Project\Prepare\Interactor;
use Eadrax\Core\Data;
use Eadrax\Core\Tool;

class Prepare
{
    /**
     * Sets up dependencies
     *
     * @param Data\Project      $data_project      Project data object
     * @param Repository        $repository        Repository
     * @param Tool\Validation $entity_validation Validation system
     * @param Tool\Image      $entity_image      Image manipulation system
     * @return void
     */
    public function __construct(Data\Project $data_project, Repository $repository, Tool\Validation $entity_validation, Tool\Image $entity_image)
    {
        $this->data_project = $data_project;
        $this->data_file = $data_project->get_icon();
        $this->repository = $repository;
        $this->entity_image = $entity_image;
        $this->entity_validation = $entity_validation;
    }

    /**
     * Fetches the context interactor
     *
     * @return Interactor
     */
    public function fetch()
    {
        return new Interactor($this->get_proposal(), $this->get_icon());
    }

    /**
     * Create a proposal role
     *
     * @return Proposal
     */
    private function get_proposal()
    {
        return new Proposal($this->data_project, $this->entity_validation);
    }

    /**
     * Create an icon role
     *
     * @return Icon
     */
    private function get_icon()
    {
        return new Icon($this->data_file, $this->repository, $this->entity_image, $this->entity_validation);
    }
}