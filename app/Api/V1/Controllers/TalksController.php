<?php
namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Dingo\Api\Exception as ApiException;
use Dingo\Blueprint\Annotation\Request;
use Illuminate\Contracts\Validation\ValidationException;
use App\Api\V1\Talk;
use App\Api\V1\Controllers\Traits\ApiControllerTrait;


class TalksController extends Controller
{
    use ApiControllerTrait;

    /**
     * Create a new controller instance.
     *
     * @param Talk $model
     */
    public function __construct(Talk $model)
    {
        $this->model = $model;
        $this->transformerClass = 'App\Api\V1\Transformers\TalkTransformer';
    }

    /**
     * @param Request $request
     * @param Event $event
     *
     * @return \Dingo\Api\Http\Response
     * @throws ApiException\StoreResourceFailedException
     */
    public function store (Request $request, Event $event)
    {
        $data = $request->all();
        $model = $this->model->fill($data);

        try {
            $model->saveOrFail();

            return $this->response->created(null, $model);
        } catch (ValidationException $e) {
            throw new ApiException\StoreResourceFailedException("Could not create the resource.", $e->getErrors());
        } catch (Exception $e) {
            throw new ApiException\StoreResourceFailedException("Could not create the resource.", null, $e);
        }
    }
}
