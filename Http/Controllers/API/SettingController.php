<?php

namespace Modules\Settings\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Modules\Settings\Http\Requests\StoreSettingRequest;
use Modules\Settings\Http\Requests\UpdateSettingRequest;
use Exception;
use Illuminate\Http\Request;
use Modules\Settings\Models\Setting;
use Modules\Settings\Repositories\Contracts\SettingRepositoryInterface;

class SettingController extends Controller
{
    /**
     * @var Settings
     */
    protected $repository;
    /**
     * SettingsController constructor.
     * @param SettingRepositoryInterface $repository
     */
    public function __construct(
        SettingRepositoryInterface $repository
    ){
        // $this->authorizeResource(Settings::class, 'settings');
        $this->repository = $repository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSettingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSettingRequest $request)
    {
        try {
            return $this->repository->store($request->all());
        } catch (Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSettingRequest  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }

    public function uploadLogotipo(Request $request)
    {
        if ($request->hasFile('logo_top')) {
            $logoTop = $request->file('logo_top');
            $logoTop->move(public_path('storage/logotipo'), $logoTop->getClientOriginalName());
        }

        if ($request->hasFile('logo_footer')) {
            $logoFooter = $request->file('logo_footer');
            $logoFooter->move(public_path('storage/logotipo'), $logoFooter->getClientOriginalName());
        }

        return $request->hasFile('logo_top') || $request->hasFile('logo_footer');
    }

}
