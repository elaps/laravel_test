<?php

namespace App\View\Components\ElDbGrid;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Table extends Component {
    /**
     * Create a new component instance.
     */
    public array $config;
    public $query;
    public $rows;
    public $th;

    public function __construct($config = [], $query = null) {
        $this->config = $config;
        $this->rows = $query->paginate(10);

        foreach ($this->config['columns'] as $key => $value) {
            $column = [];
            if(is_array($value)) {
                $column = $value;
            }else{
                if (is_numeric($key)) {
                    $column = [
                        'attribute' => $value
                    ];
                }
            }

            $this->th[] = [

            ];
        }
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string {
        return view('components.el-db-grid.table');
    }
}
