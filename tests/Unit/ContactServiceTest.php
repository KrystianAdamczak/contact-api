<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Contact;
use App\Services\ContactService;
use App\Http\Filters\ContactIndexFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\IndexContactRequest;
use Illuminate\Pagination\LengthAwarePaginator;

class ContactServiceTest extends TestCase
{
    public function test_filter()
    {
        $contact = $this->mock(Contact::class);
        $service =  app(ContactService::class);
        $request = $this->mock(IndexContactRequest::class);
        $builder = $this->mock(Builder::class);
        $filter = $this->mock(ContactIndexFilter::class);

        $request->shouldReceive('allowed')->once()->andReturn([]);
        $request->shouldReceive('only')->once()->andReturn([]);
        $contact->shouldReceive('newQuery')->once()->andReturn($builder);

        $filter->shouldReceive('getBuilder')->andReturnSelf();
        $builder->shouldReceive('simplePaginate')->once()->andReturn($this->mock(LengthAwarePaginator::class));

        $results = $service->filter($request);

        $this->assertInstanceOf(LengthAwarePaginator::class, $results);
    }
}
