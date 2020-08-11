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
        switch (rand(0,2)){//array_rand($avalPrizes)) {
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
        return view("prizes.bonus");
    }

    private function sendObject()
    {
        return view("prizes.object");
    }

    private function sendMoney()
    {
        return view("prizes.money");
    }

    public function getPrizeAction()
    {
        return $this->getPrize();
    }
}
