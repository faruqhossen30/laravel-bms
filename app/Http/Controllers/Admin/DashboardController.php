<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bet;
use App\Models\Deposit;
use App\Models\Withdraw;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:Dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $userCount = User::where('is_admin', NULL)->where('is_club', NULL)->count();
        //Bets
        $totalBet = Bet::whereMonth('created_at', date('m'))->sum('predict_amount');
        $totalLoss = Bet::whereMonth('created_at', date('m'))->where('status', 'loss')->sum('predict_amount');
        $totalWin = Bet::whereMonth('created_at', date('m'))->where('status', 'win')->sum('predict_amount');
        //Commision
        $totalClubCommission = Bet::whereMonth('created_at', date('m'))->sum('club_commission');
        $totalSponsorCommission = Bet::whereMonth('created_at', date('m'))->sum('sponsor_commission');
        $totalCommission = $totalSponsorCommission + $totalClubCommission;
        //Sum
        $totalIncome = $totalBet - ($totalWin + $totalCommission);
        $clubBalance = User::where('is_admin', NULL)->where('is_club', '1')->sum('balance');
        $userBalance = User::where('is_admin', NULL)->where('is_club', NULL)->sum('balance');
        $totalDeposit = Deposit::whereMonth('created_at', date('m'))->where('status', 'complete')->sum('amount');
        $totalWithdraw = Withdraw::whereMonth('created_at', date('m'))->where('status', 'complete')->sum('amount');

        return view(
            'admin.dashboard',
            compact(
                'userCount',
                'totalBet',
                'totalWin',
                'totalLoss',
                'totalIncome',
                'clubBalance',
                'userBalance',
                'totalDeposit',
                'totalWithdraw'
            )
        );
    }

    public function balance()
    {
        // $userCount = User::where('is_admin', NULL)->where('is_club', NULL)->count();
        //Bets
        $totalBet = Bet::whereMonth('created_at', date('m'))->sum('predict_amount');
        $totalLoss = Bet::whereMonth('created_at', date('m'))->where('status', 'loss')->sum('predict_amount');
        $totalWin = Bet::whereMonth('created_at', date('m'))->where('status', 'win')->sum('predict_amount');
        //Commision
        $totalClubCommission = Bet::whereMonth('created_at', date('m'))->sum('club_commission');
        $totalSponsorCommission = Bet::whereMonth('created_at', date('m'))->sum('sponsor_commission');
        $totalCommission = $totalSponsorCommission + $totalClubCommission;
        //Sum
        $totalIncome = $totalBet - ($totalWin + $totalCommission);
        $clubBalance = User::where('is_admin', NULL)->where('is_club', '1')->sum('balance');
        $userBalance = User::where('is_admin', NULL)->where('is_club', NULL)->sum('balance');
        $totalDeposit = Deposit::whereMonth('created_at', date('m'))->where('status', 'complete')->sum('amount');
        $totalWithdraw = Withdraw::whereMonth('created_at', date('m'))->where('status', 'complete')->sum('amount');


        // $totalDeposit = Deposit::whereYear('created_at', date('Y'))->whereMonth('created_at', date('m'))->where('status', 'complete')->sum('amount');
        // $totalDeposit = Deposit::whereMonth('created_at', 07)->where('status', 'complete')->sum('amount');
        // $totalDeposit = Deposit::where('status', 'complete')->count();
        // return $totalDeposit;



        return view('admin.balance',
            compact(
                'totalBet',
                'totalWin',
                'totalLoss',
                'totalIncome',
                'clubBalance',
                'userBalance',
                'totalDeposit',
                'totalWithdraw'
            )
        );
    }
}
