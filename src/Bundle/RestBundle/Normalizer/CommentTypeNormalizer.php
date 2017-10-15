<?php

namespace PhpBenchmarks\Bundle\RestBundle\Normalizer;

use PhpBenchmarksRestType\CommentType;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Symfony\Component\Translation\TranslatorInterface;

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
     * @return bool
     */
    public function supportsNormalization($data, $format = null)
    {
        return $data instanceof CommentType;
    }

    /**
     * @param CommentType $object
     * @param ?string $format
     * @param array $context
     * @return array
     */
    public function normalize($object, $format = null, array $context = [])
    {
        return [
            'id' => $object->getId(),
            'name' => $object->getName(),
            'translated' => $this->translator->trans('translated.3000', [], 'phpbenchmarks'),
        ];
    }
}
