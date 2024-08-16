<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\EmployeeProject;

class ProjectController extends Controller
{
    public function index()
    {
        return Project::all();
    }

    public function store(Request $request)
    {
        $project = new Project();
        $project->name = $request->name;
        $project->description = $request->description;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->completion_percentage = $request->completion_percentage;
        $project->save();
        return response()->json(['message' => 'El proyecto ha sido creado con éxito', 'project' => $project], 201);
    }

    public function show($id)
    {
        return Project::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        if(!$project) {
            return response()->json(['message' => 'El proyecto no existe'], 404);
        }
        $project->name = $request->name;
        $project->description = $request->description;
        $project->start_date = $request->start_date;
        $project->end_date = $request->end_date;
        $project->completion_percentage = $request->completion_percentage;
        $project->save();
        return response()->json(['message' => 'El proyecto ha sido actualizado con éxito', 'project' => $project], 200);
    }

    public function assignEmployees(Request $request, $id)
    {
        $project = Project::findOrFail($id);
        if(!$project) {
            return response()->json(['message' => 'El proyecto no existe'], 404);
        }
        $employee_assigned = EmployeeProject::where('employee_id', $request->employee_id)->first();
        if($employee_assigned) {
            return response()->json(['message' => 'El empleado ya ha sido asignado a un proyecto'], 400);
        }
        $project_employee = new EmployeeProject();
        $project_employee->employee_id = $request->employee_id;
        $project_employee->project_id = $id;
        $project_employee->save();
        return response()->json(['message' => 'El empleado ha sido asignado al proyecto con éxito', 'project_employee' => $project_employee], 201);
    }
}
