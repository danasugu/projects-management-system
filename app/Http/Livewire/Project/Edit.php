<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use App\Models\ProjectManager;
use Livewire\Component;

class Edit extends Component
{
    public Project $project;

    public array $listsForFields = [];

    public function mount(Project $project)
    {
        $this->project = $project;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.project.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->project->save();

        return redirect()->route('admin.projects.index');
    }

    protected function rules(): array
    {
        return [
            'project.name' => [
                'string',
                'required',
            ],
            'project.start_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'project.end_date' => [
                'nullable',
                'date_format:' . config('project.date_format'),
            ],
            'project.project_manager_id' => [
                'integer',
                'exists:project_managers,id',
                'required',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['project_manager'] = ProjectManager::pluck('surname', 'id')->toArray();
    }
}
