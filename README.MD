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

// 2、build has user_id token or no user_id token or password
// general case "no user_id token" is use in one time id, "has user_id token" use in interaction verification

// has user_id
$token = Token::build($userID);

// not user_id
$token = Token::build();

// build token by password,can not analysis
$token = Token::build_by_password($password);

// 3、analysis token, the token is no user_id is return null, has user_id token is return array('token','user_id') 
$analysis = Token::analysis($token);

```