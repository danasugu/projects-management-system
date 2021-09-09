@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.projectManager.title_singular') }}:
                    {{ trans('cruds.projectManager.fields.id') }}
                    {{ $projectManager->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            @livewire('project-manager.edit', [$projectManager])
        </div>
    </div>
</div>
@endsection