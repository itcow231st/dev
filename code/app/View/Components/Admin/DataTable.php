<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class DataTable extends Component
{
    public string $id;
    public string $table;
    public array $columns;
    public array $actions;

    public function __construct(
        string $id,
        string $table,
        array $columns,
        array $actions = []
    ) {
        $this->id = $id;
        $this->table = $table;
        $this->columns = $columns;
        $this->actions = $actions;
    }

    public function render()
    {
        return view('components.admin.data-table');
    }
}
