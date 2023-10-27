<?php

namespace AKlump\DrupalDotEnv;

use \RuntimeException;

class Env {

  public static function get(string $var_name, $default = NULL) {
    return (new self())($var_name, $default);
  }

  /**
   * Return environment with default fallback option.
   *
   * @param string $var_name
   *   Name of the environment variable.
   * @param mixed $default
   *   The default value to return if $var_name does not exist.  If this is not
   *   passed then the $var_name must be set or an exception is thrown.
   *
   * @return mixed
   *   The set or default value if passed.
   *
   * @throws \RuntimeException
   *   If the environment variable is not defined and $default is not provided.
   */
  public function __invoke(string $var_name, $default = NULL) {
    if (array_key_exists($var_name, $_ENV)) {
      return $_ENV[$var_name];
    }
    // This second case seems to be required to work in CLI mode with Drush in
    // come environments.
    $value = getenv($var_name);
    if ($value !== FALSE) {
      return $value;
    }
    if (func_num_args() === 1) {
      throw new RuntimeException("One or more environment variables failed assertions: $var_name is missing.");
    }

    return $default;
  }

}
