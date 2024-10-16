<?php

namespace App\Observers;

use App\Models\Pekerjaan;

class PekerjaanObserver
{
    /**
     * Handle the Pekerjaan "created" event.
     */
    public function created(Pekerjaan $pekerjaan): void
    {
        $this->checkAndUpdateStatus($pekerjaan);
    }

    /**
     * Handle the Pekerjaan "updated" event.
     */
    public function updated(Pekerjaan $pekerjaan): void
    {
        $currentApplicants = $pekerjaan->applicant->count();

        // Jika jumlah pelamar mencapai atau melebihi batas, ubah status menjadi "close"
        if ($currentApplicants >= $pekerjaan->total_applicant) {
            $pekerjaan->status = 'close';
            $pekerjaan->save();
        }
    }
    private function checkAndUpdateStatus(Pekerjaan $pekerjaan)
    {
        $currentApplicants = $pekerjaan->applicant->count();

        if ($currentApplicants >= $pekerjaan->total_applicant) {
            $pekerjaan->status = 'close';
            $pekerjaan->save();
        }
    }

    /**
     * Handle the Pekerjaan "deleted" event.
     */
    public function deleted(Pekerjaan $pekerjaan): void
    {
        //
    }

    /**
     * Handle the Pekerjaan "restored" event.
     */
    public function restored(Pekerjaan $pekerjaan): void
    {
        //
    }

    /**
     * Handle the Pekerjaan "force deleted" event.
     */
    public function forceDeleted(Pekerjaan $pekerjaan): void
    {
        //
    }
}
