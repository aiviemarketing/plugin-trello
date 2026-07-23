<?php

namespace MauticPlugin\AivieTrelloBundle\Openapi\lib\Api;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7\MultipartStream;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\RequestOptions;
use MauticPlugin\AivieTrelloBundle\Openapi\lib\ApiException;
use MauticPlugin\AivieTrelloBundle\Openapi\lib\Configuration;
use MauticPlugin\AivieTrelloBundle\Openapi\lib\HeaderSelector;
use MauticPlugin\AivieTrelloBundle\Openapi\lib\ObjectSerializer;

/**
 * DefaultApi Class Doc Comment.
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://openapi-generator.tech
 */
class DefaultApi
{
    /**
     * @var ClientInterface
     */
    protected $client;

    /**
     * @var Configuration
     */
    protected $config;

    /**
     * @var HeaderSelector
     */
    protected $headerSelector;

    /**
     * @var int Host index
     */
    protected $hostIndex;

    /** @var string[] * */
    public const contentTypes = [
        'addCard' => [
            'application/json',
        ],
        'addChecklistItemOnCard' => [
            'application/json',
        ],
        'addChecklistOnCard' => [
            'application/json',
        ],
        'getAttachmentsOnCard' => [
            'application/json',
        ],
        'getBoardMembers' => [
            'application/json',
        ],
        'getBoards' => [
            'application/json',
        ],
        'getCard' => [
            'application/json',
        ],
        'getCardsOnBoard' => [
            'application/json',
        ],
        'getLists' => [
            'application/json',
        ],
        'getMember' => [
            'application/json',
        ],
        'updateCard' => [
            'application/json',
        ],
    ];

    /**
     * @param int $hostIndex (Optional) host index to select the list of hosts if defined in the OpenAPI spec
     */
    public function __construct(
        ?ClientInterface $client = null,
        ?Configuration $config = null,
        ?HeaderSelector $selector = null,
        $hostIndex = 0,
    ) {
        $this->client         = $client ?: new Client();
        $this->config         = $config ?: new Configuration();
        $this->headerSelector = $selector ?: new HeaderSelector();
        $this->hostIndex      = $hostIndex;
    }

    /**
     * Set the host index.
     *
     * @param int $hostIndex Host index (required)
     */
    public function setHostIndex($hostIndex): void
    {
        $this->hostIndex = $hostIndex;
    }

    /**
     * Get the host index.
     *
     * @return int Host index
     */
    public function getHostIndex()
    {
        return $this->hostIndex;
    }

    /**
     * @return Configuration
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Operation addCard.
     *
     * @param \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\NewCard $newCard     Card to be added (required)
     * @param string                                                    $contentType The value for the Content-Type header. Check self::contentTypes['addCard'] to see the possible values for this operation
     *
     * @return \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card|\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError|\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function addCard($newCard, string $contentType = self::contentTypes['addCard'][0])
    {
        list($response) = $this->addCardWithHttpInfo($newCard, $contentType);

        return $response;
    }

    /**
     * Operation addCardWithHttpInfo.
     *
     * @param \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\NewCard $newCard     Card to be added (required)
     * @param string                                                    $contentType The value for the Content-Type header. Check self::contentTypes['addCard'] to see the possible values for this operation
     *
     * @return array of \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card|\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError|\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function addCardWithHttpInfo($newCard, string $contentType = self::contentTypes['addCard'][0])
    {
        $request = $this->addCardRequest($newCard, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null, $e->getResponse() ? (string) $e->getResponse()->getBody() : null);
            } catch (ConnectException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), null, null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, (string) $request->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
            }

            switch ($statusCode) {
                case 200:
                    if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card' === '\SplFileObject') {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                case 400:
                    if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError' === '\SplFileObject') {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                case 404:
                    if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError' === '\SplFileObject') {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
            }

            $returnType = '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card';
            if ('\SplFileObject' === $returnType) {
                $content = $response->getBody(); // stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ('string' !== $returnType) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation addCardAsync.
     *
     * @param \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\NewCard $newCard     Card to be added (required)
     * @param string                                                    $contentType The value for the Content-Type header. Check self::contentTypes['addCard'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function addCardAsync($newCard, string $contentType = self::contentTypes['addCard'][0])
    {
        return $this->addCardAsyncWithHttpInfo($newCard, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation addCardAsyncWithHttpInfo.
     *
     * @param \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\NewCard $newCard     Card to be added (required)
     * @param string                                                    $contentType The value for the Content-Type header. Check self::contentTypes['addCard'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function addCardAsyncWithHttpInfo($newCard, string $contentType = self::contentTypes['addCard'][0])
    {
        $returnType = '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card';
        $request    = $this->addCardRequest($newCard, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ('\SplFileObject' === $returnType) {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('string' !== $returnType) {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                },
                function ($exception) {
                    $response   = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
                }
            );
    }

    /**
     * Create request for operation 'addCard'.
     *
     * @param \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\NewCard $newCard     Card to be added (required)
     * @param string                                                    $contentType The value for the Content-Type header. Check self::contentTypes['addCard'] to see the possible values for this operation
     *
     * @return Request
     *
     * @throws \InvalidArgumentException
     */
    public function addCardRequest($newCard, string $contentType = self::contentTypes['addCard'][0])
    {
        // verify the required parameter 'newCard' is set
        if (null === $newCard || (is_array($newCard) && 0 === count($newCard))) {
            throw new \InvalidArgumentException('Missing the required parameter $newCard when calling addCard');
        }

        $resourcePath = '/card';
        $formParams   = [];
        $queryParams  = [];
        $headerParams = [];
        $httpBody     = '';
        $multipart    = false;

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (isset($newCard)) {
            if (false !== stripos($headers['Content-Type'], 'application/json')) {
                // if Content-Type contains "application/json", json_encode the body
                $httpBody = \GuzzleHttp\Utils::jsonEncode(ObjectSerializer::sanitizeForSerialization($newCard));
            } else {
                $httpBody = $newCard;
            }
        } elseif (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name'     => $formParamName,
                            'contents' => $formParamValueItem,
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif (false !== stripos($headers['Content-Type'], 'application/json')) {
                // if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('token');
        if (null !== $apiKey) {
            $queryParams['token'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('key');
        if (null !== $apiKey) {
            $queryParams['key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query         = ObjectSerializer::buildQuery($queryParams);

        return new Request(
            'POST',
            $operationHost.$resourcePath.($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation addChecklistItemOnCard.
     *
     * Create Checkitem on Checklist
     *
     * @param string $id          ID of the checklist (required)
     * @param string $name        The name of the new check item. 1 to 16384 characters. (required)
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['addChecklistItemOnCard'] to see the possible values for this operation
     *
     * @return void
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function addChecklistItemOnCard($id, $name, string $contentType = self::contentTypes['addChecklistItemOnCard'][0])
    {
        $this->addChecklistItemOnCardWithHttpInfo($id, $name, $contentType);
    }

    /**
     * Operation addChecklistItemOnCardWithHttpInfo.
     *
     * Create Checkitem on Checklist
     *
     * @param string $id          ID of the checklist (required)
     * @param string $name        The name of the new check item. 1 to 16384 characters. (required)
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['addChecklistItemOnCard'] to see the possible values for this operation
     *
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function addChecklistItemOnCardWithHttpInfo($id, $name, string $contentType = self::contentTypes['addChecklistItemOnCard'][0])
    {
        $request = $this->addChecklistItemOnCardRequest($id, $name, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null, $e->getResponse() ? (string) $e->getResponse()->getBody() : null);
            } catch (ConnectException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), null, null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, (string) $request->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
            }

            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation addChecklistItemOnCardAsync.
     *
     * Create Checkitem on Checklist
     *
     * @param string $id          ID of the checklist (required)
     * @param string $name        The name of the new check item. 1 to 16384 characters. (required)
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['addChecklistItemOnCard'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function addChecklistItemOnCardAsync($id, $name, string $contentType = self::contentTypes['addChecklistItemOnCard'][0])
    {
        return $this->addChecklistItemOnCardAsyncWithHttpInfo($id, $name, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation addChecklistItemOnCardAsyncWithHttpInfo.
     *
     * Create Checkitem on Checklist
     *
     * @param string $id          ID of the checklist (required)
     * @param string $name        The name of the new check item. 1 to 16384 characters. (required)
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['addChecklistItemOnCard'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function addChecklistItemOnCardAsyncWithHttpInfo($id, $name, string $contentType = self::contentTypes['addChecklistItemOnCard'][0])
    {
        $returnType = '';
        $request    = $this->addChecklistItemOnCardRequest($id, $name, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response   = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
                }
            );
    }

    /**
     * Create request for operation 'addChecklistItemOnCard'.
     *
     * @param string $id          ID of the checklist (required)
     * @param string $name        The name of the new check item. 1 to 16384 characters. (required)
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['addChecklistItemOnCard'] to see the possible values for this operation
     *
     * @return Request
     *
     * @throws \InvalidArgumentException
     */
    public function addChecklistItemOnCardRequest($id, $name, string $contentType = self::contentTypes['addChecklistItemOnCard'][0])
    {
        // verify the required parameter 'id' is set
        if (null === $id || (is_array($id) && 0 === count($id))) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling addChecklistItemOnCard');
        }

        // verify the required parameter 'name' is set
        if (null === $name || (is_array($name) && 0 === count($name))) {
            throw new \InvalidArgumentException('Missing the required parameter $name when calling addChecklistItemOnCard');
        }
        if (strlen($name) > 16384) {
            throw new \InvalidArgumentException('invalid length for "$name" when calling DefaultApi.addChecklistItemOnCard, must be smaller than or equal to 16384.');
        }
        if (strlen($name) < 1) {
            throw new \InvalidArgumentException('invalid length for "$name" when calling DefaultApi.addChecklistItemOnCard, must be bigger than or equal to 1.');
        }

        $resourcePath = '/checklists/{id}/checkItems';
        $formParams   = [];
        $queryParams  = [];
        $headerParams = [];
        $httpBody     = '';
        $multipart    = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $name,
            'name', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            true // required
        ) ?? []);

        // path params
        if (null !== $id) {
            $resourcePath = str_replace(
                '{id}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name'     => $formParamName,
                            'contents' => $formParamValueItem,
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif (false !== stripos($headers['Content-Type'], 'application/json')) {
                // if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('token');
        if (null !== $apiKey) {
            $queryParams['token'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('key');
        if (null !== $apiKey) {
            $queryParams['key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query         = ObjectSerializer::buildQuery($queryParams);

        return new Request(
            'POST',
            $operationHost.$resourcePath.($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation addChecklistOnCard.
     *
     * Create Checklist on a Card
     *
     * @param string $id                The ID of the Card (required)
     * @param string $name              The name of the checklist (optional)
     * @param string $idChecklistSource The ID of a source checklist to copy into the new one (optional)
     * @param string $pos               The position of the checklist on the card. One of: &#x60;top&#x60;, &#x60;bottom&#x60;, or a positive number. (optional)
     * @param string $contentType       The value for the Content-Type header. Check self::contentTypes['addChecklistOnCard'] to see the possible values for this operation
     *
     * @return void
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function addChecklistOnCard($id, $name = null, $idChecklistSource = null, $pos = null, string $contentType = self::contentTypes['addChecklistOnCard'][0])
    {
        $this->addChecklistOnCardWithHttpInfo($id, $name, $idChecklistSource, $pos, $contentType);
    }

    /**
     * Operation addChecklistOnCardWithHttpInfo.
     *
     * Create Checklist on a Card
     *
     * @param string $id                The ID of the Card (required)
     * @param string $name              The name of the checklist (optional)
     * @param string $idChecklistSource The ID of a source checklist to copy into the new one (optional)
     * @param string $pos               The position of the checklist on the card. One of: &#x60;top&#x60;, &#x60;bottom&#x60;, or a positive number. (optional)
     * @param string $contentType       The value for the Content-Type header. Check self::contentTypes['addChecklistOnCard'] to see the possible values for this operation
     *
     * @return array of null, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function addChecklistOnCardWithHttpInfo($id, $name = null, $idChecklistSource = null, $pos = null, string $contentType = self::contentTypes['addChecklistOnCard'][0])
    {
        $request = $this->addChecklistOnCardRequest($id, $name, $idChecklistSource, $pos, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null, $e->getResponse() ? (string) $e->getResponse()->getBody() : null);
            } catch (ConnectException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), null, null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, (string) $request->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
            }

            return [null, $statusCode, $response->getHeaders()];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
            }
            throw $e;
        }
    }

    /**
     * Operation addChecklistOnCardAsync.
     *
     * Create Checklist on a Card
     *
     * @param string $id                The ID of the Card (required)
     * @param string $name              The name of the checklist (optional)
     * @param string $idChecklistSource The ID of a source checklist to copy into the new one (optional)
     * @param string $pos               The position of the checklist on the card. One of: &#x60;top&#x60;, &#x60;bottom&#x60;, or a positive number. (optional)
     * @param string $contentType       The value for the Content-Type header. Check self::contentTypes['addChecklistOnCard'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function addChecklistOnCardAsync($id, $name = null, $idChecklistSource = null, $pos = null, string $contentType = self::contentTypes['addChecklistOnCard'][0])
    {
        return $this->addChecklistOnCardAsyncWithHttpInfo($id, $name, $idChecklistSource, $pos, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation addChecklistOnCardAsyncWithHttpInfo.
     *
     * Create Checklist on a Card
     *
     * @param string $id                The ID of the Card (required)
     * @param string $name              The name of the checklist (optional)
     * @param string $idChecklistSource The ID of a source checklist to copy into the new one (optional)
     * @param string $pos               The position of the checklist on the card. One of: &#x60;top&#x60;, &#x60;bottom&#x60;, or a positive number. (optional)
     * @param string $contentType       The value for the Content-Type header. Check self::contentTypes['addChecklistOnCard'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function addChecklistOnCardAsyncWithHttpInfo($id, $name = null, $idChecklistSource = null, $pos = null, string $contentType = self::contentTypes['addChecklistOnCard'][0])
    {
        $returnType = '';
        $request    = $this->addChecklistOnCardRequest($id, $name, $idChecklistSource, $pos, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) {
                    return [null, $response->getStatusCode(), $response->getHeaders()];
                },
                function ($exception) {
                    $response   = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
                }
            );
    }

    /**
     * Create request for operation 'addChecklistOnCard'.
     *
     * @param string $id                The ID of the Card (required)
     * @param string $name              The name of the checklist (optional)
     * @param string $idChecklistSource The ID of a source checklist to copy into the new one (optional)
     * @param string $pos               The position of the checklist on the card. One of: &#x60;top&#x60;, &#x60;bottom&#x60;, or a positive number. (optional)
     * @param string $contentType       The value for the Content-Type header. Check self::contentTypes['addChecklistOnCard'] to see the possible values for this operation
     *
     * @return Request
     *
     * @throws \InvalidArgumentException
     */
    public function addChecklistOnCardRequest($id, $name = null, $idChecklistSource = null, $pos = null, string $contentType = self::contentTypes['addChecklistOnCard'][0])
    {
        // verify the required parameter 'id' is set
        if (null === $id || (is_array($id) && 0 === count($id))) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling addChecklistOnCard');
        }

        $resourcePath = '/cards/{id}/checklists';
        $formParams   = [];
        $queryParams  = [];
        $headerParams = [];
        $httpBody     = '';
        $multipart    = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $name,
            'name', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $idChecklistSource,
            'idChecklistSource', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $pos,
            'pos', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);

        // path params
        if (null !== $id) {
            $resourcePath = str_replace(
                '{id}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        $headers = $this->headerSelector->selectHeaders(
            [],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name'     => $formParamName,
                            'contents' => $formParamValueItem,
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif (false !== stripos($headers['Content-Type'], 'application/json')) {
                // if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('token');
        if (null !== $apiKey) {
            $queryParams['token'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('key');
        if (null !== $apiKey) {
            $queryParams['key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query         = ObjectSerializer::buildQuery($queryParams);

        return new Request(
            'POST',
            $operationHost.$resourcePath.($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getAttachmentsOnCard.
     *
     * Get Attachments on a Card
     *
     * @param string $id          The ID of the Card (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of attachment fields (optional, default to 'all')
     * @param string $filter      Use &#x60;cover&#x60; to restrict to just the cover attachment (optional, default to 'false')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getAttachmentsOnCard'] to see the possible values for this operation
     *
     * @return \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Attachment[]
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function getAttachmentsOnCard($id, $fields = 'all', $filter = 'false', string $contentType = self::contentTypes['getAttachmentsOnCard'][0])
    {
        list($response) = $this->getAttachmentsOnCardWithHttpInfo($id, $fields, $filter, $contentType);

        return $response;
    }

    /**
     * Operation getAttachmentsOnCardWithHttpInfo.
     *
     * Get Attachments on a Card
     *
     * @param string $id          The ID of the Card (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of attachment fields (optional, default to 'all')
     * @param string $filter      Use &#x60;cover&#x60; to restrict to just the cover attachment (optional, default to 'false')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getAttachmentsOnCard'] to see the possible values for this operation
     *
     * @return array of \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Attachment[], HTTP status code, HTTP response headers (array of strings)
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function getAttachmentsOnCardWithHttpInfo($id, $fields = 'all', $filter = 'false', string $contentType = self::contentTypes['getAttachmentsOnCard'][0])
    {
        $request = $this->getAttachmentsOnCardRequest($id, $fields, $filter, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null, $e->getResponse() ? (string) $e->getResponse()->getBody() : null);
            } catch (ConnectException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), null, null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, (string) $request->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
            }

            switch ($statusCode) {
                case 200:
                    if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Attachment[]' === '\SplFileObject') {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Attachment[]' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Attachment[]', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
            }

            $returnType = '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Attachment[]';
            if ('\SplFileObject' === $returnType) {
                $content = $response->getBody(); // stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ('string' !== $returnType) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Attachment[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getAttachmentsOnCardAsync.
     *
     * Get Attachments on a Card
     *
     * @param string $id          The ID of the Card (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of attachment fields (optional, default to 'all')
     * @param string $filter      Use &#x60;cover&#x60; to restrict to just the cover attachment (optional, default to 'false')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getAttachmentsOnCard'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function getAttachmentsOnCardAsync($id, $fields = 'all', $filter = 'false', string $contentType = self::contentTypes['getAttachmentsOnCard'][0])
    {
        return $this->getAttachmentsOnCardAsyncWithHttpInfo($id, $fields, $filter, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getAttachmentsOnCardAsyncWithHttpInfo.
     *
     * Get Attachments on a Card
     *
     * @param string $id          The ID of the Card (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of attachment fields (optional, default to 'all')
     * @param string $filter      Use &#x60;cover&#x60; to restrict to just the cover attachment (optional, default to 'false')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getAttachmentsOnCard'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function getAttachmentsOnCardAsyncWithHttpInfo($id, $fields = 'all', $filter = 'false', string $contentType = self::contentTypes['getAttachmentsOnCard'][0])
    {
        $returnType = '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Attachment[]';
        $request    = $this->getAttachmentsOnCardRequest($id, $fields, $filter, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ('\SplFileObject' === $returnType) {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('string' !== $returnType) {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                },
                function ($exception) {
                    $response   = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
                }
            );
    }

    /**
     * Create request for operation 'getAttachmentsOnCard'.
     *
     * @param string $id          The ID of the Card (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of attachment fields (optional, default to 'all')
     * @param string $filter      Use &#x60;cover&#x60; to restrict to just the cover attachment (optional, default to 'false')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getAttachmentsOnCard'] to see the possible values for this operation
     *
     * @return Request
     *
     * @throws \InvalidArgumentException
     */
    public function getAttachmentsOnCardRequest($id, $fields = 'all', $filter = 'false', string $contentType = self::contentTypes['getAttachmentsOnCard'][0])
    {
        // verify the required parameter 'id' is set
        if (null === $id || (is_array($id) && 0 === count($id))) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling getAttachmentsOnCard');
        }

        $resourcePath = '/card/{id}/attachments';
        $formParams   = [];
        $queryParams  = [];
        $headerParams = [];
        $httpBody     = '';
        $multipart    = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $fields,
            'fields', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $filter,
            'filter', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);

        // path params
        if (null !== $id) {
            $resourcePath = str_replace(
                '{id}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name'     => $formParamName,
                            'contents' => $formParamValueItem,
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif (false !== stripos($headers['Content-Type'], 'application/json')) {
                // if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('token');
        if (null !== $apiKey) {
            $queryParams['token'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('key');
        if (null !== $apiKey) {
            $queryParams['key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query         = ObjectSerializer::buildQuery($queryParams);

        return new Request(
            'GET',
            $operationHost.$resourcePath.($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getBoardMembers.
     *
     * Get the Members of a Board
     *
     * @param string $id          The ID of the board (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of member fields (e.g. id, fullName, username, email) (optional, default to 'id,fullName,username')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getBoardMembers'] to see the possible values for this operation
     *
     * @return \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Member[]
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function getBoardMembers($id, $fields = 'id,fullName,username', string $contentType = self::contentTypes['getBoardMembers'][0])
    {
        list($response) = $this->getBoardMembersWithHttpInfo($id, $fields, $contentType);

        return $response;
    }

    /**
     * Operation getBoardMembersWithHttpInfo.
     *
     * Get the Members of a Board
     *
     * @param string $id          The ID of the board (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of member fields (e.g. id, fullName, username, email) (optional, default to 'id,fullName,username')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getBoardMembers'] to see the possible values for this operation
     *
     * @return array of \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Member[], HTTP status code, HTTP response headers (array of strings)
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function getBoardMembersWithHttpInfo($id, $fields = 'id,fullName,username', string $contentType = self::contentTypes['getBoardMembers'][0])
    {
        $request = $this->getBoardMembersRequest($id, $fields, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null, $e->getResponse() ? (string) $e->getResponse()->getBody() : null);
            } catch (ConnectException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), null, null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, (string) $request->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
            }

            switch ($statusCode) {
                case 200:
                    if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Member[]' === '\SplFileObject') {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Member[]' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Member[]', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
            }

            $returnType = '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Member[]';
            if ('\SplFileObject' === $returnType) {
                $content = $response->getBody(); // stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ('string' !== $returnType) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Member[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getBoardMembersAsync.
     *
     * Get the Members of a Board
     *
     * @param string $id          The ID of the board (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of member fields (e.g. id, fullName, username, email) (optional, default to 'id,fullName,username')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getBoardMembers'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function getBoardMembersAsync($id, $fields = 'id,fullName,username', string $contentType = self::contentTypes['getBoardMembers'][0])
    {
        return $this->getBoardMembersAsyncWithHttpInfo($id, $fields, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getBoardMembersAsyncWithHttpInfo.
     *
     * Get the Members of a Board
     *
     * @param string $id          The ID of the board (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of member fields (e.g. id, fullName, username, email) (optional, default to 'id,fullName,username')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getBoardMembers'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function getBoardMembersAsyncWithHttpInfo($id, $fields = 'id,fullName,username', string $contentType = self::contentTypes['getBoardMembers'][0])
    {
        $returnType = '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Member[]';
        $request    = $this->getBoardMembersRequest($id, $fields, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ('\SplFileObject' === $returnType) {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('string' !== $returnType) {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                },
                function ($exception) {
                    $response   = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
                }
            );
    }

    /**
     * Create request for operation 'getBoardMembers'.
     *
     * @param string $id          The ID of the board (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of member fields (e.g. id, fullName, username, email) (optional, default to 'id,fullName,username')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getBoardMembers'] to see the possible values for this operation
     *
     * @return Request
     *
     * @throws \InvalidArgumentException
     */
    public function getBoardMembersRequest($id, $fields = 'id,fullName,username', string $contentType = self::contentTypes['getBoardMembers'][0])
    {
        // verify the required parameter 'id' is set
        if (null === $id || (is_array($id) && 0 === count($id))) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling getBoardMembers');
        }

        $resourcePath = '/boards/{id}/members';
        $formParams   = [];
        $queryParams  = [];
        $headerParams = [];
        $httpBody     = '';
        $multipart    = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $fields,
            'fields', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);

        // path params
        if (null !== $id) {
            $resourcePath = str_replace(
                '{id}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name'     => $formParamName,
                            'contents' => $formParamValueItem,
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif (false !== stripos($headers['Content-Type'], 'application/json')) {
                // if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('token');
        if (null !== $apiKey) {
            $queryParams['token'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('key');
        if (null !== $apiKey) {
            $queryParams['key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query         = ObjectSerializer::buildQuery($queryParams);

        return new Request(
            'GET',
            $operationHost.$resourcePath.($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getBoards.
     *
     * @param string $fields      fields (optional)
     * @param string $filter      filter (optional)
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getBoards'] to see the possible values for this operation
     *
     * @return \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\TrelloBoard[]
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function getBoards($fields = null, $filter = null, string $contentType = self::contentTypes['getBoards'][0])
    {
        list($response) = $this->getBoardsWithHttpInfo($fields, $filter, $contentType);

        return $response;
    }

    /**
     * Operation getBoardsWithHttpInfo.
     *
     * @param string $fields      (optional)
     * @param string $filter      (optional)
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getBoards'] to see the possible values for this operation
     *
     * @return array of \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\TrelloBoard[], HTTP status code, HTTP response headers (array of strings)
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function getBoardsWithHttpInfo($fields = null, $filter = null, string $contentType = self::contentTypes['getBoards'][0])
    {
        $request = $this->getBoardsRequest($fields, $filter, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null, $e->getResponse() ? (string) $e->getResponse()->getBody() : null);
            } catch (ConnectException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), null, null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, (string) $request->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
            }

            switch ($statusCode) {
                case 200:
                    if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\TrelloBoard[]' === '\SplFileObject') {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\TrelloBoard[]' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\TrelloBoard[]', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
            }

            $returnType = '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\TrelloBoard[]';
            if ('\SplFileObject' === $returnType) {
                $content = $response->getBody(); // stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ('string' !== $returnType) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\TrelloBoard[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getBoardsAsync.
     *
     * @param string $fields      (optional)
     * @param string $filter      (optional)
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getBoards'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function getBoardsAsync($fields = null, $filter = null, string $contentType = self::contentTypes['getBoards'][0])
    {
        return $this->getBoardsAsyncWithHttpInfo($fields, $filter, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getBoardsAsyncWithHttpInfo.
     *
     * @param string $fields      (optional)
     * @param string $filter      (optional)
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getBoards'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function getBoardsAsyncWithHttpInfo($fields = null, $filter = null, string $contentType = self::contentTypes['getBoards'][0])
    {
        $returnType = '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\TrelloBoard[]';
        $request    = $this->getBoardsRequest($fields, $filter, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ('\SplFileObject' === $returnType) {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('string' !== $returnType) {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                },
                function ($exception) {
                    $response   = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
                }
            );
    }

    /**
     * Create request for operation 'getBoards'.
     *
     * @param string $fields      (optional)
     * @param string $filter      (optional)
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getBoards'] to see the possible values for this operation
     *
     * @return Request
     *
     * @throws \InvalidArgumentException
     */
    public function getBoardsRequest($fields = null, $filter = null, string $contentType = self::contentTypes['getBoards'][0])
    {
        $resourcePath = '/members/me/boards';
        $formParams   = [];
        $queryParams  = [];
        $headerParams = [];
        $httpBody     = '';
        $multipart    = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $fields,
            'fields', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $filter,
            'filter', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name'     => $formParamName,
                            'contents' => $formParamValueItem,
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif (false !== stripos($headers['Content-Type'], 'application/json')) {
                // if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('token');
        if (null !== $apiKey) {
            $queryParams['token'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('key');
        if (null !== $apiKey) {
            $queryParams['key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query         = ObjectSerializer::buildQuery($queryParams);

        return new Request(
            'GET',
            $operationHost.$resourcePath.($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getCard.
     *
     * Get a Card
     *
     * @param string $id          The ID of the Card (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of card fields (optional, default to 'id,name,idChecklists,shortUrl,due,idMembers,url')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getCard'] to see the possible values for this operation
     *
     * @return \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card|\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError|\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function getCard($id, $fields = 'id,name,idChecklists,shortUrl,due,idMembers,url', string $contentType = self::contentTypes['getCard'][0])
    {
        list($response) = $this->getCardWithHttpInfo($id, $fields, $contentType);

        return $response;
    }

    /**
     * Operation getCardWithHttpInfo.
     *
     * Get a Card
     *
     * @param string $id          The ID of the Card (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of card fields (optional, default to 'id,name,idChecklists,shortUrl,due,idMembers,url')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getCard'] to see the possible values for this operation
     *
     * @return array of \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card|\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError|\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function getCardWithHttpInfo($id, $fields = 'id,name,idChecklists,shortUrl,due,idMembers,url', string $contentType = self::contentTypes['getCard'][0])
    {
        $request = $this->getCardRequest($id, $fields, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null, $e->getResponse() ? (string) $e->getResponse()->getBody() : null);
            } catch (ConnectException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), null, null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, (string) $request->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
            }

            switch ($statusCode) {
                case 200:
                    if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card' === '\SplFileObject') {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                case 400:
                    if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError' === '\SplFileObject') {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                case 404:
                    if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError' === '\SplFileObject') {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
            }

            $returnType = '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card';
            if ('\SplFileObject' === $returnType) {
                $content = $response->getBody(); // stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ('string' !== $returnType) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getCardAsync.
     *
     * Get a Card
     *
     * @param string $id          The ID of the Card (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of card fields (optional, default to 'id,name,idChecklists,shortUrl,due,idMembers,url')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getCard'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function getCardAsync($id, $fields = 'id,name,idChecklists,shortUrl,due,idMembers,url', string $contentType = self::contentTypes['getCard'][0])
    {
        return $this->getCardAsyncWithHttpInfo($id, $fields, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getCardAsyncWithHttpInfo.
     *
     * Get a Card
     *
     * @param string $id          The ID of the Card (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of card fields (optional, default to 'id,name,idChecklists,shortUrl,due,idMembers,url')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getCard'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function getCardAsyncWithHttpInfo($id, $fields = 'id,name,idChecklists,shortUrl,due,idMembers,url', string $contentType = self::contentTypes['getCard'][0])
    {
        $returnType = '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card';
        $request    = $this->getCardRequest($id, $fields, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ('\SplFileObject' === $returnType) {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('string' !== $returnType) {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                },
                function ($exception) {
                    $response   = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
                }
            );
    }

    /**
     * Create request for operation 'getCard'.
     *
     * @param string $id          The ID of the Card (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of card fields (optional, default to 'id,name,idChecklists,shortUrl,due,idMembers,url')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getCard'] to see the possible values for this operation
     *
     * @return Request
     *
     * @throws \InvalidArgumentException
     */
    public function getCardRequest($id, $fields = 'id,name,idChecklists,shortUrl,due,idMembers,url', string $contentType = self::contentTypes['getCard'][0])
    {
        // verify the required parameter 'id' is set
        if (null === $id || (is_array($id) && 0 === count($id))) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling getCard');
        }

        $resourcePath = '/cards/{id}';
        $formParams   = [];
        $queryParams  = [];
        $headerParams = [];
        $httpBody     = '';
        $multipart    = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $fields,
            'fields', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);

        // path params
        if (null !== $id) {
            $resourcePath = str_replace(
                '{id}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name'     => $formParamName,
                            'contents' => $formParamValueItem,
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif (false !== stripos($headers['Content-Type'], 'application/json')) {
                // if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('token');
        if (null !== $apiKey) {
            $queryParams['token'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('key');
        if (null !== $apiKey) {
            $queryParams['key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query         = ObjectSerializer::buildQuery($queryParams);

        return new Request(
            'GET',
            $operationHost.$resourcePath.($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getCardsOnBoard.
     *
     * Get Cards on a Board
     *
     * @param string $id               ID of the Board (required)
     * @param string $fields           Comma separated list of card fields to return (e.g. id,name,idChecklists,shortUrl,due,idMembers,url or all). (optional, default to 'id,name,idChecklists,shortUrl,due,idMembers,url,attachments,dateLastActivity')
     * @param string $attachments      Include attachments on cards. &#x60;true&#x60;, &#x60;false&#x60;, or &#x60;cover&#x60; (cover only). (optional, default to 'true')
     * @param string $attachmentFields &#x60;all&#x60; or a comma-separated list of attachment fields to return (e.g. url, name, id). (optional, default to 'url')
     * @param string $contentType      The value for the Content-Type header. Check self::contentTypes['getCardsOnBoard'] to see the possible values for this operation
     *
     * @return \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card[]
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function getCardsOnBoard($id, $fields = 'id,name,idChecklists,shortUrl,due,idMembers,url,attachments,dateLastActivity', $attachments = 'true', $attachmentFields = 'url', string $contentType = self::contentTypes['getCardsOnBoard'][0])
    {
        list($response) = $this->getCardsOnBoardWithHttpInfo($id, $fields, $attachments, $attachmentFields, $contentType);

        return $response;
    }

    /**
     * Operation getCardsOnBoardWithHttpInfo.
     *
     * Get Cards on a Board
     *
     * @param string $id               ID of the Board (required)
     * @param string $fields           Comma separated list of card fields to return (e.g. id,name,idChecklists,shortUrl,due,idMembers,url or all). (optional, default to 'id,name,idChecklists,shortUrl,due,idMembers,url,attachments,dateLastActivity')
     * @param string $attachments      Include attachments on cards. &#x60;true&#x60;, &#x60;false&#x60;, or &#x60;cover&#x60; (cover only). (optional, default to 'true')
     * @param string $attachmentFields &#x60;all&#x60; or a comma-separated list of attachment fields to return (e.g. url, name, id). (optional, default to 'url')
     * @param string $contentType      The value for the Content-Type header. Check self::contentTypes['getCardsOnBoard'] to see the possible values for this operation
     *
     * @return array of \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card[], HTTP status code, HTTP response headers (array of strings)
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function getCardsOnBoardWithHttpInfo($id, $fields = 'id,name,idChecklists,shortUrl,due,idMembers,url,attachments,dateLastActivity', $attachments = 'true', $attachmentFields = 'url', string $contentType = self::contentTypes['getCardsOnBoard'][0])
    {
        $request = $this->getCardsOnBoardRequest($id, $fields, $attachments, $attachmentFields, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null, $e->getResponse() ? (string) $e->getResponse()->getBody() : null);
            } catch (ConnectException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), null, null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, (string) $request->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
            }

            switch ($statusCode) {
                case 200:
                    if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card[]' === '\SplFileObject') {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card[]' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card[]', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
            }

            $returnType = '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card[]';
            if ('\SplFileObject' === $returnType) {
                $content = $response->getBody(); // stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ('string' !== $returnType) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getCardsOnBoardAsync.
     *
     * Get Cards on a Board
     *
     * @param string $id               ID of the Board (required)
     * @param string $fields           Comma separated list of card fields to return (e.g. id,name,idChecklists,shortUrl,due,idMembers,url or all). (optional, default to 'id,name,idChecklists,shortUrl,due,idMembers,url,attachments,dateLastActivity')
     * @param string $attachments      Include attachments on cards. &#x60;true&#x60;, &#x60;false&#x60;, or &#x60;cover&#x60; (cover only). (optional, default to 'true')
     * @param string $attachmentFields &#x60;all&#x60; or a comma-separated list of attachment fields to return (e.g. url, name, id). (optional, default to 'url')
     * @param string $contentType      The value for the Content-Type header. Check self::contentTypes['getCardsOnBoard'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function getCardsOnBoardAsync($id, $fields = 'id,name,idChecklists,shortUrl,due,idMembers,url,attachments,dateLastActivity', $attachments = 'true', $attachmentFields = 'url', string $contentType = self::contentTypes['getCardsOnBoard'][0])
    {
        return $this->getCardsOnBoardAsyncWithHttpInfo($id, $fields, $attachments, $attachmentFields, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getCardsOnBoardAsyncWithHttpInfo.
     *
     * Get Cards on a Board
     *
     * @param string $id               ID of the Board (required)
     * @param string $fields           Comma separated list of card fields to return (e.g. id,name,idChecklists,shortUrl,due,idMembers,url or all). (optional, default to 'id,name,idChecklists,shortUrl,due,idMembers,url,attachments,dateLastActivity')
     * @param string $attachments      Include attachments on cards. &#x60;true&#x60;, &#x60;false&#x60;, or &#x60;cover&#x60; (cover only). (optional, default to 'true')
     * @param string $attachmentFields &#x60;all&#x60; or a comma-separated list of attachment fields to return (e.g. url, name, id). (optional, default to 'url')
     * @param string $contentType      The value for the Content-Type header. Check self::contentTypes['getCardsOnBoard'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function getCardsOnBoardAsyncWithHttpInfo($id, $fields = 'id,name,idChecklists,shortUrl,due,idMembers,url,attachments,dateLastActivity', $attachments = 'true', $attachmentFields = 'url', string $contentType = self::contentTypes['getCardsOnBoard'][0])
    {
        $returnType = '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card[]';
        $request    = $this->getCardsOnBoardRequest($id, $fields, $attachments, $attachmentFields, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ('\SplFileObject' === $returnType) {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('string' !== $returnType) {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                },
                function ($exception) {
                    $response   = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
                }
            );
    }

    /**
     * Create request for operation 'getCardsOnBoard'.
     *
     * @param string $id               ID of the Board (required)
     * @param string $fields           Comma separated list of card fields to return (e.g. id,name,idChecklists,shortUrl,due,idMembers,url or all). (optional, default to 'id,name,idChecklists,shortUrl,due,idMembers,url,attachments,dateLastActivity')
     * @param string $attachments      Include attachments on cards. &#x60;true&#x60;, &#x60;false&#x60;, or &#x60;cover&#x60; (cover only). (optional, default to 'true')
     * @param string $attachmentFields &#x60;all&#x60; or a comma-separated list of attachment fields to return (e.g. url, name, id). (optional, default to 'url')
     * @param string $contentType      The value for the Content-Type header. Check self::contentTypes['getCardsOnBoard'] to see the possible values for this operation
     *
     * @return Request
     *
     * @throws \InvalidArgumentException
     */
    public function getCardsOnBoardRequest($id, $fields = 'id,name,idChecklists,shortUrl,due,idMembers,url,attachments,dateLastActivity', $attachments = 'true', $attachmentFields = 'url', string $contentType = self::contentTypes['getCardsOnBoard'][0])
    {
        // verify the required parameter 'id' is set
        if (null === $id || (is_array($id) && 0 === count($id))) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling getCardsOnBoard');
        }

        $resourcePath = '/boards/{id}/cards';
        $formParams   = [];
        $queryParams  = [];
        $headerParams = [];
        $httpBody     = '';
        $multipart    = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $fields,
            'fields', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $attachments,
            'attachments', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $attachmentFields,
            'attachment_fields', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);

        // path params
        if (null !== $id) {
            $resourcePath = str_replace(
                '{id}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name'     => $formParamName,
                            'contents' => $formParamValueItem,
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif (false !== stripos($headers['Content-Type'], 'application/json')) {
                // if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('token');
        if (null !== $apiKey) {
            $queryParams['token'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('key');
        if (null !== $apiKey) {
            $queryParams['key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query         = ObjectSerializer::buildQuery($queryParams);

        return new Request(
            'GET',
            $operationHost.$resourcePath.($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getLists.
     *
     * @param string $boardId     boardId (required)
     * @param string $cards       cards (optional)
     * @param string $filter      filter (optional)
     * @param string $fields      fields (optional)
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getLists'] to see the possible values for this operation
     *
     * @return \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\TrelloList[]
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function getLists($boardId, $cards = null, $filter = null, $fields = null, string $contentType = self::contentTypes['getLists'][0])
    {
        list($response) = $this->getListsWithHttpInfo($boardId, $cards, $filter, $fields, $contentType);

        return $response;
    }

    /**
     * Operation getListsWithHttpInfo.
     *
     * @param string $boardId     (required)
     * @param string $cards       (optional)
     * @param string $filter      (optional)
     * @param string $fields      (optional)
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getLists'] to see the possible values for this operation
     *
     * @return array of \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\TrelloList[], HTTP status code, HTTP response headers (array of strings)
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function getListsWithHttpInfo($boardId, $cards = null, $filter = null, $fields = null, string $contentType = self::contentTypes['getLists'][0])
    {
        $request = $this->getListsRequest($boardId, $cards, $filter, $fields, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null, $e->getResponse() ? (string) $e->getResponse()->getBody() : null);
            } catch (ConnectException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), null, null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, (string) $request->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
            }

            switch ($statusCode) {
                case 200:
                    if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\TrelloList[]' === '\SplFileObject') {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\TrelloList[]' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\TrelloList[]', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
            }

            $returnType = '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\TrelloList[]';
            if ('\SplFileObject' === $returnType) {
                $content = $response->getBody(); // stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ('string' !== $returnType) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\TrelloList[]',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getListsAsync.
     *
     * @param string $boardId     (required)
     * @param string $cards       (optional)
     * @param string $filter      (optional)
     * @param string $fields      (optional)
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getLists'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function getListsAsync($boardId, $cards = null, $filter = null, $fields = null, string $contentType = self::contentTypes['getLists'][0])
    {
        return $this->getListsAsyncWithHttpInfo($boardId, $cards, $filter, $fields, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getListsAsyncWithHttpInfo.
     *
     * @param string $boardId     (required)
     * @param string $cards       (optional)
     * @param string $filter      (optional)
     * @param string $fields      (optional)
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getLists'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function getListsAsyncWithHttpInfo($boardId, $cards = null, $filter = null, $fields = null, string $contentType = self::contentTypes['getLists'][0])
    {
        $returnType = '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\TrelloList[]';
        $request    = $this->getListsRequest($boardId, $cards, $filter, $fields, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ('\SplFileObject' === $returnType) {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('string' !== $returnType) {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                },
                function ($exception) {
                    $response   = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
                }
            );
    }

    /**
     * Create request for operation 'getLists'.
     *
     * @param string $boardId     (required)
     * @param string $cards       (optional)
     * @param string $filter      (optional)
     * @param string $fields      (optional)
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getLists'] to see the possible values for this operation
     *
     * @return Request
     *
     * @throws \InvalidArgumentException
     */
    public function getListsRequest($boardId, $cards = null, $filter = null, $fields = null, string $contentType = self::contentTypes['getLists'][0])
    {
        // verify the required parameter 'boardId' is set
        if (null === $boardId || (is_array($boardId) && 0 === count($boardId))) {
            throw new \InvalidArgumentException('Missing the required parameter $boardId when calling getLists');
        }

        $resourcePath = '/boards/{boardId}/lists';
        $formParams   = [];
        $queryParams  = [];
        $headerParams = [];
        $httpBody     = '';
        $multipart    = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $cards,
            'cards', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $filter,
            'filter', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $fields,
            'fields', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);

        // path params
        if (null !== $boardId) {
            $resourcePath = str_replace(
                '{boardId}',
                ObjectSerializer::toPathValue($boardId),
                $resourcePath
            );
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name'     => $formParamName,
                            'contents' => $formParamValueItem,
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif (false !== stripos($headers['Content-Type'], 'application/json')) {
                // if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('token');
        if (null !== $apiKey) {
            $queryParams['token'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('key');
        if (null !== $apiKey) {
            $queryParams['key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query         = ObjectSerializer::buildQuery($queryParams);

        return new Request(
            'GET',
            $operationHost.$resourcePath.($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation getMember.
     *
     * Get a Member
     *
     * @param string $id          The ID or username of the member (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of member fields (e.g. id, fullName, email) (optional, default to 'id,fullName,email')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getMember'] to see the possible values for this operation
     *
     * @return \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Member
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function getMember($id, $fields = 'id,fullName,email', string $contentType = self::contentTypes['getMember'][0])
    {
        list($response) = $this->getMemberWithHttpInfo($id, $fields, $contentType);

        return $response;
    }

    /**
     * Operation getMemberWithHttpInfo.
     *
     * Get a Member
     *
     * @param string $id          The ID or username of the member (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of member fields (e.g. id, fullName, email) (optional, default to 'id,fullName,email')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getMember'] to see the possible values for this operation
     *
     * @return array of \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Member, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function getMemberWithHttpInfo($id, $fields = 'id,fullName,email', string $contentType = self::contentTypes['getMember'][0])
    {
        $request = $this->getMemberRequest($id, $fields, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null, $e->getResponse() ? (string) $e->getResponse()->getBody() : null);
            } catch (ConnectException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), null, null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, (string) $request->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
            }

            switch ($statusCode) {
                case 200:
                    if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Member' === '\SplFileObject') {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Member' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Member', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
            }

            $returnType = '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Member';
            if ('\SplFileObject' === $returnType) {
                $content = $response->getBody(); // stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ('string' !== $returnType) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Member',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation getMemberAsync.
     *
     * Get a Member
     *
     * @param string $id          The ID or username of the member (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of member fields (e.g. id, fullName, email) (optional, default to 'id,fullName,email')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getMember'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function getMemberAsync($id, $fields = 'id,fullName,email', string $contentType = self::contentTypes['getMember'][0])
    {
        return $this->getMemberAsyncWithHttpInfo($id, $fields, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation getMemberAsyncWithHttpInfo.
     *
     * Get a Member
     *
     * @param string $id          The ID or username of the member (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of member fields (e.g. id, fullName, email) (optional, default to 'id,fullName,email')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getMember'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function getMemberAsyncWithHttpInfo($id, $fields = 'id,fullName,email', string $contentType = self::contentTypes['getMember'][0])
    {
        $returnType = '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Member';
        $request    = $this->getMemberRequest($id, $fields, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ('\SplFileObject' === $returnType) {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('string' !== $returnType) {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                },
                function ($exception) {
                    $response   = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
                }
            );
    }

    /**
     * Create request for operation 'getMember'.
     *
     * @param string $id          The ID or username of the member (required)
     * @param string $fields      &#x60;all&#x60; or a comma-separated list of member fields (e.g. id, fullName, email) (optional, default to 'id,fullName,email')
     * @param string $contentType The value for the Content-Type header. Check self::contentTypes['getMember'] to see the possible values for this operation
     *
     * @return Request
     *
     * @throws \InvalidArgumentException
     */
    public function getMemberRequest($id, $fields = 'id,fullName,email', string $contentType = self::contentTypes['getMember'][0])
    {
        // verify the required parameter 'id' is set
        if (null === $id || (is_array($id) && 0 === count($id))) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling getMember');
        }

        $resourcePath = '/members/{id}';
        $formParams   = [];
        $queryParams  = [];
        $headerParams = [];
        $httpBody     = '';
        $multipart    = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $fields,
            'fields', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);

        // path params
        if (null !== $id) {
            $resourcePath = str_replace(
                '{id}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name'     => $formParamName,
                            'contents' => $formParamValueItem,
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif (false !== stripos($headers['Content-Type'], 'application/json')) {
                // if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('token');
        if (null !== $apiKey) {
            $queryParams['token'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('key');
        if (null !== $apiKey) {
            $queryParams['key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query         = ObjectSerializer::buildQuery($queryParams);

        return new Request(
            'GET',
            $operationHost.$resourcePath.($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Operation updateCard.
     *
     * Update a Card
     *
     * @param string                 $id                The ID of the Card (required)
     * @param string                 $name              The new name for the card (optional)
     * @param string                 $desc              The new description for the card (optional)
     * @param bool                   $closed            Whether the card should be archived (closed true) (optional)
     * @param string                 $idList            The ID of the list the card should be in (optional)
     * @param string                 $idBoard           The ID of the board the card should be on (optional)
     * @param UpdateCardPosParameter $pos               The position of the card in its list. top, bottom, or a positive float (optional)
     * @param \DateTime              $due               When the card is due, or null (optional)
     * @param \DateTime              $start             The start date of a card, or null (optional)
     * @param bool                   $dueComplete       Whether the status of the card is complete (optional)
     * @param bool                   $subscribed        Whether the member should be subscribed to the card (optional)
     * @param string                 $idMembers         Comma-separated list of member IDs (optional)
     * @param string                 $idLabels          Comma-separated list of label IDs (optional)
     * @param string                 $idAttachmentCover The ID of the image attachment the card should use as its cover, or null for none (optional)
     * @param string                 $contentType       The value for the Content-Type header. Check self::contentTypes['updateCard'] to see the possible values for this operation
     *
     * @return \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card|\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError|\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function updateCard($id, $name = null, $desc = null, $closed = null, $idList = null, $idBoard = null, $pos = null, $due = null, $start = null, $dueComplete = null, $subscribed = null, $idMembers = null, $idLabels = null, $idAttachmentCover = null, string $contentType = self::contentTypes['updateCard'][0])
    {
        list($response) = $this->updateCardWithHttpInfo($id, $name, $desc, $closed, $idList, $idBoard, $pos, $due, $start, $dueComplete, $subscribed, $idMembers, $idLabels, $idAttachmentCover, $contentType);

        return $response;
    }

    /**
     * Operation updateCardWithHttpInfo.
     *
     * Update a Card
     *
     * @param string                 $id                The ID of the Card (required)
     * @param string                 $name              The new name for the card (optional)
     * @param string                 $desc              The new description for the card (optional)
     * @param bool                   $closed            Whether the card should be archived (closed true) (optional)
     * @param string                 $idList            The ID of the list the card should be in (optional)
     * @param string                 $idBoard           The ID of the board the card should be on (optional)
     * @param UpdateCardPosParameter $pos               The position of the card in its list. top, bottom, or a positive float (optional)
     * @param \DateTime              $due               When the card is due, or null (optional)
     * @param \DateTime              $start             The start date of a card, or null (optional)
     * @param bool                   $dueComplete       Whether the status of the card is complete (optional)
     * @param bool                   $subscribed        Whether the member should be subscribed to the card (optional)
     * @param string                 $idMembers         Comma-separated list of member IDs (optional)
     * @param string                 $idLabels          Comma-separated list of label IDs (optional)
     * @param string                 $idAttachmentCover The ID of the image attachment the card should use as its cover, or null for none (optional)
     * @param string                 $contentType       The value for the Content-Type header. Check self::contentTypes['updateCard'] to see the possible values for this operation
     *
     * @return array of \MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card|\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError|\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError, HTTP status code, HTTP response headers (array of strings)
     *
     * @throws ApiException              on non-2xx response
     * @throws \InvalidArgumentException
     */
    public function updateCardWithHttpInfo($id, $name = null, $desc = null, $closed = null, $idList = null, $idBoard = null, $pos = null, $due = null, $start = null, $dueComplete = null, $subscribed = null, $idMembers = null, $idLabels = null, $idAttachmentCover = null, string $contentType = self::contentTypes['updateCard'][0])
    {
        $request = $this->updateCardRequest($id, $name, $desc, $closed, $idList, $idBoard, $pos, $due, $start, $dueComplete, $subscribed, $idMembers, $idLabels, $idAttachmentCover, $contentType);

        try {
            $options = $this->createHttpClientOption();
            try {
                $response = $this->client->send($request, $options);
            } catch (RequestException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), $e->getResponse() ? $e->getResponse()->getHeaders() : null, $e->getResponse() ? (string) $e->getResponse()->getBody() : null);
            } catch (ConnectException $e) {
                throw new ApiException("[{$e->getCode()}] {$e->getMessage()}", (int) $e->getCode(), null, null);
            }

            $statusCode = $response->getStatusCode();

            if ($statusCode < 200 || $statusCode > 299) {
                throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, (string) $request->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
            }

            switch ($statusCode) {
                case 200:
                    if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card' === '\SplFileObject') {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                case 400:
                    if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError' === '\SplFileObject') {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                case 404:
                    if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError' === '\SplFileObject') {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError' !== 'string') {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError', []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
            }

            $returnType = '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card';
            if ('\SplFileObject' === $returnType) {
                $content = $response->getBody(); // stream goes to serializer
            } else {
                $content = (string) $response->getBody();
                if ('string' !== $returnType) {
                    $content = json_decode($content);
                }
            }

            return [
                ObjectSerializer::deserialize($content, $returnType, []),
                $response->getStatusCode(),
                $response->getHeaders(),
            ];
        } catch (ApiException $e) {
            switch ($e->getCode()) {
                case 200:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 400:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
                case 404:
                    $data = ObjectSerializer::deserialize(
                        $e->getResponseBody(),
                        '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\CardError',
                        $e->getResponseHeaders()
                    );
                    $e->setResponseObject($data);
                    break;
            }
            throw $e;
        }
    }

    /**
     * Operation updateCardAsync.
     *
     * Update a Card
     *
     * @param string                 $id                The ID of the Card (required)
     * @param string                 $name              The new name for the card (optional)
     * @param string                 $desc              The new description for the card (optional)
     * @param bool                   $closed            Whether the card should be archived (closed true) (optional)
     * @param string                 $idList            The ID of the list the card should be in (optional)
     * @param string                 $idBoard           The ID of the board the card should be on (optional)
     * @param UpdateCardPosParameter $pos               The position of the card in its list. top, bottom, or a positive float (optional)
     * @param \DateTime              $due               When the card is due, or null (optional)
     * @param \DateTime              $start             The start date of a card, or null (optional)
     * @param bool                   $dueComplete       Whether the status of the card is complete (optional)
     * @param bool                   $subscribed        Whether the member should be subscribed to the card (optional)
     * @param string                 $idMembers         Comma-separated list of member IDs (optional)
     * @param string                 $idLabels          Comma-separated list of label IDs (optional)
     * @param string                 $idAttachmentCover The ID of the image attachment the card should use as its cover, or null for none (optional)
     * @param string                 $contentType       The value for the Content-Type header. Check self::contentTypes['updateCard'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function updateCardAsync($id, $name = null, $desc = null, $closed = null, $idList = null, $idBoard = null, $pos = null, $due = null, $start = null, $dueComplete = null, $subscribed = null, $idMembers = null, $idLabels = null, $idAttachmentCover = null, string $contentType = self::contentTypes['updateCard'][0])
    {
        return $this->updateCardAsyncWithHttpInfo($id, $name, $desc, $closed, $idList, $idBoard, $pos, $due, $start, $dueComplete, $subscribed, $idMembers, $idLabels, $idAttachmentCover, $contentType)
            ->then(
                function ($response) {
                    return $response[0];
                }
            );
    }

    /**
     * Operation updateCardAsyncWithHttpInfo.
     *
     * Update a Card
     *
     * @param string                 $id                The ID of the Card (required)
     * @param string                 $name              The new name for the card (optional)
     * @param string                 $desc              The new description for the card (optional)
     * @param bool                   $closed            Whether the card should be archived (closed true) (optional)
     * @param string                 $idList            The ID of the list the card should be in (optional)
     * @param string                 $idBoard           The ID of the board the card should be on (optional)
     * @param UpdateCardPosParameter $pos               The position of the card in its list. top, bottom, or a positive float (optional)
     * @param \DateTime              $due               When the card is due, or null (optional)
     * @param \DateTime              $start             The start date of a card, or null (optional)
     * @param bool                   $dueComplete       Whether the status of the card is complete (optional)
     * @param bool                   $subscribed        Whether the member should be subscribed to the card (optional)
     * @param string                 $idMembers         Comma-separated list of member IDs (optional)
     * @param string                 $idLabels          Comma-separated list of label IDs (optional)
     * @param string                 $idAttachmentCover The ID of the image attachment the card should use as its cover, or null for none (optional)
     * @param string                 $contentType       The value for the Content-Type header. Check self::contentTypes['updateCard'] to see the possible values for this operation
     *
     * @return \GuzzleHttp\Promise\PromiseInterface
     *
     * @throws \InvalidArgumentException
     */
    public function updateCardAsyncWithHttpInfo($id, $name = null, $desc = null, $closed = null, $idList = null, $idBoard = null, $pos = null, $due = null, $start = null, $dueComplete = null, $subscribed = null, $idMembers = null, $idLabels = null, $idAttachmentCover = null, string $contentType = self::contentTypes['updateCard'][0])
    {
        $returnType = '\MauticPlugin\AivieTrelloBundle\Openapi\lib\Model\Card';
        $request    = $this->updateCardRequest($id, $name, $desc, $closed, $idList, $idBoard, $pos, $due, $start, $dueComplete, $subscribed, $idMembers, $idLabels, $idAttachmentCover, $contentType);

        return $this->client
            ->sendAsync($request, $this->createHttpClientOption())
            ->then(
                function ($response) use ($returnType) {
                    if ('\SplFileObject' === $returnType) {
                        $content = $response->getBody(); // stream goes to serializer
                    } else {
                        $content = (string) $response->getBody();
                        if ('string' !== $returnType) {
                            $content = json_decode($content);
                        }
                    }

                    return [
                        ObjectSerializer::deserialize($content, $returnType, []),
                        $response->getStatusCode(),
                        $response->getHeaders(),
                    ];
                },
                function ($exception) {
                    $response   = $exception->getResponse();
                    $statusCode = $response->getStatusCode();
                    throw new ApiException(sprintf('[%d] Error connecting to the API (%s)', $statusCode, $exception->getRequest()->getUri()), $statusCode, $response->getHeaders(), (string) $response->getBody());
                }
            );
    }

    /**
     * Create request for operation 'updateCard'.
     *
     * @param string                 $id                The ID of the Card (required)
     * @param string                 $name              The new name for the card (optional)
     * @param string                 $desc              The new description for the card (optional)
     * @param bool                   $closed            Whether the card should be archived (closed true) (optional)
     * @param string                 $idList            The ID of the list the card should be in (optional)
     * @param string                 $idBoard           The ID of the board the card should be on (optional)
     * @param UpdateCardPosParameter $pos               The position of the card in its list. top, bottom, or a positive float (optional)
     * @param \DateTime              $due               When the card is due, or null (optional)
     * @param \DateTime              $start             The start date of a card, or null (optional)
     * @param bool                   $dueComplete       Whether the status of the card is complete (optional)
     * @param bool                   $subscribed        Whether the member should be subscribed to the card (optional)
     * @param string                 $idMembers         Comma-separated list of member IDs (optional)
     * @param string                 $idLabels          Comma-separated list of label IDs (optional)
     * @param string                 $idAttachmentCover The ID of the image attachment the card should use as its cover, or null for none (optional)
     * @param string                 $contentType       The value for the Content-Type header. Check self::contentTypes['updateCard'] to see the possible values for this operation
     *
     * @return Request
     *
     * @throws \InvalidArgumentException
     */
    public function updateCardRequest($id, $name = null, $desc = null, $closed = null, $idList = null, $idBoard = null, $pos = null, $due = null, $start = null, $dueComplete = null, $subscribed = null, $idMembers = null, $idLabels = null, $idAttachmentCover = null, string $contentType = self::contentTypes['updateCard'][0])
    {
        // verify the required parameter 'id' is set
        if (null === $id || (is_array($id) && 0 === count($id))) {
            throw new \InvalidArgumentException('Missing the required parameter $id when calling updateCard');
        }

        $resourcePath = '/cards/{id}';
        $formParams   = [];
        $queryParams  = [];
        $headerParams = [];
        $httpBody     = '';
        $multipart    = false;

        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $name,
            'name', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $desc,
            'desc', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $closed,
            'closed', // param base name
            'boolean', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $idList,
            'idList', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $idBoard,
            'idBoard', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $pos,
            'pos', // param base name
            'OneOfUpdateCardPosParameterOneOfFloat', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $due,
            'due', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $start,
            'start', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $dueComplete,
            'dueComplete', // param base name
            'boolean', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $subscribed,
            'subscribed', // param base name
            'boolean', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $idMembers,
            'idMembers', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $idLabels,
            'idLabels', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);
        // query params
        $queryParams = array_merge($queryParams, ObjectSerializer::toQueryValue(
            $idAttachmentCover,
            'idAttachmentCover', // param base name
            'string', // openApiType
            'form', // style
            true, // explode
            false // required
        ) ?? []);

        // path params
        if (null !== $id) {
            $resourcePath = str_replace(
                '{id}',
                ObjectSerializer::toPathValue($id),
                $resourcePath
            );
        }

        $headers = $this->headerSelector->selectHeaders(
            ['application/json'],
            $contentType,
            $multipart
        );

        // for model (json/xml)
        if (count($formParams) > 0) {
            if ($multipart) {
                $multipartContents = [];
                foreach ($formParams as $formParamName => $formParamValue) {
                    $formParamValueItems = is_array($formParamValue) ? $formParamValue : [$formParamValue];
                    foreach ($formParamValueItems as $formParamValueItem) {
                        $multipartContents[] = [
                            'name'     => $formParamName,
                            'contents' => $formParamValueItem,
                        ];
                    }
                }
                // for HTTP post (form)
                $httpBody = new MultipartStream($multipartContents);
            } elseif (false !== stripos($headers['Content-Type'], 'application/json')) {
                // if Content-Type contains "application/json", json_encode the form parameters
                $httpBody = \GuzzleHttp\Utils::jsonEncode($formParams);
            } else {
                // for HTTP post (form)
                $httpBody = ObjectSerializer::buildQuery($formParams);
            }
        }

        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('token');
        if (null !== $apiKey) {
            $queryParams['token'] = $apiKey;
        }
        // this endpoint requires API key authentication
        $apiKey = $this->config->getApiKeyWithPrefix('key');
        if (null !== $apiKey) {
            $queryParams['key'] = $apiKey;
        }

        $defaultHeaders = [];
        if ($this->config->getUserAgent()) {
            $defaultHeaders['User-Agent'] = $this->config->getUserAgent();
        }

        $headers = array_merge(
            $defaultHeaders,
            $headerParams,
            $headers
        );

        $operationHost = $this->config->getHost();
        $query         = ObjectSerializer::buildQuery($queryParams);

        return new Request(
            'PUT',
            $operationHost.$resourcePath.($query ? "?{$query}" : ''),
            $headers,
            $httpBody
        );
    }

    /**
     * Create http client option.
     *
     * @return array of http client options
     *
     * @throws \RuntimeException on file opening failure
     */
    protected function createHttpClientOption()
    {
        $options = [];
        if ($this->config->getDebug()) {
            $options[RequestOptions::DEBUG] = fopen($this->config->getDebugFile(), 'a');
            if (!$options[RequestOptions::DEBUG]) {
                throw new \RuntimeException('Failed to open the debug file: '.$this->config->getDebugFile());
            }
        }

        return $options;
    }
}
