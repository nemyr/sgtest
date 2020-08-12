<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class UserController extends Controller
{
    const PR_BONUS = 0;
    const PR_OBJECT = 1;
    const PR_MONEY = 2;

    private function getPrize(array $avalPrizes = [self::PR_BONUS, self::PR_OBJECT, self::PR_MONEY])
    {
//        switch (array_rand($avalPrizes)) {
        switch (0) {
            case 0:
                return $this->sendBonus();
            case 1:
                return $this->sendObject();
            case 2:
                return $this->sendMoney();
            default:
                return view("user.index");
        }
    }

    private function getAmount($prize){
        $interval = new Models\PrizeIntervals();
        $intervalData = $interval->where('prize_name', '=', $prize)->first();
        return ['amount' => rand($intervalData->min, $intervalData->max)];
    }

    private function sendBonus()
    {
        return view("prizes.bonus", $this->getAmount('bonus'));
    }

    private function sendObject()
    {
        return view("prizes.object");
    }

    private function sendMoney()
    {

        return view("prizes.money", $this->getAmount('money'));
    }

    public function getPrizeAction()
    {
        return $this->getPrize();
    }
}
