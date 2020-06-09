<?php


namespace App\Services\Adverts\Repositories;


use App\Models\Advert;
use App\Models\Division;
use App\Models\Town;


class EloquentAdvertRepository implements AdvertRepositoryInterface
{

    public function find(int $id)
    {
        return Advert::find($id);
    }

    public function list()
    {
        return Advert::all();
    }

    public function divisionList()
    {
        return Division::all();
    }

    public function townList()
    {
        return Town::all();
    }

    public function paginateList($qty)
    {
        return Advert::paginate($qty);
    }

    public function createFromArray(array $data): Advert
    {
        $advert = new Advert();
        $advert->create($data);
        return $advert;
    }

    public function updateFromArray(Advert $advert, array $data)
    {
        $advert->update($data);
        return $advert;
    }

    public function destroyFromObj(Advert $advert)
    {
        $advert->delete();
    }

}