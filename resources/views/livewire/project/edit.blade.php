<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('project.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.project.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="project.name">
        <div class="validation-message">
            {{ $errors->first('project.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.start_date') ? 'invalid' : '' }}">
        <label class="form-label required" for="start_date">{{ trans('cruds.project.fields.start_date') }}</label>
        <x-date-picker class="form-control" required wire:model="project.start_date" id="start_date" name="start_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('project.start_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.start_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.end_date') ? 'invalid' : '' }}">
        <label class="form-label" for="end_date">{{ trans('cruds.project.fields.end_date') }}</label>
        <x-date-picker class="form-control" wire:model="project.end_date" id="end_date" name="end_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('project.end_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.end_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.project_manager_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="project_manager">{{ trans('cruds.project.fields.project_manager') }}</label>
        <x-select-list class="form-control" required id="project_manager" name="project_manager" :options="$this->listsForFields['project_manager']" wire:model="project.project_manager_id" />
        <div class="validation-message">
            {{ $errors->first('project.project_manager_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.project_manager_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>