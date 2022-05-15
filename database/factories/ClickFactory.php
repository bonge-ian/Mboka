<?php

namespace Database\Factories;

use WhichBrowser\Parser;
use WhichBrowser\Model\Device;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Click>
 */
class ClickFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $geoip = geoip($this->faker->ipv4())->toArray();

        $meta = new Parser($user_agent = $this->faker->userAgent());

        return [
            'os' => $meta->os->name,
            'city' => $geoip['city'],
            'device' => $this->getDeviceInfo($meta->device),
            'browser' => $meta->browser->name,
            'country' => $geoip['country'],
            'user_agent' => $user_agent,
            'ip_address' => $geoip['ip'],
            'device_type' => $meta->device->type,
        ];
    }

    protected function getDeviceInfo(Device $device)
    {
        if (is_null($device->model) && is_null($device->manufacturer)) {
            return null;
        }

        return  $device->model . ', ' . $device->manufacturer;
    }
}
