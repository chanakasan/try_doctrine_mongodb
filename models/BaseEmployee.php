<?php

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;
use \DateTime as DateTime;

/** @ODM\MappedSuperclass */
abstract class BaseEmployee
{
    /** @ODM\Id */
    private $id;

    /** @ODM\Increment */
    private $changes = 0;

    /** @ODM\Collection */
    private $notes = array();

    /** @ODM\String */
    private $name;

    /** @ODM\Int */
    private $salary;

    /** @ODM\Date */
    private $started;

    /** @ODM\Date */
    private $left;

    /** @ODM\EmbedOne(targetDocument="Address") */
    private $address;

    public function getId() { return $this->id; }

    public function getChanges() { return $this->changes; }
    public function incrementChanges() { $this->changes++; }

    public function getNotes() { return $this->notes; }
    public function addNote($note) { $this->notes[] = $note; }

    public function getName() { return $this->name; }
    public function setName($name) { $this->name = $name; }

    public function getSalary() { return $this->salary; }
    public function setSalary($salary) { $this->salary = (int) $salary; }

    public function getStarted() { return $this->started; }
    public function setStarted(DateTime $started) { $this->started = $started; }

    public function getLeft() { return $this->left; }
    public function setLeft(DateTime $left) { $this->left = $left; }

    public function getAddress() { return $this->address; }
    public function setAddress(Address $address) { $this->address = $address; }
}

/** @ODM\EmbeddedDocument */
class Address
{
    /** @ODM\String */
    private $address;

    /** @ODM\String */
    private $city;

    /** @ODM\String */
    private $state;

    /** @ODM\String */
    private $zipcode;

    public function getAddress() { return $this->address; }
    public function setAddress($address) { $this->address = $address; }

    public function getCity() { return $this->city; }
    public function setCity($city) { $this->city = $city; }

    public function getState() { return $this->state; }
    public function setState($state) { $this->state = $state; }

    public function getZipcode() { return $this->zipcode; }
    public function setZipcode($zipcode) { $this->zipcode = $zipcode; }
}
