<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\StudentApplication;
use Livewire\Component;

class Report extends Component
{
    public $reports;
    public function render()
    {
        return view('livewire.admin.report', [
            'datas' => $this->generatedQuery(),
        ]);
    }

    public function generatedQuery()
    {
        if ($this->reports == 'active') {
            return StudentApplication::where('category_id', Category::where('is_default', 1)->first()->id)->where('status', 'active')->get();
        } elseif ($this->reports == 'approved') {
            return StudentApplication::where('category_id', Category::where('is_default', 1)->first()->id)->where('status', 'approved')->get();
        } elseif ($this->reports == 'declined') {
            return StudentApplication::where('category_id', Category::where('is_default', 1)->first()->id)->where('status', 'declined')->get();
        } elseif ($this->reports == 'passed') {
            return StudentApplication::where('category_id', Category::where('is_default', 1)->first()->id)->where('status', 'passed')->get();
        }

    }
}
