<?php
namespace App\Repositories;
use App\Models\PackageService;
use Illuminate\Support\Facades\Crypt;
class Services{
    public function all()
    {
        return PackageService::latest()->get();
    }

    public function edit($val)
    {
        return PackageService::findOrFail($val);
    }

    public function delete($val)
    {
        return PackageService::findOrFail($val);
    }

    public function decryptId($val)
    {
        return Crypt::decrypt($val);
    }
}

?>
