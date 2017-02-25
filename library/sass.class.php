<?php
namespace buffy;
/*
 * This file is part of buffy
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
*/
class Sass
{

    private static $imports=null;
    private static $variables=null;
    private static $collection=null;
    private $name =null;
    private $items=null;


    public function __construct($name){

        $this->name=$name;
        $this->items=array();



    }


    public function __get($itemname){

      if (isset($this->items[$itemname])){

          return $this->items[$itemname];

      }

      return null;

    }

    public function __set($itemname,$itemvalue){

            $this->items[$itemname]=$itemvalue;

    }

    public static function instanceListItem($name=null,$item=null){

      if (self::$collection==null){
        self::$collection =array();
      }

      if ($name==null && $item==null){
          return self::$collection;
      }

      if ($name==null){
              throw new Exception('Cannot save null list item');
      }

      if (!isset(self::$collection[$name])){
        $class=get_called_class();
        self::$collection[$name] = new $class($name);
      }

       if ($item == null){
           return self::$collection[$name];
      }


       self::$collection[$name]=$item;




    }


    public static function newVariable($key,$value){

      if (self::$variables==null){
        self::$variables=array();
      }

      self::$variables[$key]=$value;


    }

    public static function newImport($url){

      if (self::$imports==null){
        self::$imports=array();
      }

      array_push(self::$imports,$url);

    }


}
