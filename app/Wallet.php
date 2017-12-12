<?php

namespace Laraspace;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    public function create($wallet_id, $user_id)
    {
    	$this->id = $wallet_id;
    	$this->user_id = $user_id;
    	$this->balance = 0;
    	$this->save();
    }
}
