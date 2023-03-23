<?php

namespace App\Http\Controllers\Securinets;

use App\Http\Controllers\Controller;
use App\Http\Resources\CTFCollection;
use App\Http\Resources\CTFResource;
use App\Models\CTF;
use App\Traits\RespondsWithHttpStatus;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class CTFController extends Controller
{
    use RespondsWithHttpStatus;

    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        return $this->success(CTFCollection::collection(CTF::all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(CTF $ctf): Response
    {
        $response = Gate::inspect('view', $ctf);

        if ($response->allowed()) {
            return $this->success(new CTFResource($ctf));
        }

        return $this->failure($response->message(), 403);
    }
}
