<?php
/**
 * Created by PhpStorm.
 * User: alceste
 * Date: 09/05/20
 * Time: 21.30
 */

namespace App\Models\Derived;


use App\Models\Worklog;
use App\User;

class Customer
{
    private $user = null;

    public function __construct(User $user)
    {
        $this->user = $user;
        foreach ($user->getAttributes() as $key=>$attribute){
           $this->$key = $attribute;
        }
    }


    public function worklogs(){
        return $this->user->hasMany(Worklog::class,'user_id','id');
    }





}