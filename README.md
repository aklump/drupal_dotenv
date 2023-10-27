# DotEnv for Drupal

## Installation

1. Add this to your Drupal app's _composer.json_

  ```json
  {
    "repositories": [
      {
        "type": "github",
        "url": "https://github.com/aklump/drupal_dotenv"
      }
    ]
  }
  ```

2. `composer require aklump/drupal_dotenv`
3. Create a file called _.env_ in the directory above the Drupal webroot (`DRUPAL_ROOT`).
4. **Do not commit _.env_ to source control!**
5. Add one or more environment variables to it like this:

  ```
  S3_BUCKET="dotenv"
  SECRET_KEY="souper_seekret_key"
  ```

## Usage

When you need to obtain a value use one of the following syntax:

```php
$getenv = new \AKlump\DrupalDotEnv\Env();
$value = $getenv('S3_BUCKET');
```

```php
$value = (new \AKlump\DrupalDotEnv\Env())('S3_BUCKET');
```

```php
$value = \AKlump\DrupalDotEnv\Env::get('S3_BUCKET');
```
