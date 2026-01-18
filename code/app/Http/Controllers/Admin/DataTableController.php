<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class DataTableController extends Controller
{
    public function handle(Request $request)
    {
        // ⚠️ BẮT BUỘC cast string
        $key     = (string) $request->input('table');
        $actions = $request->input('actions', []);

        $config = config("datatable.$key");
        abort_unless($config && isset($config['model']), 404);

        $query = $config['model']::query();

        if (!empty($config['with'])) {
            $query->with($config['with']);
        }

        $dt = DataTables::of($query);

        $rawColumns = [];

        // IMAGE
        if (isset($actions['image'])) {
            $dt->addColumn('image', function ($row) use ($actions) {
                $field = $actions['image']['field'] ?? null;
                $base  = $actions['image']['base'] ?? '';

                if (!$field || !isset($row->$field)) return '';

                return '<img src="'.$base.$row->$field.'" width="80">';
            });
            $rawColumns[] = 'image';
        }

        // EDIT
        if (isset($actions['edit'])) {
            $dt->addColumn('edit', function ($row) use ($actions) {
                return '<a href="'.route($actions['edit']['route'], $row->id).'"
                        class="btn btn-warning btn-sm">Edit</a>';
            });
            $rawColumns[] = 'edit';
        }

        // DELETE
        if (isset($actions['delete'])) {
            $dt->addColumn('delete', function ($row) use ($actions) {
                return '
                <form method="POST" action="'.route($actions['delete']['route']).'">
                    '.csrf_field().method_field('DELETE').'
                    <input type="hidden" name="id" value="'.$row->id.'">
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>';
            });
            $rawColumns[] = 'delete';
        }

        return $dt->rawColumns($rawColumns)->make(true);
    }
}
