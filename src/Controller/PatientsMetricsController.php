<?php
namespace Site\Controller;

require_once('vendor/autoload.php');

class PatientsMetricsController
{
    public function index(string $patientId): void
    {
        include('App/PatientsMetrics/index.php');
    }

    public function get(string $patientId, string $metricId): void
    {
        include('App/PatientsMetrics/get.php');
    }

    public function create(string $patientId)
    {
        include('App/PatientsMetrics/create.php');
    }

    public function update(string $patientId, string $metricId): void
    {
        include('App/PatientsMetrics/update.php');
    }

    public function delete(string $patientId, string $metricId): void
    {
        include('App/PatientsMetrics/delete.php');
    }
}
