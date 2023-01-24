<?php

class TextException extends Exception {

};
class Text 
{
    private $title;                 /* Заголовок текста */
    private $text;                  /* Текст */
    private $author;                /* Имя автора */
    private $published;             /* Дата */
    public  $slug;                   /* Имя для файла */

     public function __construct($author, $slug)
     {
          $this->author = $author;
          $this->slug = $slug;
          $this->published = date( "d-m-Y H:m");
     }    

     public function storeText($title, $text)
     {    
          $data = ["title" => $title, "text" => $text, "author" => $this->author, "published" => $this->published];
          file_put_contents($this->slug, serialize($data));
          // print_r($data);
     }

     public function loadText()
     {
          if(filesize($this->slug)) {
               $data = unserialize(file_get_contents($this->slug));
               $this->title = $data["title"];
               $this->text = $data["text"];
               $this->author = $data["author"];
               $this->published = $data["published"];
          }
     }

     public function editText ($title, $text) 
     {
          $this->title = $title;
          $this->text = $text;
     }

     public function checkText($text)
     {
        if(strlen($text) > 500) {
            throw new TextException ('Длина текста превышает допустимое значение');
        }
     }

     
}


// /* Задание №9 */





abstract class User implements EventListenerInterface
{
    public $id;
    public $name;
    public $role;

    abstract function getTextsToEdit();
    abstract function attachEvent ($method);
    abstract function detouchEvent ($method);
}

interface LoggerInterface 
{
    public function logMessage($stringError);
    public function lastMessages($num);
}

class Log implements LoggerInterface
{
    private $slug = "Logs.txt";
    private $logs = [];

    public function logMessage($stringError)
    {
        $this->logs[] = $stringError;
        // print_r($this->logs);
        file_put_contents($this->slug, serialize($this->logs));
    }

    public function lastMessages($num)
    {
        if (file_exists($this->slug)) {
            $logs = unserialize(file_get_contents($this->slug));
            print_r(array_slice($logs, -$num));
        }
    }
}

interface EventListenerInterface
{
   public function attachEvent ($method);
   public function detouchEvent ($method);
}
