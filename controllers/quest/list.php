<?php
require_once '../../config/database.php';
require_once '../../core/response.php';
require_once '../../models/QuestModel.php';

$quests = getAllQuests();
jsonResponse($quests);
