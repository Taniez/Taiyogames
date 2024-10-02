<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class homeguest extends Component
{
    public function render(): View
    {
        return view('layouts.homeguest');
    }
}