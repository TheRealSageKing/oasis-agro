<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\PackageRequest;
use App\Http\Requests\admin\PackageUpdateRequest;
use App\Models\v1\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class PackageController extends Controller
{
    public function index(){
        $packages = Package::all();
        return view('dashboard.admin.packages.index',  compact('packages'));
    }

    public function create(){
        return view('dashboard.admin.packages.create');
    }

    public function store(PackageRequest $request)
    {
        $request->validated();
        $packageBrochurePath = null;
        $packageBrochureName = null;
        $packageImagePath = 'img/images/default-package-image.jpg';

        try{
            $validated = $request->safe()->all();
            if ( $request->edit != null )
            {
                return self::update($request->edit, $request);
            }

            if ( $file = $request->file('package_image') )
            {
                $fileInfo = $this->uploadFile($request->file('package_image'), 'packages');
                $packageImagePath = asset($fileInfo['path']);
            }

            if ( $file = $request->file('package_brochure') )
            {
                $brochureFile = $this->uploadFile($request->file('package_brochure'), 'brochures');
                $packageBrochureName = $brochureFile['name'];
                $packageBrochurePath = asset($brochureFile['path']);

            }
            Package::create([
                'name'          => $validated['package_name'],
                'duration'      => $validated['package_duration'],
                'roi'           => $validated['package_roi'],
                'amount'        => $validated['package_amount'],
                'description'   => $validated['package_description'],
                'image'         => $packageImagePath,
                'brochure'      => $packageBrochurePath,
                'brochure_name' => $packageBrochureName
            ]);

            return $this->successResponse('Package was created successfully');

        }catch(\Exception $ex){
            Log::error($ex);
            return $this->errorResponse($ex->getMessage());
        }
    }

    public function edit($id){
        try {
            $package = Package::find($id);
            if ( !$package )
                throw new \Exception('No package exists');
            return $this->successResponse('Ok', $package);
        }catch(\Exception $ex)
        {
            return $this->errorResponse($ex->getMessage());
        }
    }

    public function update($id, PackageRequest $request){
        $request->validated();

        $packageImagePath = null;
        $packageBrochurePath = null;
        $packageBrochureName = null;
        try{
            $validated = $request->safe()->all();

            $package = Package::find($id);
            if (!$package)
                throw new \Exception('Package was not found');

            if ( $file = $request->file('package_image') )
            {
                $fileInfo = $this->uploadFile($request->file('package_image'), 'packages');
                $packageImagePath = $fileInfo['path'];
            }

            if ( $file = $request->file('package_brochure') )
            {
                $brochureFile = $this->uploadFile($request->file('package_brochure'), 'brochures');
                $packageBrochureName = $brochureFile['name'];
                $packageBrochurePath = $brochureFile['path'];

            }

            $package->name = $validated['package_name'];
            $package->duration = $validated['package_duration'];
            $package->roi = $validated['package_roi'];
            $package->amount = $validated['package_amount'];
            $package->description = $validated['package_description'];
            if ($packageImagePath != null )
            {
                $package->image = $packageImagePath;
            }

            if ($packageImagePath != null )
            {
                $package->brochure = $packageBrochurePath;
            }

            if ($packageBrochureName != null )
            {
                $package->brochure_name = $packageBrochureName;
            }
            $package->save();
            return $this->successResponse('Package was updated successfully');

        }catch(\Exception $ex){
            Log::error($ex);
            return $this->errorResponse($ex->getMessage());
        }
    }

    public function destroy($id)
    {
        try{
            $item = Package::find($id);
            if (!$item)
                throw new \Exception('Package could not be found');

            $itemImage = str_replace(asset(''), '',$item->image);
            $itemBrochure = str_replace(asset(''), '', $item->brochure);

            $imageFilePath = app_path($itemImage);
            if(File::exists($imageFilePath))
            {
                File::delete($imageFilePath);
            }

            $brochureFilePath = app_path($itemBrochure);
            if(File::exists($brochureFilePath))
            {
                File::delete($brochureFilePath);
            }

            $item->delete();
            return redirect()->route('admin.packages.index')
                ->with('success', 'Package was deleted successfully');
        }catch(\Exception $ex)
        {
            return redirect()->route('admin.packages.index')
                ->with('error', $ex->getMessage());
        }
    }

    public function show()
    {
        return view('dashboard.admin.packages.show');
    }
}
