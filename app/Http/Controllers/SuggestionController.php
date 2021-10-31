<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\UserInfo;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Response\SuggestionsResponse;

class SuggestionController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->getProducts();
        $categories = $this->getCategories();
        $users = $this->getUsers();

        return new SuggestionsResponse(
            request('query'),
            $categories,
            $products,
            $users
        );
    }

    /**
     * Get products suggestions.
     *
     * @param \App\Product $model
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getProducts()
    {
        $model = new Product;
        return $model->search(request('query'))
            ->query()
            ->limit(6)
            ->get();
    }

    /**
     * Get products suggestions.
     *
     * @param \App\Category $model
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getCategories()
    {
        $model = new Category;
        return $model->search(request('query'))
            ->query()
            ->limit(6)
            ->get();
    }

    /**
     * Get products suggestions.
     *
     * @param \App\UserInfo $model
     * @return \Illuminate\Database\Eloquent\Collection
     */
    private function getUsers()
    {
        $model = new UserInfo;
        return $model->search(request('query'))
            ->query()
            ->limit(6)
            ->with(['user'])
            ->get();
    }
}
