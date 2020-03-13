<?php
/**
 * Created by PhpStorm.
 * User: alceste
 * Date: 13/03/20
 * Time: 18.07
 */

namespace App\Http\Controllers\StandardRouting;


use App\Http\Controllers\Controller;
use App\Mail\RedisIsWorkingMessage;
use Illuminate\Support\Facades\Mail;

class RedisEmailController extends Controller
{
    public function sendMail(){
        $redisIsWorkingMessage = new RedisIsWorkingMessage();
        Mail::to('l.iaderosa@dotitsrl.it')->queue($redisIsWorkingMessage->from('redisnr@gymlog.com')->onQueue('redis'));
    }
}