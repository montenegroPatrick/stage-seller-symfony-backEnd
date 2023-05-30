<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploaderService
{
    private $params;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
    }

    public function upload(UploadedFile $file)
    {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        //$safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
        $newFilename = $originalFilename . '-' . uniqid() . '.' . $file->guessExtension();
        $targetDirectory = $this->params->get('kernel.project_dir') . '/public/uploads/';

        try {
            $file->move(
                $targetDirectory,
                $newFilename
            );
        } catch (FileException $e) {
            throw new FileException('Could not move the file: ' . $e->getMessage());
        }

        return $newFilename;
    }

    public function removeIfExists($fileName)
    {
        $targetDirectory = $this->params->get('kernel.project_dir') . '/public/uploads/';
        $filePath = $targetDirectory . $fileName;

        if (is_file($filePath) && file_exists($filePath)) {
            unlink($filePath);
        }
    }

    public function DownloadIfExists(string $fileName)
    {
        $targetDirectory = $this->params->get('kernel.project_dir') . '/public/uploads/';
        if (file_exists($targetDirectory . '/' . $fileName)) {
            return new BinaryFileResponse($targetDirectory . '/' . $fileName);
        }
    }
}
