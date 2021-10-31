<?php

namespace App\Http\Response;

use Illuminate\Support\Collection;
use App\Product;
use App\Category;
use App\UserInfo;
use Illuminate\Contracts\Support\Responsable;

class SuggestionsResponse implements Responsable
{
    private $query;
    private $products;
    private $categories;
    private $users;

    /**
     * Create a new instance.
     *
     * @param string $query
     * @param int $totalResults
     * @param \Illuminate\Support\Collection $products
     * @param \Illuminate\Support\Collection $categories
     */
    public function __construct($query, Collection $categories, Collection $products, Collection $users)
    {
        $this->query = $query;
        $this->products = $products;
        $this->categories = $categories;
        $this->users = $users;
    }

    /**
     * Create an HTTP response that represents the object.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function toResponse($request)
    {
        return response()->json([
            'categories' => $this->transformCategories(),
            'products' => $this->transformProducts(),
            'users' => $this->transformUsers(),
        ]);
    }

    /**
     * Transform the categories.
     *
     * @return \Illuminate\Support\Collection
     */
    private function transformCategories()
    {
        return $this->categories->map(function (Category $category) {
            return [
                'id' => $category->id,
                'name' => $this->highlight($category->categoryPathPrint()),
                'slug' => $this->highlight($category->categoryPathPrint()) . $category->id
            ];
        });
    }

    /**
     * Transform the products.
     *
     * @return \Illuminate\Support\Collection
     */
    private function transformProducts()
    {
        return $this->products->map(function (Product $product) {
            return [
                'id' => $product->id,
                'name' => $this->highlight($product->product_name),
                'slug' => $this->highlight($product->product_name) . $product->id
            ];
        });
    }

    /**
     * Transform the categories.
     *
     * @return \Illuminate\Support\Collection
     */
    private function transformUsers()
    {        
        $userInfoObj = $this->users->filter(function ($userInfo) {
                                return $userInfo->user !== null;
                            })
                            ->map(function (UserInfo $userInfo) {
                                return [
                                    'id' => $userInfo->user->id,
                                    'name' => $this->highlight($userInfo->company_name),
                                    'slug' => $this->highlight($userInfo->company_name) . $userInfo->user->id
                                ];
                            });
        $userInfoArr = [];
        foreach($userInfoObj as $key => $value) {
            $userInfoArr[] = $value;
        }
        return $userInfoArr;
    }

    /**
     * Highlight the given text.
     *
     * @param string $text
     * @return string
     */
    private function highlight($text)
    {
        $query = str_replace(' ', '|', preg_quote($this->query));

        return preg_replace("/($query)/i", '<em>$1</em>', $text);
    }

    /**
     * Get remaining results count.
     *
     * @return int
     */
    private function getRemainingCount()
    {
        return $this->totalResults - $this->products->count();
    }
}
