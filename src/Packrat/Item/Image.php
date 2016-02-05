<?php

namespace Packrat\Item;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Rhumsaa\Uuid\Uuid;

final class Image
{
    private $imageId;
    private $contents;

    private function __construct(Uuid $imageId, string $contents)
    {
        $this->imageId  = $imageId;
        $this->contents = $contents;
    }

    public static function fromPath(string $path)
    {
        $adapter    = new Local(__DIR__ . '/path/to/root');
        $filesystem = new Filesystem($adapter);

        $image = $filesystem->read($path);
        if ($image === false) {
            throw new CouldNotReadImageFromPath();
        }

        return new Image(Uuid::uuid4(), $image);
    }

    public function getId(): Uuid
    {
        return $this->imageId;
    }

    public function getContents(): string
    {
        return $this->contents;
    }
}
