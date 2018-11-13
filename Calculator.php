<?php
    class Calculator{
        private $message;
        private $num;
        private $func;
        const MAXNUM = 3;

        public function __construct(){
            switch($_SERVER['REQUEST_METHOD']){
                case 'GET':
                        $this->message = $_GET;
                    break;
                case 'POST':
                        $this->message = $_POST;
                    break;
                case 'PUT':
                    parse_str(file_get_contents("php://input"),$this->message);
                    break;
                default:
                    throw new Exception('Invalid request method!');
            }

            for($i = 1; $i<=self::MAXNUM; $i++){
                if(isset($this->message['num' . $i])){
                    $this->num[$i-1] = (int) $this->message['num' . $i];
                }
                else{
                    $this->num[$i-1] = 0;
                }
            }

            if(isset($this->message['func'])){
                $this->func = $this->message['func'];
            }
            else{
                $this->func = 'sum';
            }
        }

        public function calculate(){
            $res = 0;
            switch($this->func){
                case 'sum':
                    for($i = 0; $i<self::MAXNUM; $i++){
                        $res += $this->num[$i];
                    }
                    return $res;
                case 'avg':
                    for($i = 0; $i<self::MAXNUM; $i++){
                        $res += $this->num[$i];
                    }
                    return $res/count($this->num);
                case 'mult':
                    for($i = 0, $res = 1; $i<self::MAXNUM; $i++){
                        $res *= $this->num[$i];
                    }
                    return $res;
                default:
                    for($i = 0; $i<self::MAXNUM; $i++){
                        $res += $this->num[$i];
                    }
                    return $res;
            }
        }

    }
?>