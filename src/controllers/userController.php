<?php

class userController {

    public function __construct(
        private user $user
    ) {}

    public function index(): void {
        echo json_encode(
            $this->user->getAll()
        );
    }

    public function store(): void {
        $data = json_decode(
            file_get_contents('php://input'),
            true
        );

        $id = $this->user->create($data);

        http_response_code(201);

        echo json_encode([
            'mensaje' => 'Usuario creado',
            'id' => $id
        ]);
    }

    public function show(int $id): void {
        $userData = $this->user->getById($id);

        if (!$userData) {
            http_response_code(404);
            echo json_encode([
                'error' => 'Usuario no encontrado'
            ]);
            return;
        }

        echo json_encode($userData);
    }

    public function update(int $id): void {
        $data = json_decode(
            file_get_contents('php://input'),
            true
        );

        $result = $this->user->update($id, $data);

        if ($result === 0) {
            http_response_code(404);
            echo json_encode([
                'error' => 'Usuario no encontrado o sin cambios'
            ]);
            return;
        }

        echo json_encode([
            'mensaje' => 'Usuario actualizado',
            'id' => $id
        ]);
    }

    public function destroy(int $id): void {
        $result = $this->user->delete($id);

        if ($result === 0) {
            http_response_code(404);
            echo json_encode([
                'error' => 'Usuario no encontrado'
            ]);
            return;
        }

        http_response_code(204);
    }
}