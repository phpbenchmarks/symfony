<?php

namespace App\Normalizer;

use PhpBenchmarksRestData\CommentType;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class CommentTypeNormalizer implements NormalizerInterface
{
    /** @var TranslatorInterface */
    protected $translator;

    public function __construct(TranslatorInterface $translator)
    {
        $this->translator = $translator;
    }

    /**
     * @param mixed $data
     * @param ?string $format
     */
    public function supportsNormalization($data, $format = null): bool
    {
        return $data instanceof CommentType;
    }

    /**
     * @param CommentType $object
     * @param ?string $format
     * @param array $context
     */
    public function normalize($object, $format = null, array $context = []): array
    {
        return [
            'id' => $object->getId(),
            'name' => $object->getName(),
            'translated' => $this->translator->trans('translated.3000', [], 'phpbenchmarks'),
        ];
    }
}
