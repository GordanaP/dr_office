<?php

/**
 * Create the response message.
 *
 * @param  string  $message
 * @param  string  $type
 * @return array
 */
function message($message, $type="success")
{
    $response['message'] = $message;
    $response['type'] = $type;

    return $response;
}

/**
 * Indicate an active link.
 *
 * @param string  $value
 * @param integer $segment
 * @return  string
 */
function set_active_link($value, $segment=1)
{
    return request()->segment($segment) == $value ? 'active' : '';
}

/**
 * Indicate a selected option.
 *
 * @param  integer $current
 * @param  integer $selected
 * @return string
 */
function selected($current, $selected)
{
    return $current == $selected ? 'selected' : '';
}

/**
 * Set avatar.
 *
 * @param \App\User $user
 * @return string
 */
function setAvatar($profile)
{
    $avatar = optional($profile->avatar)->filename ?: 'default.jpg';
    return 'images/avatars/'.$avatar;
}

/**
 * Set avatar name.
 *
 * @param int $userId
 * @param Fil $file
 */
function setAvatarName($userId, $file)
{
    return $userId.'-'.$file->getClientOriginalName();
}