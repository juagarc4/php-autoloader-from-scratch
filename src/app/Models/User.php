<?php

namespace App\Models;

class User extends Model
{

    public function create(string $userName, string $userPassword): int
    {
        $this->db->run(
          'INSERT INTO users(username, password) VALUES (?,?)',
          [$userName, $userPassword]
        );
        return (int)$this->db->lastInsertId();
    }

    public function getAll(): array
    {
        $stmt = $this->db->run('SELECT * FROM users');
        return $stmt->fetchAll() ?? [];
    }

    public function find(int $userId): array
    {
        $stmt = $this->db->run(
          'SELECT * FROM users WHERE user.id = ?', [$userId]
        );
        return $stmt->fetch() ?? [];
    }

}