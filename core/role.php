<?php
function isInfluencer($user) {
    return $user['role'] === 'influencer';
}
