<?php

namespace App\Admin\Controllers;

use App\Models\Star;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StarController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '呼叫!请求创建星球';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Star());

        $grid->column('id', __('Id'));
        $grid->column('username', __('昵称'));
        $grid->column('usermail', __('邮箱'));
        $grid->column('starname', __('星球名称'));
        $grid->column('stardetail', __('星球介绍'));
        $grid->column('staricon', __('星球图标'))->image('',100, 100);
        $grid->column('starcategory', __('星球分类'));
        $grid->column('starreason', __('申请原因'));
        $grid->column('created_at', __('提交时间'));
        $grid->column('updated_at', __('批复时间'));
        $grid->column('istype', __('批复类型'))->editable('select', [0 => '未处理', 1 => '已通过', 2 => '未通过'])->sortable();

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
        $show = new Show(Star::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('username', __('昵称'));
        $show->field('usermail', __('邮箱'));
        $show->field('starname', __('星球名称'));
        $show->field('stardetail', __('星球介绍'));
        $show->field('staricon', __('星球图标'))->image();
        $show->field('starcategory', __('星球分类'));
        $show->field('starreason', __('申请原因'));
        $show->field('created_at', __('提交时间'));
        $show->field('updated_at', __('批复时间'));
        $show->field('istype', __('批复类型'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Star());

        $form->text('username', __('昵称'));
        $form->text('usermail', __('邮箱'));
        $form->text('starname', __('星球名称'));
        $form->text('stardetail', __('星球介绍'));
        $form->image('staricon', __('星球图标'));
        $form->text('starcategory', __('星球分类'));
        $form->text('starreason', __('申请原因'));
        $form->select('istype', __('批复类型'))->options([0 => '未批复', 1 => '已通过', 2 => '未通过']);
        return $form;
    }
}
