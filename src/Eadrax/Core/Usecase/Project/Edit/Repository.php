<?php
/**
 * @license MIT
 * Full license text in LICENSE file
 */

namespace Eadrax\Core\Usecase\Project\Edit;

use Eadrax\Core\Data;

interface Repository
{
    public function update_project(Data\Project $data_project);
}
