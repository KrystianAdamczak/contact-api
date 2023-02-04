<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Services\ContactService;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\ContactResource;
use App\Http\Requests\IndexContactRequest;

class ContactController extends Controller
{

    public function __construct(private ContactService $service)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(IndexContactRequest $request): JsonResponse
    {
        $contacts = $this->service->filter($request);
        return response()->json(ContactResource::collection($contacts));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $contact = Contact::create($request->all());
        return response()->json($contact, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  Contact $contact
     * @return JsonResponse
     */
    public function show(Contact $contact)
    {
        return response()->json($contact, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  Contact $contact
     * @return JsonResponse
     */
    public function update(Request $request, Contact $contact)
    {
        $contact->update($request->all());
        return response()->json($contact, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Contact $contact
     * @return JsonResponse
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return response()->json(null, 204);
    }
}
