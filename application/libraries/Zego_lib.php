<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . 'third_party/zego/auto_loader.php';

use ZEGO\ZegoServerAssistant;
use ZEGO\ZegoErrorCodes;

const PrivilegeKeyLogin   = 1;
const PrivilegeKeyPublish = 2;

const PrivilegeEnable     = 1;
const PrivilegeDisable    = 0;


class Zego_lib
{

  public function get_app_id()
  {
    $appId = '618963248';
    return $appId;
  }

  public function get_app_secret()
  {
    $serverSecret = '4b0874bedea39478bad92b0b4b756f9a';
    return $serverSecret;
  }

  public function generate_token($userId, $roomId, $duration)
  {
    $tokenCode = '';
    if ($userId != '' && $roomId != '') {
      $appId = $this->get_app_id();
      $serverSecret = $this->get_app_secret();

      $rtcRoomPayLoad = [
        'room_id' => $roomId,
        'privilege' => [
          PrivilegeKeyLogin => PrivilegeEnable,
          PrivilegeKeyPublish => PrivilegeDisable,
        ],
        'stream_id_list' => []
      ];

      $payload = json_encode($rtcRoomPayLoad);

      $token = ZegoServerAssistant::generateToken04($appId, $userId, $serverSecret, $duration, $payload);
      if ($token->code == ZegoErrorCodes::success) {
        $tokenCode = $token->token;
      }
    }
    return $tokenCode;
    // demo
    // 3AAAAAGCKKT8AEGZvcmtpc2xieW4wdTI4cXcAoPBuvYE1pAu6k+I9aVF4ooQFkG60sNBVZd8quE2Y/lIgkr60HZT5nP1fUgYABO+wpdT7EOJi00k1oycbtpP3E4wsOgAU11gyPSkBVyJ3V4i2nma8v9IPuH5r9WOVSqsngwWDAlBVxjVO14cWyfGc3UDynsALk+qd9Rk8PVrhWTNWpqZxCsUDyk79omSC4wI4CY/wLmiM+AN+wcL9ohGUNbo=
  }
}
