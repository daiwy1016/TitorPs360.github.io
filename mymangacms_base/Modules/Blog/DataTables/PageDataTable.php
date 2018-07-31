<?php

namespace Modules\Blog\DataTables;

use Yajra\Datatables\Services\DataTable;

use Modules\Blog\Entities\Page;

class PageDataTable extends DataTable
{
    /**
     * Display ajax response.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', function ($item) {
                return '<a href="'.route("admin.pages.edit", $item->id).'" class="btn btn-xs btn-primary"><i class="glyphicon glyphicon-edit"></i> Edit</a>'
                        . '<form action="'.route("admin.pages.destroy", $item->id).'" method="POST" class="form-btn">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" value="'.csrf_token().'">
                            <input class="btn btn-xs btn-danger" type="submit" onclick="if(!confirm(\''. trans('blog::messages.admin.pages.confirm-delete') .'\')){return false;}" value="Delete"/>
                         </form>';
            })
            ->rawColumns(['status','action'])
            ->editColumn('status', function ($item) {
                return ($item->status == 1?"<span class='label label-success'>Activated</span>":'<span class="label label-danger">Disabled</span>');
            })
            ->make(true);
    }

    /**
     * Get the query object to be processed by dataTables.
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        $query = Page::query();

        return $this->applyScopes($query);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->columns($this->getColumns())
                    ->ajax('')
                    ->addAction(['width' => '120px'])
                    ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'title',
            'slug',
            'status',
            'created_at',
        ];
    }
    
    protected function getBuilderParameters()
    {
        return [
            'order'   => [[3, 'desc']],
            'buttons' => [],
        ];
    }
}
