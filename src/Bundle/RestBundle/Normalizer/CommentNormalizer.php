<?php

namespace PhpBenchmarks\Bundle\RestBundle\Normalizer;

use PhpBenchmarksRestType\Comment;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Translation\TranslatorInterface;

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

    /** @param SerializerInterface $serializer */
    public function setSerializer(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param mixed $data
     * @param ?string $format
     * @return bool
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof Comment;
    }

    /**
     * @param Comment $object
     * @param ?string $format
     * @param array $context
     * @return array
     */
    public function normalize($object, $format = null, array $context = [])
    {
        return [
            'id' => $object->getId(),
            'message' => $object->getMessage(),
            'translated' => $this->translator->trans('translated.2000', [], 'phpbenchmarks'),
            'type' => $this->serializer->normalize($object->getType(), $format, $context)
        ];
    }
}
