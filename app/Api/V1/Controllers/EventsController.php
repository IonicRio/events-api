<?php
namespace App\Api\V1\Controllers;

use App\Api\V1\Event;
use App\Http\Controllers\Controller;
use Dingo\Blueprint\Annotation\Request;
use App\Api\V1\Controllers\Traits\ApiControllerTrait;

class EventsController extends Controller
{
    use ApiControllerTrait;

    public $model;
    public $transformerClass;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Event $model)
    {
        $this->model = $model;
        $this->transformerClass = 'App\Api\V1\Transformers\EventTransformer';
    }
}
