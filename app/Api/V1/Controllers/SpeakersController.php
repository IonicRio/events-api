<?php
namespace App\Api\V1\Controllers;

use App\Api\V1\Speaker;
use App\Http\Controllers\Controller;
use Dingo\Blueprint\Annotation\Request;
use App\Api\V1\Controllers\Traits\ApiControllerTrait;

class SpeakersController extends Controller
{
    use ApiControllerTrait;

    /**
     * Create a new controller instance.
     *
     * @param Speaker $model
     */
    public function __construct(Speaker $model)
    {
        $this->model = $model;
        $this->transformerClass = 'App\Api\V1\Transformers\SpeakerTransformer';
    }
}
