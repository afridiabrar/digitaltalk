<?php

namespace App\Http\Controllers;


use App\Repositories\Interfaces\BookingRepositoryInterface;
use DTApi\Http\Controllers\Controller;
use http\Env\Request;

class BookingController extends Controller
{
    private $bookingRepository;

    public function __construct(BookingRepositoryInterface $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function store(Request $request)
    {
        try{
            DB::beginTransaction();
            $data = $request->all();
            $response = $this->bookingRepository->store($request->__authenticatedUser, $data);
            DB::commit();
            return response($response);
        }catch (\Exception $e)
        {
            DB::rollback();
            return $e->getMessage();
        }
    }
}
