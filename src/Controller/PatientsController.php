<?php
namespace Site\Controller;

require_once('vendor/autoload.php');

class PatientsController
{
    public function index()
    {
        include('App/Patients/index.php');
    }

    public function get(string $patientId)
    {
        include('App/Patients/get.php');
    }

    public function create()
    {
        include('App/Patients/create.php');
    }

    public function update(string $patientId)
    {
        include('App/Patients/update.php');
    }

    public function delete(string $patientId)
    {
        include('App/Patients/delete.php');
    }
}
