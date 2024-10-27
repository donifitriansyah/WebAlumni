<?php

namespace App\Http\Controllers\TracerStudy;

use App\Http\Controllers\Controller;
use App\Models\Alumni;
use App\Models\DataJawaban;
use App\Models\Pertanyaan;
use App\Models\TracerStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TracerController extends Controller
{
    public function showForm()
    {
        // Retrieve all tracer study questions
        $pertanyaan = Pertanyaan::all();

        // Assuming each alumni is logged in and you want to retrieve their record
        $id_alumni = Auth::user()->alumni->id_alumni ?? null;

        return view('pages.alumni.tracer', compact('pertanyaan', 'id_alumni'));
    }


    public function store(Request $request)
{
    try {
        // Log the incoming request data for debugging
        Log::info('Store method called with request data: ', $request->all());

        // Validate incoming request data
        $validatedData = $request->validate([
            'id_alumni' => 'required|exists:alumni,id_alumni',
            'jawaban' => 'required|array', // Array of question IDs and answers
            'jawaban.*' => 'required', // Ensure each answer is provided
        ]);

        // Log validated data
        Log::info('Validated data: ', $validatedData);

        // Start a database transaction
        DB::beginTransaction();

        foreach ($validatedData['jawaban'] as $id_pertanyaan => $jawaban) {
            // Log each response item being processed
            Log::info('Processing response: ', [
                'id_pertanyaan' => $id_pertanyaan,
                'jawaban' => $jawaban,
            ]);

            // Insert data into `data_jawaban` table
            $dataJawaban = DataJawaban::create([
                'id_alumni' => $validatedData['id_alumni'],
                'id_pertanyaan' => $id_pertanyaan,
                'jawaban_terbuka' => is_string($jawaban) ? $jawaban : null,
                'jawaban_skala' => is_numeric($jawaban) ? $jawaban : null, // Handle both types of answers
            ]);

            // Log data_jawaban insert result
            Log::info('DataJawaban created: ', ['id' => $dataJawaban->id]);
        }

        // Update alumni status to 'aktif'
        Alumni::where('id_alumni', $validatedData['id_alumni'])->update(['status' => 'aktif']);

        // Commit the transaction
        DB::commit();

        // Redirect to tracer.index with success message
        return redirect()->route('tracer.index')->with('success', 'Responses saved successfully and status updated to aktif');
    } catch (\Exception $e) {
        // Rollback if there is any error
        DB::rollBack();

        // Log exception details
        Log::error('Failed to save responses: ', [
            'error' => $e->getMessage(),
            'trace' => $e->getTraceAsString()
        ]);

        // Redirect to tracer.index with error message
        return redirect()->route('tracer.index')->with('error', 'Failed to save responses');
    }
}

}
