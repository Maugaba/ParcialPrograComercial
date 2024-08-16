<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::all();
    }

    public function store(Request $request)
    {
        $employee = new Employee();
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->hire_date = $request->hire_date;
        $employee->salary = $request->salary;
        $employee->position = $request->position;
        $employee->save();
        return response()->json(['message' => 'El empleado ha sido creado con éxito', 'employee' => $employee], 201);
    }

    public function show($id)
    {
        return Employee::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $employee = Employee::findOrFail($id);
        if(!$employee) {
            return response()->json(['message' => 'El empleado no existe'], 404);
        }
        $employee->first_name = $request->first_name;
        $employee->last_name = $request->last_name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->hire_date = $request->hire_date;
        $employee->salary = $request->salary;
        $employee->position = $request->position;
        $employee->save();
        return response()->json(['message' => 'El empleado ha sido actualizado con éxito', 'employee' => $employee], 200);
    }

    public function destroy($id)
    {
        $employee = Employee::destroy($id);
        if(!$employee) {
            return response()->json(['message' => 'El empleado no existe'], 404);
        }
        return response()->json(['message' => 'El empleado ha sido eliminado con éxito'], 200);
    }
}
