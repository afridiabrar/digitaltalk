<?php


namespace App\Repositories\Interfaces;

interface BookingRepositoryInterface extends RepositoryInterface
{

    public function store($user,$store);
}
