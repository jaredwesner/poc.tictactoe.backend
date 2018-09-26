# API

## Requests

### **POST** - /oauth/token

#### Description
This route authenticates users with oauth and returns an access_token and refresh_token

#### CURL

```sh
curl -X POST "http://poc.tictactoe.backend/oauth/token" \
    -H "Content-Type: application/json; charset=utf-8" \
    --data-raw "$body"
```

#### Header Parameters

- **Content-Type** should respect the following schema:

```
{
  "type": "string",
  "enum": [
    "application/json; charset=utf-8"
  ],
  "default": "application/json; charset=utf-8"
}
```

#### Body Parameters

- **body** should respect the following schema:

```
{
  "type": "string",
  "default": "{\"grant_type\":\"password\",\"client_id\":\"2\",\"client_secret\":\"jpHyqfL8ZQOBr0BZ9HlKSt4dm50wHLgnZuNAIhOe\",\"username\":\"jdwesner2@gmail.com\",\"password\":\"admin1234\",\"scope\":\"\"}"
}
```

### **POST** - /api/auth/register

#### Description
Create a user on the system

#### CURL

```sh
curl -X POST "http://poc.tictactoe.backend/api/auth/register" \
    -H "Content-Type: application/x-www-form-urlencoded" \
    --data-raw "name"="jared" \
    --data-raw "email"="jdwesner2@gmail.com" \
    --data-raw "password"="admin1234"
```

#### Header Parameters

- **Content-Type** should respect the following schema:

```
{
  "type": "string",
  "enum": [
    "application/x-www-form-urlencoded"
  ],
  "default": "application/x-www-form-urlencoded"
}
```

#### Body Parameters

- **name** should respect the following schema:

```
{
  "type": "string",
  "enum": [
    "jared"
  ],
  "default": "jared"
}
```
- **email** should respect the following schema:

```
{
  "type": "string",
  "default": "jdwesner2@gmail.com"
}
```
- **password** should respect the following schema:

```
{
  "type": "string",
  "default": "admin1234"
}
```

### **POST** - /api/user/game/start

#### Description
Start a user game

mode:VersusCom,VersusHuman

type:Regular,Easy,Medium,Hard

#### CURL

```sh
curl -X POST "http://poc.tictactoe.backend/api/user/game/start" \
    -H "Authorization: Bearer {access_token}" \
    -H "Content-Type: application/json; charset=utf-8" \
    --data-raw "$body"
```

#### Header Parameters

- **Authorization** should respect the following schema:

```
{
  "type": "string",
  "enum": [
    "Bearer {access_token}"
  ],
  "default": "Bearer {access_token}"
}
```
- **Content-Type** should respect the following schema:

```
{
  "type": "string",
  "enum": [
    "application/json; charset=utf-8"
  ],
  "default": "application/json; charset=utf-8"
}
```

#### Body Parameters

- **body** should respect the following schema:

```
{
  "type": "string",
  "default": "{\"mode\":\"VersusCom\",\"type\":\"Regular\"}"
}
```

### **GET** - /api/user/game/52

#### Description
get a user game by token

#### CURL

```sh
curl -X GET "http://poc.tictactoe.backend/api/user/game/52" \
    -H "Authorization: Bearer {access_token}" \
    -H "Content-Type: application/x-www-form-urlencoded" \
    --data-raw "$body"
```

#### Header Parameters

- **Authorization** should respect the following schema:

```
{
  "type": "string",
  "enum": [
    "Bearer {access_token}"
  ],
  "default": "Bearer {access_token}"
}
```
- **Content-Type** should respect the following schema:

```
{
  "type": "string",
  "enum": [
    "application/x-www-form-urlencoded"
  ],
  "default": "application/x-www-form-urlencoded"
}
```

#### Body Parameters

- **body** should respect the following schema:

```
{
  "type": "string",
  "default": ""
}
```

### **POST** - /api/user/game/52/move

#### Description
Make a move 

#### CURL

```sh
curl -X POST "http://poc.tictactoe.backend/api/user/game/52/move" \
    -H "Authorization: Bearer {access_token}" \
    -H "Content-Type: application/json" \
    --data-raw "$body"
```

#### Header Parameters

- **Authorization** should respect the following schema:

```
{
  "type": "string",
  "enum": [
    "Bearer {access_token}"
  ],
  "default": "Bearer {access_token}"
}
```
- **Content-Type** should respect the following schema:

```
{
  "type": "string",
  "enum": [
    "application/json"
  ],
  "default": "application/json"
}
```

#### Body Parameters

- **body** should respect the following schema:

```
{
  "type": "string",
  "default": "{\"row\":0,\"col\":0}"
}
```

### **GET** - /api/user/games

#### Description
List user games

#### CURL

```sh
curl -X GET "http://poc.tictactoe.backend/api/user/games" \
    -H "Authorization: Bearer {access_token}" \
    -H "Content-Type: application/x-www-form-urlencoded" \
    --data-raw "$body"
```

#### Header Parameters

- **Authorization** should respect the following schema:

```
{
  "type": "string",
  "enum": [
    "Bearer {access_token}"
  ],
  "default": "Bearer {access_token}"
}
```
- **Content-Type** should respect the following schema:

```
{
  "type": "string",
  "enum": [
    "application/x-www-form-urlencoded"
  ],
  "default": "application/x-www-form-urlencoded"
}
```

#### Body Parameters

- **body** should respect the following schema:

```
{
  "type": "string",
  "default": ""
}
```

### **GET** - /api/user

#### Description
return a user logged in

#### CURL

```sh
curl -X GET "http://poc.tictactoe.backend/api/user" \
    -H "Authorization: Bearer {access_token}" \
    -H "Content-Type: application/x-www-form-urlencoded" \
    --data-raw "name"="jared" \
    --data-raw "email"="jdwesner2@gmail.com" \
    --data-raw "password"="admin1234"
```

#### Header Parameters

- **Authorization** should respect the following schema:

```
{
  "type": "string",
  "enum": [
    "Bearer {access_token}"
  ],
  "default": "Bearer {access_token}"
}
```
- **Content-Type** should respect the following schema:

```
{
  "type": "string",
  "enum": [
    "application/x-www-form-urlencoded"
  ],
  "default": "application/x-www-form-urlencoded"
}
```

#### Body Parameters

- **name** should respect the following schema:

```
{
  "type": "string",
  "enum": [
    "jared"
  ],
  "default": "jared"
}
```
- **email** should respect the following schema:

```
{
  "type": "string",
  "default": "jdwesner2@gmail.com"
}
```
- **password** should respect the following schema:

```
{
  "type": "string",
  "default": "admin1234"
}
```

## References

