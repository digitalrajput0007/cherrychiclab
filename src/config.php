<?php
declare(strict_types=1);

/**
 * CherryChic Beauty & Fragrance Lab - Affiliate & Site Configuration
 */

// Amazon India Associates Tag (Live Active Tracking ID)
define('AMAZON_AFFILIATE_TAG', 'cherrychic01-21');

// Cuelinks Publisher ID (Pending 48-hour approval; leave empty until approved)
define('CUELINKS_PUB_ID', '');

// Canonical Site Base URL
define('SITE_URL', 'https://cherrychic.in');

// Backwards-compatible alias for existing code
if (!defined('AMAZON_ASSOCIATE_TAG')) {
    define('AMAZON_ASSOCIATE_TAG', AMAZON_AFFILIATE_TAG);
}

