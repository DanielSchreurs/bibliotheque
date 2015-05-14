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
            if (isset($this->validationRules[$field])) {
                //$k c'est le tableau qui contien le tableau des règles
                foreach ($this->validationRules[$field] as $k => $v) {
                    if ($v['ruleName'] == 'notEmpty') {
                        $this->areRequired[$field] = true;
                    }
                    $this->$v['ruleName']($field, $value, isset($v['error']) ? $v['error'] : null);
                }

            }
        }
        if ($aFiles != null) {
            foreach ($aFiles as $file => $value) {

                if (isset($this->validationRules[$file])) {
                    foreach ($this->validationRules[$file] as $k => $v) {
                        if ($v['ruleName'] == 'isEmptyFile') {
                            $this->areRequired[$file] = true;
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

    public function isValid()
    {
        return empty($this->errors);
    }

    private function notEmpty($field, $value, $error)
    {
        if (trim($value) !== '') {
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

    private function isEmptyFile($field, $image, $error)
    {
        return self::notEmpty($field, $image['name'], $error) ? true : false;
    }

    private function isValidExtension($field, $image, $error)
    {
        $isRequired = isset($this->areRequired[$field]);
        if (!$isRequired && empty($image['name'])) {
            return true;
        } else {
            if (
                ($isRequired && Image::isValidExtension($image)) ||
                (!$isRequired && Image::isValidExtension($image) && !empty($image['name']))
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
    }

    public function isDate($field, $value, $error)
    {
        $isRequired = isset($this->areRequired[$field]);
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
                array_push($this->errors[$field], $message);
            } else {
                $this->errors[$field][] = $message;
            }
            return false;
        }

    }

    public function dateIsPast($field, $value, $error)
    {
        $isRequired = isset($this->areRequired[$field]);
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
                    array_push($this->errors[$field][], $message);
                } else {
                    $this->errors[$field][] = $message;
                }
                return false;
            }
        }
    }

    public function isValidUrl($field, $value, $error)
    {

        $isRequired = isset($this->areRequired[$field]);
        if (!$isRequired && empty($value)) {
            return true;
        } else {
            if (
                ($isRequired && (filter_var($value, FILTER_VALIDATE_URL) == $value)) ||
                (!$isRequired && (filter_var($value, FILTER_VALIDATE_URL) == $value) && !empty($value))
            ) {
                return true;
            } else {
                $message = is_null($error) ? 'Ce n’est pas un format d’URL valide.' : $error;
                if (isset($this->errors[$field])) {
                    array_push($this->errors[$field], $message);
                } else {
                    $this->errors[$field][] = $message;
                }
                return false;
            }
        }
    }

    public function isValidId($field, $value, $error)
    {
        $range = array('min_range' => 0);
        $isRequired = isset($this->areRequired[$field]);
        if (!$isRequired && empty($value)) {
            return true;
        } else {
            if (
                ($isRequired && (filter_var($value, FILTER_VALIDATE_INT, $range) !== false)) ||
                (!$isRequired && (filter_var($value, FILTER_VALIDATE_INT, $range) !== false) && !empty($value))
            ) {
                return true;
            } else {
                $message = is_null($error) ? 'Ce n’est pas un id valid' : $error;
                if (isset($this->errors[$field])) {
                    array_push($this->errors[$field], $message);
                } else {
                    $this->errors[$field][] = $message;
                }
                return false;
            }
        }
    }

    public function isValidInt($field, $value, $error)
    {

        $isRequired = isset($this->areRequired[$field]);
        if (!$isRequired && empty($value)) {
            return true;
        } else {
            if (
                ($isRequired && (filter_var($value, FILTER_VALIDATE_INT) !== false)) ||
                (!$isRequired && (filter_var($value, FILTER_VALIDATE_INT) !== false) && !empty($value))
            ) {
                return true;
            } else {
                $message = is_null($error) ? 'Ce n’est pas un nombre valid' : $error;
                if (isset($this->errors[$field])) {
                    array_push($this->errors[$field], $message);
                } else {
                    $this->errors[$field][] = $message;
                }
                return false;
            }
        }
    }

    public function isValidIsbn($field, $value, $error)
    {
        $range = array(
            'options' => array(
                'min_range' => 9999999,
                'max_range' => 99999999999999
            )
        );
        $isRequired = isset($this->areRequired[$field]);
        if (!$isRequired && empty($value)) {
            return true;
        } else {
            if (
                ($isRequired && (filter_var($value, FILTER_VALIDATE_INT, $range) !== false)) ||
                (!$isRequired && (filter_var($value, FILTER_VALIDATE_INT, $range) !== false) && !empty($value))
            ) {
                return true;
            } else {
                $message = is_null($error) ? 'Ce n’est pas un ISBN valid' : $error;
                if (isset($this->errors[$field])) {
                    array_push($this->errors[$field], $message);
                } else {
                    $this->errors[$field][] = $message;
                }
                return false;
            }
        }
    }

    public function isValidNbPage($field, $value, $error)
    {
        $range = array(
            'options' => array(
                'min_range' => 3
            )
        );
        $isRequired = isset($this->areRequired[$field]);
        if (!$isRequired && empty($value)) {
            return true;
        } else {
            if (
                ($isRequired && (filter_var($value, FILTER_VALIDATE_INT, $range) !== false)) ||
                (!$isRequired && (filter_var($value, FILTER_VALIDATE_INT, $range) !== false) && !empty($value))
            ) {
                return true;
            } else {
                $message = is_null($error) ? 'Ce n’est pas un ISBN valid' : $error;
                if (isset($this->errors[$field])) {
                    array_push($this->errors[$field], $message);
                } else {
                    $this->errors[$field][] = $message;
                }
                return false;
            }
        }
    }

    public function isValidEmail($field, $value, $error)
    {
        $isRequired = isset($this->areRequired[$field]);
        if (!$isRequired && empty($value)) {
            return true;
        } else {
            if (
                ($isRequired && (filter_var($value, FILTER_VALIDATE_EMAIL) !== false)) ||
                (!$isRequired && (filter_var($value, FILTER_VALIDATE_EMAIL) !== false) && !empty($value))
            ) {
                return true;
            } else {
                $message = is_null($error) ? 'Ce n’est pas un e-mail valid' : $error;
                if (isset($this->errors[$field])) {
                    array_push($this->errors[$field], $message);
                } else {
                    $this->errors[$field][] = $message;
                }
                return false;
            }
        }
    }

    public function isValidPassWord($field, $value, $error)
    {
        $pattern = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[\da-zA-Z]{8,20}$/';
        $isRequired = isset($this->areRequired[$field]);
        if (!$isRequired && empty($value)) {
            return true;
        } else {
            if (
                ($isRequired && preg_match($pattern, $value) === 1) ||
                (!$isRequired && preg_match($pattern, $value) === 1) && !empty($value)
            ) {
                return true;
            } else {
                if (!preg_match('/[A-Z]/', $value)) {
                    $messages[] = 'Il manque une lettre majuscule';
                }
                if (!preg_match('/[a-z]/', $value)) {
                    $messages[] = 'Il manque une lettre minuscule';
                }
                if (!preg_match('/[0-9]/', $value)) {
                    $messages[] = 'Il manque un nombre';
                }
                if (strlen($value) < 8) {
                    $messages[] = 'Le mot de passe doit au moins contenir 8 caractères';
                }
                if (strlen($value) > 21) {
                    $messages[] = 'Le mot de passe ne peux pas dépasser 20 caractères';
                }
                if (isset($this->errors[$field])) {
                    foreach ($messages as $message) {
                        array_push($this->errors[$field], $message);
                    }
                } else {
                    foreach ($messages as $message) {
                        $this->errors[$field][] = $message;
                    }
                }
                return false;
            }
        }
    }
}