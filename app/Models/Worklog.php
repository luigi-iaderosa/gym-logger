<?php
/**
 * Created by PhpStorm.
 * User: alceste
 * Date: 28/02/20
 * Time: 19.47
 */


namespace App\Models;
class Worklog extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'worklog';
    public $incrementing = false;
    public $timestamps = false;
    const PAGED_VIEW_ELEMENTS = 15;
    protected $guarded = ['id'];

    public static function view($take = null){
        return Worklog::with(['esercizio','unitaMisura'])->orderBy('data_worklog','desc')->take($take)->get();
    }

    public function esercizio(){
        return $this->hasOne(Esercizio::class,'id','esercizio_id');
    }

    public function unitaMisura(){
        return $this->hasOne(UnitaMisura::class, 'id','unita_misura');
    }

    public static function pagedView($page = 1){
        $pagedData =  Worklog::with(['esercizio','unitaMisura'])->orderBy('data_worklog','desc')->
            paginate(15,['*'],'page',$page);
        return $pagedData;
    }

    public static function countViewElements(){
        return  Worklog::orderBy('data_worklog','desc')->count();
    }

    public static function deleteById($worklogId){

        Worklog::where('id','=',$worklogId)->delete();

    }


}