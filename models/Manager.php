<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use \DateTime as DateTime;

/** @ODM\Document */
class Manager extends BaseEmployee
{
    /** @ODM\ReferenceMany(targetDocument="Project") */
    private $projects;

    public function __construct() { $this->projects = new ArrayCollection(); }

    public function getProjects() { return $this->projects; }
    public function addProject(Project $project) { $this->projects[] = $project; }
}

