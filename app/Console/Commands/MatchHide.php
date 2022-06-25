<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Match;
class MatchHide extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'match:hide';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Hide match before match start';

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
     * @return int
     */
    public function handle()
    {
        $matchs = Match::whereDate('date', date('Y-m-d'))->where('time', date('H:i' , strtotime('+5 minutes')))->get();
        foreach ($matchs as $match ){
            $match->update(['is_hide' => '1', 'is_active' => '0']);
        }
        /***
        //Mail Test
        
        $to = "zahidhasantopu@gmail.com";
        $subject = "My subject";
        $txt = "Hello world!";
        $headers = "From: akkhotech@gmail.com";

        mail($to,$subject,$txt,$headers);
         
        $this->info('Match Hide');
        ***/
        
    }
}
