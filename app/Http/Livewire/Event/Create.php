<?php

namespace App\Http\Livewire\Event;

use App\Models\Event;
use App\Models\Project;
use Livewire\Component;

class Create extends Component
{
    public Event $event;

    public array $listsForFields = [];

    public function mount(Event $event)
    {
        $this->event = $event;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.event.create');
    }

    public function submit()
    {
        $this->validate();

        $this->event->save();

        return redirect()->route('admin.events.index');
    }

    protected function rules(): array
    {
        return [
            'event.name' => [
                'string',
                'required',
            ],
            'event.start_date' => [
                'required',
                'date_format:' . config('project.date_format'),
            ],
            'event.project_id' => [
                'integer',
                'exists:projects,id',
                'required',
            ],
            'event.description' => [
                'string',
                'nullable',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['project'] = Project::pluck('name', 'id')->toArray();
    }
}
