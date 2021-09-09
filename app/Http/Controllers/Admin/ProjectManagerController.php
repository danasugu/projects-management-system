<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectManager;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProjectManagerController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('project_manager_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-manager.index');
    }

    public function create()
    {
        abort_if(Gate::denies('project_manager_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-manager.create');
    }

    public function edit(ProjectManager $projectManager)
    {
        abort_if(Gate::denies('project_manager_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-manager.edit', compact('projectManager'));
    }

    public function show(ProjectManager $projectManager)
    {
        abort_if(Gate::denies('project_manager_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.project-manager.show', compact('projectManager'));
    }
}
