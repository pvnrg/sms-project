<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;

use App\Tasks;
use App\User;

class DailyUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dailyUpdate:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
		if(Carbon::now()->startOfWeek()->format("Y-m-d") == Carbon::now()->format("Y-m-d") && date('H:00:00') == "13:00:00"){
			$this->createNew();
		}
		if(Carbon::now()->endOfWeek()->subDays(1)->format("Y-m-d") == Carbon::now()->format("Y-m-d") && date('H:00:00') == "13:00:00"){
			$this->freeEmployee();
		}
		
		
    }
	public function freeEmployee()
    {
		$tasks = Tasks::where('status','!=','closed')->get();
		foreach($tasks as $task){
			
			$start = strtotime(Carbon::now()->format("Y-m-d")." 10:00:00");
			$end =  strtotime(Carbon::now()->format("Y-m-d")." 13:00:00");
			
			$start2 = strtotime(Carbon::now()->subDays(1)->format("Y-m-d")." 15:00:00");
			$end2 =  strtotime(Carbon::now()->subDays(1)->format("Y-m-d")." 23:00:00");


			$arr = [date("Y-m-d H:i:s", rand($start, $end)),date("Y-m-d H:i:s", rand($start2, $end2))] ;
			$key = array_rand($arr);
		
			$task->status = 'closed';
			$task->closed_at = $arr[$key];
			$task->updated_at = $arr[$key];
			$task->save();
		}
	}
	public function createNew()
    {
		$admins = User::where('utype','!=','employee')->pluck('id');
		
		if(!is_array($admins)){
			$admins = [1];
		}
		
		$not_free_user = Tasks::where('status','!=','closed')->pluck('user_id')->toArray();
        $users = User::where('utype','=','employee')->where('status','=','active')->whereNotIn("id",array_filter($not_free_user))->get();
		
		$start = strtotime("09:00:00");
		$end =  strtotime("13:00:59");
		$randomDate = date("Y-m-d H:i:s",rand($start, $end));
		
		foreach($users as $usr){
			$admin_id = array_rand($admins);
			$data = array(
				'subject' => 'Php',
				'content' => 'Working from home',
				'created_by' => $admin_id,
				'updated_by' => $admin_id,
				'user_id' => $usr->id,
				'status' => 'open',
				'created_at' => $randomDate,
				'updated_at' => $randomDate,
			);
			
			$module = Tasks::create($data);
		}
	}
}
