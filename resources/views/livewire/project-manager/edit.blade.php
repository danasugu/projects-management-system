<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('projectManager.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.projectManager.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="projectManager.name">
        <div class="validation-message">
            {{ $errors->first('projectManager.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectManager.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('projectManager.surname') ? 'invalid' : '' }}">
        <label class="form-label required" for="surname">{{ trans('cruds.projectManager.fields.surname') }}</label>
        <input class="form-control" type="text" name="surname" id="surname" required wire:model.defer="projectManager.surname">
        <div class="validation-message">
            {{ $errors->first('projectManager.surname') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectManager.fields.surname_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('projectManager.email') ? 'invalid' : '' }}">
        <label class="form-label required" for="email">{{ trans('cruds.projectManager.fields.email') }}</label>
        <input class="form-control" type="email" name="email" id="email" required wire:model.defer="projectManager.email">
        <div class="validation-message">
            {{ $errors->first('projectManager.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectManager.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('projectManager.phone') ? 'invalid' : '' }}">
        <label class="form-label" for="phone">{{ trans('cruds.projectManager.fields.phone') }}</label>
        <input class="form-control" type="text" name="phone" id="phone" wire:model.defer="projectManager.phone">
        <div class="validation-message">
            {{ $errors->first('projectManager.phone') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.projectManager.fields.phone_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.project-managers.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>