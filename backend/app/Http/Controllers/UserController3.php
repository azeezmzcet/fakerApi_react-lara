<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UsertableModal;
use Exception;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserController3 extends Controller
{


    /**
     * Display a listing of the resource.
     */
        public function index(Request $request)
        {
            try {
                $query = UsertableModal::query();
    
                // Filtering
                if ($request->has('search')) {
                    $search = $request->search;
                    $query->where(function($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%')
                              ->orWhere('phone', 'like', '%' . $search . '%')
                              ->orWhere('email', 'like', '%' . $search . '%');
                    });
                }
    

    
                // Pagination
                $perPage = $request->get('per_page', 20);
                $data = $query->paginate($perPage);
    
                return response()->json($data);
    
            } catch (Exception $e) {
                return response()->json(['error' => 'An unexpected error occurred', 'message' => $e->getMessage()], 500);
            }
        }
     }

    // public function store(Request $request)
    // {
    //     try {
    //         $employee = UsertableModal::create($request->all());
    //         logger('b');
    //         return response()->json($employee, 201);
    //         logger('c');
    //     } catch (QueryException $e) {
    //         return response()->json(['error' => 'Failed to create employee', 'message' => 'please create employee database'], 400);
    //     } 
    // }

    // public function show(string $id)
    // {
    //     try {
    //         $employee =UsertableModal ::findOrFail($id);
    //         logger('d');
    //         return response()->json($employee);
    //         logger('e');
    //     } catch (ModelNotFoundException $e) {
    //         return response()->json(['error' => 'Employee not found', 'message' => 'employee not created'], 404);
    //     } 
    // }  


    // public function update(Request $request, string $id)
    // {
    //     try {
    //         $employee = UsertableModal ::findOrFail($id);
    //         $employee->update($request->all());
    //         return response()->json($employee);
    //     } catch (ModelNotFoundException $e) {
    //         return response()->json(['error' => 'Employee not found', 'message' => 'employee not created'], 404);
    //     } catch (QueryException $e) {
    //         return response()->json(['error' => 'Failed to update employee', 'message' => 'employee not created'], 400);
    //     } 
    // }

    // public function destroy(string $id)
    // {
    //     try {
    //         $employee = UsertableModal ::findOrFail($id);
    //         $employee->delete();
    //         return response()->json(['message' => 'Employee deleted']);
    //     } catch (ModelNotFoundException $e) {
    //         return response()->json(['error' => 'Employee not found', 'message' => 'not founf'], 404);
    //     } 
    // }


//////////////////////////////////////////////////////////////////////////////////////////////////////////////

    // public function index()
    // {
    //     try {
    //         $test = DB::table('usertablemodals')->select('id','name','phone','email')->get();
    //         // $request1 = UsertableModal::all()->get();
    //         logger('vsdvsdvsdvsvsdv');
    //         logger('a');
    //         return response()->json($test);
    //     } catch (Exception $e) {
    //         return response()->json(['error' => ' general unxpected not found issues', 'message' => 'not found'], 500);
    //     }
        
    // }


