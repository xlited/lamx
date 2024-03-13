<?php

namespace Xlited\Lamx\Concerns;

trait Makeable
{
    public static function make($data = []): self
    {
        return self::resolve($data);
    }
}
