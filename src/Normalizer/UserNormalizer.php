<?php

namespace App\Normalizer;

use PhpBenchmarksRestData\User;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Serializer\SerializerAwareInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Translation\TranslatorInterface;

class UserNormalizer implements NormalizerInterface, SerializerAwareInterface
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
        return $data instanceof User;
    }

    /**
     * @param User $object
     * @param ?string $format
     */
    public function normalize($object, $format = null, array $context = []): array
    {
        return [
            'id' => $object->getId(),
            'login' => $object->getLogin(),
            'createdAt' => $object->getCreatedAt()->format('Y-m-d H:i:s'),
            'translated' => $this->translator->trans('translated.1000', [], 'phpbenchmarks'),
            'comments' => $this->serializer->normalize($object->getComments(), $format, $context)
        ];
    }
}
