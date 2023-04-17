<?php

namespace DanieleTulone\PostmanGenerator\Services;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class PostmanService
{
    /**
     * Check if already exists a collection with given name.
     * 
     * @return bool True if a collection exists, false otherwise.
     */
    private function collectionExists(string $name): bool
    {
        return Storage::disk('local')->exists('postman/' . $name);
    }

    /**
     * @inheritDoc
     */
    public function generateCollection(?string $name): string
    {
        Artisan::call('export:postman');

        $commandOutput = Artisan::output();
        $commandOutputExploded = explode("/", $commandOutput);
        $filename = trim(
            array_pop($commandOutputExploded)
        );

        return $filename;
    }

    /**
     * @inheritDoc
     */
    public function getCollection(?string $name): string
    {
        if ($name) {
            config()->set('api-postman.filename', $name . '.json');
        }

        if (!is_string($name) || !$this->collectionExists($name)) {
            $name = $this->generateCollection($name);
        }

        return storage_path('app/postman/' . $name);
    }
}
