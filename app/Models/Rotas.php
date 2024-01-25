<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class Rotas extends Model
{

    protected $fillable = [        
        'user_id',
        'issued_by',
        'rotas_date',
        'start_time',
        'end_time',
        'break_time',
        'time_diff_in_minut',
        'role_id',
        'location_id',
        'note',
        'publish',
        'shift_status',
        'shift_cancel_employee_msg',
        'shift_cancel_owner_msg',
        'create_by'
    ];

    public function getrotauser()
    {
        return $this->HasOne('App\Models\User','id','user_id');
    }

    public function getrotarole()
    {
        return $this->HasOne('App\Models\Role','id','role_id');
    }

    public function getrotalocation()
    {
        return $this->HasOne('App\Models\Location','id','location_id');
    }

    public static function getLocatioWiseUser($location_id = 0, $user_id = 0, $role_id = 0)
    {
        $userId = Auth::id();
        $user = Auth::user();
        $created_by = $user->get_created_by();        
        $role_where = ' 0 = 0 ';
        if($role_id != 0)
        {
            $role_where = 'FIND_IN_SET('.$role_id.',role_id)';
        }

        if($user_id != 0)
        {
            $employees = Employee::where('is_delete', '0')->Where('id', $user_id)->get();
        }
        else
        {
            $employees = Employee::where('is_delete', '0')->where('created_by', $created_by)->orWhere('id', $created_by)->get();
        }
        
        $employee_data = [];
        if(count($employees) != 0)
        {
            foreach($employees as $key=>$employee)
            {
                $profiles = Profile::where('user_id',$employee->id)->whereRaw('FIND_IN_SET('.$location_id.',location_id)')->whereRaw($role_where)->get()->toArray();
                if(count($profiles) != 0) {
                    $employee->full_name = $employee['first_name'].' '.$employee['last_name'];
                    $employee_data[$key] = $employee;
                }
            }
        }
        return $employee_data;
    }

    public static function getWeekArray($date_formate = 'Y-m-d',$week = 0,$start_day = 'monday')
    {
        $days_name['monday'] = 0;
        $days_name['tuesday'] = 1;
        $days_name['wednesday'] = 2;
        $days_name['thursday'] = 3;
        $days_name['friday'] = 4;
        $days_name['saturday'] = 5;
        $days_name['sunday'] = 6;        
        $week = $week + $days_name[$start_day];
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday this week')));
        return $week_date;
    }
    
    public static function gettwoWeekArray($date_formate = 'Y-m-d',$week = 0,$start_day = 'monday')
    {
        $days_name['monday'] = 0;
        $days_name['tuesday'] = 1;
        $days_name['wednesday'] = 2;
        $days_name['thursday'] = 3;
        $days_name['friday'] = 4;
        $days_name['saturday'] = 5;
        $days_name['sunday'] = 6;  
        $days_name['monday2'] = 7;
        $days_name['tuesday2'] = 8;
        $days_name['wednesday2'] = 9;
        $days_name['thursday2'] = 10;
        $days_name['friday2'] = 11;
        $days_name['saturday2'] = 12;
        $days_name['sunday2'] = 13;   

        // return $days_name;
        
        $week = $week + $days_name[$start_day];
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday next week')));
        return $week_date;
    }

    public static function getthreeWeekArray($date_formate = 'Y-m-d',$week = 0,$start_day = 'monday')
    {
        $days_name['monday'] = 0;
        $days_name['tuesday'] = 1;
        $days_name['wednesday'] = 2;
        $days_name['thursday'] = 3;
        $days_name['friday'] = 4;
        $days_name['saturday'] = 5;
        $days_name['sunday'] = 6;  
        $days_name['monday2'] = 7;
        $days_name['tuesday2'] = 8;
        $days_name['wednesday2'] = 9;
        $days_name['thursday2'] = 10;
        $days_name['friday2'] = 11;
        $days_name['saturday2'] = 12;
        $days_name['sunday2'] = 13;   
        $days_name['monday3'] = 14;
        $days_name['tuesday3'] = 15;
        $days_name['wednesday3'] = 16;
        $days_name['thursday3'] = 17;
        $days_name['friday3'] = 18;
        $days_name['saturday3'] = 19;
        $days_name['sunday3'] = 20;  

        // return $days_name;
        
        $week = $week + $days_name[$start_day];
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday next week next week')));
        return $week_date;
    }
    
    public static function getfourWeekArray($date_formate = 'Y-m-d',$week = 0,$start_day = 'monday')
    {
        $days_name['monday'] = 0;
        $days_name['tuesday'] = 1;
        $days_name['wednesday'] = 2;
        $days_name['thursday'] = 3;
        $days_name['friday'] = 4;
        $days_name['saturday'] = 5;
        $days_name['sunday'] = 6;  
        $days_name['monday2'] = 7;
        $days_name['tuesday2'] = 8;
        $days_name['wednesday2'] = 9;
        $days_name['thursday2'] = 10;
        $days_name['friday2'] = 11;
        $days_name['saturday2'] = 12;
        $days_name['sunday2'] = 13;   
        $days_name['monday3'] = 14;
        $days_name['tuesday3'] = 15;
        $days_name['wednesday3'] = 16;
        $days_name['thursday3'] = 17;
        $days_name['friday3'] = 18;
        $days_name['saturday3'] = 19;
        $days_name['sunday3'] = 20;  
        $days_name['monday3'] = 21;
        $days_name['tuesday3'] = 22;
        $days_name['wednesday3'] = 23;
        $days_name['thursday3'] = 24;
        $days_name['friday3'] = 25;
        $days_name['saturday3'] = 26;
        $days_name['sunday3'] = 27; 

        // return $days_name;
        
        $week = $week + $days_name[$start_day];
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday  next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday next week next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday next week next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday next week next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday next week next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday next week next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday next week next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday next week next week next week')));
        return $week_date;
    }



    public static function getsecondweekArray($date_formate = 'Y-m-d',$week = 0,$start_day = 'monday')
    {
        $days_name['monday'] = 0;
        $days_name['tuesday'] = 1;
        $days_name['wednesday'] = 2;
        $days_name['thursday'] = 3;
        $days_name['friday'] = 4;
        $days_name['saturday'] = 5;
        $days_name['sunday'] = 6;  
        // $days_name['monday2'] = 7;
        // $days_name['tuesday2'] = 8;
        // $days_name['wednesday2'] = 9;
        // $days_name['thursday2'] = 10;
        // $days_name['friday2'] = 11;
        // $days_name['saturday2'] = 12;
        // $days_name['sunday2'] = 13;   

        // return $days_name;
        
        $week = $week + $days_name[$start_day];
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday next week')));
        return $week_date;
    }

    public static function getthirdweekArray($date_formate = 'Y-m-d',$week = 0,$start_day = 'monday')
    {
        $days_name['monday'] = 0;
        $days_name['tuesday'] = 1;
        $days_name['wednesday'] = 2;
        $days_name['thursday'] = 3;
        $days_name['friday'] = 4;
        $days_name['saturday'] = 5;
        $days_name['sunday'] = 6;  
        // $days_name['monday2'] = 7;
        // $days_name['tuesday2'] = 8;
        // $days_name['wednesday2'] = 9;
        // $days_name['thursday2'] = 10;
        // $days_name['friday2'] = 11;
        // $days_name['saturday2'] = 12;
        // $days_name['sunday2'] = 13;   

        // return $days_name;
        
        $week = $week + $days_name[$start_day];
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday +14 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday +14 days')));
        return $week_date;
    }

    public static function getthirdweekArraytwo($date_formate = 'Y-m-d',$week = 0,$start_day = 'monday')
    {
        $days_name['monday'] = 0;
        $days_name['tuesday'] = 1;
        $days_name['wednesday'] = 2;
        $days_name['thursday'] = 3;
        $days_name['friday'] = 4;
        $days_name['saturday'] = 5;
        $days_name['sunday'] = 6;  
        // $days_name['monday2'] = 7;
        // $days_name['tuesday2'] = 8;
        // $days_name['wednesday2'] = 9;
        // $days_name['thursday2'] = 10;
        // $days_name['friday2'] = 11;
        // $days_name['saturday2'] = 12;
        // $days_name['sunday2'] = 13;   

        // return $days_name;
        
        $week = $week + $days_name[$start_day];
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday next week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday +14 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday +14 days')));
        return $week_date;
    }

    public static function getthirdweekArraytrio($date_formate = 'Y-m-d',$week = 0,$start_day = 'monday')
    {
        $days_name['monday'] = 0;
        $days_name['tuesday'] = 1;
        $days_name['wednesday'] = 2;
        $days_name['thursday'] = 3;
        $days_name['friday'] = 4;
        $days_name['saturday'] = 5;
        $days_name['sunday'] = 6;  
        // $days_name['monday2'] = 7;
        // $days_name['tuesday2'] = 8;
        // $days_name['wednesday2'] = 9;
        // $days_name['thursday2'] = 10;
        // $days_name['friday2'] = 11;
        // $days_name['saturday2'] = 12;
        // $days_name['sunday2'] = 13;   

        // return $days_name;
        
        $week = $week + $days_name[$start_day];
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday next week next week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday +14 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday +14 days')));
        return $week_date;
    }

    public static function getfourweekArraysolo($date_formate = 'Y-m-d',$week = 0,$start_day = 'monday')
    {
        $days_name['monday'] = 0;
        $days_name['tuesday'] = 1;
        $days_name['wednesday'] = 2;
        $days_name['thursday'] = 3;
        $days_name['friday'] = 4;
        $days_name['saturday'] = 5;
        $days_name['sunday'] = 6;  
        // $days_name['monday2'] = 7;
        // $days_name['tuesday2'] = 8;
        // $days_name['wednesday2'] = 9;
        // $days_name['thursday2'] = 10;
        // $days_name['friday2'] = 11;
        // $days_name['saturday2'] = 12;
        // $days_name['sunday2'] = 13;   

        // return $days_name;
        
        $week = $week + $days_name[$start_day];
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday +14 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday +14 days')));
        return $week_date;
    }

    public static function getfourweekArrayduo($date_formate = 'Y-m-d',$week = 0,$start_day = 'monday')
    {
        $days_name['monday'] = 0;
        $days_name['tuesday'] = 1;
        $days_name['wednesday'] = 2;
        $days_name['thursday'] = 3;
        $days_name['friday'] = 4;
        $days_name['saturday'] = 5;
        $days_name['sunday'] = 6;  
        // $days_name['monday2'] = 7;
        // $days_name['tuesday2'] = 8;
        // $days_name['wednesday2'] = 9;
        // $days_name['thursday2'] = 10;
        // $days_name['friday2'] = 11;
        // $days_name['saturday2'] = 12;
        // $days_name['sunday2'] = 13;   

        // return $days_name;
        
        $week = $week + $days_name[$start_day];
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday next week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday +14 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday +14 days')));
        return $week_date;
    }

    public static function getfourweekArrayquadra($date_formate = 'Y-m-d',$week = 0,$start_day = 'monday')
    {
        $days_name['monday'] = 0;
        $days_name['tuesday'] = 1;
        $days_name['wednesday'] = 2;
        $days_name['thursday'] = 3;
        $days_name['friday'] = 4;
        $days_name['saturday'] = 5;
        $days_name['sunday'] = 6;  
        // $days_name['monday2'] = 7;
        // $days_name['tuesday2'] = 8;
        // $days_name['wednesday2'] = 9;
        // $days_name['thursday2'] = 10;
        // $days_name['friday2'] = 11;
        // $days_name['saturday2'] = 12;
        // $days_name['sunday2'] = 13;   

        // return $days_name;
        
        $week = $week + $days_name[$start_day];
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday next week next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday next week next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday next week next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday next week next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday next week next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday next week next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday next week next week next week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday +14 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday +14 days')));
        return $week_date;
    }

    public static function getfourweekArraytrio($date_formate = 'Y-m-d',$week = 0,$start_day = 'monday')
    {
        $days_name['monday'] = 0;
        $days_name['tuesday'] = 1;
        $days_name['wednesday'] = 2;
        $days_name['thursday'] = 3;
        $days_name['friday'] = 4;
        $days_name['saturday'] = 5;
        $days_name['sunday'] = 6;  
        // $days_name['monday2'] = 7;
        // $days_name['tuesday2'] = 8;
        // $days_name['wednesday2'] = 9;
        // $days_name['thursday2'] = 10;
        // $days_name['friday2'] = 11;
        // $days_name['saturday2'] = 12;
        // $days_name['sunday2'] = 13;   

        // return $days_name;
        
        $week = $week + $days_name[$start_day];
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday next week next week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday +7 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday +14 days')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday +14 days')));
        return $week_date;
    }

    public static function secondweeksolo($date_formate = 'Y-m-d',$week = 0,$start_day = 'monday' )
    {
        $days_name['monday'] = 0;
        $days_name['tuesday'] = 1;
        $days_name['wednesday'] = 2;
        $days_name['thursday'] = 3;
        $days_name['friday'] = 4;
        $days_name['saturday'] = 5;
        $days_name['sunday'] = 6;  
        $days_name['monday2'] = 7;
        $days_name['tuesday2'] = 8;
        $days_name['wednesday2'] = 9;
        $days_name['thursday2'] = 10;
        $days_name['friday2'] = 11;
        $days_name['saturday2'] = 12;
        $days_name['sunday2'] = 13;   

        // return $days_name;
        
        $week = $week + $days_name[$start_day];
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday next week')));
        return $week_date;
    }

    public static function thirdweeksolo($date_formate = 'Y-m-d',$week = 0,$start_day = 'monday' )
    {
        $days_name['monday'] = 0;
        $days_name['tuesday'] = 1;
        $days_name['wednesday'] = 2;
        $days_name['thursday'] = 3;
        $days_name['friday'] = 4;
        $days_name['saturday'] = 5;
        $days_name['sunday'] = 6;  
        $days_name['monday2'] = 7;
        $days_name['tuesday2'] = 8;
        $days_name['wednesday2'] = 9;
        $days_name['thursday2'] = 10;
        $days_name['friday2'] = 11;
        $days_name['saturday2'] = 12;
        $days_name['sunday2'] = 13;   
        $days_name['monday2'] = 14;
        $days_name['tuesday2'] = 15;
        $days_name['wednesday2'] = 16;
        $days_name['thursday2'] = 17;
        $days_name['friday2'] = 18;
        $days_name['saturday2'] = 19;
        $days_name['sunday2'] = 20; 

        // return $days_name;
        
        $week = $week + $days_name[$start_day];
        // print_r($week);
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday next week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday next week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday next week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday next week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday next week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday next week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday this week ')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday next week next week')));
        return $week_date;
    }

    public static function fourweeksolo($date_formate = 'Y-m-d',$week = 0,$start_day = 'monday' )
    {
        $days_name['monday'] = 0;
        $days_name['tuesday'] = 1;
        $days_name['wednesday'] = 2;
        $days_name['thursday'] = 3;
        $days_name['friday'] = 4;
        $days_name['saturday'] = 5;
        $days_name['sunday'] = 6;  
        $days_name['monday2'] = 7;
        $days_name['tuesday2'] = 8;
        $days_name['wednesday2'] = 9;
        $days_name['thursday2'] = 10;
        $days_name['friday2'] = 11;
        $days_name['saturday2'] = 12;
        $days_name['sunday2'] = 13;   
        $days_name['monday2'] = 14;
        $days_name['tuesday2'] = 15;
        $days_name['wednesday2'] = 16;
        $days_name['thursday2'] = 17;
        $days_name['friday2'] = 18;
        $days_name['saturday2'] = 19;
        $days_name['sunday2'] = 20; 

        // return $days_name;
        
        $week = $week + $days_name[$start_day];
        // print_r($week);
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday this week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday next week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday next week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday next week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday next week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday next week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday next week')));
        // $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday this week ')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday this week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('monday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('tuesday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('wednesday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('thursday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('friday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('saturday next week next week')));
        $week_date[] = date($date_formate, strtotime($week."day",strtotime('sunday next week next week')));
        return $week_date;
    }

    public static function customDatesrange($date1, $date2, $format = 'd-m-Y')
    {
        $dates = array();
        $current = strtotime($date1);
        $date2 = strtotime($date2);
        $stepVal = '+1 day';
        while ($current <= $date2) {
            $dates[] = date($format, $current);
            $current = strtotime($stepVal, $current);
        }
        return $dates;
    }

    public static function getdaterotas($date = 0, $user_id = 0, $location_id = 0, $role_id = 0)
    {
        $data = '';        
        if($user_id != 0 && $date != 0)
        {
            $location_id_where = ' 0 = 0 ';
            if($location_id != 0)
            {
                $location_id_where = ' location_id =  "'.$location_id.'"';
            }

            $role_id_where = ' 0 = 0 ';
            if($role_id != 0)
            {
                $role_id_where = ' role_id =  '.$role_id;
            }
            
            $rotas = Rotas::whereRaw('rotas_date = "'.$date.'"')->whereRaw('user_id = '.$user_id.'')->whereRaw($location_id_where)->whereRaw($role_id_where)->get();            
            
            if(!empty($rotas))
            {
                $numItems = count($rotas);
                $i = 0;
                foreach($rotas as $rota)
                {                    
                    $time = $rota['start_time'] .'-'. $rota['end_time'];                                        
                    $role_name = '';                    
                    if($rota->role_id != 0)
                    {
                        $role = Role::where('id',$rota->role_id)->first();                        
                        $role_name = '<br><span>'.$role['name'].'</span>';
                    }
                    else
                    {
                        $role_name = '<br><span>'.__('Without role').'</span>';
                    }

                    $hr = '<hr>';
                    if(++$i === $numItems) {
                        $hr = '';
                    }
                    $data .= '<span>'.$time.' </span>'.$role_name.$hr;
                }
            }
            
        }
        return (!empty($data)) ? $data : '-' ;
    }

    public static function rota_cost($rota = [])
    {        
        $data = Report::rota_chart($rota)['hour_cost'];
        $price = User::priceFormat($data);
        return $price;
    }

    public static function userprofile($id = '')
    {
        $profile_pic = '';
        $profile_pic_path = 'uploads/profile_pic/avatar.png';
        $default_profile_pic = $profile_pic_path;        
        if(!empty($id)) {
            $profile = Profile::where('user_id', $id)->first();            
            if(!empty($profile) && !empty($profile->profile_pic))
            {
                $default_profile_pic = $profile->profile_pic;
            }
        }        
        return $default_profile_pic;
    }

    public static function getdaterotasreport($date = '' ,$id = '', $location_id = '', $role_id = 0)
    {
     
        if($date == '' && $id == '' && $location_id == '')
        {
            return '';
        }
        
        $user = User::find($id);

        $rotas_query = Rotas::Where('user_id',$id)->Where('rotas_date',$date);
        if($role_id != 0)
        {
            $rotas_query = $rotas_query->Where('role_id',$role_id);   
        }
        if($location_id != '')
        {
            $rotas_query = $rotas_query->Where('location_id',$location_id);
        }

        $tr = '';

        $rotas = $rotas_query->where('publish', 1)->where('shift_status', 'enable')->get();

        if(!empty($rotas) && count($rotas) > 0)
        {
            foreach ($rotas as $key => $rota) {                
                $Role = Role::find($rota->role_id);
                $clr = '';
                $clr = 'style="background-color:#eeeeee"';
                if(!empty($Role))
                {
                    $clr = 'style="background-color:'.$Role->color.'"';                    
                }

                $td1 = '<td >'.date('D d F Y', strtotime($date)).'</td>';                
                $td2 = '<td '.$clr.'>'.$user->first_name.'</td>';
                $td3 = '<td '.$clr.'>'.$rota->note.'</td>';
                $td4 = '<td '.$clr.'>'.date('h:i A', strtotime($rota->start_time)).'</td>';
                $td5 = '<td '.$clr.'>'.date('h:i A', strtotime($rota->end_time)).'</td>';
                $tr .= '<tr style="border-bottom: 2px solid #000;">'.$td1.$td2.$td3.$td4.$td5.'</tr>';                
            }
        }
        return $tr;
    }
}