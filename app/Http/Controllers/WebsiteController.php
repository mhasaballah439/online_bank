<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home(){
        $users = User::get();
        return view('welcome',compact('users'));
    }

    public function userAccounts(){
        $accounts = Account::where('user_id',auth()->user()->id)->get();
        return view('accounts',compact('accounts'));
    }

    public function userTransactions($id){
        $account = Account::where('user_id',$id)->first();
        return view('transactions',compact('account'));
    }

    public function updateBalance(Request $request){
        $transaction = Transaction::find($request->id);
        if ($transaction){
            $transaction->amount = $request->amount;
            $transaction->save();
            return response()->json([
                'status' => true,
                'id' => $request->id,
            ]);
        }
    }
    public function updateType(Request $request){
        $transaction = Transaction::find($request->id);
        if ($transaction){
            $transaction->type_id = $request->type_id;
            $transaction->save();
            return response()->json([
                'status' => true,
                'id' => $request->id,
            ]);
        }
    }
}
