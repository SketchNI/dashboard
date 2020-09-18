<?php

namespace App\Console\Commands\Mail;

use App\Events\Email;
use Carbon\Carbon;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class UKBlabberbox extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:ukbb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch new mail from UKBlabberbox.';

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
        try {
            $server = imap_open(
                "{mail.ukblabberbox.co.uk:993/imap/ssl}INBOX",
                "d.freeburn@ukblabberbox.co.uk",
                config('services.ukblabberbox.password')
            );

            $unread_mails = imap_search($server, 'UNSEEN');

            if ( !$unread_mails || sizeof($unread_mails) === 0 ) {
                event(new Email("ukblabberbox", null));
                $this->info('[UKBlabberbox] No new messages.');
                return 0;
            }

            $mails = [];
            foreach ( $unread_mails as $mail ) {
                $m = imap_fetch_overview($server, $mail);

                if ( sizeof($m) === 1 ) {
                    $m = $m[0];
                } else {
                    throw new Exception('[UKBlabberbox] Message could not be found.');
                }

                array_push($mails, [
                    'from' => imap_utf8($m->from),
                    'subject' => imap_utf8($m->subject),
                    'date' => Carbon::createFromFormat("D, d M Y H:i:s O", $m->date)->diffForHumans()
                ]);
            }

            event(new Email("ukblabberbox", array_reverse($mails)));
            Cache::put('ukblabberbox', json_encode($mails), Carbon::now()->addMinutes(2));

            $this->info('[UKBlabberbox] Mail fetched successfully.');
            return 0;
        } catch ( Exception $e ) {
            $this->error($e->getMessage());

            return -1;
        }
    }
}
