Some readme text

### Establish connection to database

Add this file to /config folder

```php
class DBInputs{

    CONST HOST = "";
    CONST DB_NAME = "";
    CONST USER = "";
    CONST PASSWORD = "";

    /**
     * @return string
     */
    public static function getHost(){

        return DBInputs::HOST;
    }

    /**
     * @return string
     */
    public static function getDbName()
    {
        return DBInputs::DB_NAME;
    }

    /**
     * @return string
     */
    public static function getUsername()
    {
        return DBInputs::USER;
    }

    /**
     * @return string
     */
    public static function getPassword()
    {
        return DBInputs::PASSWORD;
    }
}
```