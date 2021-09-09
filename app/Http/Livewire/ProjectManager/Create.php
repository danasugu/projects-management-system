<?php

namespace App\Http\Livewire\ProjectManager;

use App\Models\ProjectManager;
use Livewire\Component;

class Create extends Component
{
    public ProjectManager $projectManager;

    public function mount(ProjectManager $projectManager)
    {
        $this->projectManager = $projectManager;
    }

    public function render()
    {
        return view('livewire.project-manager.create');
    }

    public function submit()
    {
        $this->validate();

        $this->projectManager->save();

        return redirect()->route('admin.project-managers.index');
    }

    protected function rules(): array
    {
        return [
            'projectManager.name' => [
                'string',
                'required',
            ],
            'projectManager.surname' => [
                'string',
                'required',
            ],
            'projectManager.email' => [
                'email:rfc',
                'required',
            ],
            'projectManager.phone' => [
                'string',
                'nullable',
            ],
        ];
    }
}
