@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="card bg-blueGray-100">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.view') }}
                    {{ trans('cruds.projectManager.title_singular') }}:
                    {{ trans('cruds.projectManager.fields.id') }}
                    {{ $projectManager->id }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <div class="pt-3">
                <table class="table table-view">
                    <tbody class="bg-white">
                        <tr>
                            <th>
                                {{ trans('cruds.projectManager.fields.id') }}
                            </th>
                            <td>
                                {{ $projectManager->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectManager.fields.name') }}
                            </th>
                            <td>
                                {{ $projectManager->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectManager.fields.surname') }}
                            </th>
                            <td>
                                {{ $projectManager->surname }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectManager.fields.email') }}
                            </th>
                            <td>
                                <a class="link-light-blue" href="mailto:{{ $projectManager->email }}">
                                    <i class="far fa-envelope fa-fw">
                                    </i>
                                    {{ $projectManager->email }}
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.projectManager.fields.phone') }}
                            </th>
                            <td>
                                {{ $projectManager->phone }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                @can('project_manager_edit')
                    <a href="{{ route('admin.project-managers.edit', $projectManager) }}" class="btn btn-indigo mr-2">
                        {{ trans('global.edit') }}
                    </a>
                @endcan
                <a href="{{ route('admin.project-managers.index') }}" class="btn btn-secondary">
                    {{ trans('global.back') }}
                </a>
            </div>
        </div>
    </div>
</div>
@endsection