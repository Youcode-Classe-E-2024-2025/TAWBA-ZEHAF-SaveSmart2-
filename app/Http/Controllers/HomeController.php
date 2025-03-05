<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Transaction;
use App\Models\SavingsGoal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Profile $profile){
        
        $transactions = Transaction::paginate(5);
        $totalAmount = Transaction::sum('amount');
       
        $lastTransaction = Transaction::latest()->first();
        $objectifinanciers = SavingsGoal::oldest()->first();
        $budgetOptimization = $this->optimizeBudget($totalAmount);
        session(['current_profile'=>$profile->id]);
        return view('home', compact('transactions','totalAmount','lastTransaction','objectifinanciers','budgetOptimization'));
    }

    public function affiche(Profile $profile){
        $goals = SavingsGoal::where('profile_id',$profile->id)->paginate(5);
        session(['current_profile'=>$profile->id]);
        return view('profilPersonnel', compact('goals'));
    }


    private function optimizeBudget($budget, $rules = ['besoins' => 50, 'envies' => 30, 'epargne' => 20]) {
        $allocation = [];
        foreach ($rules as $category => $percentage) {
            $allocation[$category] = ($budget * $percentage) / 100;
        }
        return $allocation;
    }
}