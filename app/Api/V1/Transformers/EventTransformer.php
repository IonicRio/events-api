<?php
namespace App\Api\V1\Transformers;

use Dingo\Api\Http\Request;
use Dingo\Api\Transformer\Binding;
use Dingo\Api\Contract\Transformer\Adapter;

class EventTransformer implements Adapter
{
    public function transform ($response, $transformer, Binding $binding, Request $request)
    {
        dd($response);
        return;
    }

    public function getDefaultIncludes ()
    {
        return [];
    }
}
