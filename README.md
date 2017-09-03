Some readme text

### Establish connection to database

Add this file to /config folder

```php
namespace App\Configuration;

class InputsConfiguration {

    CONST HOST = "localhost";
    CONST DB_NAME = "TemplateDatabase";
    CONST USER = "user1";
    CONST PASSWORD = "DevraisUser1";

    /**
     * @return string
     */
    public static function getHost(){

        return InputsConfiguration::HOST;
    }

    /**
     * @return string
     */
    public static function getDbName()
    {
        return InputsConfiguration::DB_NAME;
    }

    /**
     * @return string
     */
    public static function getUsername()
    {
        return InputsConfiguration::USER;
    }

    /**
     * @return string
     */
    public static function getPassword()
    {
        return InputsConfiguration::PASSWORD;
    }

}
```