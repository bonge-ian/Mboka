<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use WhichBrowser\Parser;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Torann\GeoIP\Facades\GeoIP;

class ApplyListingController extends Controller
{
    public function __construct(
        protected Parser $parser
    ) {
        $this->parser = new Parser(request()->userAgent());
    }

    public function __invoke(Request $request, Listing $listing)
    {
        $clickPayload = array_merge(
            $this->getUserDeviceMetadata(),
            $this->getGeoIP($request),
            [
                'ip_address' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]
        );

        $listing->clicks()->create($clickPayload);

        return redirect()->to($listing->apply_url);
    }

    protected function getGeoIP(Request $request): array
    {
        return Arr::only(
            array: GeoIP::getLocation($request->ip())->toArray(),
            keys: [
                'city',
                'country',
            ]
        );
    }

    protected function getUserDeviceMetadata(): array
    {
        if (
            is_null($this->parser->device?->model) &&
            is_null($this->parser->device?->manufacturer)
        ) {
            $device =  null;
        } else {
            $device = $this->parser->device?->model . ', ' . $this->parser->device?->manufacturer;
        }

        return [
            'browser' => $this->parser->browser->name,
            'os' => $this->parser->os->name,
            'device' => $device,
            'device_type' => $this->parser->device->type
        ];
    }
}
