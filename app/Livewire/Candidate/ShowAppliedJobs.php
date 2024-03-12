<?php

namespace App\Livewire\Candidate;

use App\Models\ApplyJob;
use Livewire\Component;
use Livewire\WithPagination;

class ShowAppliedJobs extends Component
{
    use WithPagination;

    public $appliedJobIds;

    public function mount()
    {
        $authId = auth()->user()->id;

        $this->appliedJobIds = ApplyJob::where('user_id', $authId)
            ->latest()
            ->pluck('id')
            ->toArray();
    }

    public function render()
    {
        $appliedJobs = ApplyJob::whereIn('id', $this->appliedJobIds)
            ->with('job')
            ->latest()
            ->simplePaginate(10);

        foreach ($appliedJobs as $appliedJob) {
            $expirationDate = $appliedJob->job->expiration_date;
            $status = $expirationDate->isFuture() ? 'Active' : 'Expired';
            $appliedJob->status = $status;
        }

        return view('livewire.candidate.show-applied-jobs', compact('appliedJobs'));
    }
}
