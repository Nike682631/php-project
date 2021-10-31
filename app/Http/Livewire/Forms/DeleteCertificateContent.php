<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\CompanyCertificate;

class DeleteCertificateContent extends Component
{
    public $cert_id;

    protected $listeners = ['certificationId' => 'setCertId'];

    public function setCertId($cert_id) {
        $this->cert_id = $cert_id;
    }

    public function delete() {
        $certificate = CompanyCertificate::findOrFail($this->cert_id)->first();
        $user = $certificate->user()->get();
        if (Auth::user()->id == $user[0]->id) {
            Session::flash('message', __('Certificate successfully deleted'));
            CompanyCertificate::destroy($this->cert_id);
        }else {
            Session::flash('message', __('You do not have permission to delete this certificate. Only certificate owner can delete certificate.'));
        }
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.forms.delete-certificate-content');
    }
}
