<?php

abstract class MagnumEloquent extends \Eloquent
{

    /** @var array */
    protected $rules = [];

    /** @var array */
    protected $messages = [];

    /** @var Validator */
    protected $validator;

    /** @return bool */
    public function validate(array $attributes = [])
    {
        if (!$this->beforeValidate()) {
            return false;
        }

        if ($attributes) {
            $this->validator = Validator::make($attributes, $this->rules, $this->messages);
        } else {
            $this->validator = Validator::make(Input::all(), $this->rules, $this->messages);
        }

        if (!$this->afterValidate()) {
            return false;
        }
        return $this->validator->passes();
    }

    /** @return MagnumEloquent */
    public function saveValidated()
    {
        if ($this->validate()) {
            if (!$this->beforeSave()) {
                return null;
            }
            $this->save();
            if (!$this->afterSave()) {
                return null;
            }
            return $this;
        }
    }

    public function updateValidated(array $attributes = [])
    {
        if ($this->validate($attributes)) {
            $this->update();
            return $this;
        } else {
            var_dump("retardado {$this->validate()}");
        }
    }

    /** @return bool */
    public function beforeValidate()
    {
        return true;
    }

    /** @return bool */
    public function afterValidate()
    {
        return true;
    }

    /** @return bool */
    public function beforeSave()
    {
        return true;
    }

    /** @return bool */
    public function afterSave()
    {
        return true;
    }

    /** @return Validator */
    public function errors()
    {
        return $this->validator;
    }

} 