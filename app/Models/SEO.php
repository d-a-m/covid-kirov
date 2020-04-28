<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SEO extends Model
{

    /**
     * @var string
     */
    protected $table = "seo";

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Массив с дежурными сообщениями о результате выполненной операции
     * @var array
     */
    public static $alerts = [
        'success_create' => 'Категория успешно добавлена!',
        'error_create' => 'Категория не была добавлена!',
        'success_update' => 'Категория успешно отредактирована!',
        'error_update' => 'Категория не была отредактирована!',
        'success_destroy' => 'Категория успешно удалена!',
        'error_destroy' => 'Категория не была удалена!',
    ];

    public static function getSEOSettings ($id)
    {
        $model = SEO::findOrFail($id);

        $meta['title'] = SEO::replaceTags($model->meta_title);
        $meta['description'] = SEO::replaceTags($model->meta_description);
        $meta['keywords'] = SEO::replaceTags($model->keywords);
        $meta['name'] = SEO::replaceTags($model->title);
        $meta['canonical'] = SEO::replaceTags($model->canonical);
        $meta['url'] = SEO::replaceTags($model->canonical);
        $meta['miniature'] = $model->meta_miniature ?? '';
        $meta['content'] = SEO::replaceTags($model->content);

        return $meta;
    }

    public static function getEmptyMeta ($title)
    {
        $meta['title'] = $title;
        $meta['description'] = '';
        $meta['keywords'] = '';
        $meta['name'] = $title;
        $meta['canonical'] = '';
        $meta['url'] = '';
        $meta['miniature'] = '';
        $meta['content'] = '';

        return $meta;
    }
}
