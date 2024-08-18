<?php

namespace Core;

class ValidationException extends \Exception
{

    protected readonly array $errors;
    protected readonly array $old;

    public static function  throw($errors, $old)
    {
        $instance = new static();
        $instance->errors = $errors;
        $instance->old = $old;

        throw $instance;
    }

    /**
     * @return array
     */
    public function errors(): array
    {
        return $this->errors;
    }

    /**
     * @return array
     */
    public function old(): array
    {
        return $this->old;
    }


}
