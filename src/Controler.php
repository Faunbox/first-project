<?php

declare(strict_types=1);

namespace App;

use App\Exception\AppException;

require_once("View.php");
require_once("Database.php");

class Controler {

    private const DEFAULT_ACTION = 'list';

    private static array $configuration = [];

    private array $request;
    private View $view;

    public static function initConfiguration(array $configuration):void
    {
        self::$configuration = $configuration;
    }

    public function __construct(array $request)
    {
        if (empty(self::$configuration['db']))
        {
            throw new AppException('Config error');
        }
        $db = new Database(self::$configuration['db']);

        $this->request = $request;
        $this->view = new View();     
    }

    private function action(): string
    {
        $data = (array) $this->getRequestGet();
        return $data['action'] ?? self::DEFAULT_ACTION;
    }

    public function run(): void {
        $viewParams = [];
        
        $action = $this->action();       

        switch($action){
            case 'create':
            $page = (string) 'create';
            $created = (bool) false;
            $data = (array) $this->getRequestPost();
              
              if(!empty($data)) {
                  $created = true;
                  $viewParams = [
                      'title' => $data['title'],
                      'description' => $data['description'],
              ];
            }
            $viewParams['created'] = $created;
            break;
            
            case 'show':
                $page = 'show';
              $viewParams = [
                  'title' => 'moja notatka',
                  'description' => 'opis',
              ];
              break;
              
            default: 
            $page = 'list';
            $viewParams['resultList'] = "wyświetlamy notatki";
                break;
            }
            $this->view->render($page, $viewParams);
    }

    private function getRequestPost(): array
    {
        return $this->request['post'] ?? [];
    }
    private function getRequestGet(): array
    {
        return $this->request['get'] ?? [];
    }
}