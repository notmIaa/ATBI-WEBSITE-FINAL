<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Incubatee;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class IncubateeController extends Controller
{
    public function index()
    {
        $incubatees = Incubatee::with('products')->get();
        return view('admin.incubatee', compact('incubatees'));
    }

    public function create()
    {
        return view('admin.incubatee_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'incubatee_name' => 'required|string|max:255',
            'business_name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Image is optional
        ]);
    
        $incubatee = new Incubatee();
        $incubatee->incubatee_name = $request->incubatee_name;
        $incubatee->business_name = $request->business_name;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('incubatees', 'public');
            $incubatee->image = $imagePath;
        }
    
        $incubatee->save();

        return redirect()->route('incubatee.index')->with('success', 'Incubatee created successfully.');
    }
    
    

    public function edit(Incubatee $incubatee)
    {
        return view('admin.incubatee_edit', compact('incubatee'));
    }

    public function update(Request $request, $id)
    {
        $existingIncubatee = Incubatee::where('incubatee_name', $request->incubatee_name)
                                       ->where('id', '!=', $id)
                                       ->first();
    
        if ($existingIncubatee) {
            return redirect()->back()->with('error', 'The incubatee name is already taken.');
        }

        $incubatee = Incubatee::find($id);
        $incubatee->incubatee_name = $request->incubatee_name;
        $incubatee->business_name = $request->business_name;
    
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('incubatees', 'public');
            $incubatee->image = $imagePath;
        }
    
        $incubatee->save();
    
        return redirect()->route('incubatee.index')->with('success', 'Incubatee updated successfully.');
    }
    
    public function destroy(Incubatee $incubatee)
    {
        if ($incubatee->image) {
        Storage::disk('public')->delete($incubatee->image);
        }

        $incubatee->delete();

        return redirect()->route('incubatee.index')->with('success', 'Incubatee and image deleted successfully');
    }

    public function getDetails(Request $request)
    {
    $incubatee = Incubatee::where('incubatee_name', $request->incubatee_name)->first();

    if ($incubatee) {
        return response()->json([
            'status' => 'success',
            'data' => [
                'image' => $incubatee->image,
                'business_name' => $incubatee->business_name,
            ],
        ]);
    }

    return response()->json(['status' => 'error', 'message' => 'Incubatee not found.']);
    }

    public function show($id)
    {
        $incubatee = Incubatee::with('products')->findOrFail($id);
        return view('admin.incubatees_show', compact('incubatee'));
    }

    public function search(Request $request)
    {
        $term = $request->input('term');
        $incubatees = Incubatee::where('incubatee_name', 'LIKE', '%' . $term . '%')->get();
    
        return response()->json($incubatees->map(function ($incubatee) {
            return [
                'id' => $incubatee->id,
                'label' => $incubatee->incubatee_name,
                'value' => $incubatee->incubatee_name,
            ];
        }));
    }
    
}
