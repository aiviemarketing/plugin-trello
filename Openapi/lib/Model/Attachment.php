<?php

namespace MauticPlugin\AivieTrelloBundle\Openapi\lib\Model;

use MauticPlugin\AivieTrelloBundle\Openapi\lib\ObjectSerializer;

/**
 * Attachment Class Doc Comment.
 *
 * @category Class
 *
 * @author   OpenAPI Generator team
 *
 * @see     https://openapi-generator.tech
 *
 * @implements \ArrayAccess<string, mixed>
 */
class Attachment implements ModelInterface, \ArrayAccess, \JsonSerializable
{
    public const DISCRIMINATOR = null;

    /**
     * The original name of the model.
     *
     * @var string
     */
    protected static $openAPIModelName = 'Attachment';

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $openAPITypes = [
        'id'       => 'string',
        'bytes'    => 'string',
        'date'     => '\DateTime',
        'idMember' => 'string',
        'isUpload' => 'bool',
        'mimeType' => 'string',
        'name'     => 'string',
        'url'      => 'string',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     *
     * @phpstan-var array<string, string|null>
     *
     * @psalm-var array<string, string|null>
     */
    protected static $openAPIFormats = [
        'id'       => null,
        'bytes'    => null,
        'date'     => 'date',
        'idMember' => null,
        'isUpload' => null,
        'mimeType' => null,
        'name'     => null,
        'url'      => 'uri',
    ];

    /**
     * Array of nullable properties. Used for (de)serialization.
     *
     * @var bool[]
     */
    protected static array $openAPINullables = [
        'id'       => false,
        'bytes'    => true,
        'date'     => false,
        'idMember' => false,
        'isUpload' => false,
        'mimeType' => false,
        'name'     => false,
        'url'      => false,
    ];

    /**
     * If a nullable field gets set to null, insert it here.
     *
     * @var bool[]
     */
    protected array $openAPINullablesSetToNull = [];

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @return array
     */
    public static function openAPITypes()
    {
        return self::$openAPITypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @return array
     */
    public static function openAPIFormats()
    {
        return self::$openAPIFormats;
    }

    /**
     * Array of nullable properties.
     */
    protected static function openAPINullables(): array
    {
        return self::$openAPINullables;
    }

    /**
     * Array of nullable field names deliberately set to null.
     *
     * @return bool[]
     */
    private function getOpenAPINullablesSetToNull(): array
    {
        return $this->openAPINullablesSetToNull;
    }

    /**
     * Setter - Array of nullable field names deliberately set to null.
     *
     * @param bool[] $openAPINullablesSetToNull
     */
    private function setOpenAPINullablesSetToNull(array $openAPINullablesSetToNull): void
    {
        $this->openAPINullablesSetToNull = $openAPINullablesSetToNull;
    }

    /**
     * Checks if a property is nullable.
     */
    public static function isNullable(string $property): bool
    {
        return self::openAPINullables()[$property] ?? false;
    }

    /**
     * Checks if a nullable property is set to null.
     */
    public function isNullableSetToNull(string $property): bool
    {
        return in_array($property, $this->getOpenAPINullablesSetToNull(), true);
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'id'       => 'id',
        'bytes'    => 'bytes',
        'date'     => 'date',
        'idMember' => 'idMember',
        'isUpload' => 'isUpload',
        'mimeType' => 'mimeType',
        'name'     => 'name',
        'url'      => 'url',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        'id'       => 'setId',
        'bytes'    => 'setBytes',
        'date'     => 'setDate',
        'idMember' => 'setIdMember',
        'isUpload' => 'setIsUpload',
        'mimeType' => 'setMimeType',
        'name'     => 'setName',
        'url'      => 'setUrl',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        'id'       => 'getId',
        'bytes'    => 'getBytes',
        'date'     => 'getDate',
        'idMember' => 'getIdMember',
        'isUpload' => 'getIsUpload',
        'mimeType' => 'getMimeType',
        'name'     => 'getName',
        'url'      => 'getUrl',
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$openAPIModelName;
    }

    /**
     * Associative array for storing property values.
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor.
     *
     * @param mixed[]|null $data Associated array of property values
     *                           initializing the model
     */
    public function __construct(?array $data = null)
    {
        $this->setIfExists('id', $data ?? [], null);
        $this->setIfExists('bytes', $data ?? [], null);
        $this->setIfExists('date', $data ?? [], null);
        $this->setIfExists('idMember', $data ?? [], null);
        $this->setIfExists('isUpload', $data ?? [], null);
        $this->setIfExists('mimeType', $data ?? [], null);
        $this->setIfExists('name', $data ?? [], null);
        $this->setIfExists('url', $data ?? [], null);
    }

    /**
     * Sets $this->container[$variableName] to the given data or to the given default Value; if $variableName
     * is nullable and its value is set to null in the $fields array, then mark it as "set to null" in the
     * $this->openAPINullablesSetToNull array.
     *
     * @param mixed $defaultValue
     */
    private function setIfExists(string $variableName, array $fields, $defaultValue): void
    {
        if (self::isNullable($variableName) && array_key_exists($variableName, $fields) && is_null($fields[$variableName])) {
            $this->openAPINullablesSetToNull[] = $variableName;
        }

        $this->container[$variableName] = $fields[$variableName] ?? $defaultValue;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed.
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return 0 === count($this->listInvalidProperties());
    }

    /**
     * Gets id.
     *
     * @return string|null
     */
    public function getId()
    {
        return $this->container['id'];
    }

    /**
     * Sets id.
     *
     * @param string|null $id id
     *
     * @return self
     */
    public function setId($id)
    {
        if (is_null($id)) {
            throw new \InvalidArgumentException('non-nullable id cannot be null');
        }
        $this->container['id'] = $id;

        return $this;
    }

    /**
     * Gets bytes.
     *
     * @return string|null
     */
    public function getBytes()
    {
        return $this->container['bytes'];
    }

    /**
     * Sets bytes.
     *
     * @param string|null $bytes bytes
     *
     * @return self
     */
    public function setBytes($bytes)
    {
        if (is_null($bytes)) {
            array_push($this->openAPINullablesSetToNull, 'bytes');
        } else {
            $nullablesSetToNull = $this->getOpenAPINullablesSetToNull();
            $index              = array_search('bytes', $nullablesSetToNull);
            if (false !== $index) {
                unset($nullablesSetToNull[$index]);
                $this->setOpenAPINullablesSetToNull($nullablesSetToNull);
            }
        }
        $this->container['bytes'] = $bytes;

        return $this;
    }

    /**
     * Gets date.
     *
     * @return \DateTime|null
     */
    public function getDate()
    {
        return $this->container['date'];
    }

    /**
     * Sets date.
     *
     * @param \DateTime|null $date date
     *
     * @return self
     */
    public function setDate($date)
    {
        if (is_null($date)) {
            throw new \InvalidArgumentException('non-nullable date cannot be null');
        }
        $this->container['date'] = $date;

        return $this;
    }

    /**
     * Gets idMember.
     *
     * @return string|null
     */
    public function getIdMember()
    {
        return $this->container['idMember'];
    }

    /**
     * Sets idMember.
     *
     * @param string|null $idMember idMember
     *
     * @return self
     */
    public function setIdMember($idMember)
    {
        if (is_null($idMember)) {
            throw new \InvalidArgumentException('non-nullable idMember cannot be null');
        }
        $this->container['idMember'] = $idMember;

        return $this;
    }

    /**
     * Gets isUpload.
     *
     * @return bool|null
     */
    public function getIsUpload()
    {
        return $this->container['isUpload'];
    }

    /**
     * Sets isUpload.
     *
     * @param bool|null $isUpload isUpload
     *
     * @return self
     */
    public function setIsUpload($isUpload)
    {
        if (is_null($isUpload)) {
            throw new \InvalidArgumentException('non-nullable isUpload cannot be null');
        }
        $this->container['isUpload'] = $isUpload;

        return $this;
    }

    /**
     * Gets mimeType.
     *
     * @return string|null
     */
    public function getMimeType()
    {
        return $this->container['mimeType'];
    }

    /**
     * Sets mimeType.
     *
     * @param string|null $mimeType mimeType
     *
     * @return self
     */
    public function setMimeType($mimeType)
    {
        if (is_null($mimeType)) {
            throw new \InvalidArgumentException('non-nullable mimeType cannot be null');
        }
        $this->container['mimeType'] = $mimeType;

        return $this;
    }

    /**
     * Gets name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->container['name'];
    }

    /**
     * Sets name.
     *
     * @param string|null $name name
     *
     * @return self
     */
    public function setName($name)
    {
        if (is_null($name)) {
            throw new \InvalidArgumentException('non-nullable name cannot be null');
        }
        $this->container['name'] = $name;

        return $this;
    }

    /**
     * Gets url.
     *
     * @return string|null
     */
    public function getUrl()
    {
        return $this->container['url'];
    }

    /**
     * Sets url.
     *
     * @param string|null $url url
     *
     * @return self
     */
    public function setUrl($url)
    {
        if (is_null($url)) {
            throw new \InvalidArgumentException('non-nullable url cannot be null');
        }
        $this->container['url'] = $url;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param int|string $offset Offset
     */
    public function offsetExists(mixed $offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param int|string $offset Offset
     *
     * @return mixed|null
     */
    #[\ReturnTypeWillChange]
    public function offsetGet(mixed $offset)
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param int|null $offset Offset
     * @param mixed    $value  Value to be set
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param int|string $offset Offset
     */
    public function offsetUnset(mixed $offset): void
    {
        unset($this->container[$offset]);
    }

    /**
     * Serializes the object to a value that can be serialized natively by json_encode().
     *
     * @see https://www.php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return mixed returns data which can be serialized by json_encode(), which is a value
     *               of any type other than a resource
     */
    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return ObjectSerializer::sanitizeForSerialization($this);
    }

    /**
     * Gets the string presentation of the object.
     *
     * @return string
     */
    public function __toString()
    {
        return json_encode(
            ObjectSerializer::sanitizeForSerialization($this),
            JSON_PRETTY_PRINT
        );
    }

    /**
     * Gets a header-safe presentation of the object.
     *
     * @return string
     */
    public function toHeaderValue()
    {
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
