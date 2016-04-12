<?php
namespace App\Api\V1\Controllers;

use App\Http\Controllers\Controller;
use Dingo\Blueprint\Annotation\Request;
use App\Api\V1\Controllers\Traits\ApiControllerTrait;
class SpeakersController extends Controller
{
    use ApiControllerTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
