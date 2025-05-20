<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Project;

class TaskForm extends Component
{
    public Project $project;

    public function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function render()
    {
        return view('components.task-form');
    }
}
