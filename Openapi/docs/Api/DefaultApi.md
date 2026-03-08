# MauticPlugin\MauticTrelloBundle\Openapi\lib\DefaultApi

All URIs are relative to https://api.trello.com/1, except if the operation defines another base path.

| Method | HTTP request | Description |
| ------------- | ------------- | ------------- |
| [**addCard()**](DefaultApi.md#addCard) | **POST** /card |  |
| [**addChecklistItemOnCard()**](DefaultApi.md#addChecklistItemOnCard) | **POST** /checklists/{id}/checkItems | Create Checkitem on Checklist |
| [**addChecklistOnCard()**](DefaultApi.md#addChecklistOnCard) | **POST** /cards/{id}/checklists | Create Checklist on a Card |
| [**getAttachmentsOnCard()**](DefaultApi.md#getAttachmentsOnCard) | **GET** /card/{id}/attachments | Get Attachments on a Card |
| [**getBoardMembers()**](DefaultApi.md#getBoardMembers) | **GET** /boards/{id}/members | Get the Members of a Board |
| [**getBoards()**](DefaultApi.md#getBoards) | **GET** /members/me/boards |  |
| [**getCard()**](DefaultApi.md#getCard) | **GET** /cards/{id} | Get a Card |
| [**getCardsOnBoard()**](DefaultApi.md#getCardsOnBoard) | **GET** /boards/{id}/cards | Get Cards on a Board |
| [**getLists()**](DefaultApi.md#getLists) | **GET** /boards/{boardId}/lists |  |
| [**getMember()**](DefaultApi.md#getMember) | **GET** /members/{id} | Get a Member |
| [**updateCard()**](DefaultApi.md#updateCard) | **PUT** /cards/{id} | Update a Card |


## `addCard()`

```php
addCard($newCard): \MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\Card
```



Creates a new Trello card

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiToken
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('token', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('token', 'Bearer');

// Configure API key authorization: appKey
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');


$apiInstance = new MauticPlugin\MauticTrelloBundle\Openapi\lib\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$newCard = new \MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\NewCard(); // \MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\NewCard | Card to be added

try {
    $result = $apiInstance->addCard($newCard);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->addCard: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **newCard** | [**\MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\NewCard**](../Model/NewCard.md)| Card to be added | |

### Return type

[**\MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\Card**](../Model/Card.md)

### Authorization

[apiToken](../../README.md#apiToken), [appKey](../../README.md#appKey)

### HTTP request headers

- **Content-Type**: `application/json`
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addChecklistItemOnCard()`

```php
addChecklistItemOnCard($id, $name)
```

Create Checkitem on Checklist

Add a check item to a checklist

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiToken
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('token', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('token', 'Bearer');

// Configure API key authorization: appKey
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');


$apiInstance = new MauticPlugin\MauticTrelloBundle\Openapi\lib\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | ID of the checklist
$name = 'name_example'; // string | The name of the new check item. 1 to 16384 characters.

try {
    $apiInstance->addChecklistItemOnCard($id, $name);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->addChecklistItemOnCard: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| ID of the checklist | |
| **name** | **string**| The name of the new check item. 1 to 16384 characters. | |

### Return type

void (empty response body)

### Authorization

[apiToken](../../README.md#apiToken), [appKey](../../README.md#appKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `addChecklistOnCard()`

```php
addChecklistOnCard($id, $name, $idChecklistSource, $pos)
```

Create Checklist on a Card

Create a new checklist on a card

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiToken
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('token', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('token', 'Bearer');

// Configure API key authorization: appKey
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');


$apiInstance = new MauticPlugin\MauticTrelloBundle\Openapi\lib\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The ID of the Card
$name = 'name_example'; // string | The name of the checklist
$idChecklistSource = 'idChecklistSource_example'; // string | The ID of a source checklist to copy into the new one
$pos = 'pos_example'; // string | The position of the checklist on the card. One of: `top`, `bottom`, or a positive number.

try {
    $apiInstance->addChecklistOnCard($id, $name, $idChecklistSource, $pos);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->addChecklistOnCard: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The ID of the Card | |
| **name** | **string**| The name of the checklist | [optional] |
| **idChecklistSource** | **string**| The ID of a source checklist to copy into the new one | [optional] |
| **pos** | **string**| The position of the checklist on the card. One of: &#x60;top&#x60;, &#x60;bottom&#x60;, or a positive number. | [optional] |

### Return type

void (empty response body)

### Authorization

[apiToken](../../README.md#apiToken), [appKey](../../README.md#appKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: Not defined

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getAttachmentsOnCard()`

```php
getAttachmentsOnCard($id, $fields, $filter): \MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\Attachment[]
```

Get Attachments on a Card

List the attachments on a card

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiToken
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('token', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('token', 'Bearer');

// Configure API key authorization: appKey
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');


$apiInstance = new MauticPlugin\MauticTrelloBundle\Openapi\lib\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The ID of the Card
$fields = 'all'; // string | `all` or a comma-separated list of attachment fields
$filter = 'false'; // string | Use `cover` to restrict to just the cover attachment

try {
    $result = $apiInstance->getAttachmentsOnCard($id, $fields, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getAttachmentsOnCard: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The ID of the Card | |
| **fields** | **string**| &#x60;all&#x60; or a comma-separated list of attachment fields | [optional] [default to &#39;all&#39;] |
| **filter** | **string**| Use &#x60;cover&#x60; to restrict to just the cover attachment | [optional] [default to &#39;false&#39;] |

### Return type

[**\MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\Attachment[]**](../Model/Attachment.md)

### Authorization

[apiToken](../../README.md#apiToken), [appKey](../../README.md#appKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBoardMembers()`

```php
getBoardMembers($id, $fields): \MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\Member[]
```

Get the Members of a Board

Get the Members for a board

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiToken
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('token', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('token', 'Bearer');

// Configure API key authorization: appKey
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');


$apiInstance = new MauticPlugin\MauticTrelloBundle\Openapi\lib\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The ID of the board
$fields = 'id,fullName,username'; // string | `all` or a comma-separated list of member fields (e.g. id, fullName, username, email)

try {
    $result = $apiInstance->getBoardMembers($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getBoardMembers: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The ID of the board | |
| **fields** | **string**| &#x60;all&#x60; or a comma-separated list of member fields (e.g. id, fullName, username, email) | [optional] [default to &#39;id,fullName,username&#39;] |

### Return type

[**\MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\Member[]**](../Model/Member.md)

### Authorization

[apiToken](../../README.md#apiToken), [appKey](../../README.md#appKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getBoards()`

```php
getBoards($fields, $filter): \MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\TrelloBoard[]
```



Get all boards the user has access to

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiToken
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('token', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('token', 'Bearer');

// Configure API key authorization: appKey
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');


$apiInstance = new MauticPlugin\MauticTrelloBundle\Openapi\lib\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$fields = id,name; // string
$filter = open; // string

try {
    $result = $apiInstance->getBoards($fields, $filter);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getBoards: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **fields** | **string**|  | [optional] |
| **filter** | **string**|  | [optional] |

### Return type

[**\MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\TrelloBoard[]**](../Model/TrelloBoard.md)

### Authorization

[apiToken](../../README.md#apiToken), [appKey](../../README.md#appKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCard()`

```php
getCard($id, $fields): \MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\Card
```

Get a Card

Get a card by its ID

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiToken
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('token', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('token', 'Bearer');

// Configure API key authorization: appKey
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');


$apiInstance = new MauticPlugin\MauticTrelloBundle\Openapi\lib\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The ID of the Card
$fields = all; // string | `all` or a comma-separated list of card fields

try {
    $result = $apiInstance->getCard($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getCard: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The ID of the Card | |
| **fields** | **string**| &#x60;all&#x60; or a comma-separated list of card fields | [optional] [default to &#39;id,name,idChecklists,shortUrl,due,idMembers,url&#39;] |

### Return type

[**\MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\Card**](../Model/Card.md)

### Authorization

[apiToken](../../README.md#apiToken), [appKey](../../README.md#appKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getCardsOnBoard()`

```php
getCardsOnBoard($id, $fields, $attachments, $attachmentFields): \MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\Card[]
```

Get Cards on a Board

Get all of the open (non-archived) cards on a board. For other filters (closed, all, visible, etc.) use GET /boards/{id}/cards/{filter}.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiToken
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('token', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('token', 'Bearer');

// Configure API key authorization: appKey
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');


$apiInstance = new MauticPlugin\MauticTrelloBundle\Openapi\lib\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | ID of the Board
$fields = all; // string | Comma separated list of card fields to return (e.g. id,name,idChecklists,shortUrl,due,idMembers,url or all).
$attachments = 'true'; // string | Include attachments on cards. `true`, `false`, or `cover` (cover only).
$attachmentFields = 'url'; // string | `all` or a comma-separated list of attachment fields to return (e.g. url, name, id).

try {
    $result = $apiInstance->getCardsOnBoard($id, $fields, $attachments, $attachmentFields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getCardsOnBoard: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| ID of the Board | |
| **fields** | **string**| Comma separated list of card fields to return (e.g. id,name,idChecklists,shortUrl,due,idMembers,url or all). | [optional] [default to &#39;id,name,idChecklists,shortUrl,due,idMembers,url,attachments,dateLastActivity&#39;] |
| **attachments** | **string**| Include attachments on cards. &#x60;true&#x60;, &#x60;false&#x60;, or &#x60;cover&#x60; (cover only). | [optional] [default to &#39;true&#39;] |
| **attachmentFields** | **string**| &#x60;all&#x60; or a comma-separated list of attachment fields to return (e.g. url, name, id). | [optional] [default to &#39;url&#39;] |

### Return type

[**\MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\Card[]**](../Model/Card.md)

### Authorization

[apiToken](../../README.md#apiToken), [appKey](../../README.md#appKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getLists()`

```php
getLists($boardId, $cards, $filter, $fields): \MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\TrelloList[]
```



Get all lists on a board

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiToken
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('token', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('token', 'Bearer');

// Configure API key authorization: appKey
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');


$apiInstance = new MauticPlugin\MauticTrelloBundle\Openapi\lib\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$boardId = 5e5c1f7d35b240381adccdcb; // string
$cards = none; // string
$filter = open; // string
$fields = id,name,pos; // string

try {
    $result = $apiInstance->getLists($boardId, $cards, $filter, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getLists: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **boardId** | **string**|  | |
| **cards** | **string**|  | [optional] |
| **filter** | **string**|  | [optional] |
| **fields** | **string**|  | [optional] |

### Return type

[**\MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\TrelloList[]**](../Model/TrelloList.md)

### Authorization

[apiToken](../../README.md#apiToken), [appKey](../../README.md#appKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `getMember()`

```php
getMember($id, $fields): \MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\Member
```

Get a Member

Get a member by ID or username

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiToken
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('token', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('token', 'Bearer');

// Configure API key authorization: appKey
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');


$apiInstance = new MauticPlugin\MauticTrelloBundle\Openapi\lib\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The ID or username of the member
$fields = 'id,fullName,email'; // string | `all` or a comma-separated list of member fields (e.g. id, fullName, email)

try {
    $result = $apiInstance->getMember($id, $fields);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->getMember: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The ID or username of the member | |
| **fields** | **string**| &#x60;all&#x60; or a comma-separated list of member fields (e.g. id, fullName, email) | [optional] [default to &#39;id,fullName,email&#39;] |

### Return type

[**\MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\Member**](../Model/Member.md)

### Authorization

[apiToken](../../README.md#apiToken), [appKey](../../README.md#appKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)

## `updateCard()`

```php
updateCard($id, $name, $desc, $closed, $idList, $idBoard, $pos, $due, $start, $dueComplete, $subscribed, $idMembers, $idLabels, $idAttachmentCover): \MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\Card
```

Update a Card

Update a card. Can also only update one value - rest stays untouched.

### Example

```php
<?php
require_once(__DIR__ . '/vendor/autoload.php');


// Configure API key authorization: apiToken
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('token', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('token', 'Bearer');

// Configure API key authorization: appKey
$config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKey('key', 'YOUR_API_KEY');
// Uncomment below to setup prefix (e.g. Bearer) for API key, if needed
// $config = MauticPlugin\MauticTrelloBundle\Openapi\lib\Configuration::getDefaultConfiguration()->setApiKeyPrefix('key', 'Bearer');


$apiInstance = new MauticPlugin\MauticTrelloBundle\Openapi\lib\Api\DefaultApi(
    // If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
    // This is optional, `GuzzleHttp\Client` will be used as default.
    new GuzzleHttp\Client(),
    $config
);
$id = 'id_example'; // string | The ID of the Card
$name = 'name_example'; // string | The new name for the card
$desc = 'desc_example'; // string | The new description for the card
$closed = True; // bool | Whether the card should be archived (closed true)
$idList = 'idList_example'; // string | The ID of the list the card should be in
$idBoard = 'idBoard_example'; // string | The ID of the board the card should be on
$pos = new \MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\UpdateCardPosParameter(); // UpdateCardPosParameter | The position of the card in its list. top, bottom, or a positive float
$due = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | When the card is due, or null
$start = new \DateTime("2013-10-20T19:20:30+01:00"); // \DateTime | The start date of a card, or null
$dueComplete = True; // bool | Whether the status of the card is complete
$subscribed = True; // bool | Whether the member should be subscribed to the card
$idMembers = 'idMembers_example'; // string | Comma-separated list of member IDs
$idLabels = 'idLabels_example'; // string | Comma-separated list of label IDs
$idAttachmentCover = 'idAttachmentCover_example'; // string | The ID of the image attachment the card should use as its cover, or null for none

try {
    $result = $apiInstance->updateCard($id, $name, $desc, $closed, $idList, $idBoard, $pos, $due, $start, $dueComplete, $subscribed, $idMembers, $idLabels, $idAttachmentCover);
    print_r($result);
} catch (Exception $e) {
    echo 'Exception when calling DefaultApi->updateCard: ', $e->getMessage(), PHP_EOL;
}
```

### Parameters

| Name | Type | Description  | Notes |
| ------------- | ------------- | ------------- | ------------- |
| **id** | **string**| The ID of the Card | |
| **name** | **string**| The new name for the card | [optional] |
| **desc** | **string**| The new description for the card | [optional] |
| **closed** | **bool**| Whether the card should be archived (closed true) | [optional] |
| **idList** | **string**| The ID of the list the card should be in | [optional] |
| **idBoard** | **string**| The ID of the board the card should be on | [optional] |
| **pos** | [**UpdateCardPosParameter**](../Model/.md)| The position of the card in its list. top, bottom, or a positive float | [optional] |
| **due** | **\DateTime**| When the card is due, or null | [optional] |
| **start** | **\DateTime**| The start date of a card, or null | [optional] |
| **dueComplete** | **bool**| Whether the status of the card is complete | [optional] |
| **subscribed** | **bool**| Whether the member should be subscribed to the card | [optional] |
| **idMembers** | **string**| Comma-separated list of member IDs | [optional] |
| **idLabels** | **string**| Comma-separated list of label IDs | [optional] |
| **idAttachmentCover** | **string**| The ID of the image attachment the card should use as its cover, or null for none | [optional] |

### Return type

[**\MauticPlugin\MauticTrelloBundle\Openapi\lib\Model\Card**](../Model/Card.md)

### Authorization

[apiToken](../../README.md#apiToken), [appKey](../../README.md#appKey)

### HTTP request headers

- **Content-Type**: Not defined
- **Accept**: `application/json`

[[Back to top]](#) [[Back to API list]](../../README.md#endpoints)
[[Back to Model list]](../../README.md#models)
[[Back to README]](../../README.md)
