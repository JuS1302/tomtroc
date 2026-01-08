<?php

class User
{
    public static function create(string $username, string $email, string $password): bool
    {
        $pdo = getPDO();

        $sql = "INSERT INTO users (username, email, password)
                VALUES (:username, :email, :password)";

        $request = $pdo->prepare($sql);

        return $request->execute([
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT)
        ]);
    }

    public static function findByEmail(string $email): ?array
    {
        $pdo = getPDO();

        $request = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $request->execute(['email' => $email]);

        $user = $request->fetch(PDO::FETCH_ASSOC);

        return $user ?: null;
    }
}
