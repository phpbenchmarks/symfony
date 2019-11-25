<?php

namespace App\Normalizer;

use PhpBenchmarksRestData\Comment;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class CommentNormalizer implements NormalizerInterface, SerializerAwareInterface
{
    /** @var SerializerInterface */
    protected $serializer;

    /** @var TranslatorInterface */
    protected $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    public function setSerializer(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param mixed $data
     * @param ?string $format
     */
    public function supportsNormalization($data, $format = null): bool
    {
        return $data instanceof Comment;
    }

    /**
     * @param Comment $object
     * @param ?string $format
     */
    public function normalize($object, $format = null, array $context = []): array
    {
        return [
            'id' => $object->getId(),
            'message' => $object->getMessage(),
            'translated' => $this->translator->trans('translated.2000', [], 'phpbenchmarks'),
            'type' => $this->serializer->normalize($object->getType(), $format, $context)
        ];
    }
}
