<?php

namespace DanieleTulone\PostmanGenerator\Http\Controllers;

use App\Http\Controllers\Controller;
use DanieleTulone\PostmanGenerator\Contracts\PostmanServiceContract;
use DanieleTulone\PostmanGenerator\Http\Requests\PostmanGetCollectionRequest;

class PostmanController extends Controller
{
    /**
     * Resolve PostmanServiceContract from ioc container.
     */
    public function __construct(
        public PostmanServiceContract $postmanService
    ) {
    }

    /**
     * Genarate and/or download a postman collection for current project api.
     */
    public function getCollection(PostmanGetCollectionRequest $request)
    {
        $filename = $this->postmanService->getCollection($request->name);

        return response()->download($filename);
    }
}
