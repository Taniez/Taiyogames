<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserWallet;
use App\Models\RedeemedCode;
use App\Models\user_wallet;
use App\Models\game;
use Illuminate\Http\Request;

class DonateController extends Controller
{
    public function index($userID, Request $redeemed)
    {
        // Check if the user has already redeemed this code
        $existingRedeem = RedeemedCode::where('user_id', $userID)
                                      ->where('code', $redeemed->redeemed)
                                      ->first();

        if ($existingRedeem) {
            return redirect()->back()->with('error', 'You have already used this redeem code.');
        }

        // If the code is valid and not used before
        if ($redeemed->redeemed == "Welcome_NewBie") {
            // Add coins to the user wallet
            $wallet = user_wallet::where('user_id', $userID)->first();

            if (!$wallet) {
                $wallet = new user_wallet;
                $wallet->user_id = $userID;
                $wallet->coin = 0;
            }

            $wallet->coin += 500;
            $wallet->save();

            // Store the redeemed code to prevent future use
            RedeemedCode::create([
                'user_id' => $userID,
                'code' => $redeemed->redeemed
            ]);

            return redirect('/user/favorite/' . $userID)->with('success', 'Code redeemed successfully!');
        } else {
            return redirect()->back()->with('error', 'Invalid Redeem Code');
        }
    }
    public function donateCoins(Request $request)
    {
        $userId = $request->input('user_id');  // Donor's user ID
        $donateAmount = $request->input('donate_money');
        $gameId = $request->input('game_id');  // The game ID the donation is for
    
        // Get user's wallet (the donor)
        $donorWallet = user_wallet::where('user_id', $userId)->first();
    
        // ตรวจสอบว่าผู้บริจาคมี wallet หรือไม่ ถ้าไม่มีให้สร้างใหม่
        if (!$donorWallet) {
            return redirect()->back()->withErrors(['Wallet not found for the user.']);
        }
    
        // Get the game and the game owner's wallet
        $game = game::find($gameId);
        $ownerId = $game->User->id;  // Game owner's user ID
    
        // Check if the user is trying to donate to their own game
        if ($userId == $ownerId) {
            return redirect()->back()->withErrors(['You cannot donate to your own game.']);
        }
    
        // Get the game owner's wallet
        $ownerWallet = user_wallet::where('user_id', $ownerId)->first();
    
        // ตรวจสอบว่าเจ้าของเกมมี wallet หรือไม่ ถ้าไม่มีให้สร้างใหม่
        if (!$ownerWallet) {
            $ownerWallet = new user_wallet;
            $ownerWallet->user_id = $ownerId;
            $ownerWallet->coin = 0;
        }
    
        // Check if the user has enough coins
        if ($donorWallet->coin < $donateAmount) {
            return redirect()->back()->withErrors(['Insufficient balance.']);
        }
    
        // Deduct coins from donor's wallet
        $donorWallet->coin -= $donateAmount;
        $donorWallet->save();
    
        // Add coins to the game owner's wallet
        $ownerWallet->coin += $donateAmount;
        $ownerWallet->save();
    
        // Add donation amount to user's donation history or track donations
        $user = User::find($userId);
        $user->total_donations += $donateAmount;  // Assuming total_donations column exists
        $user->save();
    
        // Check if user has donated more than 500 coins in total
        if ($user->total_donations >= 500 && $user->id_user_tier < 3) {  
            $user->id_user_tier += 1;
            $user->save();
        }

    
        // Success message
        return redirect()->back()->with('success', 'Thank you for your donation!');
    }
    
    
}
