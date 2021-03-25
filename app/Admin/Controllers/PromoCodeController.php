<?php

namespace App\Admin\Controllers;

use App\Models\PromoCode;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PromoCodeController extends AdminController {

    protected $title = 'PromoCode';


    protected function grid () {
        $grid = new Grid(new PromoCode());

        $grid->column('id', __('Id'));
        $grid->column('code', __('Code'));
        $grid->column('description', __('Description'));
        $grid->column('enable', __('Enable'));
        $grid->column('type', __('type'));
        $grid->column('value', __('Value'));
        $grid->column('endDate', __('EndDate'));
        $grid->column('condition', __('Condition'));
        $grid->column('conditionValue', __('ConditionValue'));
        $grid->column('countUses', __('CountUses'));

        return $grid;
    }

    protected function detail ($id) {
        $show = new Show(PromoCode::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('code', __('Code'));
        $show->field('description', __('Description'));
        $show->field('enable', __('Enable'));
        $show->field('value', __('Value'));
        $show->field('type', __('type'));
        $show->field('endDate', __('EndDate'));
        $show->field('condition', __('Condition'));
        $show->field('conditionValue', __('ConditionValue'));
        $show->field('countUses', __('CountUses'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    protected function form () {
        $form = new Form(new PromoCode());

        $form->text('code', __('Code'));
        $form->text('description', __('Description'));
        $form->switch('enable', __('Enable'))->default(1);
        $form->number('value', __('Value'))->min(0);
        $form->text('type', __('type'));
        $form->date('endDate', __('EndDate'))->default(date('Y-m-d'));
        $form->text('condition', __('Condition'));
        $form->text('conditionValue', __('ConditionValue'));

        return $form;
    }
}
