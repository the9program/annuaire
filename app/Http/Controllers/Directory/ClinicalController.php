<?php

namespace App\Http\Controllers\Directory;

use App\Address;
use App\Clinical;
use App\Http\Requests\Directory\ClinicalRequest;
use App\Opening;
use App\Http\Controllers\Controller;
use App\Repository\Directory\ClinicalRepository;


class ClinicalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    public function index()
    {
        $this->authorize('create',Clinical::class);

        return view('directory.clinical.index', [
            'clinics'   => Clinical::all()
        ]);

    }

    public function create()
    {

        $this->authorize('create',Clinical::class);

        return view('directory.clinical.create');

    }

    public function store(ClinicalRequest $request,Address $address,Opening $opening,ClinicalRepository $repository)
    {

        $this->authorize('create',Clinical::class);

        $clinical = $repository->store($request,$address,$opening,$this->services($request));

        if($clinical) {

            session()->flash('success', __('directory/clinical.created'));

            return redirect()->route('clinical.show',compact('clinical'));

        }

        else{

            session()->flash('success', __('directory/clinical.created_error'));

            return back()->with($request->all())->withInput();

        }

    }

    public function show(Clinical $clinical)
    {
        return view('directory.clinical.show',compact('clinical'));
    }

    public function edit(Clinical $clinical)
    {

        $this->authorize('create',Clinical::class);

        $services = $this->collect($clinical);

        return view('directory.clinical.edit',compact('clinical','services'));

    }

    public function update(ClinicalRequest $request, Clinical $clinical,ClinicalRepository $repository)
    {

        $this->authorize('create',Clinical::class);

        $update = $repository->update($request,$clinical,$this->services($request));

        if($update) {

            session()->flash('success', __('directory/clinical.updated'));

            return redirect()->route('clinical.show',compact('clinical'));

        }

        else{

            session()->flash('success', __('directory/clinical.updated_error'));

            return back()->with($request->all())->withInput();

        }

    }

    public function destroy(Clinical $clinical,ClinicalRepository $repository)
    {
        $this->authorize('delete',$clinical);

        $delete = $repository->destroy($clinical);

        if($delete) {

            session()->flash('success', __('directory/clinical.deleted'));

        }

        else{

            session()->flash('success', __('directory/clinical.deleted_error'));

        }

        return redirect()->route('clinical.index');

    }

    /**
     * Find id's services from request
     *
     * @param ClinicalRequest $request
     * @return array
     */

    private function services(ClinicalRequest $request)
    {
        $r = [];

        if($request->consultation) {
            $r[] .= 1;
        }

        if($request->operation) {
            $r[] .= 2;
        }

        if($request->emergency) {
            $r[] .= 3;
        }

        if($request->payment) {
            $r[] .= 4;
        }

        if($request->charges) {
            $r[] .= 5;
        }

        if($request->hospitalisation) {
            $r[] .= 6;
        }

        if($request->doctors) {
            $r[] .= 7;
        }

        if($request->nurse) {
            $r[] .= 8;
        }

        if($request->handicap) {
            $r[] .= 9;
        }

        return $r;
    }

    /**
     * Collect services of this clinical in array
     *
     * @param Clinical $clinical
     * @return array
     */

    private function collect(Clinical $clinical)
    {
        $services = $clinical->services()->select('service')->get();

        $r = [];

        foreach ($services as $service) {
            $r[] = $service->service;
        }

        return $r;
    }

}
