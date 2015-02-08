<?php

/*
 | Bootstrap
 */
$dm = require_once __DIR__.'/bootstrap.php';

/*
 | Start
 */

use \DateTime as DateTime;

$employee = new Employee();
$employee->setName('Employee');
$employee->setSalary(50000);
$employee->setStarted(new DateTime());

$address = new Address();
$address->setAddress('555 Doctrine Rd.');
$address->setCity('Nashville');
$address->setState('TN');
$address->setZipcode('37209');
$employee->setAddress($address);

$project = new Project('New Project');
$manager = new Manager();
$manager->setName('Manager');
$manager->setSalary(100000);
$manager->setStarted(new DateTime());

$dm->persist($employee);
$dm->persist($address);
$dm->persist($project);
$dm->persist($manager);
$dm->flush();

echo "\nDocuments have been saved to database!\n";
