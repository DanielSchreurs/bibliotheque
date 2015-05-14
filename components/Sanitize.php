<?php
namespace Components;


trait Sanitize
{

    public $sanitize=[];
    public function sanitize($oSent)
    {
        foreach ($oSent as $field => $value) {
            if (isset($this->sanitizeRule[$field])) {
                foreach ($this->sanitizeRule[$field] as $k => $v) {
                    $this->$v['ruleName']($value,$field);
                }
            }
        }
    }

    public function string($value,$field)
    {
       $this->sanitize[$field]=filter_var($value,FILTER_SANITIZE_FULL_SPECIAL_CHARS,FILTER_FLAG_STRIP_LOW);
    }

}