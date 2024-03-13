<?php

namespace Xlited\Lamx;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Xlited\Lamx\Skeleton\SkeletonClass
 */
class LamxFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'lamx';
    }
}
