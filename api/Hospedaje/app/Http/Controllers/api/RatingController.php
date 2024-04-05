<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function list()
    {
        $ratings = Rating::all();

        $list = [];
        foreach ($ratings as $rating) {
            $object = [
                "id" => $rating->id,
                "number" => $rating->number,
                "user_id" => $rating->user_id,
                "reservation_id" => $rating->reservation_id,
                "created_at" => $rating->created_at,
                "updated_at" => $rating->updated_at,
            ];
            array_push($list, $object);
        }

        return response()->json($list);
    }
    public function show($id)
    {
        $rating = Rating::where('id', '=', $id)->first();


        $object = [
            "id" => $rating->id,
            "number" => $rating->number,
            "user_id" => $rating->user_id,
            "reservation_id" => $rating->reservation_id,
            "created_at" => $rating->created_at,
            "updated_at" => $rating->updated_at,
        ];

        return response()->json($object);
    }

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function store(Request $request)
    {

        if (auth()->check()) {
            $user_id = auth()->id();
            $data = $request->validate([
                'number' => 'required|integer|min:1|max:5',
                'lodging_id' => 'required|exists:lodgings,id',
                'reservation_id' => 'required|exists:reservations,id',
            ]);

            $existingRating = Rating::where('user_id', $user_id)
                ->where('lodging_id', $data['lodging_id'])
                ->exists();

            if ($existingRating) {
                return response()->json(['message' => 'Ya has calificado este alojamiento'], 400);
            }

            $rating = new Rating();
            $rating->number = $data['number'];
            $rating->user_id = $user_id;
            $rating->lodging_id = $data['lodging_id'];
            $rating->reservation_id = $data['reservation_id'];
            $rating->save();

            return response()->json(['message' => 'Rating created successfully'], 200);
        } else {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
    }

    public function create(Request $request)
    {

        $data = $request->validate([
            "number" => "min:1",
            "user_id" => "max:1",
            "reservation_id" => "min:1",
            "lodging_id" => "min:1"
        ]);

        $ratings = Rating::create([
            "number" => $data["number"],
            "user_id" => $data["user_id"],
            "reservation_id" => $data["reservation_id"],
            "lodging_id" => $data["lodging_id"]
        ]);
        if ($ratings) {
            $object = [
                "response" => "Success. Items is correct",
                "date" => $ratings
            ];
            return response()->json($ratings);
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
            "id" => "required",
            "number" => "min:1|max:20",
            "user_id" => "max:1",
            "reservation_id" => "min:1",
            "lodging_id" => "min:1"

        ]);

        $element = Rating::where('id', '=', $data['id'])->first();
        $element->number = $data['number'];
        $element->user = $data['user_id'];
        $element->reservation = $data['reservation_id'];
        $element->lodging = $data['lodging_id'];

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
