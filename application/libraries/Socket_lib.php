<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'third_party/vendor/autoload.php';

use Workerman\Worker;
use Workerman\Connection\TcpConnection;
use Workerman\Connection\AsyncTcpConnection;
use Workerman\Timer;

global $api_key, $currencyList;
$api_key = 'hGTuHkfVeTZRjN2nkaUk1'; // Enter your API_KEY here,
$currencyList = '1,1984,80,81,7774,7778';  // currency ids

class Socket_lib
{

  private $worker;

  public function __construct()
  {
    $this->worker = new Worker("ws://fcsapi.com/v3/?EIO=3&transport=websocket");
  }

  public function run_connection()
  {

    $this->worker->onWebSocketConnect = function ($connection) {
      /** @var $connection TcpConnection */

      $connection->urlGetData = $_GET;
    };

    $this->worker->onConnect = function ($connection) {
      /** @var $connection TcpConnection */
      //$connection->urlGetData = $_GET;
      // Connect API KEY to verify subscription
      global $api_key;
      $connection->send('42["heartbeat","' . $api_key . '"]'); //send api_key

      // connect your required Forex IDs with server
      global $currencyList;
      $connection->send('42["real_time_join","' . $currencyList . '"]'); //currency list
    };

    $this->worker->onMessage = function ($connection, $data) {
      /** @var $connection TcpConnection */
      return $data;
    };

    $this->worker::runAll();
  }
  // function run_connection()
  // {
  //   global $api_key;
  //   $worker = new Worker();
  //   $worker->onWorkerStart = function () use ($api_key) {
  //     return $this->start_connection();
  //   };
  //   Worker::runAll();
  // }
  // function start_connection()
  // {
  //   global $api_key, $currencyList, $backup;
  //   // Websocket protocol for client.
  //   if ($backup)
  //     $ws_connection = new AsyncTcpConnection("ws://fxcoinapi.com/v3/?EIO=3&transport=websocket");
  //   else
  //     $ws_connection = new AsyncTcpConnection("ws://fcsapi.com/v3/?EIO=3&transport=websocket");

  //   // $class_methods = get_class_methods($ws_connection);
  //   // print_r($class_methods);

  //   // return domain name of connected server
  //   echo "Connect with " . $ws_connection->getRemoteIp() . " \n";

  //   $ws_connection->onConnect = function ($connection) use ($api_key) {
  //     global $currencyList;
  //     $this->heart_beat($connection); // initalize hear beat
  //     $this->join_ids($connection); // join currency ids
  //     $this->socket_ping($connection); // set ping interval
  //   };

  //   // received all response from socket, then direct to it right function.
  //   $ws_connection->onMessage = function ($connection, $data) {
  //     $pos    = stripos($data, "[");
  //     if ($pos >= 1) {
  //       $data = json_decode(substr($data, $pos), true); // convert json string to array
  //       if (!empty($data)) {
  //         return $data;
  //       }
  //     }
  //   };

  //   // Error Message
  //   $ws_connection->onError = function ($connection, $code, $msg) {
  //     echo "error: $msg\n";
  //   };

  //   // Disconnect Message
  //   $ws_connection->onClose = function ($connection) {
  //     echo "connection closed ------------------------------------ \n";
  //     // $connection->connect(); // connect with same server
  //     die;
  //     // OR
  //     global $backup;
  //     $backup = !$backup;
  //     $this->start_connection(); // connect with backup server
  //   };

  //   // Start Connection
  //   $ws_connection->connect();
  // }
  // // socket heartbeat require once every hour, if your heartbeat stop so you will disconnect
  // function heart_beat(&$con)
  // {
  //   global $api_key;
  //   $con->send('42["heartbeat","' . $api_key . '"]'); //send api_key
  // }

  // // connect your required Forex IDs with server
  // function join_ids(&$con)
  // {
  //   global $currencyList;
  //   $con->send('42["real_time_join","' . $currencyList . '"]'); //currency list
  // }

  // // set ping interval and heart beat
  // function socket_ping(&$con)
  // {
  //   if (!empty($con->timeout_timerid))
  //     Timer::del($con->timeout_timerid);
  //   if (!empty($con->fcs_heart))
  //     Timer::del($con->fcs_heart);

  //   $con->timeout_timerid = Timer::add(15, function () use (&$con) { //ping
  //     //echo "send ping --------------- ".date("H:i:s")." - \n";
  //     $con->send('2');
  //   });


  //   $con->fcs_heart = Timer::add((60 * 60), function () use (&$con) { //ping
  //     //echo "send heart beat --------------- ".date("H:i:s")." - \n";
  //     $this->heart_beat($con);
  //   });

  //   // Debug: what if connection close!!! - Auto reconnect
  //   // Close connection after 20 seconds
  //   /*$con->fcs_heart = Timer::add(20, function()use (&$con){ //ping
  //       $con->close(); 
  //   });*/
  // }

  // When connection when need.
  // $connection->close();
}
