<?php

namespace App\Nova;


use App\Nova\Filters\ProductBrand;
use App\Nova\Metrics\AveragePrice;
use App\Nova\Metrics\NewProducts;
use App\Nova\Metrics\ProductPerDay;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Slug;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Nova\Actions\RedirectToIndex;

class Product extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Product>
     */
    public static $model = \App\Models\Product::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    //subtitle for the global search
    public function subtitle()
    {
        return "Brand: {$this->brand->name}";
    }

    //limit the number of results shown on the global search
    public static $globalSearchResults = 10;


    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name',
        'description',
        'price',

    ];

    // to make the table small
    public static $tableStyle = 'tight';

    // for showing columns of the tabel 
    // public static $showColumnBorders = true;

    //overide the click action on the table.
    public static $clickAction = 'edit';

    public static $perPageOptions = [50, 100, 150];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            Slug::make('Slug')
                ->from('name')
                ->required()
                ->hideFromIndex()
                ->withMeta(['extraAttributes' => [
                    'readonly' => 'true'
                ]]),

            Text::make('name')
                ->required()
                ->showOnPreview()
                ->sortable(),
            Markdown::make('description')
                ->required()
                ->showOnPreview()
                ->sortable(),
            Number::make('price')
                ->required()
                ->showOnPreview()
                ->sortable(),
            Number::make('quantity')
                ->required()
                ->showOnPreview()
                ->sortable(),
            BelongsTo::make('Brand')
                ->sortable()
                ->showOnPreview(),
            Boolean::make('Status', 'is_published')
                ->required()
                ->showOnPreview()
                ->sortable(),


        ];
    }


    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [
            new NewProducts(),
            new AveragePrice(),
            new ProductPerDay(),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [
            //adding a custom filter
            new ProductBrand()

        ];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
