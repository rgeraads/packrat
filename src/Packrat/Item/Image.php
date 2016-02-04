<?php

namespace Packrat\Item;

use League\Flysystem\Adapter\Local;
use League\Flysystem\Filesystem;
use Packrat\Collection\Id;

final class Image
{
    private $id;
    private $contents;

    private function __construct(Id $id, string $contents)
    {
        $this->id       = $id;
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

        return new Image(id::generate(), $image);
    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getContents(): string
    {
        return $this->contents;
    }
}
