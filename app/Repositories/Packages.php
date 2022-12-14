<?php

namespace App\Repositories;
use App\Models\Package;
use App\Models\PackageService;
use Illuminate\Support\Facades\Crypt;
class Packages{

    public function all()
    {
        return Package::latest()->get();
    }

    public function package()
    {
        return new Package;
    }

    public function edit($id)
    {
        $pkg =  Package::findOrFail($id);
        return $pkg;
    }

    public function update($id)
    {
        $pkg = Package::findOrFail($id);
        return $pkg;

    }

    public function delete($id)
    {
        return Package::findOrFail($id);
    }

    public function decryptId($val)
    {
        return Crypt::decrypt($val);
    }

    public function allServies()
    {
        return PackageService::latest()->get();
    }

    public function serviceById($id)
    {
        return PackageService::findOrFail($id);
    }

}
?>
