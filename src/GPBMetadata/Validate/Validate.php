<?php
// Hand-written: declares validate/validate.proto to the protobuf descriptor pool.
//
// The generated metadata of every message that carries validation rules calls
// \GPBMetadata\Validate\Validate::initOnce() before registering its own descriptor, and the pool rejects a file
// whose dependency is unknown. protoc's PHP generator cannot produce this class for validate.proto (it refuses the
// file's closed enum), and the SDK never evaluates the rules, so register just the file declaration: its name and
// package. The rules themselves stay in the options of the fields that use them as unknown fields.
//
// The bytes are a FileDescriptorSet holding one FileDescriptorProto (\x0A\x23 = field 1, 35 bytes) whose field 1 (name)
// is "validate/validate.proto" and field 2 (package) is "validate".

namespace GPBMetadata\Validate;

class Validate
{
    public static bool $is_initialized = false;

    public static function initOnce(): void
    {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized) {
            return;
        }
        $pool->internalAddGeneratedFile("\x0A\x23\x0A\x17validate/validate.proto\x12\x08validate", true);

        static::$is_initialized = true;
    }
}
