<?php
namespace App\Api\V1\Controllers\Traits;

use \Exception;
use Dingo\Api\Exception as ApiException;
use Illuminate\Contracts\Validation\ValidationException;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;

trait ApiControllerTrait
{
    use Helpers;

    public function index(Request $request)
    {
        return $this->response->paginator($this->model->paginate(15), new $this->transformerClass);
    }

    public function show (Request $request, $id)
    {
        try
        {
            $object = $this->model->findOrFail($id);

            return $this->response->array($object->toArray());
        } catch(Exception $e){
            throw new NotFoundHttpException('Could not find the resource.');
        }
    }

    public function store (Request $request)
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

    public function update (Request $request, $id)
    {
        $object = $this->model->find($id);

        if($object){
            try
            {
                $data = $request->all();
                $object->fill($data);
                $object->saveOrFail();

                return $this->response->array($object->toArray());
            } catch(Exception $e){
                throw new ApiException\StoreResourceFailedException('Could not create the resource.', null, $e);
            }
        }

        return $this->response->errorNotFound('Resource not found.');
    }

    public function destroy (Request $request, $id)
    {
        return $this->response->noContent();
    }
}
