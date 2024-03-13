<?php

namespace Xlited\Lamx\Concerns;

trait Responsable
{
    public function toResponse($request)
    {
        return $this->render();
    }
}
