<?php

use App\User;

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
 * Set the class color.
 *
 * @param [type] $param  [description]
 * @param [type] $value  [description]
 * @param string $class1 [description]
 * @param string $class2 [description]
 */
// function set_class($param, $value, $class1=' green', $class2=' red')
// {
//     return $param == $value ? $class1 : $class2;
// }

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
function setAvatar($user)
{
    $avatar = optional($user->avatar)->filename ?: 'default.jpg';

    return 'images/avatars/'.$avatar;
}

function setAvatarName($userId, $file)
{
    return $userId.'-'.$file->getClientOriginalName();
}