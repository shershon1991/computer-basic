<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2020/2/14
 * Time: 12:28
 */

// 组合模式
interface RenderInterface {
    public function render();
}

class Form implements RenderInterface {
    private $elements;

    public function render()
    {
        $formCode = '<form>';
        foreach($this->elements as $element) {
            $formCode .= $element->render();
        }
        $formCode .= '</form>';
        return $formCode;
    }

    public function addElement(RenderInterface $element) {
        $this->elements[] = $element;
    }
}

class InputElement implements RenderInterface {
    public function render() {
        return '<input type="text" />';
    }
}

class TextElement implements RenderInterface {
    private $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function render()
    {
        return $this->text;
    }
}

$form = new Form();
$form->addElement(new TextElement('Email:'));
$form->addElement(new InputElement());
echo $form->render();

