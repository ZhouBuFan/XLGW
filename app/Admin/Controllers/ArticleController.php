<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '文章单页';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());
        $grid->actions(function ($actions) {

            // 去掉删除
            $actions->disableDelete();

        });

        $grid->column('id', __('Id'));
        $grid->column('title', __('页面'));
    //        $grid->column('container_zh', __('中文内容'));
    //        $grid->column('container_en', __('英文内容'));
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
        $show = new Show(Article::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('页面'));
        $show->container_zh('中文内容')->unescape()->as(function ($container_zh) {
            return "{$container_zh}";
        });
        $show->container_en('英文内容')->unescape()->as(function ($container_en) {
            return "{$container_en}";
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
        $form = new Form(new Article());

        $form->text('title', __('页面'))->readonly();;
        $form->UEditor('container_zh', __('中文内容'))->options(['initialFrameHeight' => 400]);;
        $form->UEditor('container_en', __('英文内容'))->options(['initialFrameHeight' => 400]);;

        return $form;
    }
}
