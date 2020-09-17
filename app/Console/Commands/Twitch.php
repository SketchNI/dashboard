<?php

namespace App\Console\Commands;

use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Console\Command;
use NewTwitchApi\HelixGuzzleClient;
use NewTwitchApi\NewTwitchApi;

class Twitch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'twitch:live';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get current Live Followers on Twitch.';

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
    public function handle(): int
    {
        try {
            $helix = new HelixGuzzleClient(config('services.twitch.key'));

            $api = new NewTwitchApi($helix, config('services.twitch.key'), config('services.twitch.secret'));

            $followers = $api->getUsersApi()
                ->getUsersFollows(config('services.twitch.token'), 64115778);

            $followers = json_decode($followers->getBody()->getContents());

            $ids = [];
            foreach($followers->data as $follower) {
                array_push($ids, $follower->to_id);
            }

            $response = $api
                ->getStreamsApi()
                ->getStreams(config('services.twitch.token'), $ids);

            $data = json_decode($response->getBody()->getContents());

            if ($data !== []) {
                $data = $data->data;
            } else {
                throw new Exception("[Twitch] No channels are live.");
            }

            event(new \App\Events\Twitch($data));

            $this->info('[Twitch] Fetched live channels.');
            return 0;
        } catch (Exception $e) {
            $this->error($e->getMessage());
            return -1;
        } catch ( GuzzleException $e ) {
            $this->error($e->getMessage());
            return -1;
        }
    }
}
