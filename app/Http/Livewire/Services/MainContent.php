<?php

namespace App\Http\Livewire\Services;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\User;
use App\UserInfo;
use App\Http\Traits\CountryTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class MainContent extends Component
{
    use CountryTrait;

    public $perPage = 2;
    public $country = "ALL";
    public $companyType = 0;   // 0: both, 1: sell, 2: buy
    public $categoryIds = [];
    public $catId = -1;

    protected $listeners = ['updatedCategory' => 'setCategories'];

    public function mount($catId) {
        $this->catId = $catId;
    }

    public function render()
    {

        if(Auth::user()) {
            $this->perPage = 10;
        }
        
        if($this->country == "ALL") {
            $countryQuery = array();
        }else {
            $countryQuery = array(['country', '=', $this->country]);
        }

        $companiesRaw = User::whereHas('info', function (Builder $query) use ($countryQuery) {
                                $query->where($countryQuery);
                            });
        
        $filteredCompArr = array();
        if ($this->catId == -1) {
            $filteredCompanies = $companiesRaw->paginate($this->perPage);
        } else {
            $companies = $companiesRaw->get();
            switch ($this->companyType) {
                case 0:
                    foreach($companies as $company) {
                        $buyIds = $company->buys()->pluck('category_id')->toArray();
                        $sellIds = $company->sells()->pluck('category_id')->toArray();
                        $allIds = array_merge($buyIds,$sellIds);

                        if (count(array_intersect([$this->catId], $allIds)) > 0) {

                            $filteredCompArr[] = $company;
                        }
                    }
                    break;
                case 1:
                    foreach($companies as $company) {
                        $sellIds = $company->sells()->pluck('category_id')->toArray();
                        if (count(array_intersect([$this->catId], $sellIds)) > 0) {

                            $filteredCompArr[] = $company;
                        }
                    }
                    break;
                case 2:
                    foreach($companies as $company) {
                        $buyIds = $company->buys()->pluck('category_id')->toArray();
                        if (count(array_intersect([$this->catId], $buyIds)) > 0) {

                            $filteredCompArr[] = $company;
                        }
                    }
                    break;
                case 3:
                    foreach($companies as $company) {
                        $buyIds = $company->buys()->pluck('category_id')->toArray();
                        $sellIds = $company->sells()->pluck('category_id')->toArray();

                        if (count(array_intersect([$this->catId], $buyIds)) > 0 && count(array_intersect([$this->catId], $sellIds)) > 0) {

                            $filteredCompArr[] = $company;
                        }
                    }
                    break;
            }

            $filteredCompanies = $this->paginate($filteredCompArr, $this->perPage, 0, ['path'=>url('services')]);
        }     

        // switch ($this->companyType) {
        //     case 0:
        //         foreach($companies as $company) {
        //             $buyIds = $company->buys()->pluck('category_id')->toArray();
        //             $sellIds = $company->sells()->pluck('category_id')->toArray();
        //             $allIds = array_merge($buyIds,$sellIds);

        //             if (count($this->categoryIds) > 0 && count(array_intersect($this->categoryIds, $allIds)) == count($this->categoryIds) 
        //                 || count($this->categoryIds) == 0) {

        //                 $filteredCompArr[] = $company;
        //             }
        //         }
        //         break;
        //     case 1:
        //         foreach($companies as $company) {
        //             $sellIds = $company->sells()->pluck('category_id')->toArray();
        //             if (count($this->categoryIds) > 0 && count(array_intersect($this->categoryIds, $sellIds)) == count($this->categoryIds)
        //                 || count($this->categoryIds) == 0) {

        //                 $filteredCompArr[] = $company;
        //             }
        //         }
        //         break;
        //     case 2:
        //         foreach($companies as $company) {
        //             $buyIds = $company->buys()->pluck('category_id')->toArray();
        //             if (count($this->categoryIds) > 0 && count(array_intersect($this->categoryIds, $buyIds)) == count($this->categoryIds)
        //                 || count($this->categoryIds) == 0) {

        //                 $filteredCompArr[] = $company;
        //             }
        //         }
        //         break;
        //     case 3:
        //         foreach($companies as $company) {
        //             $buyIds = $company->buys()->pluck('category_id')->toArray();
        //             $sellIds = $company->sells()->pluck('category_id')->toArray();

        //             if (count($this->categoryIds) > 0 && count(array_intersect($this->categoryIds, $buyIds)) == count($this->categoryIds) 
        //                 && count(array_intersect($this->categoryIds, $sellIds)) == count($this->categoryIds)
        //                 || count($this->categoryIds) == 0) {

        //                 $filteredCompArr[] = $company;
        //             }
        //         }
        //         break;
        // }        

        $allCountry = array('ALL' => 'All Countries');
        $countries = $this->getAllCountries();
        array_unshift($countries, $allCountry);

        return view('livewire.services.main-content', [
            'companies' => $filteredCompanies,
            'countries' => $countries,
            'cat_id' => $this->catId
        ]);
    }

    public function setCategories($categoryIds) {
        $this->categoryIds = $categoryIds;
    }

    public function setType($type) {
        $this->companyType = $type;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
