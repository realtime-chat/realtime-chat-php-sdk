<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: AuthService.proto

namespace RealtimeChat\Rpc;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Generated from protobuf message <code>realtimeChat.rpc.VerifyTokenRequest</code>
 */
class VerifyTokenRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>string token_type = 1;</code>
     */
    private $token_type = '';
    /**
     * Generated from protobuf field <code>string token = 2;</code>
     */
    private $token = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $token_type
     *     @type string $token
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\AuthService::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>string token_type = 1;</code>
     * @return string
     */
    public function getTokenType()
    {
        return $this->token_type;
    }

    /**
     * Generated from protobuf field <code>string token_type = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setTokenType($var)
    {
        GPBUtil::checkString($var, True);
        $this->token_type = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string token = 2;</code>
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Generated from protobuf field <code>string token = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setToken($var)
    {
        GPBUtil::checkString($var, True);
        $this->token = $var;

        return $this;
    }

}
