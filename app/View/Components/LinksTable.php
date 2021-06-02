<?php

namespace App\View\Components;

use App\Models\Link;
use Illuminate\View\Component;

class LinksTable extends Component
{
    public $links;

    public $perPage = 10;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->links = Link::paginate($this->perPage);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.links-table');
    }
}
