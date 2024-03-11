<?php

namespace App\Livewire;

use App\Models\JobListing;
use Carbon\Carbon;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Database\Eloquent\Builder;

class ShowJobs extends Component
{
    use WithPagination;

    #[Url]
    public $keyword, $location, $dateFilter, $salaryFilter, $locationFilter = null, $jobTypeFilter = null, $perPageFilter = 10;

    public function mount($keyword = null, $location = null)
    {
        $this->keyword = $keyword;
        $this->location = $location;
    }

    public function render()
    {
        $query = JobListing::with('tags', 'company')->latest();

        if ($this->keyword) {
            $query->where(function ($query) {
                $query->where('title', 'like', '%' . $this->keyword . '%')
                    ->orWhere('job_type', 'like', '%' . $this->keyword . '%')
                    ->orWhereHas('company', function ($query) {
                        $query->where('name', 'like', '%' . $this->keyword . '%');
                    });
            });
        }

        if ($this->location) {
            $query->where('location', 'like', '%' . $this->location . '%');
        }

        if ($this->locationFilter) {
            $query->where('location', 'like', '%' . $this->locationFilter . '%');
        }

        if ($this->dateFilter) {
            $query->where('created_at', '>=', $this->getDateFilterRange($this->dateFilter));
        }

        if ($this->salaryFilter) {
            $query->where('min_salary', '>=', $this->getSalaryFilterRange($this->salaryFilter)['min'])
                ->where('max_salary', '<=', $this->getSalaryFilterRange($this->salaryFilter)['max']);
        }

        if ($this->jobTypeFilter) {
            $query->whereHas('tags', function (Builder $query) {
                $query->where('name', $this->jobTypeFilter);
            });
        }

        $jobs = $query->simplePaginate($this->perPageFilter);

        return view('livewire.show-jobs', compact('jobs'));
    }

    private function getDateFilterRange($dateFilter)
    {
        switch ($dateFilter) {
            case 'past_month':
                return Carbon::now()->subMonth();
            case 'past_week':
                return Carbon::now()->subWeek();
            case 'past_24_hours':
                return Carbon::now()->subDay();
            default:
                return '';
        }
    }

    private function getSalaryFilterRange($salaryFilter)
    {
        switch ($salaryFilter) {
            case '10k':
                return ['min' => 0, 'max' => 10000];
            case '20k':
                return ['min' => 20000, 'max' => 30000];
            case '30k':
                return ['min' => 30000, 'max' => 50000];
            case '60k':
                return ['min' => 60000, 'max' => 90000];
            case '100k':
                return ['min' => 100000, 'max' => PHP_INT_MAX];
            default:
                return ['min' => 0, 'max' => PHP_INT_MAX];
        }
    }
}
