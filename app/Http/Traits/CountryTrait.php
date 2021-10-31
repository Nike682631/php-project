<?php

namespace App\Http\Traits;
use PragmaRX\Countries\Package\Countries;

trait CountryTrait {
    public function getAllCountries() {
        $countries = new Countries();
        
        return $countries
                    ->all()
                    ->map(function ($country) {
                        $commonName = $country->name->common;
                    
                        $languages = $country->languages ?? collect();
                    
                        $language = $languages->keys()->first() ?? null;
                    
                        $nativeNames = $country->name->native ?? null;
                    
                        if (
                            filled($language) &&
                                filled($nativeNames) &&
                                filled($nativeNames[$language]) ?? null
                        ) {
                            $native = $nativeNames[$language]['common'] ?? null;
                        }
                    
                        if (blank($native ?? null) && filled($nativeNames)) {
                            $native = $nativeNames->first()['common'] ?? null;
                        }
                    
                        $native = $native ?? $commonName;
                    
                        if ($native !== $commonName && filled($native)) {
                            $native = "$native ($commonName)";
                        }
                    
                        return [$country->cca2 => $native];
                    })
                    ->values()
                    ->toArray();
    }
}