<?php

namespace App\Http\Controllers;

use App\Models\SavingGoal;
use App\Models\Profile;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class SavingGoalController extends Controller
{
    
    public function index()
    {
        $goals = SavingGoal::paginate(5);
        return view('savings_goals.index', compact('goals'));
    }

 
    public function create()
    {
        $profiles = Profile::all(); 
        return view('savings_goals.create', compact('profiles'));
    }

 
    public function store(Request $request)
    {
        
        $request->validate([
            'profile_id' => 'required|exists:profiles,id',
            'name' => 'required|string|max:255',
            'target_amount' => 'required|numeric|min:0',
            'saved_amount' => 'nullable|numeric|min:0',
            'deadline' => 'nullable|date|after_or_equal:today'
        ]);

        SavingGoal::create($request->all());

        return redirect()->route('savings_goals.index')->with('success', 'Objectif ajouté avec succès.');
    }


    public function show(SavingsGoal $savingsGoal)
    {
        return view('savings_goals.show', compact('savingsGoal'));
    }

 
    public function edit(SavingsGoal $savingsGoal)
    {
        $profiles = Profile::all();
        return view('savings_goals.edit', compact('savingsGoal', 'profiles'));
    }

    // Mettre à jour un objectif d'épargne
    public function update(Request $request, SavingsGoal $savingsGoal)
    {
        $request->validate([
            'profile_id' => 'required|exists:profiles,id',
            'name' => 'required|string|max:255',
            'target_amount' => 'required|numeric|min:0',
            'saved_amount' => 'nullable|numeric|min:0',
            'deadline' => 'nullable|date'
        ]);

        $savingsGoal->update($request->all());

        return redirect()->route('savings_goals.index')->with('success', 'Objectif mis à jour avec succès.');
    }

  
    public function destroy(SavingsGoal $savingsGoal)
    {
        $savingsGoal->delete();
        return redirect()->route('savings_goals.index')->with('success', 'Objectif supprimé avec succès.');
    }


    public function exportGoals(Request $request, Profile $profile = null)
    {
        // Vérifier si un profil spécifique est fourni
        if ($profile) {
            $goals = SavingsGoal::where('profile_id', $profile->id)->get();
            $csvFileName = 'goals_profile_' . $profile->id . '_' . date('Y-m-d_H-i-s') . '.csv';
        } else {
            $goals = SavingGoal::all();
            $csvFileName = 'all_goals_' . date('Y-m-d_H-i-s') . '.csv';
        }
    
        $headers = [
            "Content-Type" => "text/csv",
            "Content-Disposition" => "attachment; filename=$csvFileName"
        ];
    
        $callback = function () use ($goals) {
            $file = fopen('php://output', 'w');
    
            // Écrire l'en-tête du CSV
            fputcsv($file, ['ID', 'Nom', 'Montant Objectif', 'Montant Épargné', 'Date de Création', 'Profile ID']);
    
            // Écrire les données
            foreach ($goals as $goal) {
                fputcsv($file, [
                    $goal->id,
                    $goal->name,
                    $goal->target_amount,
                    $goal->saved_amount,
                    $goal->created_at,
                    $goal->profile_id
                ]);
            }
    
            fclose($file);
        };
    
        return response()->streamDownload($callback, $csvFileName, $headers);
    }
    // public function exportGoalsAsPdf(Request $request, Profile $profile = null)
    // {
    //     // Vérifier si un profil spécifique est fourni
    //     if ($profile) {
    //         $goals = SavingGoal::where('profile_id', $profile->id)->get();
    //         $pdfFileName = 'goals_profile_' . $profile->id . '_' . date('Y-m-d_H-i-s') . '.pdf';
    //     } else {
    //         $goals = SavingGoal::all();
    //         $pdfFileName = 'all_goals_' . date('Y-m-d_H-i-s') . '.pdf';
    //     }

    //     // Générer le PDF
    //     $pdf = PDF::loadView('pdf.goals', compact('goals'));

    //     // Retourner le PDF en téléchargement
    //     return $pdf->download($pdfFileName);
    // }
    public function exportGoalsAsPdf(Request $request, Profile $profile = null)
{
    // Vérifier si un profil spécifique est fourni
    if ($profile) {
        $goals = SavingGoal::where('profile_id', $profile->id)->get();
        $pdfFileName = 'goals_profile_' . $profile->id . '_' . date('Y-m-d_H-i-s') . '.pdf';
    } else {
        $goals = SavingGoal::all();
        $pdfFileName = 'all_goals_' . date('Y-m-d_H-i-s') . '.pdf';
    }

    // Générer le PDF
    $pdf = PDF::loadView('pdf.goals', compact('goals'));

    // Retourner le PDF en téléchargement
    return $pdf->download($pdfFileName);
}

}