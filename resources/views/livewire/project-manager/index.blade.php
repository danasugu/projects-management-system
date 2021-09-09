<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('project_manager_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan

            @if(file_exists(app_path('Http/Livewire/ExcelExport.php')))
                <livewire:excel-export model="ProjectManager" format="csv" />
                <livewire:excel-export model="ProjectManager" format="xlsx" />
                <livewire:excel-export model="ProjectManager" format="pdf" />
            @endif




        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay>
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.projectManager.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.projectManager.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.projectManager.fields.surname') }}
                            @include('components.table.sort', ['field' => 'surname'])
                        </th>
                        <th>
                            {{ trans('cruds.projectManager.fields.email') }}
                            @include('components.table.sort', ['field' => 'email'])
                        </th>
                        <th>
                            {{ trans('cruds.projectManager.fields.phone') }}
                            @include('components.table.sort', ['field' => 'phone'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projectManagers as $projectManager)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $projectManager->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $projectManager->id }}
                            </td>
                            <td>
                                {{ $projectManager->name }}
                            </td>
                            <td>
                                {{ $projectManager->surname }}
                            </td>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $projectManager->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $projectManager->email }}
                                </a>
                            </td>
                            <td>
                                {{ $projectManager->phone }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('project_manager_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.project-managers.show', $projectManager) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('project_manager_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.project-managers.edit', $projectManager) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('project_manager_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $projectManager->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $projectManagers->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush