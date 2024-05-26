<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\UuidResource;
use App\Models\Uuid;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class UuidController extends BaseController
{
    /**
     * Display a listing of the UUIDs.
     */
    public function list(): JsonResponse
    {
        try {
            $uuids = Uuid::orderBy('id')->get();
            return $this->sendResponse(UuidResource::collection($uuids), 'UUIDs retrieved successfully.');
        } catch(\Throwable $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Store a newly created UUID in storage.
     */
    public function generate(): JsonResponse
    {
        $uuid = new Uuid();
        $uuid->uuid = Str::uuid();

        try {
            $uuid->save();
            return $this->sendResponse(new UuidResource($uuid), 'UUID generated successfully.');
        } catch(\Throwable $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Display the specified UUID.
     */
    public function retrieve(string $id): JsonResponse
    {
        try {
            $uuid = Uuid::where('id', $id)->first();
            if ($uuid) {
                return $this->sendResponse(new UuidResource($uuid), 'UUID retrieved successfully.');
            }

            return $this->sendError("UUID by ID {$id} not found.");
        } catch(\Throwable $e) {
            return $this->sendError($e->getMessage());
        }
    }

    /**
     * Remove the specified UUID from storage.
     */
    public function delete(string $id): JsonResponse
    {
        try {
            $uuid = Uuid::where('id', $id)->first();
            $uuid->delete();
            return $this->sendResponse(new UuidResource($uuid), "UUID by ID {$id} deleted successfully.");
        } catch(\Throwable $e) {
            return $this->sendError($e->getMessage());
        }
    }
}
