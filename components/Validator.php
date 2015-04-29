<?php
/**
 * Created by PhpStorm.
 * User: danielschreurs
 */

namespace Components;


use Helpers\Date;
use Helpers\Image;

trait Validator
{
    public $errors = [];
    private $areRequired = [];

    public function validate($oSent, $aFiles = null)
    {
        foreach ($oSent as $field => $value) {
            if (isset($this->validatiRules[$field])) {
                //$k c'est le tableau qui contien le tableau des règles
                foreach ($this->validatiRules[$field] as $k => $v) {
                    if ($v['ruleName'] == 'notEmpty') {
                        $this->areRequired[] = $field;
                    }
                    $this->$v['ruleName']($field, $value, isset($v['error']) ? $v['error'] : null);
                }

            }
        }
        if ($aFiles != null) {
            foreach ($aFiles as $file => $value) {

                if (isset($this->validatiRules[$file])) {
                    foreach ($this->validatiRules[$file] as $k => $v) {
                        if ($v['ruleName'] == 'notEmptyFile') {
                            $this->areRequired[] = $file;
                        }
                        $this->$v['ruleName']($file, $value, isset($v['error']) ? $v['error'] : null);
                    }
                }
            }
        }
        return empty($this->errors) ? true : false;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    private function notEmpty($field, $value, $error)
    {
        if (trim($value) != '') {
            return true;
        } else {
            $message = is_null($error) ? 'Le champ ' . $field . ' est obligatoire.' : $error;
            if (isset($this->errors[$field])) {
                array_push($this->errors[$field][], $message);
            } else {
                $this->errors[$field][] = $message;
            }
            return false;
        }
    }

    private function notEmptyFile($field, $image, $error)
    {
        return self::notEmpty($field, $image['name'], $error) ? true : false;
    }

    private function validExtension($field, $image, $error)
    {
        $isRequired = array_key_exists($field, $this->areRequired);
        if (
            ($isRequired && Image::isValidExtension($image)) ||
            (!$isRequired && Image::isValidExtension($image) && !empty($value))
        ) {

            return true;
        } else {
            $message = is_null($error) ? 'Ce n’est pas un format valide.' : $error;
            if (isset($this->errors[$field])) {
                array_push($this->errors[$field], $message);
            } else {
                $this->errors[$field][] = $message;

            }

            return false;
        }
    }

    public function isDate($field, $value, $error)
    {
        $isRequired = array_key_exists($field, $this->areRequired);
        if (!$isRequired && empty($value)) {
            return true;//si le champs n'est pas obligatoire
        }
        if (
            ($isRequired && Date::isValiddateFormat($value)) ||
            (!$isRequired && Date::isValiddateFormat($value) && !empty($value))
        ) {

            return true;
        } else {
            $message = is_null($error) ? $field . ' n’est pas au bon format.' : $error;
            if (isset($this->errors[$field])) {
                array_push($this->errors[$field][], $message);
            } else {
                $this->errors[$field][] = $message;
            }
            return false;
        }

    }

    public function dateIsPast($field, $value, $error)
    {

        $isRequired = array_key_exists($field, $this->areRequired);
        if (!$isRequired && empty($value)) {
            return true;
        } elseif (Date::isValiddateFormat($value) && !empty($value)) {
            if (
                ($isRequired && Date::isDatePast($value)) ||
                (!$isRequired && Date::isDatePast($value) && !empty($value))
            ) {
                return true;
            } else {
                $message = is_null($error) ? $field . ' doit être dans le passé.' : $error;
                if (isset($this->errors[$field])) {
                    array_push($this->errors[$field], $message);
                } else {
                    $this->errors[$field][] = $message;
                }
                return false;
            }
        }
    }
}