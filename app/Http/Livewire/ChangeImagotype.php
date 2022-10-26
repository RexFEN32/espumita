<?php

namespace App\Http\Livewire;

use App\Models\CompanyProfile;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ChangeImagotype extends Component
{
    use WithFileUploads;

    public $company_profile_id, $logo = null;

    public $cambio = false;

    public function mount($company_profile_id)
    {
        $this->company_profile_id = $company_profile_id;
    }

    public function change()
    {
        $this->reset('logo');

        if($this->cambio == false){
            $this->cambio = true;
        }else{
            $this->cambio = false;
        }
    }

    public function save()
    {
        $company_profile_id = $this->company_profile_id;

        $customFileName = uniqid() . '_' . date('Y-m-d') . '.' . $this->logo->extension();
        $ruta = $_SERVER['DOCUMENT_ROOT'].('/img/logo/');
        copy($this->logo->getRealPath(),$ruta.$customFileName);

        $logo = CompanyProfile::where('id', $company_profile_id)->first();
        $logo->logo = 'logo/'. $customFileName;
        $logo->save();

        $this->cambio = false;
    }

    public function render()
    {
        $oldlogo = CompanyProfile::where('id', $this->company_profile_id)->first();

        return view('livewire.change-imagotype', compact('oldlogo'));
    }
}
