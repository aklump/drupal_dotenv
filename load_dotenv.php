<?php
/*
 * @file
 * Load .env file from the directory above DRUPAL_ROOT
 *
 * @link https://packagist.org/packages/vlucas/phpdotenv
 */
$dotenv = \Dotenv\Dotenv::createImmutable(DRUPAL_ROOT . '/..');
$dotenv->load();
