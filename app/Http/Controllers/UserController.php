<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    const PR_BONUS = 0;
    const PR_OBJECT = 1;
    const PR_MONEY = 2;

    private function getPrize(array $avalPrizes = [self::PR_BONUS, self::PR_OBJECT, self::PR_MONEY])
    {
        switch (array_rand($avalPrizes)) {
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

    private function sendBonus()
    {
        return view("prizes.bonus", ['amount' => 500]);
    }

    private function sendObject()
    {
        return view("prizes.object");
    }

    private function sendMoney()
    {
        return view("prizes.money", ['amount' => 500]);
    }

    public function getPrizeAction()
    {
        return $this->getPrize();
    }
}
