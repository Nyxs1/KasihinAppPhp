<?php
require_once __DIR__ . '../../config/database.php';
require_once __DIR__ . '../../core/response.php';
require_once __DIR__ . '../../models/CampaignModel.php';

$campaigns = getAllCampaigns();
jsonResponse($campaigns);
