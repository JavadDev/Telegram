<?php

# Developer: @HawkinTheRain (Contact Me in Telegram)

class Telegram
{
	private $token;

	public function __construct(string $token)
	{
		$this->token = $token;
	}

	public function sendRequest(string $method = 'getMe', array $data = [])
	{
		$url = 'https://api.telegram.org/bot' . $this->token . '/' . $method;
		$curl = curl_init();

		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

		$exec = curl_exec($curl);
		$error = curl_error($curl);
		curl_close($curl);

		if ($error) {
			throw new Exception($error);
		} else {
			$response = json_decode($exec, true);
			if (! $response['ok']) {
				throw new Exception($response['description']);
			}

			return $response['result'];
		}
	}

	public function getWebhookInfo()
	{
		return $this->sendRequest('getWebhookInfo');
	}

	public function getMe()
	{
		return $this->sendRequest('getMe');
	}

	public function logOut()
	{
		return $this->sendRequest('logOut');
	}

	public function close()
	{
		return $this->sendRequest('close');
	}

	public function getUpdates($offset = null, $limit = null, $timeout = null, $allowed_updates = null)
	{
		$data = array(
			'offset' => $offset,
			'limit' => $limit,
			'timeout' => $timeout,
			'allowed_updates' => $allowed_updates,
		);

		return $this->sendRequest('getUpdates', $data);
	}

	public function setWebhook($url, $certificate = null, $ip_address = null, $max_connections = null, $allowed_updates = null, $drop_pending_updates = null)
	{
		$data = array(
			'url' => $url,
			'certificate' => $certificate,
			'ip_address' => $ip_address,
			'max_connections' => $max_connections,
			'allowed_updates' => $allowed_updates,
			'drop_pending_updates' => $drop_pending_updates,
		);

		return $this->sendRequest('setWebhook', $data);
	}

	public function deleteWebhook($drop_pending_updates = null)
	{
		$data = array(
			'drop_pending_updates' => $drop_pending_updates,
		);

		return $this->sendRequest('deleteWebhook', $data);
	}

	public function sendMessage($chat_id, $text, $parse_mode = null, $entities = null, $disable_web_page_preview = null, $disable_notification = null, $reply_to_message_id = null, $allow_sending_without_reply = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'text' => $text,
			'parse_mode' => $parse_mode,
			'entities' => $entities,
			'disable_web_page_preview' => $disable_web_page_preview,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'allow_sending_without_reply' => $allow_sending_without_reply,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('sendMessage', $data);
	}

	public function forwardMessage($chat_id, $from_chat_id, $message_id, $disable_notification = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'from_chat_id' => $from_chat_id,
			'disable_notification' => $disable_notification,
			'message_id' => $message_id,
		);

		return $this->sendRequest('forwardMessage', $data);
	}

	public function copyMessage($chat_id, $from_chat_id, $message_id, $caption = null, $parse_mode = null, $caption_entities = null, $disable_notification = null, $reply_to_message_id = null, $allow_sending_without_reply = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'from_chat_id' => $from_chat_id,
			'message_id' => $message_id,
			'caption' => $caption,
			'parse_mode' => $parse_mode,
			'caption_entities' => $caption_entities,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'allow_sending_without_reply' => $allow_sending_without_reply,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('copyMessage', $data);
	}

	public function sendPhoto($chat_id, $photo, $caption = null, $parse_mode = null, $caption_entities = null, $disable_notification = null, $reply_to_message_id = null, $allow_sending_without_reply = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'photo' => $photo,
			'caption' => $caption,
			'parse_mode' => $parse_mode,
			'caption_entities' => $caption_entities,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'allow_sending_without_reply' => $allow_sending_without_reply,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('sendPhoto', $data);
	}

	public function sendAudio($chat_id, $audio, $caption = null, $parse_mode = null, $caption_entities = null, $duration = null, $performer = null, $title = null, $thumb = null, $disable_notification = null, $reply_to_message_id = null, $allow_sending_without_reply = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'audio' => $audio,
			'caption' => $caption,
			'parse_mode' => $parse_mode,
			'caption_entities' => $caption_entities,
			'duration' => $duration,
			'performer' => $performer,
			'title' => $title,
			'thumb' => $thumb,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'allow_sending_without_reply' => $allow_sending_without_reply,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('sendAudio', $data);
	}

	public function sendDocument($chat_id, $document, $thumb = null, $caption = null, $parse_mode = null, $caption_entities = null, $disable_content_type_detection = null, $disable_notification = null, $reply_to_message_id = null, $allow_sending_without_reply = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'document' => $document,
			'thumb' => $thumb,
			'caption' => $caption,
			'parse_mode' => $parse_mode,
			'caption_entities' => $caption_entities,
			'disable_content_type_detection' => $disable_content_type_detection,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'allow_sending_without_reply' => $allow_sending_without_reply,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('sendDocument', $data);
	}

	public function sendVideo($chat_id, $video, $duration = null, $width = null, $height = null, $thumb = null, $caption = null, $parse_mode = null, $caption_entities = null, $supports_streaming = null, $disable_notification = null, $reply_to_message_id = null, $allow_sending_without_reply = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'video' => $video,
			'duration' => $duration,
			'width' => $width,
			'height' => $height,
			'thumb' => $thumb,
			'caption' => $caption,
			'parse_mode' => $parse_mode,
			'caption_entities' => $caption_entities,
			'supports_streaming' => $supports_streaming,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'allow_sending_without_reply' => $allow_sending_without_reply,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('sendVideo', $data);
	}

	public function sendAnimation($chat_id, $animation, $duration = null, $width = null, $height = null, $thumb = null, $caption = null, $parse_mode = null, $caption_entities = null, $disable_notification = null, $reply_to_message_id = null, $allow_sending_without_reply = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'animation' => $animation,
			'duration' => $duration,
			'width' => $width,
			'height' => $height,
			'thumb' => $thumb,
			'caption' => $caption,
			'parse_mode' => $parse_mode,
			'caption_entities' => $caption_entities,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'allow_sending_without_reply' => $allow_sending_without_reply,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('sendAnimation', $data);
	}

	public function sendVoice($chat_id, $voice, $caption = null, $parse_mode = null, $caption_entities = null, $duration = null, $disable_notification = null, $reply_to_message_id = null, $allow_sending_without_reply = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'voice' => $voice,
			'caption' => $caption,
			'parse_mode' => $parse_mode,
			'caption_entities' => $caption_entities,
			'duration' => $duration,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'allow_sending_without_reply' => $allow_sending_without_reply,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('sendVoice', $data);
	}

	public function sendVideoNote($chat_id, $video_note, $duration = null, $length = null, $thumb = null, $disable_notification = null, $reply_to_message_id = null, $allow_sending_without_reply = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'video_note' => $video_note,
			'duration' => $duration,
			'length' => $length,
			'thumb' => $thumb,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'allow_sending_without_reply' => $allow_sending_without_reply,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('sendVideoNote', $data);
	}

	public function sendMediaGroup($chat_id, $media, $disable_notification = null, $reply_to_message_id = null, $allow_sending_without_reply = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'media' => $media,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'allow_sending_without_reply' => $allow_sending_without_reply,
		);

		return $this->sendRequest('sendMediaGroup', $data);
	}

	public function sendLocation($chat_id, $latitude, $longitude, $horizontal_accuracy = null, $live_period = null, $heading = null, $proximity_alert_radius = null, $disable_notification = null, $reply_to_message_id = null, $allow_sending_without_reply = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'horizontal_accuracy' => $horizontal_accuracy,
			'live_period' => $live_period,
			'heading' => $heading,
			'proximity_alert_radius' => $proximity_alert_radius,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'allow_sending_without_reply' => $allow_sending_without_reply,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('sendLocation', $data);
	}

	public function editMessageLiveLocation($chat_id = null, $message_id = null, $inline_message_id = null, $latitude, $longitude, $horizontal_accuracy = null, $heading = null, $proximity_alert_radius = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'message_id' => $message_id,
			'inline_message_id' => $inline_message_id,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'horizontal_accuracy' => $horizontal_accuracy,
			'heading' => $heading,
			'proximity_alert_radius' => $proximity_alert_radius,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('editMessageLiveLocation', $data);
	}

	public function stopMessageLiveLocation($chat_id = null, $message_id = null, $inline_message_id = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'message_id' => $message_id,
			'inline_message_id' => $inline_message_id,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('stopMessageLiveLocation', $data);
	}

	public function sendVenue($chat_id, $latitude, $longitude, $title, $address, $foursquare_id = null, $foursquare_type = null, $google_place_id = null, $google_place_type = null, $disable_notification = null, $reply_to_message_id = null, $allow_sending_without_reply = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'title' => $title,
			'address' => $address,
			'foursquare_id' => $foursquare_id,
			'foursquare_type' => $foursquare_type,
			'google_place_id' => $google_place_id,
			'google_place_type' => $google_place_type,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'allow_sending_without_reply' => $allow_sending_without_reply,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('sendVenue', $data);
	}

	public function sendContact($chat_id, $phone_number, $first_name, $last_name = null, $vcard = null, $disable_notification = null, $reply_to_message_id = null, $allow_sending_without_reply = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'phone_number' => $phone_number,
			'first_name' => $first_name,
			'last_name' => $last_name,
			'vcard' => $vcard,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'allow_sending_without_reply' => $allow_sending_without_reply,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('sendContact', $data);
	}

	public function sendPoll($chat_id, $question, $options, $is_anonymous = null, $type = null, $allows_multiple_answers = null, $correct_option_id = null, $explanation = null, $explanation_parse_mode = null, $explanation_entities = null, $open_period = null, $close_date = null, $is_closed = null, $disable_notification = null, $reply_to_message_id = null, $allow_sending_without_reply = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'question' => $question,
			'options' => $options,
			'is_anonymous' => $is_anonymous,
			'type' => $type,
			'allows_multiple_answers' => $allows_multiple_answers,
			'correct_option_id' => $correct_option_id,
			'explanation' => $explanation,
			'explanation_parse_mode' => $explanation_parse_mode,
			'explanation_entities' => $explanation_entities,
			'open_period' => $open_period,
			'close_date' => $close_date,
			'is_closed' => $is_closed,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'allow_sending_without_reply' => $allow_sending_without_reply,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('sendPoll', $data);
	}

	public function sendDice($chat_id, $emoji = null, $disable_notification = null, $reply_to_message_id = null, $allow_sending_without_reply = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'emoji' => $emoji,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'allow_sending_without_reply' => $allow_sending_without_reply,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('sendDice', $data);
	}

	public function sendChatAction($chat_id, $action)
	{
		$data = array(
			'chat_id' => $chat_id,
			'action' => $action,
		);

		return $this->sendRequest('sendChatAction', $data);
	}

	public function getUserProfilePhotos($user_id, $offset = null, $limit = null)
	{
		$data = array(
			'user_id' => $user_id,
			'offset' => $offset,
			'limit' => $limit,
		);

		return $this->sendRequest('getUserProfilePhotos', $data);
	}

	public function getFile($file_id)
	{
		$data = array(
			'file_id' => $file_id,
		);

		return $this->sendRequest('getFile', $data);
	}

	public function banChatMember($chat_id, $user_id, $until_date = null, $revoke_messages = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'user_id' => $user_id,
			'until_date' => $until_date,
			'revoke_messages' => $revoke_messages,
		);

		return $this->sendRequest('banChatMember', $data);
	}

	public function unbanChatMember($chat_id, $user_id, $only_if_banned = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'user_id' => $user_id,
			'only_if_banned' => $only_if_banned,
		);

		return $this->sendRequest('unbanChatMember', $data);
	}

	public function restrictChatMember($chat_id, $user_id, $permissions, $until_date = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'user_id' => $user_id,
			'permissions' => $permissions,
			'until_date' => $until_date,
		);

		return $this->sendRequest('restrictChatMember', $data);
	}

	public function promoteChatMember($chat_id, $user_id, $is_anonymous = null, $can_manage_chat = null, $can_post_messages = null, $can_edit_messages = null, $can_delete_messages = null, $can_manage_voice_chats = null, $can_restrict_members = null, $can_promote_members = null, $can_change_info = null, $can_invite_users = null, $can_pin_messages = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'user_id' => $user_id,
			'is_anonymous' => $is_anonymous,
			'can_manage_chat' => $can_manage_chat,
			'can_post_messages' => $can_post_messages,
			'can_edit_messages' => $can_edit_messages,
			'can_delete_messages' => $can_delete_messages,
			'can_manage_voice_chats' => $can_manage_voice_chats,
			'can_restrict_members' => $can_restrict_members,
			'can_promote_members' => $can_promote_members,
			'can_change_info' => $can_change_info,
			'can_invite_users' => $can_invite_users,
			'can_pin_messages' => $can_pin_messages,
		);

		return $this->sendRequest('promoteChatMember', $data);
	}

	public function setChatAdministratorCustomTitle($chat_id, $user_id, $custom_title)
	{
		$data = array(
			'chat_id' => $chat_id,
			'user_id' => $user_id,
			'custom_title' => $custom_title,
		);

		return $this->sendRequest('setChatAdministratorCustomTitle', $data);
	}

	public function setChatPermissions($chat_id, $permissions)
	{
		$data = array(
			'chat_id' => $chat_id,
			'permissions' => $permissions,
		);

		return $this->sendRequest('setChatPermissions', $data);
	}

	public function exportChatInviteLink($chat_id)
	{
		$data = array(
			'chat_id' => $chat_id,
		);

		return $this->sendRequest('exportChatInviteLink', $data);
	}

	public function createChatInviteLink($chat_id, $expire_date = null, $member_limit = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'expire_date' => $expire_date,
			'member_limit' => $member_limit,
		);

		return $this->sendRequest('createChatInviteLink', $data);
	}

	public function editChatInviteLink($chat_id, $invite_link, $expire_date = null, $member_limit = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'invite_link' => $invite_link,
			'expire_date' => $expire_date,
			'member_limit' => $member_limit,
		);

		return $this->sendRequest('editChatInviteLink', $data);
	}

	public function revokeChatInviteLink($chat_id, $invite_link)
	{
		$data = array(
			'chat_id' => $chat_id,
			'invite_link' => $invite_link,
		);

		return $this->sendRequest('revokeChatInviteLink', $data);
	}

	public function setChatPhoto($chat_id, $photo)
	{
		$data = array(
			'chat_id' => $chat_id,
			'photo' => $photo,
		);

		return $this->sendRequest('setChatPhoto', $data);
	}

	public function deleteChatPhoto($chat_id)
	{
		$data = array(
			'chat_id' => $chat_id,
		);

		return $this->sendRequest('deleteChatPhoto', $data);
	}

	public function setChatTitle($chat_id, $title)
	{
		$data = array(
			'chat_id' => $chat_id,
			'title' => $title,
		);

		return $this->sendRequest('setChatTitle', $data);
	}

	public function setChatDescription($chat_id, $description = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'description' => $description,
		);

		return $this->sendRequest('setChatDescription', $data);
	}

	public function pinChatMessage($chat_id, $message_id, $disable_notification = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'message_id' => $message_id,
			'disable_notification' => $disable_notification,
		);

		return $this->sendRequest('pinChatMessage', $data);
	}

	public function unpinChatMessage($chat_id, $message_id = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'message_id' => $message_id,
		);

		return $this->sendRequest('unpinChatMessage', $data);
	}

	public function unpinAllChatMessages($chat_id)
	{
		$data = array(
			'chat_id' => $chat_id,
		);

		return $this->sendRequest('unpinAllChatMessages', $data);
	}

	public function leaveChat($chat_id)
	{
		$data = array(
			'chat_id' => $chat_id,
		);

		return $this->sendRequest('leaveChat', $data);
	}

	public function getChat($chat_id)
	{
		$data = array(
			'chat_id' => $chat_id,
		);

		return $this->sendRequest('getChat', $data);
	}

	public function getChatAdministrators($chat_id)
	{
		$data = array(
			'chat_id' => $chat_id,
		);

		return $this->sendRequest('getChatAdministrators', $data);
	}

	public function getChatMemberCount($chat_id)
	{
		$data = array(
			'chat_id' => $chat_id,
		);

		return $this->sendRequest('getChatMemberCount', $data);
	}

	public function getChatMember($chat_id, $user_id)
	{
		$data = array(
			'chat_id' => $chat_id,
			'user_id' => $user_id,
		);

		return $this->sendRequest('getChatMember', $data);
	}

	public function setChatStickerSet($chat_id, $sticker_set_name)
	{
		$data = array(
			'chat_id' => $chat_id,
			'sticker_set_name' => $sticker_set_name,
		);

		return $this->sendRequest('setChatStickerSet', $data);
	}

	public function deleteChatStickerSet($chat_id)
	{
		$data = array(
			'chat_id' => $chat_id,
		);

		return $this->sendRequest('deleteChatStickerSet', $data);
	}

	public function answerCallbackQuery($callback_query_id, $text = null, $show_alert = null, $url = null, $cache_time = null)
	{
		$data = array(
			'callback_query_id' => $callback_query_id,
			'text' => $text,
			'show_alert' => $show_alert,
			'url' => $url,
			'cache_time' => $cache_time,
		);

		return $this->sendRequest('answerCallbackQuery', $data);
	}

	public function setMyCommands($commands, $scope = null, $language_code = null)
	{
		$data = array(
			'commands' => $commands,
			'scope' => $scope,
			'language_code' => $language_code,
		);

		return $this->sendRequest('setMyCommands', $data);
	}

	public function deleteMyCommands($scope = null, $language_code = null)
	{
		$data = array(
			'scope' => $scope,
			'language_code' => $language_code,
		);

		return $this->sendRequest('deleteMyCommands', $data);
	}

	public function getMyCommands($scope = null, $language_code = null)
	{
		$data = array(
			'scope' => $scope,
			'language_code' => $language_code,
		);

		return $this->sendRequest('getMyCommands', $data);
	}

	public function editMessageText($chat_id = null, $message_id = null, $inline_message_id = null, $text = null, $parse_mode = null, $entities = null, $disable_web_page_preview = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'message_id' => $message_id,
			'inline_message_id' => $inline_message_id,
			'text' => $text,
			'parse_mode' => $parse_mode,
			'entities' => $entities,
			'disable_web_page_preview' => $disable_web_page_preview,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('editMessageText', $data);
	}

	public function editMessageCaption($chat_id = null, $message_id = null, $inline_message_id = null, $caption = null, $parse_mode = null, $caption_entities = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'message_id' => $message_id,
			'inline_message_id' => $inline_message_id,
			'caption' => $caption,
			'parse_mode' => $parse_mode,
			'caption_entities' => $caption_entities,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('editMessageCaption', $data);
	}

	public function editMessageMedia($chat_id = null, $message_id = null, $inline_message_id = null, $media = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'message_id' => $message_id,
			'inline_message_id' => $inline_message_id,
			'media' => $media,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('editMessageMedia', $data);
	}

	public function editMessageReplyMarkup($chat_id = null, $message_id = null, $inline_message_id = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'message_id' => $message_id,
			'inline_message_id' => $inline_message_id,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('editMessageReplyMarkup', $data);
	}

	public function stopPoll($chat_id, $message_id, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'message_id' => $message_id,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('stopPoll', $data);
	}

	public function deleteMessage($chat_id, $message_id)
	{
		$data = array(
			'chat_id' => $chat_id,
			'message_id' => $message_id,
		);

		return $this->sendRequest('deleteMessage', $data);
	}

	public function sendSticker($chat_id, $sticker, $disable_notification = null, $reply_to_message_id = null, $allow_sending_without_reply = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'sticker' => $sticker,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'allow_sending_without_reply' => $allow_sending_without_reply,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('sendSticker', $data);
	}

	public function getStickerSet($name)
	{
		$data = array(
			'name' => $name,
		);

		return $this->sendRequest('getStickerSet', $data);
	}

	public function uploadStickerFile($user_id, $png_sticker)
	{
		$data = array(
			'user_id' => $user_id,
			'png_sticker' => $png_sticker,
		);

		return $this->sendRequest('uploadStickerFile', $data);
	}

	public function createNewStickerSet($user_id, $name, $title, $png_sticker = null, $tgs_sticker = null, $emojis, $contains_masks = null, $mask_position = null)
	{
		$data = array(
			'user_id' => $user_id,
			'name' => $name,
			'title' => $title,
			'png_sticker' => $png_sticker,
			'tgs_sticker' => $tgs_sticker,
			'emojis' => $emojis,
			'contains_masks' => $contains_masks,
			'mask_position' => $mask_position,
		);

		return $this->sendRequest('createNewStickerSet', $data);
	}

	public function addStickerToSet($user_id, $name, $png_sticker = null, $tgs_sticker = null, $emojis, $mask_position = null)
	{
		$data = array(
			'user_id' => $user_id,
			'name' => $name,
			'png_sticker' => $png_sticker,
			'tgs_sticker' => $tgs_sticker,
			'emojis' => $emojis,
			'mask_position' => $mask_position,
		);

		return $this->sendRequest('addStickerToSet', $data);
	}

	public function setStickerPositionInSet($sticker, $position)
	{
		$data = array(
			'sticker' => $sticker,
			'position' => $position,
		);

		return $this->sendRequest('setStickerPositionInSet', $data);
	}

	public function deleteStickerFromSet($sticker)
	{
		$data = array(
			'sticker' => $sticker,
		);

		return $this->sendRequest('deleteStickerFromSet', $data);
	}

	public function setStickerSetThumb($name, $user_id, $thumb = null)
	{
		$data = array(
			'name' => $name,
			'user_id' => $user_id,
			'thumb' => $thumb,
		);

		return $this->sendRequest('setStickerSetThumb', $data);
	}

	public function answerInlineQuery($inline_query_id, $results, $cache_time = null, $is_personal = null, $next_offset = null, $switch_pm_text = null, $switch_pm_parameter = null)
	{
		$data = array(
			'inline_query_id' => $inline_query_id,
			'results' => $results,
			'cache_time' => $cache_time,
			'is_personal' => $is_personal,
			'next_offset' => $next_offset,
			'switch_pm_text' => $switch_pm_text,
			'switch_pm_parameter' => $switch_pm_parameter,
		);

		return $this->sendRequest('answerInlineQuery', $data);
	}

	public function sendInvoice($chat_id, $title, $description, $payload, $provider_token, $currency, $prices, $max_tip_amount = null, $suggested_tip_amounts = null, $start_parameter = null, $provider_data = null, $photo_url = null, $photo_size = null, $photo_width = null, $photo_height = null, $need_name = null, $need_phone_number = null, $need_email = null, $need_shipping_address = null, $send_phone_number_to_provider = null, $send_email_to_provider = null, $is_flexible = null, $disable_notification = null, $reply_to_message_id = null, $allow_sending_without_reply = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'title' => $title,
			'description' => $description,
			'payload' => $payload,
			'provider_token' => $provider_token,
			'currency' => $currency,
			'prices' => $prices,
			'max_tip_amount' => $max_tip_amount,
			'suggested_tip_amounts' => $suggested_tip_amounts,
			'start_parameter' => $start_parameter,
			'provider_data' => $provider_data,
			'photo_url' => $photo_url,
			'photo_size' => $photo_size,
			'photo_width' => $photo_width,
			'photo_height' => $photo_height,
			'need_name' => $need_name,
			'need_phone_number' => $need_phone_number,
			'need_email' => $need_email,
			'need_shipping_address' => $need_shipping_address,
			'send_phone_number_to_provider' => $send_phone_number_to_provider,
			'send_email_to_provider' => $send_email_to_provider,
			'is_flexible' => $is_flexible,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'allow_sending_without_reply' => $allow_sending_without_reply,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('sendInvoice', $data);
	}

	public function answerShippingQuery($shipping_query_id, $ok, $shipping_options = null, $error_message = null)
	{
		$data = array(
			'shipping_query_id' => $shipping_query_id,
			'ok' => $ok,
			'shipping_options' => $shipping_options,
			'error_message' => $error_message,
		);

		return $this->sendRequest('answerShippingQuery', $data);
	}

	public function answerPreCheckoutQuery($pre_checkout_query_id, $ok, $error_message = null)
	{
		$data = array(
			'pre_checkout_query_id' => $pre_checkout_query_id,
			'ok' => $ok,
			'error_message' => $error_message,
		);

		return $this->sendRequest('answerPreCheckoutQuery', $data);
	}

	public function setPassportDataErrors($user_id, $errors)
	{
		$data = array(
			'user_id' => $user_id,
			'errors' => $errors,
		);

		return $this->sendRequest('setPassportDataErrors', $data);
	}

	public function sendGame($chat_id, $game_short_name, $disable_notification = null, $reply_to_message_id = null, $allow_sending_without_reply = null, $reply_markup = null)
	{
		$data = array(
			'chat_id' => $chat_id,
			'game_short_name' => $game_short_name,
			'disable_notification' => $disable_notification,
			'reply_to_message_id' => $reply_to_message_id,
			'allow_sending_without_reply' => $allow_sending_without_reply,
			'reply_markup' => $reply_markup,
		);

		return $this->sendRequest('sendGame', $data);
	}

	public function setGameScore($user_id, $score, $force = null, $disable_edit_message = null, $chat_id = null, $message_id = null, $inline_message_id = null)
	{
		$data = array(
			'user_id' => $user_id,
			'score' => $score,
			'force' => $force,
			'disable_edit_message' => $disable_edit_message,
			'chat_id' => $chat_id,
			'message_id' => $message_id,
			'inline_message_id' => $inline_message_id,
		);

		return $this->sendRequest('setGameScore', $data);
	}

	public function getGameHighScores($user_id, $chat_id = null, $message_id = null, $inline_message_id = null)
	{
		$data = array(
			'user_id' => $user_id,
			'chat_id' => $chat_id,
			'message_id' => $message_id,
			'inline_message_id' => $inline_message_id,
		);

		return $this->sendRequest('getGameHighScores', $data);
	}
}