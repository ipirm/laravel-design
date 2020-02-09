<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;

class Setting extends Resource
{
    public static function singleRecord(): bool
    {
        return true;
    }
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */

    public static $model = 'App\Setting';
    public static function label()
    {
        return 'Основные';
    }
    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Number::make('Клики по рекламному банеру','click')->readonly(),
            Text::make(('Заголовок'),'title'),
            Trix::make(('О нас'),'text'),
            Text::make(('Telegram'),'telegram')->hideFromIndex(),
            Text::make(('Jabber'),'jabber')->hideFromIndex(),
            Text::make(('VIPole'),'vip_pole')->hideFromIndex(),
            Text::make(('Рекламная ссылка'),'link')->hideFromIndex(),
            Image::make(('Картинка HD'),'desktop_image'),
            Image::make(('Картинка для Планшетов'),'tablet_image'),
            Image::make(('Картинка для Телефонов'),'mobile_image')->hideFromIndex(),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
