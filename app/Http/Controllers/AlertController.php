<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Validation\ValidationException;
use Exception;

class AlertController extends Controller
{
    public function index()
    {
        try {
            $alerts = Alert::all();
            return response()->json($alerts);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to fetch alerts.'], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'project_id' => 'required|exists:projects,id',
            ]);

            $alert = Alert::create($request->all());
            return response()->json($alert, 201);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to create alert.'], 500);
        }
    }

    public function show($id)
    {
        try {
            $alert = Alert::findOrFail($id);
            return response()->json($alert);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Alert not found.'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to fetch alert.'], 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $request->validate([
                'project_id' => 'required|exists:projects,id',
            ]);

            $alert = Alert::findOrFail($id);
            $alert->update($request->all());
            return response()->json($alert);
        } catch (ValidationException $e) {
            return response()->json(['error' => $e->errors()], 422);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Alert not found.'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to update alert.'], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $alert = Alert::findOrFail($id);
            $alert->delete();
            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Alert not found.'], 404);
        } catch (Exception $e) {
            return response()->json(['error' => 'Failed to delete alert.'], 500);
        }
    }
}
