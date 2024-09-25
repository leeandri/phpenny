<?php

declare(strict_types=1);

namespace App\Services;

use Framework\Database;
use Framework\Exceptions\ValidationException;
use App\Config\Paths;

class ReceiptService
{
    public function __construct(private Database $db) {}

    public function validateFile(?array $file)
    {
        if (!$file || $file['error'] !== UPLOAD_ERR_OK) {
            throw new ValidationException([
                'receipt' => ['Echec de chargement du fichier']
            ]);
        }

        $maxFileSizeByte = 1 * 1024 * 1024;

        if ($file['size'] > $maxFileSizeByte) {
            throw new ValidationException([
                'receipt' => ['Fichier chargé trop volumineux']
            ]);
        }

        $originalFileName = $file['name'];

        if (!preg_match('/^[A-Za-z0-9\s._-]+$/', $originalFileName)) {
            throw new ValidationException([
                'receipt' => ['Nom de fichier invalide']
            ]);
        }

        $clientMimeType = $file['type'];
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'application/pdf'];

        if (!in_array($clientMimeType, $allowedMimeTypes)) {
            throw new ValidationException([
                'receipt' => ['Type de fichier invalide']
            ]);
        }
    }

    public function upload(array $file, int $transaction)
    {
        $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newFileName = bin2hex(random_bytes(16)) . "." . $fileExtension;

        $uploadPath = Paths::STORAGE_UPLOADS . "/" . $newFileName;


        if (!move_uploaded_file($file['tmp_name'], $uploadPath)) {
            throw new ValidationException([
                'receipt' => ['Echec de chargement du fichier']
            ]);
        }

        $this->db->query(
            "INSERT INTO receipts(
                transaction_id, original_filename, storage_filename, media_type
            )
            VALUES(:transaction_id, :original_filename, :storage_filename, :media_type)",
            [
                'transaction_id' => $transaction,
                'original_filename' => $file['name'],
                'storage_filename' => $newFileName,
                'media_type' => $file['type'],
            ]
        );
    }

    public function getReceipt(string $id)
    {
        $receipt = $this->db->query(
            "SELECT * FROM receipts WHERE id = :id",
            [
                'id' => $id
            ]
        )->find();

        return $receipt;
    }

    public function read(array $receipt)
    {
        $filePath = Paths::STORAGE_UPLOADS . "/" . $receipt['storage_filename'];

        if (!file_exists($filePath)) {
            redirectTo('/');
        }

        header("Content-Disposition: inline;filename={$receipt['original_filename']}");
        header("Content-Type: {$receipt['media_type']}");

        readfile($filePath);
    }

    public function delete(array $receipt)
    {
        $filePath = Paths::STORAGE_UPLOADS . "/" . $receipt['storage_filename'];

        unlink($filePath);

        $this->db->query("DELETE FROM receipts WHERE id = :id", [
            "id" => $receipt['id']
        ]);
    }
}
