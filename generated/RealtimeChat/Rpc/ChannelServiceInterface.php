<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: ChannelService.proto

namespace RealtimeChat\Rpc;

/**
 * Protobuf type <code>realtimeChat.rpc.ChannelService</code>
 */
interface ChannelServiceInterface
{
    /**
     * Method <code>findById</code>
     *
     * @param \RealtimeChat\Rpc\FindChannelByIdRequest $request
     * @return \RealtimeChat\Rpc\FindChannelByIdResponse
     */
    public function findById(\RealtimeChat\Rpc\FindChannelByIdRequest $request);

    /**
     * Method <code>create</code>
     *
     * @param \RealtimeChat\Rpc\CreateChannelRequest $request
     * @return \RealtimeChat\Rpc\CreateChannelResponse
     */
    public function create(\RealtimeChat\Rpc\CreateChannelRequest $request);

    /**
     * Method <code>updateById</code>
     *
     * @param \RealtimeChat\Rpc\UpdateChannelByIdRequest $request
     * @return \RealtimeChat\Rpc\UpdateChannelByIdResponse
     */
    public function updateById(\RealtimeChat\Rpc\UpdateChannelByIdRequest $request);

    /**
     * Method <code>deleteById</code>
     *
     * @param \RealtimeChat\Rpc\DeleteChannelByIdRequest $request
     * @return \RealtimeChat\Rpc\DeleteChannelByIdResponse
     */
    public function deleteById(\RealtimeChat\Rpc\DeleteChannelByIdRequest $request);

}
