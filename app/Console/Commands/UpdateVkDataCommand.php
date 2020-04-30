<?php

namespace App\Console\Commands;

use App\Helpers\YandexMaps;
use App\Models\RussiaData;
use App\Models\RussiaRegionsData;
use App\Models\WorldData;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class UpdateVkDataCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vk:update';

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

        $client = new Client();
        $response = $client->request('GET', 'https://corona.w83.vkforms.ru/data.json');

        $response = json_decode(
            $response
                ->getBody()
                ->getContents()
        );

        $world = $response->world;
        if ($world) {
            WorldData::query()->truncate();
            WorldData::create([
                'infected' => $world->infected[0],
                'recovered' => $world->recovered[0],
                'dead' => $world->dead[0],
                'chart_total' => join(';', $world->chart_total->data),
                'chart_diff' => join(';', $world->chart_diff->data),
            ]);
        }

        $russia = $response->russia;
        if ($russia) {
            RussiaData::query()->truncate();
            RussiaData::create([
                'infected' => $russia->infected[0],
                'recovered' => $russia->recovered[0],
                'dead' => $russia->dead[0],
                'chart_total' => join(';', $russia->chart_total->data),
                'chart_diff' => join(';', $russia->chart_diff->data),
            ]);
        }

        $russiaRegions = $response->russia_top;

        if (is_array($russiaRegions)) {
            RussiaRegionsData::query()->truncate();
            foreach ($russiaRegions as $item) {
                $region = RussiaRegionsData::where('slug', '=', $item->slug)->first();

                if ($region) {
                    $region->update([
                        'total' => $item->total,
                        'new' => $item->new,
                    ]);
                } else {
                    RussiaRegionsData::create([
                        'total' => $item->total,
                        'new' => $item->new,
                        'slug' => $item->slug,
                        'coords' => YandexMaps::getCoordinatesFromAddress($item->slug)
                    ]);
                }
            }
        }
    }
}

