# AUTH plug-in of the php
## Auther: Qs 

## need 
```
PHP >= 7.1
```


## How to use
```php
// 1、use the class
use Qs\Auth\Token;

// 2、build has user_id token or no user_id token
// general case "no user_id token" is use in save password, "has user_id token" use in interaction verification
// has user_id
$token = Token::build($userID);
// not user_id
$token = Token::build();

// 3、analysis token, the token is no user_id is return null, has user_id token is return array('token','user_id') 
$analysis = Token::analysis($token);

```