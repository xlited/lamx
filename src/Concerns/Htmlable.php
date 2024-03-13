<?php

namespace Xlited\Lamx\Concerns;

trait Htmlable
{
    public function toHtml(): string
    {
        return $this->render()->render();
    }
}
