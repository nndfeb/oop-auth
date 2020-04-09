<?php

class Validasi
{

    private $_passed = FALSE,
        $_errors = array();

    public function check($items = array())
    {
        foreach ($items as $item => $rules) {
            foreach ($rules as $rule => $rule_value) {
                switch ($rule) {
                    case 'required':
                        if (trim(Input::get($item)) == FALSE && $rule_value == TRUE) {
                            $this->addError("$item Wajib diisi ");
                        }
                        break;
                    case 'min':
                        if (strlen(Input::get($item)) < $rule_value) {
                            $this->addError("$item minimal $rule_value Karakter ");
                        }
                        break;
                    case 'max':
                        if (strlen(Input::get($item)) > $rule_value) {
                            $this->addError("$item maxsimal $rule_value karakter ");
                        }
                        break;

                    default:
                        break;
                }
            }
        }

        // mrubah passed menjadi TRUE
        if (empty($this->_errors)) {
            $this->_passed = TRUE;
        }
        return $this;
    }

    private function addError($error)
    {
        $this->_errors[] = $error;
    }

    public function errors()
    {
        return $this->_errors;
    }

    public function passed()
    {
        return $this->_passed;
    }
}
