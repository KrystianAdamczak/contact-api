<?php

namespace App\Services;

use App\Models\Contact;
use App\Http\Resources\ContactResource;
use App\Http\Filters\ContactIndexFilter;
use App\Http\Requests\IndexContactRequest;

class ContactService
{
    public function __construct(private Contact $contact)
    {
    }

    public function filter(IndexContactRequest $request)
    {
        $allowed = $request->allowed();

        $filter = new ContactIndexFilter($this->contact->newQuery(), $request->only($allowed));

        return $filter->getBuilder()->simplePaginate();
    }
}
