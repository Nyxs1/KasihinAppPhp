<?php
require_once '../../config/database.php';
require_once '../../core/response.php';
require_once '../../models/CampaignModel.php';

$campaigns = getAllCampaigns();
jsonResponse($campaigns);
