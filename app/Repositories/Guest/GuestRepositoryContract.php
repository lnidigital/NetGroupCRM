<?php
namespace App\Repositories\Guest;

interface GuestRepositoryContract
{
    public function find($id);

    public function listAllGuests();

    public function getAllGuestsCount();

    public function listAllIndustries();

    public function create($requestData);

    public function update($id, $requestData);

    public function destroy($id);
}
