<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('event.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.event.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="event.name">
        <div class="validation-message">
            {{ $errors->first('event.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('event.start_date') ? 'invalid' : '' }}">
        <label class="form-label required" for="start_date">{{ trans('cruds.event.fields.start_date') }}</label>
        <x-date-picker class="form-control" required wire:model="event.start_date" id="start_date" name="start_date" picker="date" />
        <div class="validation-message">
            {{ $errors->first('event.start_date') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.start_date_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('event.project_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="project">{{ trans('cruds.event.fields.project') }}</label>
        <x-select-list class="form-control" required id="project" name="project" :options="$this->listsForFields['project']" wire:model="event.project_id" />
        <div class="validation-message">
            {{ $errors->first('event.project_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.project_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('event.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.event.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="event.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('event.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.event.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.events.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>