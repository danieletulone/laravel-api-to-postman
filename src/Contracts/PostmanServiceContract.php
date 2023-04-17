<?php

namespace DanieleTulone\PostmanGenerator\Contracts;

interface PostmanServiceContract
{
    /**
     * Generate a new postman collection.
     * 
     * @param string $name Name of collection to get or generated. If null, will create a timestamp name.
     * @return string Filename of generated collection.
     */
    function generateCollection(string $name): string;

    /**
     * Generate and/or get collection with given name or autogenerated.
     * 
     * @param string $name Name of collection to get or generated. If null, will create a timestamp name.
     * @return string Absolute path of generated collection.
     */
    function getCollection(string $name): string;
}
