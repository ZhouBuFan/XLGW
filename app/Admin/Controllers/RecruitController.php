<?php

namespace App\Admin\Controllers;

use App\Models\Recruit;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class RecruitController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Recruit';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Recruit());
        $grid->column('id', __('Id'));
        $grid->column('title', __('岗位名称'));
        $grid->column('salary', __('薪资范围'));
        $grid->column('age', __('年龄范围'));
        $grid->column('tag', __('岗位福利标签'));
        $grid->column('introduction', __('简介'));
        $grid->column('content', __('详情'));
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
        $show = new Show(Recruit::findOrFail($id));
        $show->field('id', __('Id'));
        $show->field('title', __('岗位名称'));
        $show->field('salary', __('薪资范围'));
        $show->field('age', __('年龄范围'));
        $show->field('tag', __('岗位福利标签'));
        $show->field('introduction', __('简介'));
        $show->content('详情')->unescape()->as(function ($content) {
            return "{$content}";
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
        $form = new Form(new Recruit());
        $form->text('title', __('岗位名称'));
        $form->text('salary', __('薪资范围'));
        $form->text('age', __('年龄范围'));
        $form->text('tag', __('岗位福利标签'))->help('请用英文逗号 , 分隔每一个标签');
        $form->text('introduction', __('简介'));
        $form->UEditor('content', __('详情'))->options(['initialFrameHeight' => 400]);
        return $form;
    }
}
