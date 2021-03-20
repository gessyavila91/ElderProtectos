<?php

namespace App\Admin\Controllers;

use App\Models\matComponent;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;


class MatComponentController extends AdminController {

    private $assetPath = 'assets/img/customMat';

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'matComponent';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid () {

        $grid = new Grid(new matComponent());
        $states = [
            'on' => ['value' => '1', 'text' => 'Enable', 'color' => 'success'],
            'off' => ['value' => '0', 'text' => 'Disable', 'color' => 'warning'],
        ];
        
        $grid->column('id', 'Id')->sortable();
        $grid->column('code', 'Code');
        $grid->column('enable', 'Enable')
            /*->switch($states)*/
           ->display(function () {
            if ($this->enable == 1){
                    return '<a class="label label-success"><i class="fa fa-check"></i></a>';
                }else{
                    return '<a class="label label-warning"><i class="fa fa-ban"></i></a>';
                }
            });
        $grid->column('fileName', __('FileName'))->display(function ($logo) {
            return "<img height='25px' src=".env('APP_URL')."/".$this->assetPath.$logo .">";
        });
        
        $grid->column('description', 'Description')
            ->editable();
        
        $grid->column('type', 'Type')
            ->editable('select', [
                'B' => 'Background',
                'F' => 'Frame',
                'L' => 'Logo']);


        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail ($id) {
        $show = new Show(matComponent::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('code', __('Code'));
        $show->label('enable', 'Enable')->as(function ($content) {
            if ($content == 1){
                return '<i class="fa fa-check"></i>';
            }else{
                return '<i class="fa fa-ban"></i>';
            }
        })->label();

        $show->field('fileName', __('FileName'))->image();
        $show->field('description', __('Description'));
        $show->field('type', 'Type')
            ->using(['B' => 'Background', 'F' => 'Frame', 'L' => 'Logo'])
            ->label();

        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form () {
        $form = new Form(new matComponent());

        $form->text('code', 'Code')->rules('required|min:3|max:10|regex:/^[A-Z]{3,10}/',[
            'regex' => 'Code must be UpperCase Characters.',
            'min'   => 'Code can not be less than 3 characters.',
            'max'   => 'The Code may not be greater than 10 characters.',
        ]);

        $states = [
            'off' => ['value' => 0, 'text' => 'disable', 'color' => 'danger'],
            'on'  => ['value' => 1, 'text' => 'enable', 'color' => 'success'],
        ];
        $form->switch('enable', 'Enable')->states($states);

        $form->image('fileName', 'FileName')
            ->thumbnail('small', $width = 300, $height = 300)
            ->move($this->assetPath)
            ->removable()
            ->rules('required');

        $form->text('description', 'Description')->rules('required|min:3|max:255',[
            'min'   => 'Code can not be less than 3 characters.',
            'max'   => 'The Code may not be greater than 255 characters.',
        ]);

        $form->radio('type', 'Type')
            ->options([
                'B' => 'Background',
                'F' => 'Frame',
                'L' => 'Logo'])
            ->default('B');

        return $form;
    }
}
