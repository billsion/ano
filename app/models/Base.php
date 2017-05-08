<?php
/* MIT License
 *
 * Copyright (c) [2017] [Bill billsion@gmail.com]
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
 * SOFTWARE.
 */

namespace App\Models;

class Base
{
    static function validator($input, $class_object)
    {
        $object = $class_object;
        if (strpos(strtolower(get_class($class_object)), 'service')) {
            $namespace = explode("services", strtolower(get_class($class_object)));
        } else {
            $namespace = explode("models", strtolower(get_class($class_object)));
        }
        $current_model_name = ltrim($namespace[1], '\\');
        $current_module_name = rtrim(str_replace('app\\modules\\', '', $namespace[0]), '\\');
        
        if (strpos($current_model_name, '\\')) {
            $current_model_name = str_replace('\\', '_', $current_model_name);
        }
        
        $data = array();
        $validator = \Validator::make($input, $object->rules);
        if ($validator->fails()) {
            $validator = $validator->messages()->toArray();
            foreach($validator as $_key => $_validator) {
                foreach ($_validator as &$__validator) {
                    $__msg = explode(' ', $__validator);
                    //var_dump($__msg);exit;
                    //$__validator = \Lang::get("{$current_module_name}::{$current_model_name}.{$__msg[0]}") . $__msg[1];
                    $__msg[0] = \Lang::get("{$current_module_name}::{$current_model_name}.{$__msg[0]}");
                    $__validator = implode(' ', $__msg);
                }
                $data[\Lang::get("{$current_module_name}::{$current_model_name}.{$_key}")] = $_validator;
            }
            return $data;
            return $validator;
        } else {
            return true;
        }
    }
    
    static function enable($int_value)
    {
        return $int_value ? \Lang::get('backend.enabled_yes') : \Lang::get('backend.enabled_no');
    }
}
