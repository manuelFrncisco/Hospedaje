<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lodging;
use Illuminate\Http\Request;

class LodgingController extends Controller
{
    public function list()
    {
        $lodgings = Lodging::with('location')->get();

        $list = [];
        foreach ($lodgings as $lodging) {
            $object = [
                "id" => $lodging->id,
                "name" => $lodging->name,
                "description" => $lodging->description,
                "image" => $lodging->image,
                "backroom" => $lodging->backroom,
                "ofert_id" => $lodging->ofert_id,
                "location" => [
                    "id" => $lodging->location->id,
                    "streep" => $lodging->location->streep,
                    "country" => [
                        "id" => $lodging->location->country->id,
                        "name" => $lodging->location->country->name
                    ],
                    "postal" => $lodging->location->postal
                ],
                "created_at" => $lodging->created_at,
                "updated_at" => $lodging->updated_at,
            ];
            array_push($list, $object);
        }

        return response()->json($list);
    }

    public function show($id)
{
    $lodging = Lodging::with('location.country')->find($id);

    if (!$lodging) {
        return response()->json(['error' => 'Lodging not found'], 404);
    }

    $object = [
        "id" => $lodging->id,
        "name" => $lodging->name,
        "description" => $lodging->description,
        "image" => $lodging->image,
        "backroom" => $lodging->backroom,
        "ofert_id" => $lodging->ofert_id,
        "location" => [
            "id" => $lodging->location->id,
            "streep" => $lodging->location->streep,
            "country" => [
                "id" => $lodging->location->country->id,
                "name" => $lodging->location->country->name
            ],
            "postal" => $lodging->location->postal
        ],
        "created_at" => $lodging->created_at,
        "updated_at" => $lodging->updated_at,
    ];

    return response()->json($object);
}
    public function create(Request $request)
    {

        $data = $request->validate([
            "name" => "min:3",
            "description" => "max:2",
            "image" => "max:2",
            "backroom" => "max:2",
            "ofert_id" => "max:2",
            "location_id" => "max:2",
        ]);
        $lodgings = Lodging::create([
            "name" => $data["name"],
            "description" => $data["description"],
            "image" => $data["image"],
            "backroom" => $data["backroom"],
            "ofert_id" => $data["ofert_id"],
            "location_id" => $data["location_id"],
        ]);
        if ($lodgings) {
            $object = [
                "response" => "Success. Items is correct",
                "date" => $lodgings
            ];
            return response()->json($lodgings);
        } else {
            $object = [
                "response" => "Error: Something went wrong, please try again."
            ];
        }
        return response()->json($object);
    }
    public function update(Request $request)
    {
        $data = $request->validate([
            "id" => "required|integer|min:1",
            "name" => "max:2",
            "description" => "min:3|max:20",
            "image" => "min:3|max:20",
            "backroom" => "min:3|max:20",
            "ofert_id" => "min:3|max:20",
            "location_id" => "min:3|max:20"
        ]);

        $element = Lodging::where('id', '=', $data['id'])->first();
        $element->name = $data['name'];
        $element->description = $data['description'];
        $element->image = $data['image'];
        $element->backroom = $data['backroom'];
        $element->ofert_id = $data['ofert_id'];
        $element->location_id = $data['location_id'];

        if ($element->update) {
            $object = [
                "response" => "Success. Items is correct",
                "date" => $element
            ];
            return response()->json($element);
        } else {
            $object = [
                "response" => "Error: Something went wrong, please try again."
            ];
        }
        return response()->json($object);
    }
}
