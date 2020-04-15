<?php
namespace Site;

include_once('vendor/autoload.php');

use Site\Controller\PatientsController;
use Site\Controller\PatientsMetricsController;
use Site\Exception\RouteException;

class Route
{
    public const REQUEST_METHOD_GET = 'GET';

    public const REQUEST_METHOD_POST = 'POST';

    public const REQUEST_METHOD_PATCH = 'PATCH';

    public const REQUEST_METHOD_DELETE = 'DELETE';

    /** @var PatientsController */
    private $patientsController;

    /** @var PatientsMetricsController */
    private $patientsMetricsController;

    public function __construct()
    {
        $this->patientsController = new PatientsController();
        $this->patientsMetricsController = new PatientsMetricsController();
    }

    public function route(string $route, string $requestMethod)
    {
        if ($route[0] === '/') {
            $route = substr($route, 1);
        }
        $segments = explode('/', $route);
        $segmentCount = count($segments);

        switch ($segmentCount) {
            case 1:
                if ($segments[0] !== 'patients') {
                    throw new RouteException('Page Not Found - Invalid URL');
                }
                switch ($requestMethod) {
                    case self::REQUEST_METHOD_GET:
                        $this->patientsController->index();
                        break;
                    case self::REQUEST_METHOD_POST:
                        $this->patientsController->create();
                        break;
                    default:
                        throw new RouteException('Page Not Found - Invalid Request Method');
                        break;
                }
                break;
            case 2:
                if ($segments[0] !== 'patients') {
                    throw new RouteException('Page Not Found - Invalid Request Method');
                }
                $id = $segments[1];
                switch ($requestMethod) {
                    case self::REQUEST_METHOD_GET:
                        $this->patientsController->get($id);
                        break;
                    case self::REQUEST_METHOD_PATCH:
                        $this->patientsController->update($id);
                        break;
                    case self::REQUEST_METHOD_DELETE:
                        $this->patientsController->delete($id);
                        break;
                    default:
                        throw new RouteException('Page Not Found - Invalid Request Method');
                        break;
                }
                break;
            case 3:
                if ($segments[0] !== 'patients' || $segments[2] !== 'metrics') {
                    return new RouteException('Page Not Found - Invalid URL');
                }
                $id = $segments[1];
                switch ($requestMethod) {
                    case self::REQUEST_METHOD_GET:
                        $this->patientsMetricsController->index($id);
                        break;
                    case self::REQUEST_METHOD_POST:
                        $this->patientsMetricsController->create($id);
                        break;
                    default:
                        throw new RouteException('Page Not Found - Invalid Request Method');
                        break;
                }
                break;
            case 4:
                if ($segments[0] !== 'patients' || $segments[2] !== 'metrics') {
                    return new RouteException('Page Not Found - Invalid URL');
                }
                $id = $segments[1];
                $metricId = $segments[3];
                switch ($requestMethod) {
                    case self::REQUEST_METHOD_GET:
                        $this->patientsMetricsController->get($id, $metricId);
                        break;
                    case self::REQUEST_METHOD_PATCH:
                        $this->patientsMetricsController->update($id, $metricId);
                        break;
                    case self::REQUEST_METHOD_DELETE:
                        $this->patientsMetricsController->delete($id, $metricId);
                        break;
                    default:
                        return new RouteException('Page Not Found');
                        break;
                }
                break;
            default:
                return new RouteException('Page Not Found');
                break;
        }
    }
}
