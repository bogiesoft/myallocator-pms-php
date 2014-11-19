<?php
/**
 * Copyright (C) 2014 MyAllocator
 *
 * A copy of the LICENSE can be found in the LICENSE file within
 * the root directory of this library.  
 *
 * Permission is hereby granted, free of charge, to any person obtaining a
 * copy of this software and associated documentation files (the "Software"),
 * to deal in the Software without restriction, including without limitation
 * the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
 * FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS
 * IN THE SOFTWARE.
 */

// Tested on PHP 5.5.9
//
// Usage: 
//
//     require_once("/path/to/this/file");
//     use MyAllocator\phpsdk\Api\HelloWorld;
//
//     $obj = new HelloWorld();
//     echo $obj->sayHi('hi!') . "\n";

echo "Loading config\n";

//Required packages
if (!function_exists('curl_init')) {
  throw new Exception('MyAllocator needs the CURL PHP extension.');
}

if (!function_exists('json_decode')) {
  throw new Exception('MyAllocator needs the JSON PHP extension.');
}

if (!function_exists('mb_detect_encoding')) {
  throw new Exception('MyAllocator needs the Multibyte String PHP extension.');
}

// Resources
foreach (glob(dirname(__FILE__) . '/MyAllocator/Resource/*.php') as $file) {
    require_once($file);
}

// Exceptions
foreach (glob(dirname(__FILE__) . '/MyAllocator/Exception/*.php') as $file) {
    require_once($file);
}

// Utilities
foreach (glob(dirname(__FILE__) . '/MyAllocator/Util/*.php') as $file) {
    require_once($file);
}

// Objects
foreach (glob(dirname(__FILE__) . '/MyAllocator/Object/*.php') as $file) {
    require_once($file);
}

// APIs
foreach (glob(dirname(__FILE__) . '/MyAllocator/Api/*.php') as $file) {
    require_once($file);
}