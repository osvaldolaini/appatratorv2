<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

if (!function_exists('logging')) {
    //Log
    function logging($subject_id,$subject_type){
        if(Auth::user()->group == 'admin'){
            $logger = Activity::where('subject_id',$subject_id)
            ->where('subject_type',$subject_type)
            ->where('description','updated')->orderBy('id','desc')
            ->get(); //returns the last logged activity

            if($logger){
                $logs = '<div class="row">
                    <div class="col">
                        <ul class="list-group list-group-flush">';
                            foreach ($logger as $log){
                                $arr = array_merge(array_diff_assoc($log->properties['old'], $log->properties['attributes']), array_diff_assoc($log->properties['attributes'], $log->properties['old']));
                                $logs .='<li class="list-group-item">
                                    Modificado em '.date( 'd/m/Y H:i' , strtotime($log->updated_at)).
                                    ' por ' .loc_user($log->causer_id);
                                        if($arr){
                                            $logs .= '<br>Foram modificados : ';
                                            foreach ($arr as $key => $value){
                                                $logs .='<strong>['. $key .']</strong> para: '.$value.'; ' ;
                                            }
                                         }
                                         $logs .='</li>';
                            }
                            $logs .='</ul>
                    </div>
                </div>';
            }else{
                $logs = '';
            }
        }else{
            $logs = '';
        }
        return $logs;
    }
    function loc_user($id)
    {
        $user = User::select('name')->find($id);
        return $user->name;
    }
}

if (!function_exists('convertDate')) {
    function convertDate($date)
    {
        if ($date) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $date)
                ->format('d/m/Y H:i:s');
        } else {
            return '';
        }
    }
}
if (!function_exists('valueDB')) {
function valueDB($value)
    {
        if($value){
            str_replace(' ', '', $value);
            ltrim($value);
            $value = str_replace('.', '', $value);
            $value = str_replace(',', '.', $value);
            return str_replace(' ', '', $value);
        }
    }
}
if (!function_exists('minutesToHours')) {
    function minutesToHours($time)
    {
        $horas = floor($time / 60);
        $minutos = $time % 60;
        if($horas >=1 ){
            return sprintf('%02d:%02d', $horas,$minutos);
        }else{
            $horas = 0;
            return sprintf('%02d:%02d', $horas,$minutos);
        }
    }
}
if (!function_exists('hoursToMinutes')) {
    function hoursToMinutes($time)
    {
        $t = explode(':',$time);
        if($t[0] == 0){
            return $t[1];
        }else{
            return ($t[0]*60)+$t[1];
        }
    }
}
if (!function_exists('dayWeek')) {
    function dayWeek($day)
    {
        switch ($day) {
            case 1: return 'Segunda-feira'; break;
            case 2: return 'Terça-feira'; break;
            case 3: return 'Quarta-feira'; break;
            case 4: return 'Quinta-feira'; break;
            case 5: return 'Sexta-feira'; break;
            case 6: return 'Sabado'; break;
            case 7: return 'Domingo'; break;
        }
    }
}
if (!function_exists('convertDate')) {
    function convertDate($date)
    {
        if ($date) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $date)
                ->format('d/m/Y H:i:s');
        } else {
            return '';
        }
    }
}
if (!function_exists('convertOnlyDate')) {
    function convertOnlyDate($date)
    {
        if ($date) {

            return Carbon::createFromFormat('Y-m-d H:i:s', $date)
                ->format('d/m/Y');
        } else {
            return '';
        }
    }
}
if (!function_exists('convertOnlyTime')) {
    function convertOnlyTime($time, $unity)
    {
        if ($time) {
            if ($unity == 'min') {
                return Carbon::createFromFormat('Y-m-d H:i:s', $time)
                    ->format('i:s');
            } else {
                return Carbon::createFromFormat('Y-m-d H:i:s', $time)
                    ->format('H:i:s');
            }
        } else {
            return '';
        }
    }
}
if (!function_exists('convertTerm')) {
    function convertTerm($date)
    {
        $now = new DateTime(date('Y-m-d H:i:s'));
        $after = new DateTime($date);
        $dateInterval = $now->diff($after);

        if ($date) {
            return Carbon::createFromFormat('Y-m-d H:i:s', $date)
                ->format('d/m/Y H:i:s') . ' ( ' . $dateInterval->format('%R%a dias') . ' )';
        } else {
            return '';
        }
    }
}
if (!function_exists('application')) {
    function application($variable)
    {
        switch ($variable) {
            case 'questions':
                return 'Questões';
                break;
            case 'treinament':
                return 'Treinamento';
                break;
            case 'essay':
                return 'Redação';
                break;
            case 'mentoring':
                return 'Mentoria';
                break;

            default:
                # code...
                break;
        }
    }
}
if (!function_exists('statusEssay')) {
    function statusEssay($variable)
    {
        switch ($variable) {
            case 1:
                return 'Enviar';
                break;
            case 2:
                return 'Corrigindo...';
                break;
            case 3:
                return 'Corrigida';
                break;

            default:
                return 'Enviar';
                break;
        }
    }
}
if (!function_exists('statusEssayAdmin')) {
    function statusEssayAdmin($variable)
    {
        switch ($variable) {
            case 0:
                return 'Excluido';
                break;
            case 1:
                return 'Não enviado';
                break;
            case 2:
                return 'Corrigir';
                break;
            case 3:
                return 'Corrigida';
                break;

            default:
                return 'Não enviado';
                break;
        }
    }
}
