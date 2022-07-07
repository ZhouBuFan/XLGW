<?php

namespace App\Admin\Controllers;

use App\Models\Enterprise;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MediaController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '媒体咨询';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Enterprise());
        $grid->model()->where('type', '=', 2);
        $grid->column('id', __('Id'));
        $grid->column('title_zh', __('中文标题'));
        $grid->column('title_en', __('英文标题'));
        $grid->column('introduction_zh', __('中文简介'));
        $grid->column('introduction_en', __('英文简介'));
        $grid->column('created_at', __('创建时间'));
        $grid->column('updated_at', __('修改时间'));
        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Enterprise::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title_zh', __('中文标题'));
        $show->field('title_en', __('英文标题'));
        $show->field('introduction_zh', __('中文简介'));
        $show->field('introduction_en', __('英文简介'));
        $show->field('content_zh', __('中文文章'));
        $show->content_zh('中文文章')->unescape()->as(function ($content_zh) {
            return "{$content_zh}";
        });
        $show->content_en('英文文章')->unescape()->as(function ($content_en) {
            return "{$content_en}";
        });
        $show->field('created_at', __('创建时间'));
        $show->field('updated_at', __('修改时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Enterprise());

        $form->text('title_zh', __('中文标题'));
        $form->text('title_en', __('英文标题'));
        $form->text('introduction_zh', __('中文简介'));
        $form->text('introduction_en', __('英文简介'));
        $form->UEditor('content_zh', __('中文文章'))->options(['initialFrameHeight' => 400]);;
        $form->UEditor('content_en', __('英文文章'))->options(['initialFrameHeight' => 400]);;
        $form->hidden('type');
        $form->saving(function (Form $form) {
            $form->type =2;
        });

        return $form;
    }
}
