<?php

namespace Xlited\Lamx\Components;

use Xlited\Lamx\Concerns;
use Xlited\Lamx\Features;
use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\Support\Responsable;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

abstract class HtmxComponent extends Component implements Htmlable, Responsable
{
    use Concerns\Htmlable;
    use Concerns\Responsable;
    use Concerns\Makeable;
    use Features\HandlesPageComponents;

    public string $view = 'components.htmx';

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view($this->view, $this->data());
    }

    public function __toString()
    {
        return $this->toHtml();
    }
}
