<?php

namespace App\Http\Controllers\Api\Adverts;

use App\Http\Controllers\Api\Adverts\Request\AdvertsListRequest;
use App\Http\Controllers\Api\Adverts\Resources\AdvertsResource;
use App\Http\Controllers\Api\Adverts\Resources\AdvertWithMessagesResource;
use App\Http\Controllers\Cms\Adverts\Request\StoreAdvertRequest;
use App\Http\Controllers\Controller;
use App\Models\Advert;
use App\Services\Adverts\AdvertsService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdvertsController extends Controller
{
    const MAX_PER_PAGE = 2;

    /**
     * @var AdvertsService
     */
    private $advertsService;

    public function __construct(AdvertsService $advertsService)
    {

        $this->advertsService = $advertsService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param AdvertsListRequest $request
     * @return AdvertsResource
     */
    public function index(AdvertsListRequest $request)
    {

        $limit = $request->getLimit();
        $offset = $request->getOffset();

        $adverts =$this->advertsService->pageApi($limit, $offset);

        //return  response()->json($adverts);
        //return AdvertResource::collection($adverts);

        return new AdvertsResource($adverts);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAdvertRequest $request
     * @return string
     */
    public function store(StoreAdvertRequest $request)
    {
        $data = $request->getFormData();
        $this->advertsService->storeAdvert($data);
        return 'saved';
    }

    /**
     * Display the specified resource.
     *
     * @param Advert $advert
     * @return AdvertWithMessagesResource
     */
    public function show(Advert $advert)
    {
        return new AdvertWithMessagesResource($advert);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreAdvertRequest $request
     * @param Advert $advert
     * @return string
     */
    public function update(StoreAdvertRequest $request, Advert $advert)
    {
        $this->advertsService->updateAdvert($advert, $request->all());
        return 'Updated';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Advert $advert
     * @return void
     */
    public function destroy(Advert $advert)
    {
        $this->advertsService->deleteAdvert($advert);
    }
}