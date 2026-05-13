<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MeuButton extends Component
{
    public string $type;
    public bool $disabled;
    /**
     * Create a new component instance.
     */
    public function __construct($type = 'primary', $disabled = false)
    {
        $this->type = $type;
        $this->disabled = $disabled;
    }

    public function getColor()
    {
        return match ($this->type) {
            'danger' => 'bg-red-600',
            'success' => 'bg-green-600',
            default => 'bg-blue-600',
        };
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.meu-button');
    }
}
