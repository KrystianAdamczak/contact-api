<?php

namespace App\Http\Filters;

use Carbon\Carbon;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ContactIndexFilter
{
    public function __construct(private Builder $builder, private array $data)
    {
        $this->filter();
    }

    private function filter()
    {
        $this->filterByName();
        $this->filterBySurname();
        $this->filterByPhone();
        $this->filterByEmail();
        $this->filterByCreatedAt();
    }

    public function getBuilder()
    {
        return $this->builder;
    }

    private function filterByName()
    {
        if (!$name = $this->data['name'] ?? null) {
            return;
        }

        $this->builder->where('name', 'like', '%' . $name . '%');
    }

    private function filterBySurname()
    {
        if (!$surname = $this->data['surname'] ?? null) {
            return;
        }

        $this->builder->where('surname', 'like', '%' . $surname . '%');
    }

    private function filterByPhone()
    {
        if (!$phone = $this->data['phone'] ?? null) {
            return;
        }

        $this->builder->where('phone', 'like', '%' . $phone . '%');
    }

    private function filterByEmail()
    {
        if (!$email = $this->data['email'] ?? null) {
            return;
        }

        $this->builder->where('email', 'like', '%' . $email . '%');
    }

    private function filterByCreatedAt()
    {
        if (!$createdAt = $this->data['created_at'] ?? null) {
            return;
        }

        $this->builder->whereBetween('created_at', [$createdAt[0] ?? Carbon::now()->toDateString(), $createdAt[1] ?? Carbon::now()->toDateString()]);
    }
}
