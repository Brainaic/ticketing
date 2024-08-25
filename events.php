<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $event = json_decode(file_get_contents('php://input'), true);

    if ($event) {
        $file = './events.json';
        $events = json_decode(file_get_contents($file), true);

        if (!$events) {
            $events = [];
        }

        $events[] = $event;
        file_put_contents($file, json_encode($events, JSON_PRETTY_PRINT));

        echo json_encode(['status' => 'success', 'message' => 'Event added successfully!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid data!']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method!']);
}
?>
